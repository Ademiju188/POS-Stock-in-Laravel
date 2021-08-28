<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderDetailsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/manager/dashboard', [App\Http\Controllers\DashboardController::class, 'manager'])->name('managerdashboard');
Route::get('/storekeeper/dashboard', [App\Http\Controllers\DashboardController::class, 'storekeeper'])->name('storekeeperdashboard');
Route::get('/staff/dashboard', [App\Http\Controllers\DashboardController::class, 'staff'])->name('staffdashboard');

Route::get('/auth/logout', [PagesController::class, 'logout']);

Route::get('/admin/pos/index', [PagesController::class, 'pos']);
Route::get('/manager/pos/index', [PagesController::class, 'managerpos']);
Route::get('/staff/pos/index', [PagesController::class, 'staffpos']);


Route::get('/admin/category/stock-category', [PagesController::class, 'stockcategory']);
Route::get('/admin/category/product-category', [PagesController::class, 'productcategory']);

Route::get('/manager/category/stock-category', [PagesController::class, 'managerstockcategory']);
Route::get('/manager/category/product-category', [PagesController::class, 'managerproductcategory']);

Route::get('/storekeeper/category/stock-category', [PagesController::class, 'storekeeperstockcategory']);



Route::get('/admin/stock/index', [PagesController::class, 'stockindex']);
Route::get('/admin/stock/create', [PagesController::class, 'stockcreate']);
Route::get('/admin/stock/outofstock', [PagesController::class, 'stockoutofstock']);

Route::get('/manager/stock/index', [PagesController::class, 'managerstockindex']);
Route::get('/manager/stock/create', [PagesController::class, 'managerstockcreate']);
Route::get('/manager/stock/outofstock', [PagesController::class, 'managerstockoutofstock']);

Route::get('/storekeeper/stock/index', [PagesController::class, 'storekeeperstockindex']);
Route::get('/storekeeper/stock/create', [PagesController::class, 'storekeeperstockcreate']);
Route::get('/storekeeper/stock/outofstock', [PagesController::class, 'storekeeperstockoutofstock']);


Route::get('/admin/supplier/index', [PagesController::class, 'supplierindex']);
Route::get('/admin/supplier/create', [PagesController::class, 'suppliercreate']);


Route::get('/admin/user/index', [PagesController::class, 'userindex']);
Route::get('/admin/user/create', [PagesController::class, 'usercreate']);


Route::get('/admin/storekeeper/index', [PagesController::class, 'storekeeper']);
Route::get('/storekeeper/index', [PagesController::class, 'generalstorekeeper']);


Route::get('/admin/product/create', [PagesController::class, 'productcreate']);
Route::get('/admin/product/index', [PagesController::class, 'productindex']);
Route::get('/admin/product/manage-product', [PagesController::class, 'productoutofproduct']);

Route::get('/manager/product/create', [PagesController::class, 'managerproductcreate']);
Route::get('/manager/product/index', [PagesController::class, 'managerproductindex']);
Route::get('/manager/product/manage-product', [PagesController::class, 'managerproductoutofproduct']);


Route::get('/admin/report/daily', [PagesController::class, 'dailyreport']);
Route::post('/admin/report/previous', [PagesController::class, 'previousreport']);
Route::get('/admin/report/monthly', [PagesController::class, 'monthlyreport']);


Route::resource('product', ProductController::class);
Route::resource('category', CategoryController::class);
Route::resource('product-category', ProductCategoryController::class);
Route::resource('stock', StockController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('user', UserController::class);
Route::resource('cart', CartController::class);
Route::resource('order', OrderDetailsController::class);

