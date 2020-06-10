@extends('frontend.dashboard.index')

@section('profile_c')
    @include('frontend.partial.notification')
    <h1>سفارش ها</h1>
    <div class="c-profile-status-address">
        @include('admin.partial.errors')
        <div class="c-profile-address-container">
            <div class="c-profile-status-row">
                <table style="text-align: center" id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>شماره سفارش</th>
                        <th>وضعیت سفارش</th>
                        <th>تاریخ ثبت سفارش</th>
                        <th>جزییات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->order_number}}</td>
                            <td>پرداخت نشده</td>
                            <td>{{$order->order_date}}</td>
                            <td><a href="{{route('frontend.order.details',$order->id)}}"> <i class="fa fa-arrow-left"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


{{--
@foreach($products = $user_item->orders()->get()->pluck('product_id') as $product)
                    <div class="order_list">
                        <img
                            src="{{asset('image/images')}}/{{\App\Models\Product::find($product)->images()->get()->pluck('name')[0]}}">
                        <p class="name">{{\App\Models\Product::find($product)->name}}</p>
                        <p class="price">{{\App\Models\Product::find($product)->price}} تومان </p>
                    </div>
                @endforeach
                --}}

