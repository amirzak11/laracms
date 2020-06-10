<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $guarded=['id'];
    public function cites()
    {
        return $this->belongsToMany(City::class, 'city_province', 'province_id','city_id');
    }

    public function properties()
    {
        return $this->belongsToMany(City::class, 'city_province', 'province_id', 'city_id');
    }

    public static function IdTitles()
    {
        return self::pluck('name', 'id')->toArray();
    }
}
