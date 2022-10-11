@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('app.scss') }}" >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
<div class="container">

<form method="POST" class="form" action="{{ route('register') }}">
    @csrf
    <div class="form-title">
    <h3>DumpIt.</h3>
    <img src="https://www.recycling.com/wp-content/uploads/recycling%20symbols/black/Black%20Recycling%20Symbol%20%28U%2B267B%29.png" height="32px" >

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
    
    <button style="color:white">Register</button>


</form>
    
</div>

@endsection
