<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
        @if(Session::has('success'))
            <div class="mb-4 font-medium text-sm text-green-600">
                Your request was submitted<br>
                A admin will verify the data and create your account asap.
            </div>
            @php
                Session::forget('success');
            @endphp
        @else

            <div class="mb-4 text-sm text-gray-600">
                Thanks for your interest! Please provide us with the required information, so that we can check the info and create a account for you.
            </div>

            <form method="POST" action="{{ route('signup.store') }}">
            @csrf

            <input type="hidden" name="ipaddress" id="ipaddress" value="{{ $ipaddress }}">
                <div>
                    <x-jet-label value="{{ __('Name') }}" />
                    <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Your Full Name" required autofocus autocomplete="name" />
                    @if ($errors->has('name'))
                    <span class="text-danger text-red-600">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="mt-4">
                    <x-jet-label value="{{ __('Email') }}" />
                    <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Your Email Address" required />
                    @if ($errors->has('email'))
                    <span class="text-danger text-red-600">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="mt-4">
                    <x-jet-label value="{{ __('Company') }}" />
                    <x-jet-input class="block mt-1 w-full" type="text" name="company" :value="old('company')" required />
                    @if ($errors->has('company'))
                    <span class="text-danger text-red-600">{{ $errors->first('company') }}</span>
                    @endif
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-jet-button class="ml-4">
                        {{ __('Request Access') }}
                    </x-jet-button>
                </div>
            </form>

        @endif
    </x-jet-authentication-card>
</x-guest-layout>