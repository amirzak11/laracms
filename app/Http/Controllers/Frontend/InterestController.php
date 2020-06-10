<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterestController extends Controller
{
    public function add($product_id)
    {
        $information = Information::find(1);
        if (!Auth::check()) {
            return redirect()->route('frontend.user.login');
        }
        $product_item = Product::find($product_id);
        $user_item = User::find(Auth::user()->id);
        if ($user_item instanceof User) {
            if (!$user_item->interest()->find($product_item->id)) {
                $user_item->interest()->attach($product_item->id);
                return redirect()->back();
            }
            return redirect()->back();
        }
    }
    public function view(){
        $information = Information::find(1);
        $interests = Auth::user()->interest ;

        return view('frontend.interest.view',compact('interests','information'));

    }
}
