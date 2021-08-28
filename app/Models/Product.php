<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';


    protected $fillable = ['product_name', 'description', 'category_id', 'price', 'quantity', 'product_img'];


    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory');

    }

    public function cart()
    {
        return $this->hasMany('App\Models\Cart');
    }

     public function order()
    {
        return $this->hasMany('App\Models\OrderDetails');
    }

     public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function($query) use ($term){
            $query->where('product_name', 'like', $term)->orWhere('category_id', 'like', $term);

        });
    }
}
