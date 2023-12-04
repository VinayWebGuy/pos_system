@extends('main.layouts.main')
@section('title', 'All Purchase')
@section('purchase', 'active')
@section('content')
    <div class="content">
        <h4 class="page-heading">All Purchase
            <a href="{{url('purchase/add')}}">Add Purchase</a>
        </h4>
        <div class="backdrop"></div>
        <div class="delete-modal">
            <div class="delete-icon"><i class="fa fa-question"></i></div>
            <div class="delete-confirmation">Are you sure do you really want to delete this purchase?</div>
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
                        <th>Supplier</th>
                        <th>Cost</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchase as $p)
                        <tr id="row-{{$p->unique_id}}">
                            <td>{{$p->date}}</td>
                            <td>{{$p->invoice_no}}</td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->total_cost}}</td>
                            <td>
                                <i data-id="{{$p->unique_id}}" class="table-action fa fa-eye view-purchase"></i>
                                <i data-id="{{$p->unique_id}}" class="table-action fa fa-trash delete-purchase"></i>
                                <i data-code="{{$p->unique_id}}" class="table-action fa fa-edit edit-purchase"></i>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
