@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] py-8 px-2 flex flex-col items-center bg-transparent">
    <h1 class="text-3xl font-bold mb-8 text-center w-full">Receita Gerada</h1>
    <div class="w-full max-w-2xl flex flex-col gap-6 items-center">
        <div class="w-full bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl shadow p-6 flex flex-col gap-2">
            <div class="prose max-w-none text-gray-800 dark:text-gray-100 dark:prose-invert break-words whitespace-pre-line">
                {!! Illuminate\Support\Str::markdown($conteudo) !!}
            </div>
        </div>
        <div class="flex flex-col sm:flex-row gap-2 justify-center w-full max-w-2xl">
            <form action="{{ route('receitas.store') }}" method="POST" class="w-full sm:w-1/3">
            @csrf
            <input type="hidden" name="titulo" value="{{ $titulo }}">
            <input type="hidden" name="conteudo" value="{{ $conteudo }}">
            <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-500/20 hover:shadow-emerald-600/20 space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h-2v5.586l-1.293-1.293z"/>
                </svg>
                <span>Salvar Receita</span>
            </button>
            </form>
            <form action="{{ route('receitas.gerar') }}" method="POST" class="w-full sm:w-1/3">
            @csrf
            <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 bg-violet-500 text-white rounded-lg hover:bg-violet-600 transition-all shadow-lg shadow-violet-500/20 hover:shadow-violet-600/20 space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                </svg>
                <span>Gerar Novamente</span>
            </button>
            </form>
            <a href="/" class="w-full sm:w-1/3 inline-flex items-center justify-center px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition-all shadow-lg shadow-sky-500/20 hover:shadow-sky-600/20 space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                </svg>
                <span>Voltar</span>
            </a>
        </div>
    </div>
</div>
@endsection
