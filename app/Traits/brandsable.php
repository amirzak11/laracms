<?php


namespace App\Traits;

use App\Models\Brand;

trait brandsable

{
    public function brands()
    {
        return $this->morphToMany(Brand::class,'brandsable');
    }
}
