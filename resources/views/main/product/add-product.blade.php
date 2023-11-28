@extends('main.layouts.main')
@section('title', 'Add Product')
@section('product', 'active')
@section('content')
    <div class="content">
        <h4 class="page-heading">Add Product
            <a href="{{url('product/all')}}">All Products</a>
        </h4>
        <div class="data">
            <form id="product-form">
                <div class="form-row">
                    <div class="form-block">
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" class="form-input">
                        <p id="name-error" class="error"></p>
                    </div>
                    <div class="form-block">
                        <label for="name">Status</label>
                        <select name="status" id="status" class="">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-block">
                        <label for="category">Category</label>
                       <select name="category" id="category" class="select">
                            <option value="">Choose Category</option>
                            @foreach ($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                        <p id="category-error" class="error"></p>
                    </div>
                    <div class="form-block">
                        <label for="quantity">Quantity</label>
                        <input name="quantity" id="quantity" type="number" class="form-input">
                        <p id="quantity-error" class="error"></p>
                    </div>
                </div>
                <div class="form-row">
                        <div class="form-block">
                            <label for="buying_price">Buying Price</label>
                            <input name="buying_price" step=".1" id="buying_price" type="number" class="form-input">
                            <p id="buying_price-error" class="error"></p>
                        </div>
                        <div class="form-block">
                            <label for="selling_price">Selling Price</label>
                            <input name="selling_price" step=".1" id="selling_price" type="number" class="form-input">
                            <p id="selling_price-error" class="error"></p>
                        </div>
                        <div class="form-block">
                            <label for="discount_type">Discount Type</label>
                            <select name="discount_type" id="discount_type" class="">
                                <option value="percent">Percent</option>
                                <option value="fixed">Fixed</option>
                            </select>
                            <p id="discount_type-error" class="error"></p>
                        </div>
                        <div class="form-block">
                            <label for="discount">Discount</label>
                            <input name="discount" step=".1" id="discount" type="number" class="form-input">
                            <p id="discount-error" class="error"></p>
                        </div>
                </div>
                <div class="form-row">
                    <div class="form-block ">
                        <label for="file">Picture</label>
                        <input multiple type="file" name="files" id="files" accept="image/*">
                        <div class="choose-file">Choose File <span><i class="fa fa-upload"></i></span></div>

                        <div class="img-preview-container"></div>
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
