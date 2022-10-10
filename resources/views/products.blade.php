@extends('layouts.app')


@section('content')

<div class="container">
<form  class="top-left" action="{{url('/search')}}" method="get">
    {{csrf_field()}}
    <input type="text" placeholder="Search" class="input" name="name"/>
    <select name="Category" class="input" id="category">
    <option value="Category">Category</option>
                <option value="Jackets">Jackets</option>
                <option value="Suits">Suits</option>
                <option value="Shoes">Shoes</option>
                <option value="Hats">Hats</option>
            </select>
    <input type="submit" class="submit" value="🔍"/>

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