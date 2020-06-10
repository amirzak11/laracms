<?php

namespace App\Models\Admin;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded=[];
    public function images()
    {
        return $this->belongsToMany(Image::class,'article_image','article_id','image_id');
    }

}
