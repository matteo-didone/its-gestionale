<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ITS Alto Adriatico - Gestionale Didattico</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
    :root {
        --its-red: #c51821;
        --its-red-dark: #a01419;
        --its-red-light: #e53955;
    }

    .btn-its-primary {
        background-color: var(--its-red);
        border-color: var(--its-red);
        color: white;
        transition: all 0.3s ease;
    }

    .btn-its-primary:hover {
        background-color: var(--its-red-dark);
        border-color: var(--its-red-dark);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(197, 24, 33, 0.3);
    }

    .btn-its-outline {
        border: 2px solid var(--its-red);
        color: var(--its-red);
        background: transparent;
        transition: all 0.3s ease;
    }

    .btn-its-outline:hover {
        background-color: var(--its-red);
        color: white;
        transform: translateY(-1px);
    }

    .text-its-red {
        color: var(--its-red);
    }

    .bg-its-red {
        background-color: var(--its-red);
    }

    .border-its-red {
        border-color: var(--its-red);
    }

    .accent-red {
        background: linear-gradient(135deg, var(--its-red) 0%, var(--its-red-light) 100%);
    }
    </style>
</head>

<body class="min-h-screen bg-gray-50">

    <!-- Header istituzionale -->
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <!-- Logo ITS Alto Adriatico -->
                    <div class="flex items-center">
                        <img src="{{ asset('images/its-logo.svg') }}" alt="ITS Alto Adriatico Logo" class="h-12 w-auto">
                    </div>
                    <div class="hidden sm:block border-l border-gray-300 pl-4">
                        <h1 class="text-lg font-bold text-gray-900">Gestionale Didattico</h1>
                        <p class="text-sm text-gray-600">Anno Accademico 2024/25</p>
                    </div>
                </div>

                @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-its-primary px-6 py-2 rounded-lg font-medium">
                    Dashboard
                </a>
                @else
                <a href="{{ route('login') }}" class="btn btn-its-primary px-6 py-2 rounded-lg font-medium">
                    Area Riservata
                </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-12">

        <!-- Hero Section -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Benvenuto nel Sistema Gestionale
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Piattaforma digitale per la gestione delle attività didattiche dell'ITS Alto Adriatico.
            </p>
        </div>

        <!-- Informazioni principali -->
        <div class="grid lg:grid-cols-3 gap-8 mb-12">

            <!-- Box Accesso Rapido -->
            <div class="lg:col-span-2">
                <div class="card bg-white shadow-lg border-t-4 border-its-red rounded-lg overflow-hidden">
                    <div class="card-body p-8">
                        <h2 class="text-2xl font-bold mb-6 text-its-red flex items-center">
                            <svg class="w-7 h-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                            Accesso al Sistema
                        </h2>

                        @guest
                        <p class="text-gray-600 mb-8 text-lg leading-relaxed">
                            Effettua l'accesso per consultare il tuo profilo didattico, visualizzare
                            orari e materiali, controllare le presenze e molto altro.
                        </p>

                        <div class="flex flex-col sm:flex-row gap-4 mb-8">
                            <a href="{{ route('login') }}"
                                class="btn btn-its-primary px-8 py-3 rounded-lg font-medium text-lg flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                Accedi al Sistema
                            </a>

                            @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="btn btn-its-outline px-8 py-3 rounded-lg font-medium text-lg flex items-center justify-center">
                                Richiedi Credenziali
                            </a>
                            @endif
                        </div>

                        <div class="p-6 bg-red-50 rounded-lg border border-red-200">
                            <h4 class="font-semibold text-its-red mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Prime credenziali di accesso
                            </h4>
                            <p class="text-sm text-gray-700 leading-relaxed">
                                Gli studenti riceveranno le credenziali via email all'indirizzo istituzionale.
                                Per problemi di accesso contattare:
                                <a href="mailto:support@its-altoadriatico.it"
                                    class="text-its-red font-medium underline">support@its-altoadriatico.it</a>
                            </p>
                        </div>
                        @else
                        <p class="text-gray-600 mb-6 text-lg">
                            Ciao <strong class="text-its-red">{{ auth()->user()->name }}</strong>!
                            Benvenuto/a nel sistema gestionale.
                        </p>

                        <a href="{{ url('/dashboard') }}"
                            class="btn btn-its-primary px-8 py-3 rounded-lg font-medium text-lg inline-flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                            Vai alla Dashboard
                        </a>
                        @endguest
                    </div>
                </div>
            </div>

            <!-- Statistiche del sistema -->
            <div class="space-y-6">
                <div class="card accent-red text-white rounded-lg overflow-hidden">
                    <div class="card-body text-center p-6">
                        <h3 class="text-lg font-semibold mb-2 text-white">Anno Accademico</h3>
                        <div class="text-3xl font-bold">2024/25</div>
                        <p class="text-red-100 text-sm mt-2">In corso</p>
                    </div>
                </div>

                <div class="card bg-white shadow-lg rounded-lg border-l-4 border-its-red overflow-hidden">
                    <div class="card-body p-6">
                        <h3 class="font-semibold mb-4 text-its-red text-lg">Statistiche Sistema</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center py-2">
                                <span class="text-gray-600">Studenti Attivi:</span>
                                <span
                                    class="font-bold text-its-red text-lg">{{ \App\Models\User::where('role', 'student')->where('is_active', true)->count() }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2">
                                <span class="text-gray-600">Docenti:</span>
                                <span
                                    class="font-bold text-its-red text-lg">{{ \App\Models\User::where('role', 'teacher')->where('is_active', true)->count() }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2">
                                <span class="text-gray-600">Corsi Attivi:</span>
                                <span
                                    class="font-bold text-its-red text-lg">{{ \App\Models\Course::where('is_active', true)->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sezioni informative -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">

            <!-- Quick Link 1 -->
            <div
                class="card bg-white shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 rounded-lg overflow-hidden group">
                <div class="card-body text-center p-6">
                    <div
                        class="w-14 h-14 mx-auto mb-4 bg-red-100 rounded-xl flex items-center justify-center group-hover:bg-its-red transition-colors duration-300">
                        <svg class="w-7 h-7 text-its-red group-hover:text-white transition-colors duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3
                        class="font-semibold mb-2 text-gray-900 group-hover:text-its-red transition-colors duration-300">
                        Calendario</h3>
                    <p class="text-sm text-gray-600">Orari lezioni ed eventi</p>
                </div>
            </div>

            <!-- Quick Link 2 -->
            <div
                class="card bg-white shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 rounded-lg overflow-hidden group">
                <div class="card-body text-center p-6">
                    <div
                        class="w-14 h-14 mx-auto mb-4 bg-blue-100 rounded-xl flex items-center justify-center group-hover:bg-blue-600 transition-colors duration-300">
                        <svg class="w-7 h-7 text-blue-600 group-hover:text-white transition-colors duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <h3
                        class="font-semibold mb-2 text-gray-900 group-hover:text-blue-600 transition-colors duration-300">
                        Materiali</h3>
                    <p class="text-sm text-gray-600">Documenti e risorse</p>
                </div>
            </div>

            <!-- Quick Link 3 -->
            <div
                class="card bg-white shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 rounded-lg overflow-hidden group">
                <div class="card-body text-center p-6">
                    <div
                        class="w-14 h-14 mx-auto mb-4 bg-green-100 rounded-xl flex items-center justify-center group-hover:bg-green-600 transition-colors duration-300">
                        <svg class="w-7 h-7 text-green-600 group-hover:text-white transition-colors duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                    </div>
                    <h3
                        class="font-semibold mb-2 text-gray-900 group-hover:text-green-600 transition-colors duration-300">
                        Valutazioni</h3>
                    <p class="text-sm text-gray-600">Voti e progressi</p>
                </div>
            </div>

            <!-- Quick Link 4 -->
            <div
                class="card bg-white shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 rounded-lg overflow-hidden group">
                <div class="card-body text-center p-6">
                    <div
                        class="w-14 h-14 mx-auto mb-4 bg-purple-100 rounded-xl flex items-center justify-center group-hover:bg-purple-600 transition-colors duration-300">
                        <svg class="w-7 h-7 text-purple-600 group-hover:text-white transition-colors duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                            </path>
                        </svg>
                    </div>
                    <h3
                        class="font-semibold mb-2 text-gray-900 group-hover:text-purple-600 transition-colors duration-300">
                        Presenze</h3>
                    <p class="text-sm text-gray-600">Registro presenze</p>
                </div>
            </div>
        </div>

        <!-- Avvisi importanti -->
        <div class="card bg-yellow-50 border border-yellow-200 rounded-lg overflow-hidden">
            <div class="card-body p-6">
                <div class="flex items-start space-x-4">
                    <svg class="w-6 h-6 text-yellow-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h3 class="font-semibold text-yellow-800 mb-3">Comunicazioni Importanti</h3>
                        <ul class="text-sm text-yellow-700 space-y-2">
                            <li class="flex items-start">
                                <span class="w-2 h-2 bg-yellow-600 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                Le lezioni riprenderanno regolarmente lunedì 8 gennaio 2025
                            </li>
                            <li class="flex items-start">
                                <span class="w-2 h-2 bg-yellow-600 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                Scadenza iscrizione esami: 15 gennaio 2025
                            </li>
                            <li class="flex items-start">
                                <span class="w-2 h-2 bg-yellow-600 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                Disponibili nuovi materiali per il corso Digital Solutions 4.0
                            </li>
                            <li class="flex items-start">
                                <span class="w-2 h-2 bg-yellow-600 rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                Open Day: 20 gennaio 2025 - ore 15:00
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Footer -->
    <footer class="bg-its-red text-white py-12 mt-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div class="md:col-span-2">
                    <div class="flex items-center mb-6">
                        <!-- Logo ITS -->
                        <div class="h-10 w-auto mr-4">
                            <img src="{{ asset('images/its-logo.svg') }}" alt="ITS Alto Adriatico Logo"
                                class="h-12 w-auto">
                        </div>
                        <div>
                            <span class="font-bold text-white text-lg">ITS Academy Alto Adriatico</span>
                            <p class="text-sm text-red-100">Istituto Tecnologico Superiore</p>
                        </div>
                    </div>
                    <div class="text-sm text-red-100 space-y-1">
                        <p class="font-medium">Tecnologie dell'informazione, comunicazione e dati</p>
                        <div class="mt-4">
                            <p class="font-semibold text-white mb-2">🏢 Sedi:</p>
                            <p><strong>Principale:</strong> Valle Center</p>
                            <p>via Giardini Cattaneo 4 – 33170 Pordenone (PN)</p>
                            <p class="mt-2"><strong>Secondaria:</strong> Consorzio Universitario</p>
                            <p>via Prasecco 3/A – 33170 Pordenone (PN)</p>
                        </div>
                    </div>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-4">Contatti</h4>
                    <div class="space-y-3 text-sm">
                        <!-- Telefono cliccabile -->
                        <a href="tel:+390434175455"
                            class="flex items-center text-red-100 hover:text-white transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2 text-white flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            +39 0434 1754550
                        </a>

                        <!-- Email cliccabile -->
                        <a href="mailto:segreteria@itsaltoadriatico.it"
                            class="flex items-start text-red-100 hover:text-white transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2 mt-0.5 text-white flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <div>
                                <p>segreteria@itsaltoadriatico.it</p>
                            </div>
                        </a>

                        <!-- Sito web cliccabile -->
                        <a href="https://www.itsaltoadriatico.it" target="_blank" rel="noopener noreferrer"
                            class="flex items-center text-red-100 hover:text-white transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2 text-white flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                            </svg>
                            <span>www.itsaltoadriatico.it</span>
                            <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="font-semibold text-white mb-4">Supporto Tecnico</h4>
                    <div class="space-y-2 text-sm">
                        <!-- Email supporto cliccabile -->
                        <a href="mailto:support@itsaltoadriatico.it?subject=Supporto Gestionale ITS"
                            class="flex items-center text-red-100 hover:text-white transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            support@itsaltoadriatico.it
                        </a>

                        <!-- Orari (non cliccabile) -->
                        <p class="flex items-center text-red-100">
                            <svg class="w-4 h-4 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Lun-Ven: 9:00-17:00
                        </p>

                        <p class="text-xs text-red-200 mt-3">
                            Per problemi tecnici con il gestionale
                        </p>
                    </div>
                </div>
            </div>
            <div class="border-t border-red-800 pt-6 text-center text-sm text-red-100">
                <p>&copy; {{ date('Y') }} ITS Academy Alto Adriatico. Tutti i diritti riservati.</p>
            </div>
        </div>
    </footer>

</body>

</html>