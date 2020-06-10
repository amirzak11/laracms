<?php

namespace App\Models;

use App\Address;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Subscribe;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    const USER = 0;
    const ADMIN = 1;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function addresses()
    {
        return $this->belongsToMany(Address::class,'address_user','user_id','address_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'payment_user_id');
    }
    public function interest()
    {
        return $this->belongsToMany(Product::class,'product_user','user_id','product_id');
    }
    public function subscribes()
    {
        return $this->hasMany(Subscribe::class, 'subscribe_id');
    }

    /*
 * public function packages(){
        return $this->belongsToMany(Package::class,'user_package','user_id','package_id')->withPivot(['amount','created_at']);
    }*/

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'user_package', 'user_id', 'package_id')->withPivot(['amount', 'created_at']);
    }
}
