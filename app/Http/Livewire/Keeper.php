<?php

namespace App\Http\Livewire;

use App\Models\Stock;
use Livewire\Component;

class Keeper extends Component
{
    public $count = 0;


    public function mount()
    {
        $this->count;
    }

    public function IncrementQty($id)
    {
        $this->count++;
        $carts = stock::find($id);
        $carts->increment('stock_alert', 1);
        // $carts->increment('item_taken', 1);
        $this->mount();
    }

    public function DecrementQty($id)
    {
        $this->count--;
        $carts = stock::find($id);
        $carts->decrement('stock_alert', 1);
        // $carts->decrement('item_taken', 1);

        $this->mount();
    }



    public function render()
    {
        $store = Stock::all();
        return view('livewire.keeper', ['store' => $store]);
    }
}
