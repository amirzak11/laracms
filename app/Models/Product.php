<?php

namespace App\Models;

use App\Model\Admin\Content;
use App\Traits\brandsable;
use App\Traits\property_product;
use Illuminate\Database\Eloquent\Model;
use App\Traits\categoriesable;
use Laravel\Scout\Searchable;

class Product extends Model
{

    use categoriesable;
    use brandsable;
    use property_product;
    protected $guarded = ['id'];
    protected $fillable = ['name', 'description', 'seller', 'warranty', 'price', 'discount',];


    public function images()
    {
        return $this->belongsToMany(Image::class,'image_product','product_id','image_id');
    }
    public function properties()
    {
        return $this->belongsToMany(Property::class,'property_product','product_id','property_id');
    }
    public function user(){
        return $this->belongsToMany(User::class,'product_user','user_id','product_id');
    }

    public function content()
    {
        return $this->belongsToMany(Content::class,'content_product','product_id','content_id');
    }
}
