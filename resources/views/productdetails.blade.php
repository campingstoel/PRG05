@extends('layouts.app')


@section('content')
<main class="" id="main">
            <div class="container">
        <h1 class="text-white">{{$details->name}}</h1>
        <div class="row row-cols-1 row-cols-md-2 g-3">
            <div class="col">
                <p>{{$details->description}}</p>
                <div class="row">
                                            <div class="col col-auto">
                            <a href="" class="btn btn-primary text-white">{{$details->category}}</a>
                        </div>
                                    </div>
            </div>
            <div class="col">
                <img class="card-img-top" src="{{ Storage::url($details->image)  }}" alt="{{$details->name}}"/>
            </div>
        </div>
    </div>
    @if (Auth::user() && Auth::id()==$details->account_id)
                    <button class="bottom-right"><a class="bottom-right-text" href="/edit/{{$details['id']}}">✎</a></button>
                    @endif
    </main>
    @endsection