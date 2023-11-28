<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

use Str;

class CategoryController extends Controller
{
    public function saveCategory(Request $req) {
        // Check First
        $check = Category::where('name', $req->name)->first();
        if($check) {
            return response()->json(['success' => false, 'msg' => 'Category name already exists']); 
        }
        else {
            $category = new Category();
            $category->name = $req->name;
            $category->status = $req->status;
            $category->unique_id = md5($req->name).time();
            $category->slug = Str::slug($req->name);
            $category->save();
            return response()->json(['success' => true, 'msg' => 'Category saved successfully']); 
        }
    }
    public function changeCategoryStatus(Request $req) {
        $category = Category::find($req->id);
        $type = "";
        if($category->status == 1) {
            $category->status = 0;
            $type = "inactive";
        }
        else {
            $category->status = 1;
            $type = "active";
        }
        $category->save();
        return response()->json(['success' => true, 'msg' => 'Category Status updated successfully', 'type' => $type]); 
    }
    public function deleteCategory(Request $req) {
        $category = Category::find($req->id);
       $category->delete();
        return response()->json(['success' => true, 'msg' => 'Category deleted successfully']); 
    }

    public function updateCategory(Request $req) {
        // Check First
        $check = Category::where('name', $req->name)->where('id', '!=', $req->id)->first();
        if($check) {
            return response()->json(['success' => false, 'msg' => 'Category name already exists']); 
        }
        else {
            $category = Category::find($req->id);
            $category->name = $req->name;
            $category->status = $req->status;
            $category->slug = Str::slug($req->name);
            $category->save();
            return response()->json(['success' => true, 'msg' => 'Category updated successfully']); 
        }
    }
}
