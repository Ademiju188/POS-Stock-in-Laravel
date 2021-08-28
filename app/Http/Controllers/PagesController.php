<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            if (session('errorForm')) {
                $html = "<ul style='list-style: none;'>";
                foreach (session('errorForm') as $error) {
                    $html .= "<li>$error[0]</li>";
                }
                $html .= "</ul>";

                Alert::html('Error during the creation!', $html, 'error');
            }



            return $next($request);
        });
    }

    public function logout()
    {
        $user = User::all();
        return view('auth.logout', ['user' => $user]);
    }


    public function stockcategory()
    {
        $category = Category::all();
        return view('admin.category.stock-category', ['categories' => $category]);
    }

    public function managerstockcategory()
    {
        $category = Category::all();
        return view('manager.category.stock-category', ['categories' => $category]);
    }

    public function storekeeperstockcategory()
    {
        $category = Category::all();
        return view('storekeeper.category.stock-category', ['categories' => $category]);
    }

    public function productcategory()
    {
        $category = ProductCategory::all();
        return view('admin.category.product-category', ['categories' => $category]);
    }

    public function managerproductcategory()
    {
        $category = ProductCategory::all();
        return view('manager.category.product-category', ['categories' => $category]);
    }

    public function pos()
    {
        $product = Product::all();
        $category = ProductCategory::all();
        $cart = Cart::all();
        $lastId = OrderDetails::max('order_id');
        $receipt = OrderDetails::where('order_id', $lastId)->get();
        $total = Order::join('order_details', 'order_details.order_id', '=',  'orders.id' )->where('order_id', $lastId)->get();
        $order = Order::all();
        return view('admin.pos.index', ['order' => $order,'products' => $product, 'categories' => $category, 'carts' => $cart, 'order_receipt' => $receipt, 'totalprice' => $total]);
    }

    public function managerpos()
    {
        $product = Product::all();
        $category = ProductCategory::all();
        $cart = Cart::all();
        $lastId = OrderDetails::max('order_id');
        $receipt = OrderDetails::where('order_id', $lastId)->get();
        $total = Order::join('order_details', 'order_details.order_id', '=',  'orders.id' )->where('order_id', $lastId)->get();
        $order = Order::all();
        return view('manager.pos.index', ['order' => $order,'products' => $product, 'categories' => $category, 'carts' => $cart, 'order_receipt' => $receipt, 'totalprice' => $total]);
    }

    public function staffpos()
    {
        $product = Product::all();
        $category = ProductCategory::all();
        $cart = Cart::all();
        $lastId = OrderDetails::max('order_id');
        $receipt = OrderDetails::where('order_id', $lastId)->get();
        $total = Order::join('order_details', 'order_details.order_id', '=',  'orders.id' )->where('order_id', $lastId)->get();
        $order = Order::all();
        return view('staff.pos.index', ['order' => $order,'products' => $product, 'categories' => $category, 'carts' => $cart, 'order_receipt' => $receipt, 'totalprice' => $total]);
    }

    public function stockindex()
    {
        $stock = Stock::all();
        $category = Category::all();
        return view('admin.stock.index', ['stocks' => $stock, 'categories' => $category]);
    }
    public function stockcreate()
    {
        $stock = Stock::all();
        $category = Category::all();
        return view('admin.stock.create', ['stocks' => $stock, 'categories' => $category]);
    }
    public function stockoutofstock()
    {
        $out =  DB::select('select * from stocks where stock_alert <= 20');
        $category = Category::all();
        return view('admin.stock.outofstock', ['outs' => $out, 'categories' => $category]);
    }

    public function managerstockindex()
    {
        $stock = Stock::all();
        $category = Category::all();
        return view('manager.stock.index', ['stocks' => $stock, 'categories' => $category]);
    }
    public function managerstockcreate()
    {
        $stock = Stock::all();
        $category = Category::all();
        return view('manager.stock.create', ['stocks' => $stock, 'categories' => $category]);
    }
    public function managerstockoutofstock()
    {
        $out =  DB::select('select * from stocks where stock_alert <= 20');
        $category = Category::all();
        return view('manager.stock.outofstock', ['outs' => $out, 'categories' => $category]);
    }

    public function storekeeperstockindex()
    {
        $stock = Stock::all();
        $category = Category::all();
        return view('storekeeper.stock.index', ['stocks' => $stock, 'categories' => $category]);
    }
    public function storekeeperstockcreate()
    {
        $stock = Stock::all();
        $category = Category::all();
        return view('storekeeper.stock.create', ['stocks' => $stock, 'categories' => $category]);
    }
    public function storekeeperstockoutofstock()
    {
        $out =  DB::select('select * from stocks where stock_alert <= 20');
        $category = Category::all();
        return view('storekeeper.stock.outofstock', ['outs' => $out, 'categories' => $category]);
    }


    public function supplierindex()
    {
        $supplier = Supplier::all();
        return view('admin.supplier.index', ['suppliers' => $supplier]);
    }
    public function suppliercreate()
    {
        $supplier = Supplier::all();
        return view('admin.supplier.create', ['suppliers' => $supplier]);
    }

    public function userindex()
    {
        $user = User::all();
        return view('admin.user.index', ['users' => $user]);
    }
    public function usercreate()
    {
        $user = User::all();
        return view('admin.user.create', ['users' => $user]);
    }

    public function storekeeper()
    {
        return view('admin.storekeeper.index');
    }

    public function generalstorekeeper()
    {
        return view('storekeeper.index');
    }

    public function productcreate()
    {
        $category = ProductCategory::all();
        return view('admin.product.create', ['categories' => $category]);
    }

    public function productindex()
    {
        $category = ProductCategory::all();
        $product = Product::orderBy('created_at', 'desc')->get();
        return view('admin.product.index', ['categories' => $category, 'products' => $product]);
    }
    public function productoutofproduct(){
        $remaining = DB::select('select * from products where quantity <= 20');
        return view('admin.product.manage-product', ['items' => $remaining]);
    }


    public function managerproductcreate()
    {
        $category = ProductCategory::all();
        return view('manager.product.create', ['categories' => $category]);
    }

    public function managerproductindex()
    {
        $category = ProductCategory::all();
        $product = Product::orderBy('created_at', 'desc')->get();
        return view('manager.product.index', ['categories' => $category, 'products' => $product]);
    }
    public function managerproductoutofproduct(){
        $remaining = DB::select('select * from products where quantity <= 20');
        return view('manager.product.manage-product', ['items' => $remaining]);
    }

    public function dailyreport()
    {
        $daily = OrderDetails::whereDate('created_at', date('Y-m-d'))->orderBy('created_at', 'desc')->get();
        return view('admin.report.daily', ['daily' => $daily]);
    }

    public function previousreport(Request $request)
    {
        $order = OrderDetails::where('date', '=', $request->filter)->get();
        $count = DB::table('order_details')->whereDate('date', '=', $request->filter)->sum('unitprice');
        return view('admin.report.daily', ['daily' => $order], compact('count'));
    }

    public function monthlyreport()
    {
        $month = DB::select('select year(date) as year, month(date) as month, sum(unitprice) as total_amount from order_details group by year(date), month(date)');
        return view('admin.report.monthly', ['month' => $month]);
    }

}
