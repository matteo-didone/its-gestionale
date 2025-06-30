<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();
        $this->form->authenticate();
        Session::regenerate();
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
            Accesso al Sistema
        </h1>
        <p class="text-center text-sm text-gray-600">
            ITS Academy Alto Adriatico - Gestionale Didattico
        </p>
    </div>

    <!-- Form container -->
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-6 shadow-xl rounded-lg border-t-4 border-its-red">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form wire:submit="login" class="space-y-6">

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        <svg class="w-4 h-4 inline mr-2 text-its-red" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        Email
                    </label>
                    <input wire:model="form.email" id="email" type="email" name="email" required autofocus
                        autocomplete="username"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-its-red focus:border-its-red transition duration-200 bg-gray-50 focus:bg-white"
                        placeholder="esempio@itsaltoadriatico.it">
                    <x-input-error :messages="$errors->get('form.email')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        <svg class="w-4 h-4 inline mr-2 text-its-red" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                        Password
                    </label>
                    <input wire:model="form.password" id="password" type="password" name="password" required
                        autocomplete="current-password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-its-red focus:border-its-red transition duration-200 bg-gray-50 focus:bg-white"
                        placeholder="••••••••">
                    <x-input-error :messages="$errors->get('form.password')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember" class="flex items-center">
                        <input wire:model="form.remember" id="remember" type="checkbox" name="remember"
                            class="h-4 w-4 text-its-red border-gray-300 rounded focus:ring-its-red focus:ring-2">
                        <span class="ml-2 text-sm text-gray-600">Ricordami</span>
                    </label>

                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" wire:navigate
                        class="text-sm text-its-red hover:text-red-800 font-medium underline focus:outline-none focus:ring-2 focus:ring-its-red rounded-md">
                        Password dimenticata?
                    </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-its-red text-white py-3 px-4 rounded-lg font-medium hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-its-red focus:ring-offset-2 transition duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                            </path>
                        </svg>
                        Accedi al Sistema
                    </button>
                </div>

            </form>

            <!-- Link registrazione -->
            @if (Route::has('register'))
            <div class="mt-6 pt-6 border-t border-gray-200 text-center">
                <p class="text-sm text-gray-600 mb-3">
                    Non hai ancora un account?
                </p>
                <a href="{{ route('register') }}" wire:navigate
                    class="inline-flex items-center px-4 py-2 border border-its-red text-its-red rounded-lg hover:bg-its-red hover:text-white transition duration-200 font-medium">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                        </path>
                    </svg>
                    Richiedi Account
                </a>
            </div>
            @endif

        </div>

        <!-- Info di supporto -->
        <div class="mt-8 text-center">
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <h3 class="text-sm font-semibold text-blue-800 mb-2">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Prime credenziali di accesso
                </h3>
                <p class="text-xs text-blue-700 leading-relaxed">
                    Gli studenti riceveranno le credenziali via email istituzionale.<br>
                    Per assistenza: <a href="mailto:support@itsaltoadriatico.it"
                        class="underline font-medium">support@itsaltoadriatico.it</a>
                </p>
            </div>
        </div>

        <!-- Back to home -->
        <div class="mt-6 text-center">
            <a href="{{ route('welcome') }}"
                class="text-sm text-gray-500 hover:text-its-red transition duration-200 inline-flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Torna alla home
            </a>
        </div>
    </div>
</div>