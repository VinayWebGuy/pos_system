@extends('main.layouts.main')
@section('title', 'Edit Category')
@section('category', 'active')
@section('content')
    <div class="content">
        <h4 class="page-heading">Edit Category
            <a href="{{ url('category/all') }}">All Categories</a>
        </h4>

        <div class="data">
            <form id="update-category-form">
                <input type="hidden" name="id" id="id" value="{{$category->id}}">
                <div class="form-row">
                    <div class="form-block">
                        <label for="name">Name</label>
                        <input value="{{$category->name}}" id="name" type="text" class="form-input">
                    </div>
                    <div class="form-block">
                        <label for="name">Status</label>
                        <select name="status" id="status" class="">
                            <option @if($category->status == 1) {{'selected'}} @endif value="1">Active</option>
                            <option @if($category->status == 0) {{'selected'}} @endif value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <p class="error" id="error-msg"></p>
                <div class="buttons">
                    <button class="btn">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
