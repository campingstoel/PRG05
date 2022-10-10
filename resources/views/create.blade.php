@extends('layouts.app')
@section('content')

<form method="post" class="form" action="/create" enctype="multipart/form-data">
    {{ csrf_field() }}
    <label for="titleid">Product name</label>

    <input name="name" type="text" class="input-black" id="titleid" placeholder="Product name" required>

    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <label for="description">Description</label>


    <input name="description" type="text" class="input-black" id="publisherid" placeholder="Description" required>
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <input name="account_id" type="hidden" class="input-black" id="publisherid" value="{{ Auth::user()->id }}">

    <label for="price">Pricing</label>
    <input name="price" type="text" class="input-black" id="price" placeholder="Price" required>

    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <label for="Category">Category</label>

    <select name="Category" class="input-black" id="category" required>
        <option class="input-black" value="Jackets">Jackets</option>
        <option class="input-black" value="Suits">Suits</option>
        <option class="input-black" value="Shoes">Shoes</option>
        <option class="input-black" value="Hats">Hats</option>
    </select>

    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror



    <label for="image" class="col-sm-3 col-form-label">Image</label>

    <input name="image" type="file" id="image" class="custom-file-input" required>

    <button type="submit" style="color:white">Submit Product</button>

</form>