<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $password = '';

    /**
     * Confirm the current user's password.
     */
    public function confirmPassword(): void
    {
        $this->validate([
            'password' => ['required', 'string'],
        ]);

        if (! Auth::guard('web')->validate([
            'email' => Auth::user()->email,
            'password' => $this->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        session(['auth.password_confirmed_at' => time()]);

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-red-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">

    <!-- CSS Styles integrati -->
    <style>
    :root {
        --its-red: #c51821;
        --its-red-dark: #a01419;
    }

    .border-its-red {
        border-color: var(--its-red);
    }

    .text-its-red {
        color: var(--its-red);
    }

    .bg-its-red {
        background-color: var(--its-red);
    }

    .focus\:ring-its-red:focus {
        --tw-ring-color: var(--its-red);
    }

    .focus\:border-its-red:focus {
        border-color: var(--its-red);
    }

    .hover\:bg-its-red:hover {
        background-color: var(--its-red);
    }
    </style>

    <!-- Header con logo -->
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/its-logo.svg') }}" alt="ITS Academy Alto Adriatico" class="h-16 w-auto">
        </div>
        <h1 class="text-center text-3xl font-bold text-gray-900 mb-2">
            Conferma Identità
        </h1>
        <p class="text-center text-sm text-gray-600">
            ITS Academy Alto Adriatico - Gestionale Didattico
        </p>
    </div>

    <!-- Form container -->
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-6 shadow-xl rounded-lg border-t-4 border-its-red">

            <!-- Security Alert -->
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-red-600 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                        </path>
                    </svg>
                    <div>
                        <h3 class="text-sm font-semibold text-red-800 mb-2">Area Protetta</h3>
                        <p class="text-xs text-red-700 leading-relaxed">
                            Stai accedendo a un'area sensibile del sistema. Per motivi di sicurezza, conferma la tua
                            password prima di procedere.
                        </p>
                    </div>
                </div>
            </div>

            <!-- User Info -->
            <div class="mb-6 p-3 bg-gray-50 rounded-lg border">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-its-red rounded-full flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>

            <form wire:submit="confirmPassword" class="space-y-6">

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        <svg class="w-4 h-4 inline mr-2 text-its-red" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                        Conferma la tua Password
                    </label>
                    <input wire:model="password" id="password" type="password" name="password" required autofocus
                        autocomplete="current-password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-its-red focus:border-its-red transition duration-200 bg-gray-50 focus:bg-white"
                        placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-its-red text-white py-3 px-4 rounded-lg font-medium hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-its-red focus:ring-offset-2 transition duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Conferma e Procedi
                    </button>
                </div>

            </form>

            <!-- Alternative Actions -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <div class="flex flex-col space-y-3">
                    <!-- Logout Option -->
                    <div class="text-center">
                        <p class="text-sm text-gray-600 mb-2">
                            Non sei tu?
                        </p>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                class="text-sm text-gray-500 hover:text-its-red transition duration-200 underline">
                                Esci dal Sistema
                            </button>
                        </form>
                    </div>

                    <!-- Help Link -->
                    <div class="text-center">
                        <a href="mailto:support@itsaltoadriatico.it"
                            class="text-xs text-gray-400 hover:text-gray-600 transition duration-200">
                            Problemi di accesso? Contatta il supporto
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Security Notice -->
        <div class="mt-8 text-center">
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <h3 class="text-sm font-semibold text-blue-800 mb-2">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Sicurezza del Sistema
                </h3>
                <p class="text-xs text-blue-700 leading-relaxed">
                    Questa verifica aggiuntiva protegge le informazioni sensibili del gestionale.<br>
                    La tua sessione rimarrà confermata per i prossimi 3 ore.
                </p>
            </div>
        </div>

        <!-- Back to dashboard -->
        <div class="mt-6 text-center">
            <a href="{{ route('dashboard') }}"
                class="text-sm text-gray-500 hover:text-its-red transition duration-200 inline-flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Torna alla Dashboard
            </a>
        </div>
    </div>
</div>