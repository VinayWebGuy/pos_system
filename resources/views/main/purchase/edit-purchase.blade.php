@extends('main.layouts.main')
@section('title', 'Edit Purchase')
@section('purchase', 'active')
@section('content')
    <div class="content">
        <h4 class="page-heading">Edit Purchase
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
            <form id="update-purchase-form">
                <input type="hidden" name="purchase_id" id="purchase_id" value="{{$purchase[0]->unique_id}}">
                <div class="form-row sale-purchase">
                    <div class="form-block">
                        <label for="invoice_no">Invoice No</label>
                        <input value="{{$purchase[0]->invoice_no}}" type="text" name="invoice_no" id="invoice_no">
                    </div>
                    <div class="form-block">
                        <label for="supplier">Supplier</label>
                        <select name="supplier" class="supplier_name" id="select" >
                            <option value="">Select</option>
                            @foreach ($suppliers as $sup)
                            @if($sup->id == $purchase[0]->supplier)
                                <option selected value="{{$sup->id}}">{{$sup->name}}</option>
                                @else
                                <option value="{{$sup->id}}">{{$sup->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-block">
                        <label for="date">Date</label>
                        <input value="{{$purchase[0]->date}}" type="date" name="date" id="date">
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
                <div class="select-products purchase-update">
                    <table id="product-table">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Product</td>
                                <td>Quantity</td>
                                <td>Cost</td>
                                <td>Total</td>
                                <td><i class="fa fa-plus" id="add-row-update"></i></td>
                            </tr>
                        </thead>
                        <tbody class="products-body">
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($purchase as $p)
                            <tr>
                                <td class="product-sr"><span>{{$i}}</span> <div class="block-el"></div></td>
                                <td>
                                    <select class="row_product select choose-product" name="product[]">
                                        <option value="">Choose Product</option>
                                        @foreach ($products as $product)
                                            @if($product->unique_id == $p->product_id)
                                            <option selected value="{{$product->unique_id}}">{{$product->name}}</option>
                                            @else
                                            <option value="{{$product->unique_id}}">{{$product->name}}</option>
                                            @endif
                                        @endforeach
                                    </select><div class="block-el"><a target="_blank" href="{{url('product/add')}}">Add new</a></div>
                                </td>
                                <td><input class="row_quantity" type="text" name="quantity[]"  value="{{$p->quantity}}"><div class="block-el"></div></td>
                                <td><input class="row_cost" type="text" name="cost[]" value="{{$p->cost}}"><div class="block-el"></div></td>
                                
                                <td><input readonly class="row_total" type="text" name="total[]" value="{{$p->total_product_cost}}"><div class="block-el"></div></td>
                                <td><i class="fa fa-times delete-row"></i><div class="block-el"></div></td>
                            </tr> 
                            @php
                                $i++;
                            @endphp
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>

                <div class="summary">
                    <div class="total-products">
                        <span>Total Products</span> <span id="total-products">{{$purchase[0]->total_products}}</span>
                    </div>
                    <div class="total-quantity">
                        <span>Total Quantity</span> <span id="total-quantity">{{$purchase[0]->total_quanitity}}</span>
                    </div>
                    <div class="total-amount">
                        <span>Total Amount</span> <span id="total-amount">{{$purchase[0]->total_cost}}</span>
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
