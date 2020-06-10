@extends('layouts.frontend')
@section('content')

    <div class="product-list">
        <div class="c-product">
            <div class="search-right">
                <div class="c-box">
                    <div class="c-box-header">دسته بندی نتایج</div>
                    @if($category)
                        <div class="c-product__nav-container">
                            <ul style="margin: 0px; display: inline-block; direction: ltr">
                                @include('frontend.category.category_box_parent_category')
                                @include('frontend.category.category_sub_box_parent_category')
                            </ul>
                            <ul style="margin-top: -5px;font-weight: bold ;color: #000; margin-right: 60px; display: block">
                                <li><a href="##"> {{$category->title}}  </a></li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="c-box">
                    <div class="c-box-header">برند</div>
                    @if($brands)
                        <div class="c-product__nav-container">
                            <ul>
                                @if($category)
                                    @foreach($brands as $brand)
                                        <li style="display: block">
                                            <a href="{{route('frontend.filter.search',[$brand->id,$category->id])}}">
                                                {{$brand->name}}
                                            </a>

                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="product-top">
                @if($category)
                    <div class="c-product__nav-container">
                        <ul style=" display: inline-block; direction: ltr">
                            @include('frontend.category.category_parent_category')
                        </ul>
                        <ul style=" margin-right: 0px; display: inline-block">
                            <li><a href="##">{{$category->title}} </a></li>
                        </ul>
                    </div>
                @endif
                <div class="c-product_top">
                    <ul>
                        @foreach($products as $product)
                                @if($product->brands)
                                    @foreach($product->brands as $brand)
                                        @if(isset($brand_id))
                                            @if(isset($brand->id) && $brand->id==$brand_id)
                                                <a href="{{route('frontend.product.list',$product->id)}}"
                                                   class="products-view">
                                                    @if($image = $product->images()->get()->pluck('name')->toArray())
                                                        @foreach($image as$img )
                                                            <img class="img-size-100"
                                                                 src="{{asset('image/images')}}/{{$img}} ">
                                                            @break
                                                        @endforeach
                                                    @else
                                                        تصویر موجود نیست
                                                    @endif
                                                    <div>
                                                        <p class="title">{{$product->name}}</p>
                                                        <p class="price">{{number_format($product->price)}}
                                                            <span>تومان</span>
                                                        </p>
                                                    </div>
                                                </a>
                                            @endif
                                        @else
                                            <li>
                                            <a href="{{route('frontend.product.list',$product->id)}}"
                                               class="products-view">
                                                @if($image = $product->images()->get()->pluck('name')->toArray())
                                                    @foreach($image as$img )
                                                        <img class="img-size-100"
                                                             src="{{asset('image/images')}}/{{$img}} ">
                                                        @break
                                                    @endforeach
                                                @else
                                                    تصویر موجود نیست
                                                @endif
                                                <div>
                                                    <p class="title">{{$product->name}}</p>

                                                    <div class="item_price">
                                                        @if(isset($product['discount']))
                                                            <p>{{number_format($product['price'])}}</p>
                                                            <span>{{$product['discount']}}%</span>
                                                        @endif
                                                    </div>
                                                    <div
                                                        class="item_discount"> {{number_format($product['price'] -(($product['discount']*$product['price'])/100)) }}
                                                        <span>تومان</span></div>
                                                </div>
                                            </a>
                                                <a href="{{route('frontend.interest.add',$product->id)}}" class="galb" title="افزودن به علاقه مندی ها"><i class="fa fa-heart"></i></a>
                                        </li>
                                        @endif
                                    @endforeach
                                @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

