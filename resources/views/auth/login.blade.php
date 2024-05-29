<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login - XWaste</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login_reg.css')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="favicon_io/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
</html>
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
    <img src="{{ asset('favicon_io/apple-touch-icon.png') }}" alt="Logo" style="height: 60px;">
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button class="ms-4 button">
                    {{ __('Sign in') }}
                </button>
            </div>
            <div class="or-container">
                <span class="or-line"></span>
                <span class="or-text">or</span>
                <span class="or-line"></span>
            </div>
            <div class="google-signin-wrapper">
            <div class ="google-signin mt-4">
                <!--<a style="background-color: skyblue"; href="{{url('auth/google')}}">Login using Google</a>-->
                <a style="background-color: white; color: black; padding: 10px; border-radius: 5px;" href="{{ url('auth/google') }}"><i class="fa-brands fa-google" style="color: #000000;"></i> Sign in with Google</a>
            </div>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>


