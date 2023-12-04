<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Product;

class PurchaseController extends Controller
{
    public function addStock($product, $quantity) {
        $product = Product::where('unique_id', $product)->first();
        $product->quantity = $product->quantity + $quantity;
        $product->save();
        
    }

    public function savePurchase(Request $req) {
        $invoice_no = $req->invoice_no;
        $supplier = $req->supplier;
        $date = $req->date;
        $product_arr = $req->product;
        $product_name_arr = $req->product_name;
        $quantity_arr = $req->quantity;
        $cost_arr = $req->cost;
        $total_arr = $req->total;
        $totalAmount = $req->totalAmount;
        $total_products = $req->totalProducts;
        $total_quantity = $req->totalQuantity;
        $total_cost = $req->totalAmount;

        for($i = 0; $i < count($product_arr); $i++) {
            $p = new Purchase;
            $p->unique_id = md5($invoice_no).time();
            $p->invoice_no = $invoice_no;
            $p->supplier = $supplier;
            $p->date = $date;
            $p->product_id = $product_arr[$i];
            $p->product_name = $product_name_arr[$i];
            $p->quantity = $quantity_arr[$i];
            $p->cost = $cost_arr[$i];
            $p->total_product_cost = $total_arr[$i];
            $p->total_products = $total_products;
            $p->total_quantity = $total_quantity;
            $p->total_cost = $total_cost;
            $this->addStock($product_arr[$i], $quantity_arr[$i]);
            $p->save();
        }
        return response()->json(['success' => true, 'msg' => 'Purchase added successfully']); 
    }
    public function deletePurchase(Request $req) {
        $purchase = Purchase::where('unique_id',$req->id)->get();
        foreach($purchase as $p) {
            $product = Product::where('unique_id',$p->product_id)->first();
            $product->quantity = $product->quantity - $p->quantity;
            $product->save();
            $p->delete();
        }
         return response()->json(['success' => true, 'msg' => 'Purchase deleted successfully']); 
    }

    public function updatePurchase(Request $req) {
        $purchase = Purchase::where('unique_id',$req->purchase_id)->get();
        $unique_id = $req->purchase_id;
        foreach($purchase as $p) {
            $product = Product::where('unique_id',$p->product_id)->first();
            $product->quantity = $product->quantity - $p->quantity;
            $product->save();
            $p->delete();
        }
        $invoice_no = $req->invoice_no;
        $supplier = $req->supplier;
        $date = $req->date;
        $product_arr = $req->product;
        $product_name_arr = $req->product_name;
        $quantity_arr = $req->quantity;
        $cost_arr = $req->cost;
        $total_arr = $req->total;
        $totalAmount = $req->totalAmount;
        $total_products = $req->totalProducts;
        $total_quantity = $req->totalQuantity;
        $total_cost = $req->totalAmount;

        for($i = 0; $i < count($product_arr); $i++) {
            $p = new Purchase;
            $p->unique_id = $unique_id;
            $p->invoice_no = $invoice_no;
            $p->supplier = $supplier;
            $p->date = $date;
            $p->product_id = $product_arr[$i];
            $p->product_name = $product_name_arr[$i];
            $p->quantity = $quantity_arr[$i];
            $p->cost = $cost_arr[$i];
            $p->total_product_cost = $total_arr[$i];
            $p->total_products = $total_products;
            $p->total_quantity = $total_quantity;
            $p->total_cost = $total_cost;
            $this->addStock($product_arr[$i], $quantity_arr[$i]);
            $p->save();
        }
        return response()->json(['success' => true, 'msg' => 'Purchase updated successfully']); 
    }
}
