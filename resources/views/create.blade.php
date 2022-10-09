@extends('layouts.app')
@section('content')

<form method="post" class="form" action="/create" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="titleid" class="col-sm-3 col-form-label">Product name</label>
        <div class="col-sm-9">
            <input name="name" type="text" class="input-black" id="titleid" placeholder="Product name" required>
        </div>
        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>
    <div class="form-group row">
        <label for="description" class="col-sm-3 col-form-label">Description</label>
        <div class="col-sm-9">
    
            <input name="description" type="text" class="input-black" id="publisherid" placeholder="Description" required>
            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            <input name="account_id" type="hidden" class="input-black" id="publisherid" value="{{ Auth::user()->id }}">

        </div>
    </div>
    <div class="form-group row">
        <label for="titleid" class="col-sm-3 col-form-label">Pricing</label>
        <div class="col-sm-9">
            <input name="price" type="text" class="input-black"id="titleid" placeholder="Price" required>
        </div>

        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        <div class="form-group row">
            <label for="Category" class="col-sm-3 col-form-label">Category</label>
            <div class="col-sm-9">
            <select name="Category" class="input-black" id="category" required>
                <option class="input-black"value="Jackets">Jackets</option>
                <option class="input-black"value="Suits">Suits</option>
                <option class="input-black"value="Shoes">Shoes</option>
                <option class="input-black"value="Hats">Hats</option>
            </select>
            </div>
            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

        </div>
    </div>
    <div class="form-group row">
        <label for="gameimageid" class="col-sm-3 col-form-label">Image</label>
        <div class="col-sm-5">
            <input name="image" type="file" id="gameimageid" class="custom-file-input" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9">
            <button type="submit" class="btn btn-primary">Submit Product</button>
        </div>
    </div>
</form>