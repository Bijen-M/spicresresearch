@extends('layouts.app')

@section('content')
<div class="wrap-login100">
    <div class="login100-form-title" style="background-image: url(backend/images/bg-01.jpg);">
        <span class="login100-form-title-1">
            {{ __('Reset Password') }}
        </span>
    </div>
    <div class="login100-form">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="wrap-input100 validate-input m-b-26">
                <span class="label-input100">Email</span>
                <input id="email" type="email" class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                <span class="invalid-feedback focus-input100" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="container-login100-form-btn">
                <button type="submit" class="btn btn-primary">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
