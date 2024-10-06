@extends('layouts.app')

@section('content')
<div class="wrap-login100">
    <div class="login100-form-title" style="background-image: url(backend/images/bg-01.jpg);">
        <span class="login100-form-title-1">
            {{ __('Reset Password') }}
        </span>
    </div>
    <div class="login100-form">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="wrap-input100 validate-input m-b-26">
                <span class="label-input100">Email</span>
                <input id="email" type="email" class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
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
            <div class="wrap-input100 validate-input m-b-18">
                <span class="label-input100">{{ __('Confirm Password') }}</span>
                <input id="password-confirm" type="password" class="input100" name="password_confirmation" required>
            </div>
            <div class="wrap-input100 validate-input m-b-18">
                <button type="submit" class="btn btn-primary">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
