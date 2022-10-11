@extends('layouts.app')


@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('app.scss') }}" >

<div class="container">
<form  class="top-left" action="{{url('/search')}}" method="get">
    {{csrf_field()}}
    <input type="text" placeholder="Search" class="search-input" name="name"/>
    <select name="Category" class="search-input" id="category">
    <option value="Category">Category</option>
                <option value="Jackets">Jackets</option>
                <option value="Suits">Suits</option>
                <option value="Shoes">Shoes</option>
                <option value="Hats">Hats</option>
            </select>
    <input type="image" src="https://cdn-icons-png.flaticon.com/512/49/49116.png" style="width: 30px; margin-left:10px; margin-top:15px;"/>

</form>
<div id="center">
<a href="https://dump.it/search?_token=HDwY5UEi8EFLhRf88Uo6WrOrHozt2lkUMkVEDC03&name=&Category=Jackets" class="filter-button">Jackets</a>
<a href="https://dump.it/search?_token=HDwY5UEi8EFLhRf88Uo6WrOrHozt2lkUMkVEDC03&name=&Category=Shoes" class="filter-button">Shoes</a>
<a href="https://dump.it/search?_token=HDwY5UEi8EFLhRf88Uo6WrOrHozt2lkUMkVEDC03&name=&Category=Hats" class="filter-button">Hats</a>
<a href="https://dump.it/search?_token=HDwY5UEi8EFLhRf88Uo6WrOrHozt2lkUMkVEDC03&name=&Category=Suits"class="filter-button">Suits</a>
</div>

<div class="product-list">
    @foreach($assets as $product)
    <div class="product-container">
        <img class="product-image" src="{{ Storage::url($product->image)  }}">
        <h3 class="product-title">{{$product ->name }}</h3>
        <h2 class="product-price">€ {{$product ->price }}</h3>
            <button class="product-details"><a class="product-details-text" href="/products/{{$product['id']}}">{{__('Details')}}</a></button>
    </div>
    @endforeach
</div>
@if (Auth::user())
<button class="bottom-right"><a class="bottom-right-text" href="{{ url('/upload-product') }}">+</a></button>
@endif
@endsection