<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Sale;

class SaleController extends Controller
{
    public function removeStock($product, $quantity) {
        $product = Product::where('unique_id', $product)->first();
        $product->quantity = $product->quantity - $quantity;
        $product->save();
    }

    public function saveSale(Request $req) {
        $invoice_no = $req->invoice_no;
        $customer = $req->customer_name;
        $date = $req->date;
        $product_arr = $req->product;
        $product_name_arr = $req->product_name;
        $quantity_arr = $req->quantity;
        $cost_arr = $req->cost;
        $discount_arr = $req->discount;
        $discount_type_arr = $req->discount_type;
        $total_arr = $req->total;
        $totalAmount = $req->totalAmount;
        $total_products = $req->totalProducts;
        $total_quantity = $req->totalQuantity;
        $total_cost = $req->totalAmount;

        for($i = 0; $i < count($product_arr); $i++) {
            $s = new Sale;
            $s->unique_id = md5($invoice_no).time();
            $s->invoice_no = $invoice_no;
            $s->customer = $customer;
            $s->date = $date;
            $s->product_id = $product_arr[$i];
            $s->product_name = $product_name_arr[$i];
            $s->quantity = $quantity_arr[$i];
            $s->cost = $cost_arr[$i];
            $s->total_product_cost = $total_arr[$i];
            $s->discount = $discount_arr[$i];
            $s->discount_type = $discount_type_arr[$i];
            $s->total_products = $total_products;
            $s->total_quantity = $total_quantity;
            $s->total_cost = $total_cost;
            $this->removeStock($product_arr[$i], $quantity_arr[$i]);
            $s->save();
        }
        return response()->json(['success' => true, 'msg' => 'Sale added successfully']); 
    }
    public function deleteSale(Request $req) {
        $sale = Sale::where('unique_id',$req->id)->get();
        foreach($sale as $s) {
            $product = Product::where('unique_id',$s->product_id)->first();
            $product->quantity = $product->quantity + $s->quantity;
            $product->save();
            $s->delete();
        }
         return response()->json(['success' => true, 'msg' => 'Sale deleted successfully']); 
    }
    public function updateSale(Request $req) {
        $sale = Sale::where('unique_id',$req->sale_id)->get();
        $unique_id = $req->sale_id;
        foreach($sale as $s) {
            $product = Product::where('unique_id',$s->product_id)->first();
            $product->quantity = $product->quantity + $s->quantity;
            $product->save();
            $s->delete();
        }

        $invoice_no = $req->invoice_no;
        $customer = $req->customer_name;
        $date = $req->date;
        $product_arr = $req->product;
        $product_name_arr = $req->product_name;
        $quantity_arr = $req->quantity;
        $cost_arr = $req->cost;
        $discount_arr = $req->discount;
        $discount_type_arr = $req->discount_type;
        $total_arr = $req->total;
        $totalAmount = $req->totalAmount;
        $total_products = $req->totalProducts;
        $total_quantity = $req->totalQuantity;
        $total_cost = $req->totalAmount;

        for($i = 0; $i < count($product_arr); $i++) {
            $s = new Sale;
            $s->unique_id = $unique_id;
            $s->invoice_no = $invoice_no;
            $s->customer = $customer;
            $s->date = $date;
            $s->product_id = $product_arr[$i];
            $s->product_name = $product_name_arr[$i];
            $s->quantity = $quantity_arr[$i];
            $s->cost = $cost_arr[$i];
            $s->total_product_cost = $total_arr[$i];
            $s->discount = $discount_arr[$i];
            $s->discount_type = $discount_type_arr[$i];
            $s->total_products = $total_products;
            $s->total_quantity = $total_quantity;
            $s->total_cost = $total_cost;
            $this->removeStock($product_arr[$i], $quantity_arr[$i]);
            $s->save();
        }
        return response()->json(['success' => true, 'msg' => 'Sale updated successfully']); 
    }
}
