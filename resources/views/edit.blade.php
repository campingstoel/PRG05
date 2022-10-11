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

<form method="post" class="form" action="/editconfirm" enctype="multipart/form-data">
    {{ csrf_field() }}
        <label for="title" >Product name</label>
            <input name="name" type="text" class="input-black" id="titleid" value="{{$data -> name}}" placeholder="Product name" required>

        <label for="Description" >Description</label>
   
            <input name="description" type="text" class="input-black" id="publisherid" value="{{$data -> description}}" placeholder="Description" required>
            <input name="account_id" type="hidden" class="input-black"id="publisherid" value="{{ Auth::user()->id }}">
            <input name="id" type="hidden" class="input-black" id="publisherid" value="{{ $data->id }}">


   
        <label for="price">Pricing</label>
     
            <input name="price" type="text" class="input-black" value="{{$data -> price}}" id="titleid" placeholder="Price" required>
     
            <label for="Category"  required>Category</label>
            <select name="Category" class="input-black"  id="category" value="{{$data -> category}}">
                <option value="Jackets">Jackets</option>
                <option value="Suits">Suits</option>
                <option value="Shoes">Shoes</option>
                <option value="Hats">Hats</option>
            </select>

            <label for="image" class="col-sm-3 col-form-label">Image</label>
                        <input name="image" type="file" id="imageid" value="{{$data -> image}}" class="custom-file-input" required>
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