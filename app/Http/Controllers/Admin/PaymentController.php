<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function list()
    {
        $payments = Payment::all();
        return view('admin.payment.list', compact('payments'))->with('panel_heading', 'لیست پرداخت ها');
    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

}
