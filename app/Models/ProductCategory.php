<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_categories';
    protected $fillable = ['id', 'name', 'slug'];

    public function product()
    {
        return $this->hasMany('App\Models\Product');

    }
    
   
}
