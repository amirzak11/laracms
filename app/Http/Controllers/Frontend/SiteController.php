<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Information;
use App\Models\Product;
use App\Traits\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class SiteController extends Controller
{
    use categories;
    public function my_site()
    {
        $categories = $this->category();
        $information = Information::find(1);
        if(!Auth::check()){
            return view('frontend.users.login',compact('information','categories'));
        }
        if (!Session::has('cart')) {
            $interests = Auth::user()->interest ;
            return view('frontend.my_site.view', compact('interests','information','categories'));
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $totalPrice = $cart->totalPrice;
        if ($products) {
            foreach ($products as $value) {
                if (isset($value['discount'])) {
                    $price[] = $value['price'] - (($value['discount'] * $value['price']) / 100);
                } else {
                    $price[] = $value['price'];
                }
            }
            $sum_price = array_sum($price);
        }
        $product_model = Product::get();

        $interests = Auth::user()->interest ;


        return view('frontend.my_site.view', compact('products','information', 'sum_price', 'product_model', 'categories','totalPrice','interests'));

    }
}
