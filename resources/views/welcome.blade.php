<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ITS Gestionale - Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-base-200 text-base-content min-h-screen flex flex-col font-sans">

    <header class="navbar bg-base-100 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-6 py-3">
            <a href="#" class="btn btn-ghost normal-case text-3xl font-extrabold text-primary">
                ITS Gestionale
            </a>
            <nav class="flex gap-4 text-sm font-medium">
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-sm normal-case">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="btn btn-outline btn-sm normal-case">Login</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-outline btn-sm normal-case">Register</a>
                @endif
                @endauth
                @endif
            </nav>
        </div>
    </header>

    <main class="flex-grow flex flex-col items-center justify-center px-6 text-center max-w-4xl mx-auto space-y-8">
        <h1 class="text-5xl font-extrabold text-primary tracking-tight leading-tight sm:text-6xl md:text-7xl">
            Benvenuto nel gestionale <span class="text-secondary">ITS</span>
        </h1>
        <p class="text-lg text-base-content/80 max-w-xl mx-auto leading-relaxed">
            Gestisci studenti, docenti, corsi e molto altro con un'interfaccia semplice, moderna e potente.
        </p>
        <a href="{{ url('/dashboard') }}"
            class="btn btn-primary btn-lg shadow-lg hover:scale-105 transform transition duration-300 ease-in-out">
            Vai alla Dashboard
        </a>
    </main>

    <footer class="footer footer-center p-6 bg-base-100 text-base-content border-t border-base-content/20 mt-16">
        <div class="max-w-4xl mx-auto text-sm text-base-content/60">
            <p>© {{ date('Y') }} ITS Gestionale. Powered by Laravel {{ Illuminate\Foundation\Application::VERSION }}</p>
        </div>
    </footer>

</body>

</html>