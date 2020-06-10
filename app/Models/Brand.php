<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table='brands';
    protected $primaryKey='id';
    protected $guarded=['id'];
    public $timestamps=false;

    public static function BrandIdTitles()
    {
        return self::pluck('name','id')->toArray();
    }
    public function images()
    {
        return $this->belongsToMany(Image::class,'brand_image','brand_id','image_id');
    }
    public function categories(){
        return $this->morphedByMany(Category::class,'brandsable');
    }
}
