<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['id', 'categoryName', 'slug'];

    public function stock()
    {
        return $this->hasMany('App\Models\stock');

    }
}
