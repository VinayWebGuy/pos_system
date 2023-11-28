<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Setup;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Session;



class HomeController extends Controller
{
    public function setup() {
        // Check the data exists or not
        $check = Setup::count();
        if($check > 0) {
            return redirect('login');
        }
        else {
            return view('setup'); 
        }
    }
    public function login() {
        // Check the data exists or not
        $check = Setup::first();
        if(!$check) {
            return redirect('setup');
        }
        else {
            if(Session::has('business_email') && Session::get('business_email') == $check->business_email) {
                return redirect('dashboard');
            }
            else {
                return view('login', compact('check')); 
            }
        }
    }
    public function forgetPassword() {
        // Check the data exists or not
        $check = Setup::first();
        if(!$check) {
            return redirect('setup');
        }
        else {
            return view('forgetPassword', compact('check')); 
        }
    }
    public function processSetup(Request $req) {
        $s = new Setup();
        $s->business_name = $req->business_name;
        $s->business_email = $req->business_email;
        $s->business_address = $req->business_address;
        $s->full_name = $req->full_name;
        $s->mobile = $req->mobile;
        $s->state = $req->state;
        $s->city = $req->city;
        $s->notifications = $req->notifications;
        $s->preferred_system = $req->preferred_system;
        $s->currency = $req->currency;
        $password = rand(100000, 999999);
        $s->pwd = md5($password);
        $s->save();
        session()->flash('success', $password);
        return redirect('login');
    }
    public function dashboard() {
        return view('main.dashboard');
    }
    public function manageCategory($action, $id="") {
        if($action == "all") {
            $category = Category::orderBy('name', 'ASC')->paginate(15);
            return view('main.category.all-category', compact('category'));
        }
        else if($action == "add") {
            return view('main.category.add-category');
        }
        else if($action == "edit" && $id!="") {
            $category = Category::where('unique_id',$id)->first();
            return view('main.category.edit-category', compact('category'));
        }
    }
    public function manageProduct($action, $id="") {
        if($action == "all") {
            $check = Setup::first();
            $products = Product::orderBy('name', 'ASC')->paginate(15);
            return view('main.product.all-product', compact('products', 'check'));
        }
        else if($action == "add") {
            $category = Category::orderBy('name', 'ASC')->where('status', 1)->get();
            return view('main.product.add-product', compact('category'));
        }
        else if($action == "edit" && $id!="") {
            $category = Category::orderBy('name', 'ASC')->where('status', 1)->get();
            $product = Product::where('unique_id',$id)->first();
            return view('main.product.edit-product', compact('product','category'));
        }
    }
    public function managePurchase($action, $id="") {
        if($action == "all") {
            return view('main.purchase.all-purchase');
        }
        else if($action == "add") {
            $suppliers = Supplier::orderBy('name', 'ASC')->where('status', 1)->get();
            $products = Product::orderBy('name', 'ASC')->where('status', 1)->get();
            return view('main.purchase.add-purchase', compact('suppliers', 'products'));
        }
    }
    public function manageSale($action, $id="") {
        if($action == "all") {
            return view('main.sale.all-sale');
        }
        else if($action == "add") {
            return view('main.sale.add-sale');
        }
    }
    public function manageStock($action, $id="") {
        if($action == "all") {
            return view('main.stock.all-stock');
        }
        else if($action == "add") {
            return view('main.stock.add-stock');
        }
    }
    public function manageReport() {
       return view('main.report');
    }
    public function manageSupplier($action, $id="") {
        if($action == "all") {
            $suppliers = Supplier::orderBy('name', 'ASC')->paginate(15);
            return view('main.supplier.all-supplier', compact('suppliers'));
        }
        else if($action == "add") {
            return view('main.supplier.add-supplier');
        }
        else if($action == "edit" && $id!="") {
            $supplier = Supplier::where('unique_id',$id)->first();
            return view('main.supplier.edit-supplier', compact('supplier'));
        }
    }
    public function manageAccount() {
        return view('main.account');
     }
    public function manageSecurity() {
        return view('main.security');
     }
    public function test(Request $req) {
        dd($req->session());
     }
     public function auth(Request $req) {
        $check = Setup::where('business_email', $req->email)->where('pwd', md5($req->password))->first();
        if($check) {
            session()->put('business_email', $check->business_email);
            session()->put('business_name', $check->business_name);
            session()->put('full_name', $check->full_name);
            session()->put('mobile', $check->mobile);
            return redirect('dashboard');
        }
        else {
            session()->flash('error', "Invalid details.");
            return redirect()->back();
        }
     }
    public function logout() {
        session()->forget('business_email');
        session()->forget('business_name');
        session()->forget('full_name');
        session()->forget('mobile');
        return redirect('login');
     }
}