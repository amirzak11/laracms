<?php

namespace App\Models;

use App\Models\Admin\Article;
use App\Models\Admin\Banner;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded=['id'];

    public function products()
    {
        return $this->belongsToMany(Product::class,'image_product','image_id','product_id');
    }
    public function articles()
    {
        return $this->belongsToMany(Article::class,'article_image','image_id','article_id');
    }
    public function brands()
    {
        return $this->belongsToMany(Brand::class,'brand_image','image_id','brand_id');
    }

    public function banners()
    {
        return $this->belongsToMany(Banner::class,'bannersable','image_id','banner_id');
    }

}

