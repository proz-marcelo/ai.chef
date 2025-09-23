@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="text-center mb-8 animate-slide-up">
        <h1 class="text-4xl font-bold mb-3 bg-gradient-to-r from-sky-600 to-cyan-500 bg-clip-text text-transparent dark:from-sky-400 dark:to-cyan-300">Dispensa</h1>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8 animate-fade-in">
        <a href="{{ route('alimentos.create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition-all shadow-lg shadow-sky-500/20 hover:shadow-sky-600/20 space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            <span>Novo Ingrediente</span>
        </a>
        <form action="{{ route('receitas.gerar') }}" method="POST">
            @csrf
            <button type="submit" class="inline-flex items-center justify-center w-full px-4 py-2 bg-emerald-500 text-white rounded-lg hover:bg-emerald-600 transition-all shadow-lg shadow-emerald-500/20 hover:shadow-emerald-600/20 space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                </svg>
                <span>Criar Receita com IA</span>
            </button>
        </form>
        <a href="{{ route('receitas.index') }}" class="inline-flex items-center justify-center px-4 py-2 bg-violet-500 text-white rounded-lg hover:bg-violet-600 transition-all shadow-lg shadow-violet-500/20 hover:shadow-violet-600/20 space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
            </svg>
            <span>Ver Receitas</span>
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 animate-fade-in">
            <div class="bg-emerald-50/50 dark:bg-emerald-900/30 border border-emerald-200/50 dark:border-emerald-700/50 rounded-xl p-4 backdrop-blur-sm shadow-lg">
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0 bg-emerald-100 dark:bg-emerald-800/50 rounded-full p-2">
                        <svg class="h-5 w-5 text-emerald-500 dark:text-emerald-300" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-base font-medium text-emerald-800 dark:text-emerald-200">Sucesso!</h3>
                        <p class="text-sm text-emerald-600 dark:text-emerald-300">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 animate-fade-in">
            <div class="bg-amber-50/50 dark:bg-amber-900/30 border border-amber-200/50 dark:border-amber-700/50 rounded-xl p-4 backdrop-blur-sm shadow-lg">
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0 bg-amber-100 dark:bg-amber-800/50 rounded-full p-2">
                        <svg class="h-5 w-5 text-amber-500 dark:text-amber-300" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-base font-medium text-amber-800 dark:text-amber-200">Atenção</h3>
                        <p class="text-sm text-amber-600 dark:text-amber-300">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="bg-white/50 dark:bg-gray-800/50 rounded-2xl shadow-xl backdrop-blur-sm animate-fade-in">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-600 dark:text-gray-300">#</th>
                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-600 dark:text-gray-300">Nome</th>
                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-600 dark:text-gray-300">Quantidade</th>
                        <th class="text-left py-4 px-6 text-sm font-semibold text-gray-600 dark:text-gray-300">Unidade</th>
                        <th class="text-right py-4 px-6 text-sm font-semibold text-gray-600 dark:text-gray-300">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($alimentos as $alimento)
                        <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-700/50 transition-colors">
                            <td class="py-4 px-6 text-sm text-gray-600 dark:text-gray-300">{{ $alimento->id }}</td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-800 dark:text-gray-100">{{ $alimento->nome }}</td>
                            <td class="py-4 px-6 text-sm text-gray-600 dark:text-gray-300">{{ $alimento->quantidade }}</td>
                            <td class="py-4 px-6 text-sm text-gray-600 dark:text-gray-300">{{ $alimento->unidade_medida }}</td>
                            <td class="py-4 px-6">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('alimentos.edit', $alimento) }}" 
                                       class="inline-flex items-center justify-center h-8 px-3 text-sm font-medium text-amber-700 bg-amber-100 rounded-md hover:bg-amber-200 dark:bg-amber-700/20 dark:text-amber-500 dark:hover:bg-amber-700/30 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('alimentos.destroy', $alimento) }}" method="POST" onsubmit="return confirmDelete(event, this)" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center h-8 px-3 text-sm font-medium text-red-700 bg-red-100 rounded-md hover:bg-red-200 dark:bg-red-700/20 dark:text-red-500 dark:hover:bg-red-700/30 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-16 text-center">
                                <div class="max-w-sm mx-auto">
                                    <div class="bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl p-8 border border-gray-200/50 dark:border-gray-700/50 shadow-xl">
                                        <div class="inline-flex items-center justify-center w-16 h-16 bg-sky-100 dark:bg-sky-900/50 text-sky-500 rounded-full mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Dispensa Vazia</h3>
                                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                                            Comece adicionando os ingredientes que você tem em casa. Nosso chef virtual está ansioso para criar receitas deliciosas para você!
                                        </p>
                                        <a href="{{ route('alimentos.create') }}" class="inline-flex items-center justify-center w-full px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition-all shadow-lg shadow-sky-500/20 hover:shadow-sky-600/20 space-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                            </svg>
                                            <span>Adicionar Primeiro Ingrediente</span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(e, form) {
    e.preventDefault();
    Swal.fire({
        title: 'Tem certeza?',
        text: "Este ingrediente será removido permanentemente.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#EF4444',
        cancelButtonColor: '#6B7280',
        confirmButtonText: 'Sim, excluir',
        cancelButtonText: 'Cancelar',
        background: document.documentElement.classList.contains('dark') ? '#1F2937' : '#FFFFFF',
        color: document.documentElement.classList.contains('dark') ? '#FFFFFF' : '#1F2937'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
    return false;
}
</script>
@endpush

@endsection