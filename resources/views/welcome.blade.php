<!DOCTYPE html>
<html lang="it" data-theme="itsTheme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ITS Gestionale</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-primary to-secondary">
    <div class="container mx-auto px-4 py-16">
        <div class="text-center text-white">
            <h1 class="text-6xl font-bold mb-6">🎓 ITS Gestionale</h1>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Sistema di gestione completo per la Fondazione ITS Alto Adriatico
            </p>

            <!-- TEST DAISYUI: Questi bottoni devono avere lo stile DaisyUI -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
                <button class="btn btn-primary btn-lg">
                    🔐 Accedi al Sistema
                </button>
                <button class="btn btn-outline btn-secondary btn-lg">
                    📚 Documentazione
                </button>
            </div>

            <!-- TEST DAISYUI: Cards con stile DaisyUI -->
            <div class="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <div class="card bg-base-100/20 backdrop-blur shadow-xl">
                    <div class="card-body text-center">
                        <h2 class="card-title text-white justify-center">
                            📊 Gestione Voti
                        </h2>
                        <p class="text-white/90">Sistema completo per voti e valutazioni</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-accent btn-sm">Vai</button>
                        </div>
                    </div>
                </div>

                <div class="card bg-base-100/20 backdrop-blur shadow-xl">
                    <div class="card-body text-center">
                        <h2 class="card-title text-white justify-center">
                            ⏰ Presenze & Orari
                        </h2>
                        <p class="text-white/90">Monitoraggio presenze e orari lezioni</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-accent btn-sm">Vai</button>
                        </div>
                    </div>
                </div>

                <div class="card bg-base-100/20 backdrop-blur shadow-xl">
                    <div class="card-body text-center">
                        <h2 class="card-title text-white justify-center">
                            💻 Gestione Materiali
                        </h2>
                        <p class="text-white/90">PC, Raspberry Pi e materiali didattici</p>
                        <div class="card-actions justify-end">
                            <button class="btn btn-accent btn-sm">Vai</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TEST DAISYUI: Alert -->
            <div class="alert alert-info mt-8 max-w-2xl mx-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="stroke-current shrink-0 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Se vedi questo alert stilizzato, DaisyUI funziona!</span>
            </div>
        </div>
    </div>
</body>

</html>