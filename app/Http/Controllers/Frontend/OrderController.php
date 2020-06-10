<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Information;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\User;
use App\Traits\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    use categories;
    public function index()
    {

        return view('frontend.order.shopping_cart');
    }

    public function post_information()
    {
        if (!Auth::check()) {
            return redirect()->route('frontend.user.login');
        }
        if (!Session::has('cart')) {
            return 'محصولی انتخاب نشده است';
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
        return view('frontend.order.post_information', compact('products', 'sum_price', 'product_model', 'totalPrice'));
    }

    public function order_register(Request $request)
    {
        /*save order information */
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
        $user_item = User::find(Auth::user()->id);
        /*save Order details*/
        $input = [
            'order_number' => 'ET_' . rand(1255, 3545),
            'user_id' => $user_item->id,
            'order_date' => $request->input('today'),
            'shipped_date' => $request->input('day'),
            'ship_via' => 'پست',
            'ship_name' => $request->input('name'),
            'ship_address' => $request->input('address'),
            'ship_postal_code' => $request->input('zip_code'),
        ];
        $new_order_object = Order::create($input);

        /*save the send order information*/
        foreach ($products as $product) {
            $input_details = [
                'order_id' => $new_order_object->id,
                'product_id' => $product['item']['id'],
                'unit_price' => $product['price'],
                'quantity' => $product['qty'],
                'discount' => $product['discount'],

            ];
            $new_order_details_object = OrderDetails::create($input_details);
        }
        session()->forget('cart');
        return redirect()->route('frontend.product.cart_container')->with('success', 'محصولات انتخابی ثبت شد به زودی از اتصال آنلاین جهت پیش فاکتور با شما تماس گرفته میشود ');
    }

    public function post_payment(Request $request)
    {

        if (!Auth::check()) {

            return redirect()->route('frontend.user.login');
        }
        if (!Session::has('cart')) {
            return 'محصولی انتخاب نشده است';
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
        return view('frontend.order.post_payment', compact('products', 'sum_price', 'product_model', 'totalPrice'));
    }


    public function view()
    {

        $categories = $this->category();
        $information = Information::find(1);
        $user_item = User::find(Auth::user()->id);
        $orders = Order::where('user_id','LIKE','%'.$user_item->id.'%')->get();

        return view('frontend.order.view',compact('information','orders','categories','user_item'));
    }

    public function details($order_id)
    {
        $i=1;
        $categories = $this->category();
        $information = Information::find(1);
        $orders = OrderDetails::where('order_id','LIKE','%'.$order_id.'%')->get();
        return view('frontend.order.details',compact('orders','information','categories','i'));
    }
}
