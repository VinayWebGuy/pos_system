<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Str;
class ProductController extends Controller
{
    public function saveProduct(Request $req) {
        // Check First
        $check = Product::where('name', $req->name)->where('category', $req->category)->first();
        if($check) {
            return response()->json(['success' => false, 'msg' => 'Product name already exists']); 
        }
        else {
            $product = new Product();
            $product->name = $req->name;
            $product->status = $req->status;
            $product->category = $req->category;
            $product->quantity = $req->quantity;
            $product->buying_price = $req->buying_price;
            $product->selling_price = $req->selling_price;
            $product->discount_type = $req->discount_type;
            $product->discount = $req->discount;
            $product->unique_id = md5($req->name).$req->category.time();
            $product->slug = Str::slug($req->name);
            $arr = []; 
            if ($req->hasFile('files')){
                $files = $req->file('files');
                foreach ($files as $file){
                    $filename = time().'-'.$file->getClientOriginalName();
                    $location = 'assets/images/products';
                    $file->move($location,$filename);
                    $arr[] = $filename;
                }
                $product_file = implode(",", $arr);
            }
            else{
                $product_file = '';
            }
            $product->images = $product_file;
            $product->save();
            return response()->json(['success' => true, 'msg' => 'Product saved successfully']); 
        }
    }
    public function changeProductStatus(Request $req) {
        $product = Product::find($req->id);
        $type = "";
        if($product->status == 1) {
            $product->status = 0;
            $type = "inactive";
        }
        else {
            $product->status = 1;
            $type = "active";
        }
        $product->save();
        return response()->json(['success' => true, 'msg' => 'Product Status updated successfully', 'type' => $type]); 
    }
    public function deleteProduct(Request $req) {
        $product = Product::find($req->id);
        if ($product) {
            $images = $product->images;
            if ($images) {
                $new_images = explode(',', $images);
                foreach ($new_images as $image) {
                    $imagePath = public_path('assets/images/products/' . $image); 
                    if (file_exists($imagePath)) {
                        unlink($imagePath); 
                    }
                }
            }
            $product->delete();
            return response()->json(['success' => true, 'msg' => 'Product deleted successfully']); 
        } else {
            return response()->json(['success' => false, 'msg' => 'Product not found']); 
        }
    }
    public function updateProduct(Request $req) {
        $product = Product::find($req->id);
        if (!$product) {
            return response()->json(['success' => false, 'msg' => 'Product not found']); 
        }
        $newImages = $req->file('files');
        if ($newImages) {
            $previousImages = $product->images; 
            if ($previousImages) {
                $previousImagesArray = explode(',', $previousImages);
                foreach ($previousImagesArray as $previousImage) {
                    $imagePath = public_path('assets/images/products/' . $previousImage);
                    if (file_exists($imagePath)) {
                        unlink($imagePath); 
                    }
                }
            }
        }
        $product->name = $req->name;
        $product->status = $req->status;
        $product->category = $req->category;
        $product->quantity = $req->quantity;
        $product->buying_price = $req->buying_price;
        $product->selling_price = $req->selling_price;
        $product->discount_type = $req->discount_type;
        $product->discount = $req->discount;
        $product->slug = Str::slug($req->name);
        $arr = []; 
        if ($newImages) {
            foreach ($newImages as $file){
                $filename = time() . '-' . $file->getClientOriginalName();
                $location = 'assets/images/products';
                $file->move($location, $filename);
                $arr[] = $filename;
            }
            $product_file = implode(",", $arr);
            $product->images = $product_file;
        }
        $product->save();
        return response()->json(['success' => true, 'msg' => 'Product updated successfully']); 
    }

    public function getProductFromCode(Request $req) {
       $product = Product::where('unique_id', $req->code)->first();
       return response()->json([
        'product' => $product
    ]);
    }

     
}
