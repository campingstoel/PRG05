<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DumpIt</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('app.scss') }}" >
<link rel="icon" type="image/x-icon" href="https://cdn.freebiesupply.com/logos/large/2x/recycling-2-logo-black-and-white.png">
</head>
@extends('layouts.app')
@section('content')

<form method="post" class="form" action="/create" enctype="multipart/form-data">
    {{ csrf_field() }}
    <label for="titleid">Product name</label>

    <input name="name" type="text" class="input-black" id="titleid" placeholder="Product name" required>
 
    <label for="description">Description</label>


    <input name="description" type="text" class="input-black" id="publisherid" placeholder="Description" required>
  
    <input name="account_id" type="hidden" class="input-black" id="publisherid" value="{{ Auth::user()->id }}">

    <label for="price">Pricing</label>
    <input name="price" type="text" class="input-black" id="price" placeholder="Price" required>

    <label for="Category">Category</label>

    <select name="Category" class="input-black" id="category" required>
        <option class="input-black" value="Jackets">Jackets</option>
        <option class="input-black" value="Suits">Suits</option>
        <option class="input-black" value="Shoes">Shoes</option>
        <option class="input-black" value="Hats">Hats</option>
    </select>




    <label for="image" class="col-sm-3 col-form-label">Image</label>

    <input name="image" type="file" id="image" class="custom-file-input" required>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <button type="submit" style="color:white">Submit Product</button>
       

</form>