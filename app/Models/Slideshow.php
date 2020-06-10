<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    protected $guarded=['id'];
    protected $fillable=['name','description','title','type','size'];

}
