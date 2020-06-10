<?php

namespace App\Models;

use App\Models\Admin\Banner;
use App\Models\Admin\Bannersable;
use App\Traits\categories;
use App\Traits\brandsable;
use App\Traits\category_property;
use App\Traits\property_product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model

{
    use categories;
    use brandsable;
    use property_product;

    protected $table = 'categories';
    protected $appends = [
        'categories'
    ];

    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function packages()
    {
        return $this->morphedByMany(Package::class, 'categorizable');
    }

    public function files()
    {
        return $this->morphedByMany(File::class, 'categorizable');
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'categorizable');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'category_id')->with('categories');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id')->with('categories');
    }

    public static function IdTitles()
    {
        return self::pluck('title', 'id')->toArray();
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'property_category', 'category_id', 'property_id');
    }

    public function banners()
    {
        return $this->belongsToMany(Bannersable::class, 'bannersable');
    }


}
