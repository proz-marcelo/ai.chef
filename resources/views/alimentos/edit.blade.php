@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-[80vh]">
    <div class="w-full max-w-lg px-6">
        <div class="text-center mb-8 animate-slide-up">
            <h1 class="text-3xl font-bold mb-2 text-gray-900 dark:text-white">Editar Ingrediente</h1>
            <p class="text-gray-600 dark:text-gray-400">Atualize as informações do ingrediente</p>
        </div>

        <form action="{{ route('alimentos.update', $alimento) }}" method="POST" class="animate-fade-in">
            @csrf
            @method('PUT')
            <div class="bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl p-8 shadow-xl space-y-6">
                <!-- Nome -->
                <div class="space-y-2">
                    <label for="nome" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Nome do Ingrediente
                    </label>
                    <input type="text" 
                           name="nome" 
                           id="nome" 
                           value="{{ old('nome', $alimento->nome) }}" 
                           class="w-full px-4 py-2 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-sky-500 dark:focus:ring-sky-400 focus:border-transparent transition-shadow text-gray-800 dark:text-gray-200" 
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
                           value="{{ old('quantidade', $alimento->quantidade) }}" 
                           class="w-full px-4 py-2 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-lg focus:ring-2 focus:ring-sky-500 dark:focus:ring-sky-400 focus:border-transparent transition-shadow text-gray-800 dark:text-gray-200" 
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
                        <option value="g" {{ old('unidade_medida', $alimento->unidade_medida) == 'g' ? 'selected' : '' }}>Gramas (g)</option>
                        <option value="kg" {{ old('unidade_medida', $alimento->unidade_medida) == 'kg' ? 'selected' : '' }}>Quilogramas (kg)</option>
                        <option value="ml" {{ old('unidade_medida', $alimento->unidade_medida) == 'ml' ? 'selected' : '' }}>Mililitros (ml)</option>
                        <option value="l" {{ old('unidade_medida', $alimento->unidade_medida) == 'l' ? 'selected' : '' }}>Litros (l)</option>
                        <option value="colher" {{ old('unidade_medida', $alimento->unidade_medida) == 'colher' ? 'selected' : '' }}>Colher</option>
                        <option value="xícara" {{ old('unidade_medida', $alimento->unidade_medida) == 'xícara' ? 'selected' : '' }}>Xícara</option>
                        <option value="unidade" {{ old('unidade_medida', $alimento->unidade_medida) == 'unidade' ? 'selected' : '' }}>Unidade</option>
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
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Salvar Alterações
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
