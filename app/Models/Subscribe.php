<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $dates=['subscribe_expired_at'];
    protected $guarded=['subscrbe_id'];

    public function user(){
        return $this->belongsTo(User::class,'subscribe_user_id');
    }
}
