@extends('layouts.app')
@section('content')

<form method="post" action="/create" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="titleid" class="col-sm-3 col-form-label">Product name</label>
        <div class="col-sm-9">
            <input name="name" type="text" class="form-control" id="titleid" placeholder="Product name" required>
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
    
            <input name="description" type="text" class="form-control" id="publisherid" placeholder="description" required>
            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            <input name="account_id" type="hidden" class="form-control" id="publisherid" value="{{ Auth::user()->id }}">

        </div>
    </div>
    <div class="form-group row">
        <label for="titleid" class="col-sm-3 col-form-label">Pricing</label>
        <div class="col-sm-9">
            <input name="price" type="text" class="form-control" id="titleid" placeholder="Price" required>
        </div>

        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        <div class="form-group row">
            <label for="Category" class="col-sm-3 col-form-label">Category</label>
            <select name="Category" class="form-control" id="category" required>
                <option value="Jackets">Jackets</option>
                <option value="Suits">Suits</option>
                <option value="Shoes">Shoes</option>
                <option value="Hats">Hats</option>
            </select>
            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

        </div>
    </div>
    <div class="form-group row">
        <label for="gameimageid" class="col-sm-3 col-form-label">Image</label>
        <div class="col-sm-9">
            <input name="image" type="file" id="gameimageid" class="custom-file-input" required>
            <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9">
            <button type="submit" class="btn btn-primary">Submit Product</button>
        </div>
    </div>
</form>