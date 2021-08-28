<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'order_details';
    protected $fillable = ['product_name', 'order_id', 'product_id', 'qty', 'unitprice', 'payment_method', 'date'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function Order()
    {
        return $this->hasMany(Order::class, 'id');
    }
}
