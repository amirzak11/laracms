<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded=['id'];
    public $timestamps = false;
    public function provinces()
    {
        return $this->belongsToMany(Province::class,'city_province','city_id','province_id');
    }

    public static function IdTitles()
    {
        return self::pluck('name', 'id')->toArray();
    }
}
