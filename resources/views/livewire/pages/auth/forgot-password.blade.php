<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));
            return;
        }

        $this->reset('email');
        session()->flash('status', __($status));
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
            Recupera Password
        </h1>
        <p class="text-center text-sm text-gray-600">
            ITS Academy Alto Adriatico - Gestionale Didattico
        </p>
    </div>

    <!-- Form container -->
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-6 shadow-xl rounded-lg border-t-4 border-its-red">

            <!-- Spiegazione -->
            <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h3 class="text-sm font-semibold text-blue-800 mb-2">Password dimenticata?</h3>
                        <p class="text-xs text-blue-700 leading-relaxed">
                            Nessun problema! Inserisci il tuo indirizzo email e ti invieremo un link per reimpostare la
                            password.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Status Success -->
            @if (session('status'))
            <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-sm text-green-700 font-medium">
                        Link inviato con successo! Controlla la tua email.
                    </p>
                </div>
            </div>
            @endif

            <form wire:submit="sendPasswordResetLink" class="space-y-6">

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
                    <input wire:model="email" id="email" type="email" name="email" required autofocus
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-its-red focus:border-its-red transition duration-200 bg-gray-50 focus:bg-white"
                        placeholder="esempio@itsaltoadriatico.it">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full bg-its-red text-white py-3 px-4 rounded-lg font-medium hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-its-red focus:ring-offset-2 transition duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        Invia Link di Reset
                    </button>
                </div>

            </form>

            <!-- Link ritorno al login -->
            <div class="mt-6 pt-6 border-t border-gray-200 text-center">
                <p class="text-sm text-gray-600 mb-3">
                    Ti sei ricordato la password?
                </p>
                <a href="{{ route('login') }}" wire:navigate
                    class="inline-flex items-center px-4 py-2 border border-its-red text-its-red rounded-lg hover:bg-its-red hover:text-white transition duration-200 font-medium">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                        </path>
                    </svg>
                    Torna al Login
                </a>
            </div>

        </div>

        <!-- Info di supporto -->
        <div class="mt-8 text-center">
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <h3 class="text-sm font-semibold text-yellow-800 mb-2">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.728-.833-2.598 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z">
                        </path>
                    </svg>
                    Non ricevi l'email?
                </h3>
                <p class="text-xs text-yellow-700 leading-relaxed">
                    Controlla la cartella spam/junk. Se continui ad avere problemi,<br>
                    contatta il supporto: <a href="mailto:support@itsaltoadriatico.it"
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