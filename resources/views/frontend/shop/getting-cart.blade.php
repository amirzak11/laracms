@extends('layouts.frontend')
@section('content')
    <div class="product-view">
        <div class="shopping-cart">
            <div class="c-checkout__tab">
                <a href="###">سبد خرید
                    <span>
                        {{Session::has('cart') ? Session::get('cart')->totalQty : '' }}
                    </span>
                </a>
            </div>
            <div class="js-cart-tab-main ">
                <div class="left-checkout__group">
                    <div class="normall_send"><i class="fa fa-truck"></i><span>ارسال عادی</span></div>
                    @if(Session::has('cart'))
                        @foreach($products as $product)
                            <div class="c-checkout__group">
                                @if($image_id = $product['item']['id'])
                                    @inject('model_product', 'App\Models\Product')
                                    @if($product_find=$model_product::find($image_id))
                                        @if($images=$product_find->images()->get()->pluck('name')->toArray())
                                            @foreach($images as $image )
                                                <div class="image_product">
                                                    <img
                                                        src="{{asset('image/images')}}/{{$image}} ">
                                                </div>
                                                @break
                                            @endforeach
                                        @endif
                                    @endif
                                @else
                                    تصویر موجود نیست
                                @endif

                                <div class="c-cart-item__data">
                                    <div class="item_name">{{$product['item']['name']}} </div>
                                    <div class="item_warranty">{{isset($product['item']['warranty']) ? ' گارانتی : ' .  $product['item']['warranty'] : ' ' }} </div>
                                    <div class="item_seller">{{isset($product['item']['seller']) ? 'فروشنده : ' .  $product['item']['seller'] : ' ' }} </div>
                                    <div class="item_data">
                                        <div class="item_number">
                                            تعداد سفارش {{$product['qty']}} عدد
                                            <a href="{{route('frontend.product.remove_from_cart',$product['item']['id'])}}"><i class="fa fa-trash-o"></i></a>
                                        </div>
                                        <div class="item_price"> {{number_format($product['price'])}} <span>تومان</span>   </div>

                                    </div>
                                </div>

                            </div>
                        @endforeach

                    @endif
                    <div class="c-checkout__to-shipping-sticky">
                        <a class="selenium-next-step-shipping" href="{{route('frontend.order.post_information')}}">ادامه فرآیند خرید   </a>
                        <div class="c-checkout__to-shipping-price-report"><span class="text_price_main">مبلغ قابل پرداخت</span> {{number_format($sum_price) }} <span class="to_ma_n">تومان</span> </div>
                    </div>
                </div>
                <div class="left-orders">
                    <div class="seller">
                        <p class="sum_p">قیمت کالاها
                            <span>{{number_format($sum_price) }} تومان</span></p>
                    </div>
                    <div class="seller">
                        <p>جمع
                            <span>{{number_format($sum_price) }} تومان</span></p>
                    </div>
                    <div class="seller_b">
                        <p>مبلغ قابل پرداخت
                            <span>{{number_format($sum_price) }} تومان</span></p>
                    </div>
                    <div class="total-price">
                        <p>
                            کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش مراحل بعدی را تکمیل کنید.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
