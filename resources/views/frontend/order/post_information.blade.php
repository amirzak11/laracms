@extends('frontend.order.shopping_cart')
@section('step')
    <div class="post-step">
        <div class="a-post-step">
            <div><span style="color: #00bfd6">اطلاعات ارسال</span><i style="color: #00bfd6" class="fa fa-circle"></i>
            </div>
            <div class="payment-step"><span>پرداخت </span><i class="fa fa-circle"></i></div>
            <div><span>اتمام خرید و ارسال</span><i class="fa fa-circle"></i></div>
        </div>
    </div>
    <div class="shipping-header">
        <h1>انتخاب آدرس تحویل سفارش</h1>
    </div>
    <div class="o-page_all">
        <form method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="shipping-data">
                <div class="address-section">
                    <div class="receiver">
                        <p>گیرنده : </p>
                        <input type="text" name="name" value="{{Auth::user()->name}}">
                    </div>
                    </br>
                    <div>
                        <p> شماره تماس : <input type="text" name="tell" value="{{Auth::user()->mobile}}">
                            <span></span>

                            کد پستی :
                            @foreach(Auth::user()->addresses as $address)
                                <input type="text" name="zip_code" value="{{$address->zip_code}}">
                            @endforeach
                        </p></div>
                    @if(!count(Auth::user()->addresses))
                        <div class="address">
                            <p>
                                آدرسی ثبت نشده است . آدرس را وارد کنید
                            </p>
                            <div class="c-profile-status-row">
                                <div class="c-profile-status-col">
                                    <p>استان<span style="color: red">*</span></p>
                                    <select name="province" style="" class="form-control ass js-example-basic-multiple">
                                        <option
                                            value={{isset($address_item->province) ? $address_item->province : null}}>{{isset($address_item->province) ? $address_item->province : 'استان مورد نظر خود را انتخاب کنید'}} </option>
                                        @foreach($provinceIT as $id => $title)
                                            <option value="{{$title}}">
                                                {{$title}}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="c-profile-status-col">
                                    <p>شهر <span style="color: red">*</span></p>
                                    <select name="city" style="" class="form-control ass js-example-basic-multiple">

                                        <option
                                            value={{isset($address_item->city) ? $address_item->city : null}}>{{isset($address_item->city) ? $address_item->city : 'شهر مورد نظر خود را انتخاب کنید'}} </option>
                                        @foreach($cityIT as $id => $title)
                                            <option value="{{$title}}">
                                                {{$title}}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="c-profile-status-col zip_code">
                                    <p>آدرس پستی <span style="color: red">*</span></p>
                                    <textarea name="address" cols="56" rows="2">
                                    {{isset($address_item->address) ? $address_item->address : ''}}
                                </textarea>
                                </div>
                                </br>
                                <div class="c-profile-status-col">
                                    <p>پلاک<span style="color: red">*</span></p>
                                    <input type="text" name="plate"
                                           value="{{isset($address_item->plate) ? $address_item->plate : ''}}"
                                           class="form-control" placeholder="پلاک">
                                </div>
                                <div class="c-profile-status-col">
                                    <p>واحد</p>
                                    <input type="text" name="unit"
                                           value="{{isset($address_item->unit) ? $address_item->unit : ''}}"
                                           class="form-control" placeholder="واحد">
                                </div>

                                <div class="c-profile-status-col zip_code">
                                    <p>کد پستی<span style="color: red">*</span></p>
                                    <input type="text" name="zip_code"
                                           value="{{isset($address_item->zip_code) ? $address_item->zip_code : ''}}"
                                           class="form-control" placeholder="کد پستی">
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="address">
                            </br>
                            <p> @foreach(Auth::user()->addresses as $address)
                                    آدرس تحویل گیرنده :
                                    <input name="address" style="width: 500px;text-align: right;;padding: 3px" type="text" value="{{$address->address}}">

                                    </br>
                                    </br>

                                    پلاک :
                                    <input name="plate" type="text" value="{{$address->plate}}">
                                    واحد :
                                    <input name="unit" type="text" value="{{$address->unit}}">
                                @endforeach
                            </p>
                        </div>
                    @endif
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
                                $threeDaysAgo = time() + ((1 + $i) * 24 * 60 * 60);
                                list($year, $month, $day) = explode("-", date("Y-m-d", $threeDaysAgo));
                                list($hour, $minute, $second) = explode(':', $time);
                                $timestamp = mktime($hour, $minute, $second, $month, $day, $year);
                                $cy = $jalali_date = jdate("j F", $timestamp);
                                $dy = $jalali_date = jdate("l", $timestamp);
                                $day = $jalali_date = jdate("d / m / y ", $timestamp);
                                $today = jdate("d / m / y ");
                                ?>
                                <li class="c-checkout-time-table__day">
                                    <div class="c-checkout-time-table__day-name">{{$dy}}</div>
                                    <div class="c-checkout-time-table__date">{{$cy}}</div>
                                    <input type="radio" name="day" value="{{$day}}"
                                           style="display:block; margin: 0 auto">
                                </li>
                                <?php } ?>
                                    <input type="hidden" name="today" value="{{$today}}">
                            </ul>
                        </div>
                        <div class="c-checkout-additional-options">
                            <p><i class="fa fa-exclamation"></i>
                                شما می‌توانید فاکتور خرید را پس از تحویل سفارش از بخش جزییات سفارش در حساب کاربری خود
                                دریافت
                                کنید.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="c-shipment-page__to-payment-sticky">
                    <div class="c-shipment-page__to-payment-sticky-container">
                        <input type="submit" value="ادامه خرید">
                        <div class="c-shipment-page__to-payment-price-report">
                            <p>مبلغ قابل پرداخت</p>
                            <h6>{{number_format($sum_price) }} تومان</h6>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
    </div>
@endsection
