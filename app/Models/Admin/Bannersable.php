<?php

namespace App\Models\Admin;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;

class Bannersable extends Model
{
    protected $primaryKey=['banner_id'];
    protected $table='bannersable';
    protected $fillable=['banner_id','image_id','category_id'];
    public $timestamps=false;


    public function images()
    {
        return $this->belongsToMany(Image::class,'bannersable');
    }
    public function banner()
    {
        return $this->belongsToMany(Banner::class,'bannersable');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class,'bannersable','id','category_id');
    }
}
