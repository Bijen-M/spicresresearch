@extends('layouts.app')

@section('content')
<div class="wrap-login100">
    <div class="login100-form-title" style="background-image: url(backend/images/bg-01.jpg);">
        <span class="login100-form-title-1">
            Sign In
        </span>
    </div>
    <div class="login100-form">
        @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif
        @if (session('verified'))
        <div class="alert alert-success" role="alert">
            Successfully verified!
        </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="wrap-input100 validate-input m-b-26">
                <span class="label-input100">Email</span>
                <input id="email" type="email" class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                <span class="invalid-feedback focus-input100" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="wrap-input100 validate-input m-b-18">
                <span class="label-input100">Password</span>
                <input id="password" type="password" class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                <span class="invalid-feedback focus-input100" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="flex-sb-m w-full p-b-30">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                           <label class="form-check-label custom-control-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <div>
                    @if (Route::has('password.request'))
                    <a class="btn btn-link txt1" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div>
            <div class="container-login100-form-btn">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
