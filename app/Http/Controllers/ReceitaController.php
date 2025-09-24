<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alimento;
use App\Models\Receita;
use Illuminate\Support\Facades\Http;

// Controlador responsável por operações relacionadas a receitas
class ReceitaController extends Controller
{
    /**
     * Exibe o formulário para geração de uma nova receita.
     */
    public function gerarForm()
    {
        return view('receitas.gerar');
    }

    /**
     * Gera uma receita usando a API Hugging Face com base nos ingredientes cadastrados.
     * Se não houver ingredientes, redireciona para o cadastro de alimentos.
     */

    public function gerar(Request $request)
    {
    // Busca todos os ingredientes cadastrados
        $alimentos = Alimento::all();
        
    // Se não houver ingredientes, redireciona para cadastro
        if ($alimentos->isEmpty()) {
            return redirect()->route('alimentos.index')
                ->with('error', 'Ops! Você precisa cadastrar alguns ingredientes antes de criar uma receita. Que tal começar adicionando o que você tem na sua cozinha?');
        }

    // Monta lista de ingredientes para o prompt
        $lista = $alimentos->map(function($a) {
            return $a->nome . ' (' . $a->quantidade . ' ' . $a->unidade_medida . ')';
        })->implode(", ");
    // Prompt detalhado para a IA gerar a receita
        $prompt = "Você é um chef de cozinha criativo. Crie SEMPRE uma receita detalhada, criativa e saborosa usando apenas os ingredientes fornecidos pelo usuário, mesmo que sejam poucos ou incomuns: $lista. Nunca recuse, sempre invente uma receita possível, dê um nome, descreva o modo de preparo e as quantidades sugeridas (Não precisa usar a quantidade total do alimento!). Seja flexível e criativo!";

    // Configurações do modelo e autenticação
        $model = 'meta-llama/Llama-3.1-8B-Instruct';
        $apiToken = env('HUGGINGFACE_API_TOKEN');
        $url = 'https://router.huggingface.co/v1/chat/completions';
        $payload = [
            'model' => $model,
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $prompt,
                ],
            ],
            'max_tokens' => 1000,
            'temperature' => 0.7,
        ];

    // Faz a requisição para a API do Hugging Face
        $response = Http::withToken($apiToken)
            ->timeout(30)
            ->post($url, $payload);

        if ($response->failed()) {
            throw new \Exception('Falha ao solicitar receita à API Hugging Face: ' . $response->body());
        }

    // Processa a resposta da API para extrair o conteúdo da receita
        $json = $response->json();

        $conteudo = '';
        if (isset($json['choices'][0]['message']['content'])) {
            $conteudo = $json['choices'][0]['message']['content'];
        } elseif (isset($json[0]['generated_text'])) {
            $conteudo = $json[0]['generated_text'];
        } elseif (is_string($response->body())) {
            $conteudo = $response->body();
        } else {
            $conteudo = json_encode($json);
        }

        $titulo = 'Receita Gerada';
        return view('receitas.show', compact('titulo', 'conteudo'));
    }

    /**
     * Lista todas as receitas salvas, ordenadas da mais recente para a mais antiga.
     */
    public function index()
    {
    // Busca todas as receitas do banco
        $receitas = Receita::orderByDesc('created_at')->get();
        return view('receitas.index', compact('receitas'));
    }

    /**
     * Salva uma nova receita no banco de dados.
     */
    public function store(Request $request)
    {
    // Cria a receita com os dados do formulário
        $receita = Receita::create([
            'titulo' => $request->input('titulo', 'Receita Gerada'),
            'conteudo' => $request->input('conteudo'),
        ]);
        return redirect()->route('receitas.index')->with('success', 'Receita salva com sucesso!');
    }

    /**
     * Exclui uma receita do banco de dados.
     */
    public function destroy(Receita $receita)
    {
    // Remove a receita selecionada
        $receita->delete();
        return redirect()->route('receitas.index')->with('success', 'Receita excluída com sucesso!');
    }
}
