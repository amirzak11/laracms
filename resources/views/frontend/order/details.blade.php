@extends('frontend.dashboard.index')

@section('profile_c')
    @include('frontend.partial.notification')
    <h1>جزییات سفارش </h1>
    <div class="c-profile-status-address">
        @include('admin.partial.errors')
        <div class="c-profile-address-container">
            <div class="c-profile-status-row">
                <table style="text-align: center" id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr style="background-color: #85b3be; color: #fff;">
                        <th></th>
                        <th>نام محصول</th>
                        <th>قیمت واحد</th>
                        <th>قیمت کل</th>
                        <th>تخفیف</th>
                        <th>تعداد</th>
                        <th>قیمت نهایی</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        @if($product=\App\Models\Product::find($order->product_id))
                            <tr>
                            <td>{{$i++}}</td>
                                <td>
                                    <img style="width: 100px;"
                                        src="{{asset('image/images')}}/{{$product->images->pluck('name')[0]}}">
                                    <p class="name">{{$product->name}}</p>
                                </td>
                                <td>
                                    <p class="price">{{$product->price}} تومان</p>
                                </td>

                                <td><p class="price">{{number_format($product->price -(($product->discount*$product->price)/100))}} تومان</p></td>

                                <td><p class="price">{{$product->discount}}%</p></td>
                                <td>{{$order->quantity}}</td>
                                <td><p class="price">{{number_format($product->price -(($product->discount*$product->price)/100) *$order->quantity) }} تومان </p></td>
                            </tr>
                        @endif
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

