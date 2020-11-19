@extends('layouts.guest')

@section('content')
  <div class="login-box">
    <div class="login-logo">
      <a href="{{ route('welcome') }}"><b>SOE</b><small>Catalog</small></a>
    </div>

    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{ route('login') }}" method="post">
          @csrf
          <div class="input-group">
            <input id="_username" name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <label for="_username" class="fas fa-envelope"></label>
              </div>
            </div>
          </div>
          <div class="mb-3">
            @error('username')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="input-group">
            <input id="_password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <label for="_password" class="fas fa-lock"></label>
              </div>
            </div>
          </div>
          <div class="mb-3">
            @error('password')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                <label for="remember_me">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>

        @if (Route::has('password.request'))
          <p class="mb-1">
            <a href="{{ route('password.request') }}">I forgot my password</a>
          </p>
        @endif
        <p class="mb-0">
          <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
        </p>
      </div>
    </div>
  </div>
@endsection

{{--<x-guest-layout>--}}
{{--  <x-auth-card>--}}
{{--    <x-slot name="logo">--}}
{{--      <a href="/">--}}
{{--        <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>--}}
{{--      </a>--}}
{{--    </x-slot>--}}

{{--    <!-- Session Status -->--}}
{{--    <x-auth-session-status class="mb-4" :status="session('status')"/>--}}

{{--    <!-- Validation Errors -->--}}
{{--    <x-auth-validation-errors class="mb-4" :errors="$errors"/>--}}

{{--    <form method="POST" action="{{ route('login') }}">--}}
{{--    @csrf--}}

{{--    <!-- Email Address -->--}}
{{--      <div>--}}
{{--        <x-label for="email" :value="__('Email')"/>--}}

{{--        <x-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus/>--}}
{{--      </div>--}}

{{--      <!-- Password -->--}}
{{--      <div class="mt-4">--}}
{{--        <x-label for="password" :value="__('Password')"/>--}}

{{--        <x-input id="password" class="block mt-1 w-full"--}}
{{--                 type="password"--}}
{{--                 name="password"--}}
{{--                 required autocomplete="current-password"/>--}}
{{--      </div>--}}

{{--      <!-- Remember Me -->--}}
{{--      <div class="block mt-4">--}}
{{--        <label for="remember_me" class="flex items-center">--}}
{{--          <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">--}}
{{--          <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--        </label>--}}
{{--      </div>--}}

{{--      <div class="flex items-center justify-end mt-4">--}}
{{--        @if (Route::has('password.request'))--}}
{{--          <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--            {{ __('Forgot your password?') }}--}}
{{--          </a>--}}
{{--        @endif--}}

{{--        <x-button class="ml-3">--}}
{{--          {{ __('Login') }}--}}
{{--        </x-button>--}}
{{--      </div>--}}
{{--    </form>--}}
{{--  </x-auth-card>--}}
{{--</x-guest-layout>--}}
