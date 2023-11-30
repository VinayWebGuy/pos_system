<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function savePurchase(Request $req) {
        $invoice_no = $req->invoice_no;
        $supplier = $req->supplier;
        $date = $req->date;
        $product_arr = $req->product;
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
            $p->quantity = $quantity_arr[$i];
            $p->cost = $cost_arr[$i];
            $p->total_product_cost = $total_arr[$i];
            $p->total_products = $total_products;
            $p->total_quantity = $total_quantity;
            $p->total_cost = $total_cost;
            $p->save();
        }

    }
}
