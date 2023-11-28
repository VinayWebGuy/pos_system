@extends('main.layouts.main')
@section('title', 'Add Purchase')
@section('purchase', 'active')
@section('content')
    <div class="content">
        <h4 class="page-heading">Add Purchase
            <a href="{{url('purchase/all')}}">All Purchase</a>
        </h4>
        <div class="data">
            <form action="">
                <div class="form-row">
                    <div class="form-block">
                        <label for="supplier">Supplier</label>
                        <select name="supplier" id="select" class="">
                            <option value="">Select</option>
                            @foreach ($suppliers as $sup)
                                <option value="{{$sup->id}}">{{$sup->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-block">
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date">
                    </div>
                </div>
                @php
                    $all_products = "";
                    foreach ($products as $pro) {
                        $all_products .= $pro->name."|";
                    }
                @endphp
                <input type="hidden" name="products" value="{{$all_products}}" id="products">
                <div class="select-products">
                    <table id="product-table">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Product</td>
                                <td>Quantity</td>
                                <td>Discount</td>
                                <td>Discount Type</td>
                                <td>Cost</td>
                                <td><i class="fa fa-plus" id="add-row"></i></td>
                            </tr>
                        </thead>
                        <tbody class="products-body">
                            <tr>
                                <td class="product-sr">1</td>
                                <td>
                                    <select class="select">
                                        <option value="">Choose Product</option>
                                        @foreach ($products as $pro)
                                            <option value="{{$pro->name}}">{{$pro->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text"></td>
                                <td><input type="text"></td>
                                <td>
                                    <select>
                                        <option value="">Choose</option>
                                        <option value="percent">Percent</option>
                                        <option value="fixed">Fixed</option>
                                    </select>
                                </td>
                                <td><input type="text"></td>
                                <td><i class="fa fa-times delete-row"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </form>
        </div>
    </div>
@endsection
