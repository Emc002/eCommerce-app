@extends("layouts.app")

@section('content')

<div class="box">
    <form method="POST" action="{{ url('register') }}">
        @csrf
        @method('POST')
        <!-- Name -->
        <div>
            <label for="name">{{ __('Name') }}</label>
            <input type="name" class="form-control @error('name') is-invalid @enderror"
            name="name" :value="('name')" placeholder="Name" required autofocus>
            @error('name')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="exampleInputEmail1">{{ __('Email') }}</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror"
            name="email" :value="('email')" placeholder="Email" required autofocus>
            @error('email')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="pass">{{ __('Password') }}</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" :value="old('password')" placeholder="Password" required autofocus>
            @error('password')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="pass">{{ __('Confirm Password') }}</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
            name="password_confirmation" :value="old('password_confirmation')" placeholder="Confirm Password" required>
            @error('password_confirmation')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <div class="ml-4">
                <button class="btn btn-success">
                {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>  
@endsection