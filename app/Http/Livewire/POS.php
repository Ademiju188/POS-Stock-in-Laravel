<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class POS extends Component
{
    // public $products = [];
    // public $categories = [];
    public $carts;
    public $name;
    public $quantity;
    public $product_id;
    public $price;
    public $Payment = '';
    public $balance = [];
    public $receipt = '';
    public $order = [];
    public $count = 0;
    public $byCategory = null;
    public $search;
    public $perPage = 10;
    public $orderBy = 'product_name';
    public $sortBy = 'asc';
    public $status = null;

    public function mount(){
        // $this->products = Product::all();
        // $this->categories = ProductCategory::all();
        $this->carts = Cart::orderBy('created_at', 'desc')->get();
        $this->count;
    }

     public function DeleteCart($id){
         $delete = Cart::find($id);
         $delete->delete();
         $this->carts = $this->carts->except($id);
     }

    public function IncrementQty($id){
        $this->count++;
        $cart = Product::find($id);
        if($cart->quantity < 0 || $cart->quantity == 0)
        {
            return session()->flash('error', 'Product quantitty has been exhausted, Please restock!');
        }
        if($this->count < 0 || $this->count == 0){
            return session()->flash('error', 'Product quantitty cannot be less than Zero');
        }
        $cart->decrement('quantity', 1);
        $this->mount();

    }


    public function DecrementQty($id){
        $this->count--;
        $cart = Product::find($id);
        if($cart->quantity < 0 || $cart->quantity == 0)
        {
            return session()->flash('error', 'Product quantitty has been exhausted, Please restock!');
        }
        if($this->count < 0){
            return session()->flash('error', 'Product quantitty cannot be less than Zero');
        }
        $cart->increment('quantity', 1);

        $this->mount();

    }

    // public function byCategory($id)
    // {
    //     $this->status = $id;



    // }


    public function render()
    {
        if($this->Payment != ''){
            $totalSum = $this->Payment - $this->carts->sum('price');
            $this->balance = $totalSum;

        }

        $lastId = OrderDetails::max('order_id');
        $order = Order::all();
        $receipts = Order::join('order_details', 'order_details.order_id', '=',  'orders.id' )->where('order_id', $lastId)->get();
        $category = ProductCategory::all();


        // $products = Product::when($this->status, function($query, $id){
        //     // dd($id);
        //     $query->where('category_id', $id);

        // })->get();

        $products = Product::when($this->byCategory, function($query){
            $query->where('category_id', $this->byCategory);
        })->search(trim($this->search))->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return view('livewire.p-o-s', ['orderDetails' => $order,'order_receipt' => $receipts, 'products' => $products,'categories' => $category
        ]);
    }
}
