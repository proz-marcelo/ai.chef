@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-[80vh]">
    <div class="w-full max-w-lg px-6">
        <div class="text-center mb-8 animate-slide-up">
            <h1 class="text-3xl font-bold mb-2 text-gray-900 dark:text-white">Novo Ingrediente</h1>
            <p class="text-gray-600 dark:text-gray-400">Adicione um novo ingrediente à sua lista</p>
        </div>

        <form action="{{ route('alimentos.store') }}" method="POST" class="animate-fade-in">
            @csrf
            <div class="bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl p-8 shadow-xl space-y-6">
                <!-- Nome -->
                <div class="space-y-2">
                    <label for="nome" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Nome do Ingrediente
                    </label>
                    <input type="text" 
                           name="nome" 
                           id="nome" 
                           value="{{ old('nome') }}" 
                           class="w-full px-4 py-2 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-sky-500 dark:focus:ring-sky-400 focus:border-transparent transition-shadow text-gray-800 dark:text-gray-200" 
                           placeholder="Ex: Arroz, Feijão, etc"
                           required>
                </div>

                <!-- Quantidade -->
                <div class="space-y-2">
                    <label for="quantidade" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Quantidade
                    </label>
                    <input type="number" 
                           name="quantidade" 
                           id="quantidade" 
                           value="{{ old('quantidade') }}" 
                           class="w-full px-4 py-2 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-sky-500 dark:focus:ring-sky-400 focus:border-transparent transition-shadow text-gray-800 dark:text-gray-200" 
                           placeholder="Ex: 1, 2, 500, etc"
                           required>
                </div>

                <!-- Unidade de Medida -->
                <div class="space-y-2">
                    <label for="unidade_medida" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Unidade de Medida
                    </label>
                    <select name="unidade_medida" 
                            id="unidade_medida" 
                            class="w-full px-4 py-2 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-sky-500 dark:focus:ring-sky-400 focus:border-transparent transition-shadow text-gray-800 dark:text-gray-200"
                            required>
                        <option value="">Selecione uma unidade</option>
                        <option value="g" {{ old('unidade_medida') == 'g' ? 'selected' : '' }}>Gramas (g)</option>
                        <option value="kg" {{ old('unidade_medida') == 'kg' ? 'selected' : '' }}>Quilogramas (kg)</option>
                        <option value="ml" {{ old('unidade_medida') == 'ml' ? 'selected' : '' }}>Mililitros (ml)</option>
                        <option value="l" {{ old('unidade_medida') == 'l' ? 'selected' : '' }}>Litros (l)</option>
                        <option value="colher" {{ old('unidade_medida') == 'colher' ? 'selected' : '' }}>Colher</option>
                        <option value="xícara" {{ old('unidade_medida') == 'xícara' ? 'selected' : '' }}>Xícara</option>
                        <option value="unidade" {{ old('unidade_medida') == 'unidade' ? 'selected' : '' }}>Unidade</option>
                    </select>
                </div>

                <!-- Botões -->
                <div class="flex items-center justify-end space-x-3 pt-6">
                    <a href="{{ route('alimentos.index') }}" 
                       class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="inline-flex items-center justify-center px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white text-sm font-medium rounded-lg shadow-lg shadow-sky-500/30 hover:shadow-sky-600/30 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Adicionar Ingrediente
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
