<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlgGEn - Gerador de Exercícios Matemáticos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900">

    <header class="bg-gray-800 border-b border-gray-700">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-600 text-white rounded-lg p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h1 class="text-xl font-bold text-white">AlgGEn</h1>
                </div>
                <button class="text-gray-400 hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8 max-w-7xl">

        <div class="mb-8">
            <div class="flex items-center justify-between max-w-2xl mx-auto">
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold mb-2">1</div>
                    <span class="text-sm font-medium text-blue-400">Configurar</span>
                </div>
                <div class="flex-1 h-1 bg-gray-700 mx-4 mt-[-20px]"></div>
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 bg-gray-700 text-gray-400 rounded-full flex items-center justify-center font-bold mb-2">2</div>
                    <span class="text-sm font-medium text-gray-500">Visualizar</span>
                </div>
                <div class="flex-1 h-1 bg-gray-700 mx-4 mt-[-20px]"></div>
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 bg-gray-700 text-gray-400 rounded-full flex items-center justify-center font-bold mb-2">3</div>
                    <span class="text-sm font-medium text-gray-500">Exportar</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6 mb-5">
            <div class="bg-gray-800 border border-gray-700 rounded-xl p-4 flex items-start space-x-3">
                <div class="bg-blue-900/50 p-2 rounded-lg">
                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-white">Geração rápida</h3>
                    <p class="text-xs text-gray-400 mt-1">Crie até 100 exercícios em segundos</p>
                </div>
            </div>

            <div class="bg-gray-800 border border-gray-700 rounded-xl p-4 flex items-start space-x-3">
                <div class="bg-indigo-900/50 p-2 rounded-lg">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-white">Múltiplas operações</h3>
                    <p class="text-xs text-gray-400 mt-1">Combine diferentes tipos de exercícios</p>
                </div>
            </div>

            <div class="bg-gray-800 border border-gray-700 rounded-xl p-4 flex items-start space-x-3">
                <div class="bg-green-900/50 p-2 rounded-lg">
                    <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-white">Exportação em PDF</h3>
                    <p class="text-xs text-gray-400 mt-1">Baixe e imprima seus exercícios</p>
                </div>
            </div>
        </div>

        <div class="bg-gray-800 rounded-2xl shadow-xl border border-gray-700 overflow-hidden">

            <div class="bg-gradient-to-r from-gray-800 to-gray-750 px-6 py-5 border-b border-gray-700">
                <h2 class="text-xl font-bold text-white">Configure seus exercícios</h2>
                <p class="text-sm text-gray-400 mt-1">Escolha as operações e a quantidade de questões</p>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                    <div class="space-y-6">
                        <form action="{{ route('generate') }}" method="post">
                            @csrf
                            <div>
                                @if ($errors->hasAny(['sum','sub','mult','div']))
                                <div class="text-red-500 mb-3">
                                    <span>Seleciona pelo menos uma operação matemática</span>
                                </div>
                                @else
                                <label class="block text-sm font-semibold text-white mb-3">
                                    Selecione as operações
                                    <span class="text-gray-500 font-normal ml-1">(escolha pelo menos uma)</span>
                                </label>
                                @endif
                                <div class="grid grid-cols-2 gap-3">
                                    <label class="relative flex items-center p-4 bg-gray-750 border-2 border-gray-700 rounded-xl cursor-pointer hover:border-blue-500 hover:bg-gray-700 transition has-[:checked]:border-blue-600 has-[:checked]:bg-blue-900/30">
                                        <input name="sum" type="checkbox" class="sr-only peer" checked>
                                        <div class="flex items-center w-full">
                                            <div class="flex items-center justify-center w-10 h-10 bg-blue-900/50 rounded-lg peer-checked:bg-blue-600 transition">
                                                <span class="text-2xl font-bold text-blue-400 peer-checked:text-white">+</span>
                                            </div>
                                            <span class="ml-3 font-medium text-white">Adição</span>
                                        </div>
                                        <svg class="absolute top-2 right-2 w-5 h-5 text-blue-500 hidden peer-checked:block" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    </label>

                                    <label class="relative flex items-center p-4 bg-gray-750 border-2 border-gray-700 rounded-xl cursor-pointer hover:border-indigo-500 hover:bg-gray-700 transition has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-900/30">
                                        <input name="sub" type="checkbox" class="sr-only peer" checked>
                                        <div class="flex items-center w-full">
                                            <div class="flex items-center justify-center w-10 h-10 bg-indigo-900/50 rounded-lg peer-checked:bg-indigo-600 transition">
                                                <span class="text-2xl font-bold text-indigo-400 peer-checked:text-white">−</span>
                                            </div>
                                            <span class="ml-3 font-medium text-white">Subtração</span>
                                        </div>
                                        <svg class="absolute top-2 right-2 w-5 h-5 text-indigo-500 hidden peer-checked:block" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    </label>

                                    <label class="relative flex items-center p-4 bg-gray-750 border-2 border-gray-700 rounded-xl cursor-pointer hover:border-purple-500 hover:bg-gray-700 transition has-[:checked]:border-purple-600 has-[:checked]:bg-purple-900/30">
                                        <input name="mult" type="checkbox" class="sr-only peer">
                                        <div class="flex items-center w-full">
                                            <div class="flex items-center justify-center w-10 h-10 bg-purple-900/50 rounded-lg peer-checked:bg-purple-600 transition">
                                                <span class="text-2xl font-bold text-purple-400 peer-checked:text-white">×</span>
                                            </div>
                                            <span class="ml-3 font-medium text-white">Multiplicação</span>
                                        </div>
                                        <svg class="absolute top-2 right-2 w-5 h-5 text-purple-500 hidden peer-checked:block" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    </label>

                                    <label class="relative flex items-center p-4 bg-gray-750 border-2 border-gray-700 rounded-xl cursor-pointer hover:border-pink-500 hover:bg-gray-700 transition has-[:checked]:border-pink-600 has-[:checked]:bg-pink-900/30">
                                        <input name="div" type="checkbox" class="sr-only peer">
                                        <div class="flex items-center w-full">
                                            <div class="flex items-center justify-center w-10 h-10 bg-pink-900/50 rounded-lg peer-checked:bg-pink-600 transition">
                                                <span class="text-2xl font-bold text-pink-400 peer-checked:text-white">÷</span>
                                            </div>
                                            <span class="ml-3 font-medium text-white">Divisão</span>
                                        </div>
                                        <svg class="absolute top-2 right-2 w-5 h-5 text-pink-500 hidden peer-checked:block" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-white mb-3">
                                    Quantidade de questões
                                    <span id="rangeValue" class="text-blue-400 font-bold ml-2 text-lg">10</span>
                                </label>
                                <input oninput="document.getElementById('rangeValue').textContent= this.value" name="questions" type="range" min="1" max="100" value="10" class="w-full h-2 bg-gray-700 rounded-lg appearance-none cursor-pointer accent-blue-600">
                                <div class="flex justify-between text-xs text-gray-500 mt-1">
                                    <span>1</span>
                                    <span>25</span>
                                    <span>50</span>
                                    <span>75</span>
                                    <span>100</span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-white mb-3">
                                    Nível de dificuldade
                                </label>
                                <div class="grid grid-cols-4 gap-2 text-center mb-3">
                                    <label class="cursor-pointer">
                                        <input type="radio" name="difficulty" value="easy" class="hidden peer" checked>
                                        <div class="px-4 py-3 bg-gray-750 border-2 border-gray-700 text-gray-300 rounded-lg font-medium hover:bg-gray-700 transition peer-checked:bg-green-900/30 peer-checked:border-green-600 peer-checked:text-green-400">
                                            Fácil
                                        </div>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="difficulty" value="medium" class="hidden peer">
                                        <div class="px-4 py-3 bg-gray-750 border-2 border-gray-700 text-gray-300 rounded-lg font-medium hover:bg-gray-700 transition peer-checked:bg-yellow-900/30 peer-checked:border-yellow-600 peer-checked:text-yellow-400">
                                            Médio
                                        </div>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="difficulty" value="hard" class="hidden peer">
                                        <div class="px-4 py-3 bg-gray-750 border-2 border-gray-700 text-gray-300 rounded-lg font-medium hover:bg-gray-700 transition peer-checked:bg-orange-900/30 peer-checked:border-orange-600 peer-checked:text-orange-400">
                                            Difícil
                                        </div>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="difficulty" value="extreme" class="hidden peer">
                                        <div class="px-4 py-3 bg-gray-750 border-2 border-gray-700 text-gray-300 rounded-lg font-medium hover:bg-gray-700 transition peer-checked:bg-red-900/30 peer-checked:border-red-600 peer-checked:text-red-400">
                                            Extremo
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 rounded-xl transition duration-200 shadow-lg hover:shadow-blue-900/50 flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                <span>Gerar exercícios</span>
                            </button>
                        </form>
                    </div>

                    <div class="bg-gray-750 rounded-xl p-6 border border-gray-700">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-sm font-semibold text-white">Prévia dos exercícios</h3>
                            @if (!empty($exercises))
                            <span class="text-xs text-gray-400 bg-gray-800 px-2 py-1 rounded-full border border-gray-700">
                                {{ count($exercises) }} questões
                            </span>
                            @endif
                        </div>
                        <div class="flex flex-col items-center justify-center py-1 text-center">
                            @if (empty(session('exercises')))
                            <div class="w-16 h-16 bg-gray-700 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-sm font-medium text-white mb-1">Nenhum exercício gerado</h3>
                            <p class="text-xs text-gray-500 max-w-xs">Configure as opções ao lado e clique em "Gerar exercícios" para visualizar</p>
                            @else
                            
                            <div class="mt-6 bg-gray-800 rounded-lg border border-gray-700 overflow-hidden">
                                @foreach (session('exercises',[]) as $exercise)
                                <div class="flex items-center gap-4 p-4 border-b border-gray-700 hover:bg-gray-750 transition">
                                    <div class="flex-shrink-0 w-10 h-10 bg-gray-700 rounded-lg flex items-center justify-center">
                                        <span class="text-blue-400 text-sm font-bold">{{ $exercise['exercise_number'] }}</span>
                                    </div>
                                    
                                    <div class="flex-1 text-sm font-mono text-white">
                                        {{$exercise['questions']}}
                                    </div>
                                    
                                    <input
                                    type="number"
                                    placeholder="?"
                                    class="w-24 bg-gray-900 border border-gray-600 text-white text-center rounded px-3 py-2 focus:border-blue-500 focus:outline-none">
                                    
                                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                                        Verificar
                                    </button>
                                    
                                    <div class="w-10 text-right">
                                        <span class="text-xs text-gray-500 cursor-pointer hover:text-gray-300"
                                        onclick="this.nextElementSibling.classList.toggle('hidden')">
                                        ver
                                    </span>
                                    <div class="hidden text-green-400 font-bold">
                                        {{ $exercise['sollution'] }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                                @endif

                            </div>

                        </div>
                        <div class="flex gap-3 mt-6">
                            <button disabled class="flex-1 bg-gray-700 text-gray-500 font-medium py-3 rounded-lg cursor-not-allowed flex items-center justify-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <span class="text-sm">Visualizar</span>
                            </button>
                            <button @if(isset($exercises)) disabled @endif class="flex-1 bg-gray-700 text-gray-500 font-medium py-3 rounded-lg cursor-not-allowed flex items-center justify-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                <span class="text-sm">Download</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <footer class="flex text-white p-5 justify-center text-center mt-10 border-t border-t-gray-700">
        <p>AlgGen&copy; {{ date('Y') }}</p>
    </footer>

</body>

</html>