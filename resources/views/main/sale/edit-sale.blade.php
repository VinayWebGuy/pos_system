@extends('main.layouts.main')
@section('title', 'Add Sale')
@section('sale', 'active')
@section('content')
    <div class="content">
        <h4 class="page-heading">Edit Sale
            <a href="{{url('sale/all')}}">All Sale</a>
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
            <form id="update-sale-form">
                <input type="hidden" name="sale_id" id="sale_id" value="{{$sale[0]->unique_id}}">
                <div class="form-row sale-purchase">
                    <div class="form-block">
                        <label for="invoice_no">Invoice No</label>
                        <input value="{{$sale[0]->invoice_no}}" type="text" name="invoice_no" id="invoice_no">
                    </div>
                    <div class="form-block">
                        <label for="customer_name">Customer Name / Mobile</label>
                        <input value="{{$sale[0]->customer}}" type="text" name="customer_name" id="customer_name">
                    </div>
                    <div class="form-block">
                        <label for="date">Date</label>
                        <input value="{{$sale[0]->date}}" type="date" name="date" id="date">
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
                <div class="select-products sale-update">
                    <table id="product-table">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Product</td>
                                <td>Quantity</td>
                                <td>Cost</td>
                                <td>D. type</td>
                                <td>Discount</td>
                                <td>Total</td>
                                <td><i class="fa fa-plus" id="add-row-sale-update"></i></td>
                            </tr>
                        </thead>
                        <tbody class="products-body">
                            @php
                            $i = 1;
                        @endphp
                           @foreach ($sale as $s)
                           <td class="product-sr"><span>{{$i}}</span> <div class="block-el"></div></td>
                           <td>
                               <select class="row_product select choose-product" name="product[]">
                                   <option value="">Choose Product</option>
                                   @foreach ($products as $product)
                                   @if($product->unique_id == $s->product_id)
                                   <option selected value="{{$product->unique_id}}">{{$product->name}}</option>
                                   @else
                                   <option value="{{$product->unique_id}}">{{$product->name}}</option>
                                   @endif
                               @endforeach
                               </select><div class="block-el"><a target="_blank" href="{{url('product/add')}}">Add new</a></div>
                           </td>
                           <td><input class="row_quantity" type="text" name="quantity[]" value="{{$s->quantity}}"><div class="block-el"><i>Stock: <span class="current_stock"></span></i></div></td>
                           <td><input class="row_cost" type="text" name="cost[]" value="{{$s->cost}}"><div class="block-el"></div></td>
                           <td><select name="discount_type[]" class="row_discount_type"><option value="">Choose</option><option @if($s->discount_type == "fixed") {{'selected'}} @endif  value="fixed">F</option><option  @if($s->discount_type == "percent") {{'selected'}} @endif value="percent">P</option></select><div class="block-el"></div></td>
                           <td><input class="row_discount" type="text" name="discount[]" value="{{$s->discount}}"><div class="block-el"></div></td>
                           
                           <td><input readonly class="row_total" type="text" name="total[]" value="{{$s->total_product_cost}}"><div class="block-el"></div></td>
                           <td><i class="fa fa-times delete-row"></i><div class="block-el"></div></td>
                           @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="summary">
                    <div class="total-products">
                        <span>Total Products</span> <span id="total-products">{{$sale[0]->total_products}}</span>
                    </div>
                    <div class="total-quantity">
                        <span>Total Quantity</span> <span id="total-quantity">{{$sale[0]->total_quantity}}</span>
                    </div>
                    <div class="total-amount">
                        <span>Total Amount</span> <span id="total-amount">{{$sale[0]->total_cost}}</span>
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
