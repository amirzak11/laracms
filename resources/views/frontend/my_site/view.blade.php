@extends('layouts.frontend')

@section('content')
    <div class="container--home">
        <div class="s-page-container">
            <div class="c-my-landing-page__container">
                <div class="c-my-landing-page__section">
                    <div class="c-my-landing-page__header-section--center">
                        <span>
                            {{Session::has('cart') ? Session::get('cart')->totalQty : '' }}
                        </span>
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="c-my-landing-page__header-text--cart">
                        <p>{{Session::has('cart') ? Session::get('cart')->totalQty : '' }} کالا در سبد خرید شما</p>
                    </div>
                </div>
                <div class="c-my-landing-page__content-section">
                    @if(isset($products))
                        <p class="c-my-landing-page__cart-info-text">کالاهای زیر در سبد خرید شماست. ‌‌‌اگر علاقه‌مند به خرید
                            هستید، با مراجعه به سبد خرید، سفارش خود را نهایی
                            کنید.</p>
                        @else
                        <p class="c-my-landing-page__cart-info-text">کالایی در سبد خرید شما موجود نمیباشد</p>
                    @endif
                    <div class="c-my-landing-page__cart-item">
                        <div class="c-my-landing-page__product-box">
                            @if(isset($products))
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
                                                            <div class="item_number"> {{$product['qty']}}  </div>
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
                            <div class="to-shipping-sticky">
                                <a
                                    href="{{route('frontend.product.cart_container')}}">مراجعه به سبد خرید </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="c-my-landing-page__section--wish-list">
            <div class="wish-list">
                <div class="c-my-landing-page__wish-list-header">
                    <i class="fa fa-heart-o"></i>
                    <div class="c-my-landing-page__wish-list-text">
                        <p class="wish-list-text-1"> کالاهای انتخابی شما</p>
                        <p class="wish-list-text-2">در لیست علاقه‌مندی‌ها و سبدخرید بعدی</p>
                    </div>
                </div>
                <div class="c-my-landing-page__wish-list-carousel">
                    @foreach($interests as $interest)

                        <a href="{{route('frontend.product.list',$interest['id'])}}" class="c-checkout__group">
                            @if($image_id = $interest['id'])
                                @inject('model_product', 'App\Models\Product')
                                @if($interest_find = $model_product::find($image_id))
                                    @if($images=$interest_find->images()->get()->pluck('name')->toArray())
                                        @foreach($images as $image )
                                            <div class="image_interest">
                                                <img
                                                    src="{{asset('image/images')}}/{{$image}} ">
                                                <div class="item_name"> {{$interest['name']}}  </div>
                                                <div class="item_price"><p>{{number_format($interest['price'])}}</p>
                                                    <span>{{$interest['discount']}}%</span></div>
                                                <div
                                                    class="item_discount"> {{number_format($interest['price'] -(($interest['discount']*$interest['price'])/100)) }}
                                                    <span>تومان</span></div>

                                            </div>
                                            @break
                                        @endforeach
                                    @endif
                                @endif
                            @else
                                تصویر موجود نیست
                            @endif
                        </>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
