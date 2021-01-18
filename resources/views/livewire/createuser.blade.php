<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Register a new user
        </h2>
    </x-slot>

    <div style="padding-top: 0px;">
        <div class="items-start max-w-7xl mx-auto">
            <div class="content-center lg:flex lg:justify-center lg:items-center">
                <form method="POST" action="{{ route('createuser') }}">
                    @csrf

                    <div>
                        <x-jet-label value="{{ __('Name') }}" />
                        <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label value="{{ __('Email') }}" />
                        <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label value="{{ __('Team') }}" />
                        <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>

                    <div class="mt-4">
                        <x-jet-label value="{{ __('Password') }}" />
                        <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label value="{{ __('Confirm Password') }}" />
                        <x-jet-input class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Register') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>     
</x-app-layout>