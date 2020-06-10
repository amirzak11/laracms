<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Information;
use App\Models\Product;
use App\Traits\brandsable;
use App\Traits\categories;
use App\Traits\property_product;
use Session;


use Illuminate\Http\Request;

class ProductController extends Controller
{

    use categories;
    use brandsable;
    use property_product;

    public function list($cat_id)
    {
        $information = Information::find(1);

        $categories = $this->category();
        $category = Category::find($cat_id);
        $brands = $category->brands;
        $products = $category->products;
        return view('frontend.products.list', compact('category', 'brands', 'products', 'categories','information'));
    }

    public function filter_search($brand_id, $cat_id)
    {
        $categories = $this->category();
        $brand_id = $brand_id;
        $category = Category::find($cat_id);
        $brands = $category->brands;
        $products = $category->products;
        return view('frontend.products.list', compact('category', 'brand_id', 'brands', 'products', 'categories'));
    }

    public function index($id)
    {
        $information = Information::find(1);

        $categories = $this->category();
        $product = Product::find($id);

        if (isset($product->categories)) {
            $category_parent = $product->categories;
        } else {
            $category_parent = null;
        }
        if (isset($product->brands)) {
            $brands = $product->brands;
        } else {
            $brands = null;
        }

        if (isset($product->properties)) {
            $properties = $product->properties;
        } else {
            $properties = null;
        }

        if (isset($product->content)) {
            $contents = $product->content;
        } else {
            $contents = null;
        }


        return view('frontend.products.view', compact('information','product', 'contents', 'categories', 'category_parent', 'brands', 'properties'));
    }

    public function GetAddToCart(Request $request, $id)
    {

        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return redirect()->route('frontend.home');
    }

    public function GetCart()
    {
        $categories = $this->category();

        $information = Information::find(1);

        if (!Session::has('cart')) {
            return view('frontend.shop.error',compact('information','categories'));
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        if(empty($cart->items)){
            return view('frontend.shop.error',compact('information','categories'));
        }
        $totalPrice = $cart->totalPrice;

        if (isset($products)) {
            foreach ($products as $value) {
                if (isset($value['discount'])) {
                    $price[] = $value['price'] - (($value['discount'] * $value['price']) / 100);
                } else {
                    $price[] = $value['price'];
                }
                $sum_price = array_sum($price);
            }
        }
        $product_model = Product::get();
        return view('frontend.shop.getting-cart', compact('information','products', 'sum_price', 'product_model', 'totalPrice','categories'));
    }

    public function RemoveCart(Request $request, $id)
    {

        $products = session('cart');

        foreach ($products as $key => $value) {
            if ($products->$key[$id]['qty'] > 1) {
                $products->items[$id]['qty'] = $products->items[$id]['qty'] - 1;
                $products->totalQty -= $products->items[$id]['qty'];
                return redirect()->back();
            } else if ($products->$key[$id]) {
                $products->totalPrice -= $products->totalPrice;
                $products->totalQty -= $products->items[$id]['qty'];
                unset($products->items[$id]);
            if(empty($products->items)){
                $request->session()->forget('cart');
            }

            }
        }


        //then you can redirect or whatever you need
        return redirect()->back();
    }

}
