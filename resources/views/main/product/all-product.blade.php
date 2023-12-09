@extends('main.layouts.main')
@section('title', 'All Products')
@section('product', 'active')
@section('content')
    <div class="content">
        <h4 class="page-heading">All Products
            <a href="{{url('product/add')}}">Add Product</a>
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
            <table id="myTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Discount</th>
                        <th>BP / SP / DP</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $pro)
                        <tr id="row-{{$pro->id}}">
                            <td>{{$pro->name}}</td>
                            <td>
                                @php
                                    $images = explode(',', $pro->images);
                                    @endphp

                                    @if(count($images) > 0)
                                            <img class="product-img" src="{{asset('assets/images/products')}}/{{$images[0]}}" alt="">
                                    @endif
                            </td>
                            <td>@if($pro->discount!="")@if($pro->discount_type=="percent"){{$pro->discount}}% @else {{$check->currency}}{{$pro->discount}} @endif @else N/A @endif</td>
                            <td>{{$check->currency}}{{$pro->buying_price}} / {{$check->currency}}{{$pro->selling_price}} / {{$check->currency}}@if($pro->discount!="")@if($pro->discount_type=="percent"){{$pro->selling_price - ($pro->selling_price * $pro->discount)/ 100}}@else{{($pro->selling_price - $pro->discount)}} @endif @else{{$pro->selling_price}}@endif</td>
                            <td>{{$pro->quantity}}
                            <a target="blank" href="{{url('product/history')}}/{{$pro->unique_id}}"><i class="fa fa-history"></i></a></td>
                            <td>
                                <div class="status-block">
                                    <i data-id="{{$pro->id}}" class="product-{{$pro->id}} fa fa-check product-status @if($pro->status == 1) {{'active'}} @endif" id="active-status-{{$pro->id}}"></i>
                                    <i data-id="{{$pro->id}}" class="product-{{$pro->id}} fa fa-times product-status @if($pro->status == 0) {{'active'}} @endif" id="inactive-status-{{$pro->id}}"></i>
                                </div>
                            </td>
                            <td>
                                <i data-id="{{$pro->id}}" class="table-action fa fa-trash delete-product"></i>
                                <i data-code="{{$pro->unique_id}}" class="table-action fa fa-edit edit-product"></i>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
