@extends('layouts.app')
@section('content')


    <!-- Session Status -->
    <div class="backgroundC">
<div class="box1" >
    <div class="mb-4 text-sm fontC">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="inputEmail">
            <label class="fontColorLabel" for="exampleInputEmail1">{{ __('Email') }}</label><br>
            <input class="input inpWID" type="email" class="form-control @error('email') is-invalid @enderror"
            name="email" :value="old('email')" required autofocus>
            @error('email')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <div class="flex items-center btnEmailVery justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</div>
</div>
@endsection