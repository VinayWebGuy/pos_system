@extends('main.layouts.main')
@section('title', 'All Categories')
@section('category', 'active')
@section('content')
    <div class="content">
        <h4 class="page-heading">All Categories
            <a href="{{url('category/add')}}">Add Category</a>
        </h4>
        <div class="backdrop"></div>
        <div class="delete-modal">
            <div class="delete-icon"><i class="fa fa-question"></i></div>
            <div class="delete-confirmation">Are you sure do you really want to delete this category?</div>
            <div class="delete-buttons">
                <button id="cancel-delete" class="btn prev">No</button>
                <button id="confirm-delete" class="btn">Yes</button>
            </div>
        </div>
        <div class="data">
            <table id="myTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $cat)
                        <tr id="row-{{$cat->id}}">
                            <td>{{$cat->name}}</td>
                            <td>
                                <div class="status-block">
                                    <i data-id="{{$cat->id}}" class="category-{{$cat->id}} fa fa-check category-status @if($cat->status == 1) {{'active'}} @endif" id="active-status-{{$cat->id}}"></i>
                                    <i data-id="{{$cat->id}}" class="category-{{$cat->id}} fa fa-times category-status @if($cat->status == 0) {{'active'}} @endif" id="inactive-status-{{$cat->id}}"></i>
                                </div>
                            </td>
                            <td>
                                <i data-id="{{$cat->id}}" class="table-action fa fa-trash delete-category"></i>
                                <i data-code="{{$cat->unique_id}}" class="table-action fa fa-edit edit-category"></i>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
