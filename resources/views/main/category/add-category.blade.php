@extends('main.layouts.main')
@section('title', 'Add Category')
@section('category', 'active')
@section('content')
    <div class="content">
        <h4 class="page-heading">Add Category
            <a href="{{ url('category/all') }}">All Categories</a>
        </h4>

        <div class="data">
            <form id="category-form">
                <div class="form-row">
                    <div class="form-block">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-input">
                    </div>
                    <div class="form-block">
                        <label for="name">Status</label>
                        <select name="status" id="status" class="">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
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
