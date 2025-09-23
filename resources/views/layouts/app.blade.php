<!DOCTYPE html>
<html lang="pt-br" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Receitas - Seu Chef Virtual')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { 
                        sans: ['"Plus Jakarta Sans"', 'sans-serif']
                    },
                    colors: {
                        primary: '#0EA5E9',
                        accent: '#38BDF8',
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out',
                        'slide-up': 'slideUp 0.5s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        }
                    }
                },
            },
        }
    </script>
    <style>
        html { font-family: 'Plus Jakarta Sans', sans-serif; }
        body { 
            transition: background-color 0.3s ease;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .glass-effect {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
    <script>
        function toggleDark() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('dark', document.documentElement.classList.contains('dark'));
        }
        if (localStorage.getItem('dark') === 'true' || (!localStorage.getItem('dark') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>
</head>
<body class="bg-gradient-to-br from-sky-50 via-white to-indigo-50 dark:from-gray-950 dark:via-gray-900 dark:to-slate-900 text-gray-800 dark:text-gray-200">
    <header class="fixed w-full top-0 z-50 glass-effect bg-white/70 dark:bg-gray-900/70 border-b border-gray-200/20 dark:border-gray-700/20">
        <div class="w-full flex items-center justify-between py-4 px-6">
            <a href="/" class="text-2xl font-bold tracking-tight text-sky-500 dark:text-sky-400 hover:text-sky-600 dark:hover:text-sky-300 transition-colors">
                AI Chef
            </a>
            <button onclick="toggleDark()" 
                    class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-all group" 
                    title="Alternar modo escuro/claro">
                <!-- Ícone do Sol (visível no modo escuro) -->
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="h-5 w-5 text-gray-600 group-hover:text-amber-500 hidden dark:block" 
                     fill="none" 
                     viewBox="0 0 24 24" 
                     stroke="currentColor">
                    <path stroke-linecap="round" 
                          stroke-linejoin="round" 
                          stroke-width="2" 
                          d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <!-- Ícone da Lua (visível no modo claro) -->
                <svg xmlns="http://www.w3.org/2000/svg" 
                     class="h-5 w-5 text-gray-600 group-hover:text-sky-500 dark:hidden" 
                     fill="none" 
                     viewBox="0 0 24 24" 
                     stroke="currentColor">
                    <path stroke-linecap="round" 
                          stroke-linejoin="round" 
                          stroke-width="2" 
                          d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </button>
        </div>
    </header>
    <main class="flex-grow pt-20 pb-8 px-4">
        <div class="animate-fade-in">
            @yield('content')
        </div>
    </main>
    @stack('scripts')
</body>
</html>