<?php


namespace App\Traits;


use App\Models\Category;
use App\Models\Property;

trait property_product
{
    public function properties(){
        return $this->morphToMany(Property::class,'property_product');
    }

}
