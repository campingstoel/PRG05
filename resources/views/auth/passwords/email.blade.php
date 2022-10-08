@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST"  class="form" action="{{ route('password.email') }}">
        @csrf

        <div class="form-title">
            <h3>DumpIt.</h3>
            <img src="https://i0.wp.com/zeevector.com/wp-content/uploads/White-Recycle-Symbol@zeevector.com_.png?fit=595%2C585&ssl=1" height="30px">
        </div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <label for="email">{{ __('Email Address') }}</label>
        <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <button type="submit" class="btn btn-primary">
            {{ __('Send Password Reset Link') }}
        </button>



    </form>
</div>
<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="form-title">
        <h3>DumpIt.</h3>
        <img src="https://i0.wp.com/zeevector.com/wp-content/uploads/White-Recycle-Symbol@zeevector.com_.png?fit=595%2C585&ssl=1" height="30px">
    </div>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <label for="email">{{ __('Email Address') }}</label>
    <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <button type="submit" class="btn btn-primary">
        {{ __('Send Password Reset Link') }}
    </button>



</form>
@endsection