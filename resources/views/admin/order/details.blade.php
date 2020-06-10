@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="card">
            @include('admin.partial.notification')
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
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
                    @if($orders && count($orders)>0)
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

                                    <td>
                                        <p class="price">{{number_format($product->price -(($product->discount*$product->price)/100))}}
                                            تومان</p></td>

                                    <td><p class="price">{{$product->discount}}%</p></td>
                                    <td>{{$order->quantity}}</td>
                                    <td>
                                        <p class="price">{{number_format($product->price -(($product->discount*$product->price)/100) *$order->quantity) }}
                                            تومان </p></td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    @else
                        @include('admin.partial.no_item')
                    @endif

                </table>
            </div>
        </div>
    </div>
@endsection
