<?php


namespace App\Traits;


use App\Models\Category;

trait categoriesable
{
    public function categories(){
        return $this->morphToMany(Category::class,'categorizable');
    }
}
