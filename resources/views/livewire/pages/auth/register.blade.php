<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
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
            Richiesta Account
        </h1>
        <p class="text-center text-sm text-gray-600">
            ITS Academy Alto Adriatico - Gestionale Didattico
        </p>
    </div>

    <!-- Form container -->
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-6 shadow-xl rounded-lg border-t-4 border-its-red">

            <form wire:submit="register" class="space-y-6">

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        <svg class="w-4 h-4 inline mr-2 text-its-red" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Nome Completo
                    </label>
                    <input wire:model="name" id="name" type="text" name="name" required autofocus autocomplete="name"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-its-red focus:border-its-red transition duration-200 bg-gray-50 focus:bg-white"
                        placeholder="Mario Rossi">
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
                </div>

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
                    <input wire:model="email" id="email" type="email" name="email" required autocomplete="username"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-its-red focus:border-its-red transition duration-200 bg-gray-50 focus:bg-white"
                        placeholder="mario.rossi@example.com">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
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
                    <input wire:model="password" id="password" type="password" name="password" required
                        autocomplete="new-password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-its-red focus:border-its-red transition duration-200 bg-gray-50 focus:bg-white"
                        placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                        <svg class="w-4 h-4 inline mr-2 text-its-red" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Conferma Password
                    </label>
                    <input wire:model="password_confirmation" id="password_confirmation" type="password"
                        name="password_confirmation" required autocomplete="new-password"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-its-red focus:border-its-red transition duration-200 bg-gray-50 focus:bg-white"
                        placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password_confirmation')"
                        class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-its-red text-white py-3 px-4 rounded-lg font-medium hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-its-red focus:ring-offset-2 transition duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z">
                            </path>
                        </svg>
                        Crea Account
                    </button>
                </div>

                <!-- Link login -->
                <div class="flex items-center justify-center pt-4">
                    <span class="text-sm text-gray-600 mr-2">Hai già un account?</span>
                    <a href="{{ route('login') }}" wire:navigate
                        class="text-sm text-its-red hover:text-red-800 font-medium underline focus:outline-none focus:ring-2 focus:ring-its-red rounded-md">
                        Accedi qui
                    </a>
                </div>

            </form>

        </div>

        <!-- Info di supporto -->
        <div class="mt-8 text-center">
            <div class="bg-amber-50 border border-amber-200 rounded-lg p-4">
                <h3 class="text-sm font-semibold text-amber-800 mb-2">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.728-.833-2.598 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z">
                        </path>
                    </svg>
                    Richiesta di registrazione
                </h3>
                <p class="text-xs text-amber-700 leading-relaxed">
                    Le nuove registrazioni sono soggette ad approvazione.<br>
                    Gli account verranno attivati entro 24-48 ore.<br>
                    Per urgenze: <a href="mailto:segreteria@itsaltoadriatico.it"
                        class="underline font-medium">segreteria@itsaltoadriatico.it</a>
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