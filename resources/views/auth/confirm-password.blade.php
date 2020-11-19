@extends('layouts.guest')

@section('content')
  <div class="login-box w-75">
    <div class="login-logo">
      <a href="{{ route('welcome') }}"><b>SOE</b><small>Catalog</small></a>
    </div>

    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">This is a secure area of the application.</p>
        <p class="login-box-msg">Please confirm your password before continuing.</p>

        <form action="{{ route('password.confirm') }}" method="post">
          @csrf
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
            <div class="col-8"></div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Confirm</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection


<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
      <a href="/">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
      </a>
    </x-slot>

    <div class="mb-4 text-sm text-gray-600">
      This is a secure area of the application. Please confirm your password before continuing.
    </div>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

    <form method="POST" action="{{ route('password.confirm') }}">
    @csrf

    <!-- Password -->
      <div>
        <x-label for="password" :value="__('Password')"/>

        <x-input id="password" class="block mt-1 w-full"
                 type="password"
                 name="password"
                 required autocomplete="current-password"/>
      </div>

      <div class="flex justify-end mt-4">
        <x-button>
          {{ __('Confirm') }}
        </x-button>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout>
