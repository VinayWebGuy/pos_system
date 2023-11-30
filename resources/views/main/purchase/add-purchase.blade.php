@extends('main.layouts.main')
@section('title', 'Add Purchase')
@section('purchase', 'active')
@section('content')
    <div class="content">
        <h4 class="page-heading">Add Purchase
            <a href="{{url('purchase/all')}}">All Purchase</a>
        </h4>
        <div class="backdrop"></div>
        <div class="delete-modal">
            <div class="delete-icon"><i class="fa fa-question"></i></div>
            <div class="delete-confirmation">Are you sure do you really want to reset?</div>
            <div class="delete-buttons">
                <button id="cancel-delete" class="btn prev">No</button>
                <button id="confirm-delete" class="btn">Yes</button>
            </div>
        </div>
        <div class="data">
            <div class="sale-purchase-error error"></div>
            <form id="add-purchase-form">
                <div class="form-row sale-purchase">
                    <div class="form-block">
                        <label for="invoice_no">Invoice No</label>
                        <input type="text" name="invoice_no" id="invoice_no">
                    </div>
                    <div class="form-block">
                        <label for="supplier">Supplier</label>
                        <select name="supplier" class="supplier_name" id="select" class="">
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
                    $all_products_code = "";
                    foreach ($products as $pro) {
                        $all_products .= $pro->name."|";
                        $all_products_code .= $pro->unique_id."|";
                    }
                @endphp
                <input type="hidden" name="products" value="{{$all_products}}" id="products">
                <input type="hidden" name="products_code" value="{{$all_products_code}}" id="products_code">
                <div class="select-products purchase">
                    <table id="product-table">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Product</td>
                                <td>Quantity</td>
                                <td>Cost</td>
                                <td>Total</td>
                                <td><i class="fa fa-plus" id="add-row"></i></td>
                            </tr>
                        </thead>
                        <tbody class="products-body">
                            {{-- <tr>
                                <td class="product-sr">1</td>
                                <td>
                                    <select class="select choose-product row_product" name="product">
                                        <option value="">Choose Product</option>
                                        @foreach ($products as $pro)
                                            <option value="{{$pro->unique_id}}">{{$pro->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" class="row_quantity" name="quantity"></td>
                                <td><input type="text" class="row_cost" name="cost"></td>
                                <td><input readonly type="text" class="row_total" name="total"></td>
                                <td><i class="fa fa-times delete-row disabled"></i></td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>

                <div class="summary">
                    <div class="total-products">
                        <span>Total Products</span> <span id="total-products">0</span>
                    </div>
                    <div class="total-quantity">
                        <span>Total Quantity</span> <span id="total-quantity">0</span>
                    </div>
                    <div class="total-amount">
                        <span>Total Amount</span> <span id="total-amount">0.00</span>
                    </div>
                </div>
                <div class="sale-purchase-buttons">
                    <button type="button" id="reset-rows" class="btn prev">Reset</button>
                    <button type="" id="proceed-details" class="btn">Proceed</button>
                </div>
            </form>
        </div>
    </div>
@endsection
