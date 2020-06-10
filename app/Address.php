<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded=['id'];
    public function user(){
        return $this->belongsToMany(User::class,'address_user','user_id','address_id');
    }
}
