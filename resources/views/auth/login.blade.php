@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">


<body>
<div class="container">
<div class="background">
</div>

<form method="POST" class="form" action="{{ route('login') }}">
    @csrf
    <div class="form-title">
    <h3>DumpIt.</h3>
    <img src="https://i0.wp.com/zeevector.com/wp-content/uploads/White-Recycle-Symbol@zeevector.com_.png?fit=595%2C585&ssl=1" height="30px" >
    </div>
    <label for="email">{{ __('Email Address') }}</label>
    <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <label for="password">{{ __('Password') }}</label>
    <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" >

        <label class="form-check-label" for="remember">
            {{ __('Remember Me') }}
        </label>
    </div>
    
    <button style="color:black">Log In</button>
    @if (Route::has('password.request'))
    <a class="btn btn-link" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
    </a>
    @endif

    <div class="social">
        <div class="go"><i class="fab fa-google"></i> Google</div>
        <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
    </div>

</form>
</div>
</body>



@endsection