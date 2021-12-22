<x-guest-layout>
    <x-header href="{{ route('register') }}">Registeren</x-header>

    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <x-jet-validation-errors class="mb-4"></x-jet-validation-errors>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}"></x-jet-label>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus></x-jet-input>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Wachtwoord') }}"></x-jet-label>
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password"></x-jet-input>
            </div>

            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember"></x-jet-checkbox>
                    <span class="ml-2 text-sm text-gray-600">{{ __('Mij onthouden') }}</span>
                </label>

                <x-jet-button class="ml-4 bg-indigo-600">
                    {{ __('Inloggen') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
