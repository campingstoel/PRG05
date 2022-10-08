@extends('layouts.app')


@section('content')
<div class="product-list">
@foreach($assets as $product)
<div class="product-container">
    <img class="product-image" src="{{ Storage::url($product->image)  }}">
    <h3 class="product-title">{{$product ->name }}</h3>
    <h2 class="product-price">€ {{$product ->price }}</h3>
    <button class="product-details" href="{{ url('/products/') }}">{{__('Details')}}</button>
</div>
@endforeach
</div>
@if (Auth::user())
                    <button class="bottom-right"><a href="{{ url('/upload-product') }}">+</a></button>
                    @endif
@endsection