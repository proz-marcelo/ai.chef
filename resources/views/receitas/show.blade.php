@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] py-8 px-2 flex flex-col items-center bg-transparent">
    <h1 class="text-3xl font-bold mb-8 text-center w-full">Receita Gerada</h1>
    <div class="w-full max-w-2xl flex flex-col gap-6 items-center">
        <div class="w-full bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl shadow p-6 flex flex-col gap-2">
            <h2 class="text-xl font-semibold text-blue-700 dark:text-blue-400 mb-2">{{ $titulo }}</h2>
            <div class="prose max-w-none text-gray-800 dark:text-gray-100 dark:prose-invert break-words whitespace-pre-line">
                {!! Illuminate\Support\Str::markdown($conteudo) !!}
            </div>
        </div>
        <form action="{{ route('receitas.store') }}" method="POST" class="flex flex-col sm:flex-row gap-2 justify-center w-full max-w-2xl">
            @csrf
            <input type="hidden" name="titulo" value="{{ $titulo }}">
            <input type="hidden" name="conteudo" value="{{ $conteudo }}">
            <button type="submit" class="w-full sm:w-1/2 inline-flex items-center justify-center px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-500/20 hover:shadow-emerald-600/20 space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h-2v5.586l-1.293-1.293z"/>
                </svg>
                <span>Salvar Receita</span>
            </button>
            <a href="/" class="w-full sm:w-1/2 inline-flex items-center justify-center px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition-all shadow-lg shadow-sky-500/20 hover:shadow-sky-600/20 space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                </svg>
                <span>Voltar</span>
            </a>
        </form>
    </div>
</div>
@endsection
