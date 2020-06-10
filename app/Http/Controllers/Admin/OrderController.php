<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list()
    {
        $orders = Order::get();
        return view('admin.order.list', compact('orders'))->with(['panel_heading' => 'لیست سفارشات']);
    }

    public function delete($order_id)
    {
        if ($order_id && ctype_digit($order_id)) {
            $order_item = Order::find($order_id);
            OrderDetails::where('order_id', $order_id)->delete();
            if ($order_item && $order_item instanceof Order) {
                $order_item->delete();
                return redirect()->route('admin.order.list')->with('success', '  حذف گردید');
            }
        }

    }

    public function details($order_id)
    {
        $i=1;
        $orders = OrderDetails::where('order_id','LIKE','%'.$order_id.'%')->get();
        return view('admin.order.details',compact('orders','i'));

    }
}
