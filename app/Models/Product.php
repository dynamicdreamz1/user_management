<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="products";
    protected $primaryKey ="id";

    public function category()
    {
        return $this->hasOne('App\Models\ProductCategory','id','category_id');
    }
}
