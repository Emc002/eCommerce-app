@extends("layouts.app")
    <!-- Session Status -->
    @section('content')
    <div class="col-6 imgLogin" >

    </div>
    <div class="box col-6">
        <div class="groupFont">
            <a>Login</a>
        </div>
    <form class="positionInput" method="POST" action="{{ route('login') }}">
        @csrf
        @method('POST')

        <!-- Email Address -->
        <div>
            <label class="fontColorLabel" for="exampleInputEmail1">{{ __('Email') }}</label><br>
            <input class="input" type="email" class="form-control @error('email') is-invalid @enderror"
            name="email" :value="old('email')" required autofocus>
            @error('email')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label class="fontColorLabel" for="pass">{{ __('Password') }}</label><br>
            <input class="input" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" :value="old('password')" required autofocus>
            @error('password')
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <!-- Remember Me -->
        <label class="container">
            <div class="checkbox">
            <input checked="checked" type="checkbox">
            <div class="checkmark"></div>
            <label class="Remember" for="pass">{{ __('Remember me') }}</label>
        </div>
        </label>


        <div class="flex linkfont items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <div class="ml-3 btndiv">
                <button class="btn btn-success">{{ __('Log in') }}</button>
            </div>
        </div>
        
        <div class="flex googlebutton items-center justify-center mt-4">
            <a href="{{ url('auth/google') }}">
                <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
            </a>
        </div>
    </form>
    </div>
    @endsection



