@extends('layouts.app')

@section('content')
<div class="container">
<div class="background">
</div>
<form method="POST" class="form" action="{{ route('register') }}">
    @csrf
    <div class="form-title">
    <h3>DumpIt.</h3>
    <img src="https://i0.wp.com/zeevector.com/wp-content/uploads/White-Recycle-Symbol@zeevector.com_.png?fit=595%2C585&ssl=1" height="30px" >
    </div>

                            <label for="name">{{ __('Name') }}</label>

                                <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    <label for="email">{{ __('Email Address') }}</label>
    <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <label for="password">{{ __('Password') }}</label>
    <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">

    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <label for="password-confirm">{{ __('Confirm Password') }}</label>
    <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
    <button style="color:black">Register</button>


</form>
    
</div>

@endsection
