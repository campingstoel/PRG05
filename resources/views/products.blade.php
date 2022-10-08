@extends('layouts.app')


@section('content')
<div class="product-list">
@foreach($assets as $product)
<div class="product-container">
    <img class="product-image" src="{{ Storage::url($product->image)  }}">
    <h3 class="product-title">{{$product ->name }}</h3>
    <h2 class="product-price">€ {{$product ->price }}</h3>
    <button class="product-details" ><a class="product-details-text" href="/products/{{$product['id']}}">{{__('Details')}}</a></button>
</div>
@endforeach
</div>
@if (Auth::user())
                    <button class="bottom-right"><a class="bottom-right-text" href="{{ url('/upload-product') }}">+</a></button>
                    @endif
@endsection