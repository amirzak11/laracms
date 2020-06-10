@extends('frontend.order.shopping_cart')
@section('step')
    <div class="post-step">
        <div class="a-post-step">
            <div><span style="color: #00bfd6">اطلاعات ارسال</span><i style="color: #00bfd6" class="fa fa-circle"></i>
            </div>
            <div class="payment-step"><span style="color: #00bfd6">پرداخت </span><i style="color: #00bfd6" class="fa fa-circle"></i></div>
            <div><span>اتمام خرید و ارسال</span><i class="fa fa-circle"></i></div>
        </div>
    </div>
    <div class="shipping-header">
        <h1></h1>
    </div>
    <div class="shipping-data">
        <div class="address-section">
            <div class="receiver"><p>شیوه پرداخت</p></div>
            <div>
                <input type="radio" ><i class="fa fa-inter"></i>پرداخت اینترنتی
            </div>
        </div>
        <div class="shipping-data-form">
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
                    </div>
                @endforeach
            @endif
            <div class="c-checkout-time-table">
                <h6><i class="fa fa-hourglass-half"></i>تعیین زمان ارسال</h6>
                @include ('jdate.jdf')

                <div class="c-checkout-time-table__table-header-container">
                    <ul>

                        <?php
                        for($i = 0;$i <= 4;$i++){
                        $timezone = 0;
                        $now = date("Y-m-d", time() + $timezone);
                        $time = date("H:i:s", time() + $timezone);
                        $threeDaysAgo = time() + ( (1+$i) * 24 * 60 * 60);
                        list($year, $month, $day) = explode("-", date("Y-m-d", $threeDaysAgo));
                        list($hour, $minute, $second) = explode(':', $time);
                        $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
                        $cy = $jalali_date = jdate("j F", $timestamp);
                        $dy = $jalali_date = jdate("l", $timestamp);
                        ?>
                        <li class="c-checkout-time-table__day">

                            <div class="c-checkout-time-table__day-name">{{$dy}}</div>
                            <div class="c-checkout-time-table__date">{{$cy}}</div>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="c-checkout-additional-options">
                    <p> <i class="fa fa-exclamation"></i>
                        شما می‌توانید فاکتور خرید را پس از تحویل سفارش از بخش جزییات سفارش در حساب کاربری خود دریافت کنید.
                    </p>
                </div>
            </div>
        </div>
        <div class="c-shipment-page__to-payment-sticky">
            <div class="c-shipment-page__to-payment-sticky-container">
                <a href="{{route('frontend.order.post_payment')}}">ادامه خرید</a>
                <div class="c-shipment-page__to-payment-price-report">
                    <p>مبلغ قابل پرداخت</p>
                    <h6>{{number_format($sum_price) }} تومان</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="o-page__aside">
        @foreach($products as $product)
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
            </div>
        @endforeach
    </div>
@endsection
