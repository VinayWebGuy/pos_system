@extends('main.layouts.main')
@section('title', 'Product History')
@section('product', 'active')
@section('content')
    <div class="content">
        <h4 class="page-heading">Product History
            <a href="{{url('product/all')}}">All Products</a>
        </h4>
        <div class="backdrop"></div>
        <div class="delete-modal">
            <div class="delete-icon"><i class="fa fa-question"></i></div>
            <div class="delete-confirmation">Are you sure do you really want to delete this product?</div>
            <div class="delete-buttons">
                <button id="cancel-delete" class="btn prev">No</button>
                <button id="confirm-delete" class="btn">Yes</button>
            </div>
        </div>
        <div class="data">
            <h3 class="product-history-heading">Purchase of {{$purchase[0]->product_name}}</h3>
            <table class="product-history-table" id="myTable">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Invoice Number</th>
                        <th>Supplier</th>
                        <th>Quantity</th>
                        <th>Cost</th>
                        <th>Total Cost</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchase as $pur)
                        <tr id="row-{{$pur->id}}">
                            <td>{{$pur->date}}</td>
                            <td>
                                <a class="view-invoice-link" target="_blank" href="{{url('purchase/view')}}/{{$pur->purchase_unique_id}}">{{$pur->invoice_no}} <i class="fa fa-external-link"></i></a>
                            </td>
                            <td>{{$pur->supplier_name}}</td>
                            <td>{{$pur->quantity}}</td>
                            <td>{{$pur->cost}}</td>
                            <td>{{$pur->total_product_cost}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h3 class="product-history-heading second">Sale of {{$purchase[0]->product_name}}</h3>
            <table class="product-history-table" id="myTable2">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Invoice Number</th>
                        <th>Supplier</th>
                        <th>Quantity</th>
                        <th>Cost</th>
                        <th>Total Cost</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sale as $sl)
                        <tr id="row-{{$sl->id}}">
                            <td>{{$sl->date}}</td>
                            <td>
                                <a class="view-invoice-link" target="_blank" href="{{url('sale/view')}}/{{$sl->unique_id}}">{{$sl->invoice_no}} <i class="fa fa-external-link"></i></a>
                            </td>
                            <td>{{$sl->customer}}</td>
                            <td>{{$sl->quantity}}</td>
                            <td>{{$sl->cost}}</td>
                            <td>{{$sl->total_product_cost}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
