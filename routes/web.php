<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/setup', [HomeController::class, 'setup']);
Route::get('/', [HomeController::class, 'login']);
Route::get('/login', [HomeController::class, 'login']);
Route::get('/logout', [HomeController::class, 'logout']);
Route::get('/test', [HomeController::class, 'test']);

Route::get('/forget-password', [HomeController::class, 'forgetPassword']);
Route::post('/login', [HomeController::class, 'auth']);
Route::post('/setup', [HomeController::class, 'processSetup']);

Route::group(['middleware'=>'loginauth'],function(){
    // Main
    Route::get('/dashboard', [HomeController::class, 'dashboard']);
    Route::get('category/{action}/{id?}', [HomeController::class, 'manageCategory']);
    Route::get('product/{action}/{id?}', [HomeController::class, 'manageProduct']);
    Route::get('purchase/{action}/{id?}', [HomeController::class, 'managePurchase']);
    Route::get('sale/{action}/{id?}', [HomeController::class, 'manageSale']);
    Route::get('stock/{action}/{id?}', [HomeController::class, 'manageStock']);
    Route::get('report', [HomeController::class, 'manageReport']);
    Route::get('supplier/{action}/{id?}', [HomeController::class, 'manageSupplier']);
    Route::get('account', [HomeController::class, 'manageAccount']);
    Route::get('security', [HomeController::class, 'manageSecurity']);
    Route::get('logout', [HomeController::class, 'logout']);

    // Post Routes
    Route::post('save-category', [CategoryController::class, 'saveCategory']);
    Route::post('change-category-status', [CategoryController::class, 'changeCategoryStatus']);
    Route::post('delete-category', [CategoryController::class, 'deleteCategory']);
    Route::post('update-category', [CategoryController::class, 'updateCategory']);
    
    Route::post('save-product', [ProductController::class, 'saveProduct']);
    Route::post('change-product-status', [ProductController::class, 'changeProductStatus']);
    Route::post('delete-product', [ProductController::class, 'deleteProduct']);
    Route::post('update-product', [ProductController::class, 'updateProduct']);
    
    Route::post('save-supplier', [SupplierController::class, 'saveSupplier']);
    Route::post('change-supplier-status', [SupplierController::class, 'changeSupplierStatus']);
    Route::post('delete-supplier', [SupplierController::class, 'deleteSupplier']);
    Route::post('update-supplier', [SupplierController::class, 'updateSupplier']);

    // Ajax
    Route::get('get-product-from-code', [ProductController::class, 'getProductFromCode']);
    Route::post('save-purchase', [PurchaseController::class, 'savePurchase']);
    Route::post('save-sale', [SaleController::class, 'saveSale']);
});