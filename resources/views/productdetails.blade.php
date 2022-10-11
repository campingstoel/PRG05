
<?php 
$usertime = new Datetime($user->created_at);
$now = new DateTime();
?>
<body style="background-color:black;">

@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('app.scss') }}" >




    @section('content')

<body>
    <main class="maindetails" id="main">
        <div class="container2">
            <div class="imgBx">
                <img src="{{ Storage::url($details->image)  }}" alt="{{$details->name}}" style="max-width:500px">
            </div>
            <div class="details">
                <div class="content">
                    <h2>{{$details->name}}<br>
                        <span> <a href="https://dump.it/search?_token=HDwY5UEi8EFLhRf88Uo6WrOrHozt2lkUMkVEDC03&name=&Category={{$details->category}}">{{$details->category}}</a></span>

                    </h2>
                    <p>
                        {{$details->description}}
                    </p>

                    <h3>{{$details -> price}}</h3>
                    @if (Auth::user() && Auth::id()==$details->account_id && date_diff($usertime, $now)->days > 2)
                    <button class="button"><a class="a" href="/edit/{{$details['id']}}">EDIT</a></button>
                    @endif

                </div>
            </div>
        </div>
    </main>
@endsection
</body>