@extends('main.layouts.main')
@section('title', 'Edit Product')
@section('product', 'active')
@section('content')
    <div class="content">
        <h4 class="page-heading">Edit Product
            <a href="{{url('product/all')}}">All Products</a>
        </h4>
        <div class="data">
            <form id="update-product-form">
                <input type="hidden" name="id" id="id" value="{{$product->id}}">
                <div class="form-row">
                    <div class="form-block">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" class="form-input" value="{{$product->name}}">
                        <p id="name-error" class="error"></p>
                    </div>
                    <div class="form-block">
                        <label for="name">Status</label>
                        <select name="status" id="status" class="">
                            <option @if($product->status == 1) {{'selected'}} @endif value="1">Active</option>
                            <option @if($product->status == 0) {{'selected'}} @endif value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-block">
                        <label for="category">Category</label>
                       <select name="category" id="category" class="select">
                            <option value="">Choose Category</option>
                            @foreach ($category as $cat)
                            @if($cat->id == $product->category)
                                <option selected value="{{$cat->id}}">{{$cat->name}}</option>
                                @else
                                @endif
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                        <p id="category-error" class="error"></p>
                    </div>
                    <div class="form-block">
                        <label for="quantity">Quantity</label>
                        <input value="{{$product->quantity}}" name="quantity" id="quantity" type="number" class="form-input">
                        <p id="quantity-error" class="error"></p>
                    </div>
                </div>
                <div class="form-row">
                        <div class="form-block">
                            <label for="buying_price">Buying Price</label>
                            <input value="{{$product->buying_price}}" name="buying_price" step=".1" id="buying_price" type="number" class="form-input">
                            <p id="buying_price-error" class="error"></p>
                        </div>
                        <div class="form-block">
                            <label for="selling_price">Selling Price</label>
                            <input value="{{$product->selling_price}}" name="selling_price" step=".1" id="selling_price" type="number" class="form-input">
                            <p id="selling_price-error" class="error"></p>
                        </div>
                        <div class="form-block">
                            <label for="discount_type">Discount Type</label>
                            <select name="discount_type" id="discount_type" class="">
                                <option @if($product->discount_type == "percent") {{'selected'}} @endif value="percent">Percent</option>
                                <option @if($product->discount_type == "fixed") {{'selected'}} @endif value="fixed">Fixed</option>
                            </select>
                            <p id="discount_type-error" class="error"></p>
                        </div>
                        <div class="form-block">
                            <label for="discount">Discount</label>
                            <input value="{{$product->discount}}" name="discount" step=".1" id="discount" type="number" class="form-input">
                            <p id="discount-error" class="error"></p>
                        </div>
                </div>
                <div class="form-row">
                    <div class="form-block ">
                        <label for="file">Picture</label>
                        <input multiple type="file" name="files" id="files" accept="image/*">
                        <div class="choose-file">Choose File <span><i class="fa fa-upload"></i></span></div>

                        <div class="img-preview-container">
                            @if($product->images != "")
                                @php
                                    $images = explode(",", $product->images);
                                @endphp
                                @foreach ($images as $img)
                                    <img src="{{asset('assets/images/products')}}/{{$img}}" alt="">
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <p class="error" id="error-msg"></p>
                <div class="buttons">
                    <button class="btn">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection
