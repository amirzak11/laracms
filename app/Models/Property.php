<?php

namespace App\Models;

use App\Traits\brandsable;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    protected $guarded=['id'];
    public $timestamps=false;

    public function products()
    {
        return $this->belongsToMany(Product::class,'property_product','property_id','product_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class,'property_category','property_id','category_id');
    }

}
