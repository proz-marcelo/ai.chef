@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] py-8 px-2 flex flex-col items-center bg-transparent">
    <div class="text-center mb-8 animate-slide-up">
        <h1 class="text-4xl font-bold mb-3 bg-gradient-to-r from-sky-600 to-cyan-500 bg-clip-text text-transparent dark:from-sky-400 dark:to-cyan-300">Receitas</h1>
    </div>

    <div class="w-full max-w-3xl flex flex-col gap-6 items-center">
        @if(session('success'))
            <div class="w-full animate-fade-in">
                <div class="bg-emerald-50 dark:bg-emerald-900/30 border border-emerald-200 dark:border-emerald-800 rounded-lg p-4">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-emerald-500 mr-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-sm text-emerald-700 dark:text-emerald-300">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @forelse ($receitas as $receita)
            <div class="w-full bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm border border-gray-200/50 dark:border-gray-700/50 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 p-6">
                <div class="flex flex-row justify-between items-start mb-4">
                    <div class="flex flex-col gap-1">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white group-hover:text-sky-600 dark:group-hover:text-sky-400 transition-colors">
                            {{ $receita->titulo }}
                        </h2>
                        <div class="flex items-center gap-3 text-sm text-gray-500 dark:text-gray-400">
                            <span class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $receita->created_at->format('d/m/Y') }}
                            </span>
                            <span class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                </svg>
                                Receita #{{ $receita->id }}
                            </span>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('receitas.destroy', $receita) }}" onsubmit="return confirmDelete(event, this);" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-all" title="Excluir receita">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                </div>

                <div class="prose max-w-none text-gray-700 dark:text-gray-300 dark:prose-invert break-words">
                    {!! Illuminate\Support\Str::markdown($receita->conteudo) !!}
                </div>
            </div>
        @empty
            <div class="w-full text-center py-12">
                <div class="max-w-sm mx-auto bg-white/50 dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl p-8 border border-gray-200/50 dark:border-gray-700/50 shadow-xl">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-sky-100 dark:bg-sky-900/50 text-sky-500 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Nenhuma receita ainda</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">
                        Comece adicionando seus ingredientes disponíveis e deixe nossa IA criar receitas personalizadas para você.
                    </p>
                    <a href="{{ route('alimentos.index') }}" class="inline-flex items-center justify-center px-4 py-2 bg-sky-500 text-white rounded-lg hover:bg-sky-600 transition-all shadow-lg shadow-sky-500/20 hover:shadow-sky-600/20 space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <span>Gerenciar Ingredientes</span>
                    </a>
                </div>
            </div>
        @endforelse
    </div>
</div>
@push('scripts')
<script>
function confirmDelete(e, form) {
    e.preventDefault();
    Swal.fire({
        title: 'Tem certeza?',
        text: "Esta receita será removida permanentemente.",
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
