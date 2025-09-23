<?php

namespace App\Http\Controllers;

use App\Models\Alimento;
use App\Http\Requests\StoreAlimentoRequest;
use App\Http\Requests\UpdateAlimentoRequest;

class AlimentoController extends Controller
{
    /**
     * Exibe a lista de alimentos cadastrados.
     */
    public function index()
    {
    $alimentos = Alimento::all();
    return view('alimentos.index', compact('alimentos'));
    }

    /**
     * Exibe o formulário para criar um novo alimento.
     */
    public function create()
    {
    return view('alimentos.create');
    }

    /**
     * Salva um novo alimento no banco de dados.
     */
    public function store(StoreAlimentoRequest $request)
    {
    $alimento = Alimento::create($request->validated());
    return redirect()->route('alimentos.index')->with('success', 'Alimento cadastrado com sucesso!');
    }

    /**
     * Exibe o formulário para editar um alimento.
     */
    public function edit(string $id)
    {
    $alimento = Alimento::findOrFail($id);
    return view('alimentos.edit', compact('alimento'));
    }

    /**
     * Atualiza um alimento no banco de dados.
     */
    public function update(UpdateAlimentoRequest $request, string $id)
    {
    $alimento = Alimento::findOrFail($id);
    $alimento->update($request->validated());
    return redirect()->route('alimentos.index')->with('success', 'Alimento atualizado com sucesso!');
    }

    /**
     * Remove um alimento do banco de dados.
     */
    public function destroy(string $id)
    {
    $alimento = Alimento::findOrFail($id);
    $alimento->delete();
    return redirect()->route('alimentos.index')->with('success', 'Alimento excluído com sucesso!');
    }
}
