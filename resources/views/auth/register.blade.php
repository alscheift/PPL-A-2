@php
    $title = 'Sign Up';
@endphp

@extends('layouts.guest-neptune')

@section('content')
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="{{ route('dashboard') }}">{{ config('app.name') }}</a>
            </div>
            <p class="auth-description">Please enter your credentials to create an account.<br>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="auth-credentials m-b-xxl">
                    <label for="name" class="form-label" value="{{ __('Name') }}">Name</label>
                    <input type="text" class="form-control m-b-md" id="name" aria-describedby="signUpUsername" name="name" :value="old('name')" placeholder="Enter name" required autofocus>
    
                    <label for="email" class="form-label" value="{{ __('Email') }}">Email address</label>
                    <input type="email" class="form-control m-b-md" id="email" aria-describedby="signUpEmail" name="email" :value="old('email')" placeholder="example@neptune.com" required>
    
                    <label for="password" class="form-label" value="{{ __('Password') }}">Password</label>
                    <input type="password" class="form-control" id="password" aria-describedby="signUpPassword" name="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" required>
                    <div id="emailHelp" class="form-text">Password must be minimum 8 characters length*</div>

                    <label for="password_confirmation" class="form-label" value="{{ __('Confirm Password') }}">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" aria-describedby="signUpPassword" name="password_confirmation" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" required>
                </div>

                <div class="auth-submit">
                    <button class="btn btn-primary">{{ __('Sign Up') }}</button>
                </div>
            </form>

        </div>
    </div>
@endsection


{{-- Jetstream Register --}}
{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
