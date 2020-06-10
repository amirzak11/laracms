<?php

namespace App\Model\Admin;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $guarded=['id'];
    public $timestamps = false;
    public function products()
    {
        return $this->belongsToMany(Product::class, 'content_product', 'content_id', 'product_id');
    }
}
