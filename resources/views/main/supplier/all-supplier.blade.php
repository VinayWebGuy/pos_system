@extends('main.layouts.main')
@section('title', 'All Supplier')
@section('supplier', 'active')
@section('content')
    <div class="content">
        <h4 class="page-heading">All Supplier
            <a href="{{url('supplier/add')}}">Add Supplier</a>
        </h4>
        <div class="backdrop"></div>
        <div class="delete-modal">
            <div class="delete-icon"><i class="fa fa-question"></i></div>
            <div class="delete-confirmation">Are you sure do you really want to delete this supplier?</div>
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
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $sup)
                        <tr id="row-{{$sup->id}}">
                            <td>{{$sup->name}}</td>
                            <td>{{$sup->email}}</td>
                            <td>{{$sup->mobile}}</td>
                            <td>{{$sup->city}}</td>
                            <td>{{$sup->state}}</td>
                            <td>
                                <div class="status-block">
                                    <i data-id="{{$sup->id}}" class="supplier-{{$sup->id}} fa fa-check supplier-status @if($sup->status == 1) {{'active'}} @endif" id="active-status-{{$sup->id}}"></i>
                                    <i data-id="{{$sup->id}}" class="supplier-{{$sup->id}} fa fa-times supplier-status @if($sup->status == 0) {{'active'}} @endif" id="inactive-status-{{$sup->id}}"></i>
                                </div>
                            </td>
                            <td>
                                <i data-id="{{$sup->id}}" class="table-action fa fa-trash delete-supplier"></i>
                                <i data-code="{{$sup->unique_id}}" class="table-action fa fa-edit edit-supplier"></i>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
