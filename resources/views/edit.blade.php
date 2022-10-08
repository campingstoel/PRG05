@extends('layouts.app')
@section('content')

<form method="post" action="/editconfirm" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="titleid" class="col-sm-3 col-form-label">Product name</label>
        <div class="col-sm-9">
            <input name="name" type="text" class="form-control" id="titleid" value="{{$data -> name}}" placeholder="Product name" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="Description" class="col-sm-3 col-form-label">Description</label>
        <div class="col-sm-9">
            <input name="description" type="text" class="form-control" id="publisherid" value="{{$data -> description}}" placeholder="Description" required>
            <input name="account_id" type="hidden" class="form-control" id="publisherid" value="{{ Auth::user()->id }}">
            <input name="id" type="hidden" class="form-control" id="publisherid" value="{{ $data->id }}">


        </div>
    </div>
    <div class="form-group row">
        <label for="titleid" class="col-sm-3 col-form-label">Pricing</label>
        <div class="col-sm-9">
            <input name="price" type="text" class="form-control" value="{{$data -> price}}" id="titleid" placeholder="Price" required>
        </div>
        <div class="form-group row">
            <label for="Category" class="col-sm-3 col-form-label" required>Category</label>
            <select name="Category" class="form-control"  id="category" value="{{$data -> category}}">
                <option value="Jackets">Jackets</option>
                <option value="Suits">Suits</option>
                <option value="Shoes">Shoes</option>
                <option value="Hats">Hats</option>
            </select>

        </div>
    </div>
    <div class="form-group row">
        <label for="gameimageid" class="col-sm-3 col-form-label">Image</label>
        <div class="col-sm-9">
            <input name="image" type="file" id="imageid" value="{{$data -> image}}" class="custom-file-input" required>
            <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9">
            <button type="submit" class="btn btn-primary">Edit Product</button>
        </div>
    </div>
</form>