@extends('main.layouts.main')
@section('title', 'All Sale')
@section('sale', 'active')
@section('content')
    <div class="content">
        <h4 class="page-heading">All Sale
            <a href="{{url('sale/add')}}">Add Sale</a>
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
                        <th>Date</th>
                        <th>Invoice No</th>
                        <th>Customer</th>
                        <th>Cost</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sale as $s)
                        <tr id="row-{{$s->unique_id}}">
                            <td>{{$s->date}}</td>
                            <td>{{$s->invoice_no}}</td>
                            <td>{{$s->customer}}</td>
                            <td>{{$s->total_cost}}</td>
                            <td>
                                <i data-id="{{$s->unique_id}}" class="table-action fa fa-eye view-sale"></i>
                                <i data-id="{{$s->unique_id}}" class="table-action fa fa-trash delete-sale"></i>
                                <i data-code="{{$s->unique_id}}" class="table-action fa fa-edit edit-sale"></i>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
