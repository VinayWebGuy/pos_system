<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function saveSupplier(Request $req) {
          // Check First
          $check = Supplier::where('name', $req->name)->where('email', $req->email)->first();
          if($check) {
              return response()->json(['success' => false, 'msg' => 'Supplier name already exists']); 
          }
          else {
              $supplier = new Supplier();
              $supplier->name = $req->name;
              $supplier->email = $req->email;
              $supplier->mobile = $req->mobile;
              $supplier->city = $req->city;
              $supplier->state = $req->state;
              $supplier->status = $req->status;
              $supplier->unique_id = md5($req->email).time();
              $supplier->save();
              return response()->json(['success' => true, 'msg' => 'Supplier saved successfully']); 
          }
    }
    public function changeSupplierStatus(Request $req) {
        $supplier = Supplier::find($req->id);
        $type = "";
        if($supplier->status == 1) {
            $supplier->status = 0;
            $type = "inactive";
        }
        else {
            $supplier->status = 1;
            $type = "active";
        }
        $supplier->save();
        return response()->json(['success' => true, 'msg' => 'Supplier Status updated successfully', 'type' => $type]); 
    }
    public function deleteSupplier(Request $req) {
        $supplier = Supplier::find($req->id);
       $supplier->delete();
        return response()->json(['success' => true, 'msg' => 'Supplier deleted successfully']); 
    }
    public function updateSupplier(Request $req) {
        // Check First
        $check = Supplier::where('name', $req->name)->where('email', $req->email)->where('id', '!=', $req->id)->first();
        if($check) {
            return response()->json(['success' => false, 'msg' => 'Supplier name already exists']); 
        }
        else {
            $supplier = Supplier::find($req->id);
            $supplier->name = $req->name;
            $supplier->email = $req->email;
            $supplier->mobile = $req->mobile;
            $supplier->city = $req->city;
            $supplier->state = $req->state;
            $supplier->status = $req->status;
            $supplier->save();
            return response()->json(['success' => true, 'msg' => 'Supplier updated successfully']); 
        }
    }
}
