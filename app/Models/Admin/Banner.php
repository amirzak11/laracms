<?php

namespace App\Models\Admin;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function images()
    {
        return $this->belongsToMany(Image::class,'bannersable','banner_id','image_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class,'bannersable','banner_id','category_id');
    }
}
