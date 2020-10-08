<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table="product_categories";
    protected $primaryKey ="id";

    public function parent_category()
    {
        return $this->hasOne('App\Models\ProductCategory','id','parent');
    }
}
