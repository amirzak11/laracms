@extends('layouts.frontend')
@section('content')

    <div class="product-view">
        @if(isset($category_parent))
            <div class="c-product__nav-container">
                <ul>
                    <li>سایت رسولی</li>
                    @include('frontend.category.parent_category')
                </ul>
            </div>
        @endif
        <div class="product-top">
            <div class="img-category">
                <div class="container">
                    <div class="c-gallery ">
                        @if($images = $product->images()->get()->pluck('name')->toArray())
                            @foreach($images as$image )
                                <div class="mySlides">
                                    <div class="c-gallery__options">
                                        <ul>
                                            <li>
                                                <a href="{{route('frontend.interest.add',['product_id'=>$product->id])}}"
                                                   title="افزودن به علاقه مندی ها"><i class="fa fa-heart-o"></i></a>
                                            </li>
                                            <li>
                                                <a href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share">Share via Whatsapp</a>
                                            </li>

                                            <li><a title="اشتراک گذاری"><i class="fa fa-share-alt"></i></a></li>

                                        </ul>
                                    </div>
                                    <img class="img"
                                         src="{{asset('image/images')}}/{{$image}} ">

                                </div>
                            @endforeach
                        @else
                            تصویر موجود نیست
                        @endif

                    </div>
                    <div class="row">
                        @if($images = $product->images()->get()->pluck('name')->toArray())
                            @foreach($images as $key => $image )
                                <div class="column">
                                    <img class="demo cursor"
                                         src="{{asset('image/images')}}/{{$image}}"
                                         style="width:100%" onclick="currentSlide({{$key+1}})" alt="The Woods">
                                </div>

                            @endforeach
                        @else
                            تصویر موجود نیست
                        @endif

                    </div>
                </div>


                <script>
                    var slideIndex = 1;
                    showSlides(slideIndex);

                    function plusSlides(n) {
                        showSlides(slideIndex += n);
                    }

                    function currentSlide(n) {
                        showSlides(slideIndex = n);
                    }

                    function showSlides(n) {
                        var i;
                        var slides = document.getElementsByClassName("mySlides");
                        var dots = document.getElementsByClassName("demo");
                        var captionText = document.getElementById("caption");
                        if (n > slides.length) {
                            slideIndex = 1
                        }
                        if (n < 1) {
                            slideIndex = slides.length
                        }
                        for (i = 0; i < slides.length; i++) {
                            slides[i].style.display = "none";
                        }
                        for (i = 0; i < dots.length; i++) {
                            dots[i].className = dots[i].className.replace(" active", "");
                        }
                        slides[slideIndex - 1].style.display = "block";
                        dots[slideIndex - 1].className += " active";
                        captionText.innerHTML = dots[slideIndex - 1].alt;
                    }
                </script>

            </div>
            <div class="left-info">
                <div class="top-export">
                    <div class="name-product"><p class=""> {{$product->name}}</p></div>
                </div>
                <div class="right-property">
                    <div class="info-product">

                        <div class="c-product__config">
                            <div class="c-product__directory">
                                <ul>
                                    @if(isset($brands))
                                        @foreach($brands as $brand)
                                            @if($brand->pluck('name'))
                                                <li><span>برند :</span> <a>{{$brand->name}}</a></li>
                                            @endif
                                        @endforeach
                                    @endif
                                    @if(isset($category))
                                        @foreach($category as $cat)
                                            @if($cat->categories->pluck('title'))
                                                <li><span>دسته بندی :</span> <a>{{$cat->categories->title}}</a></li>
                                            @endif
                                        @endforeach
                                    @endif

                                </ul>
                            </div>
                        </div>
                        <div class="c-product__property">
                            <label>ویژگی های محصول </label>
                            <ul class='expandible'>
                                @if(isset($properties))
                                    @foreach($properties as $property)
                                        @if($property->pluck('name'))
                                            <li><i class="fa fa-angle-left"></i> <span>{{$property->title}}</span> :
                                                <span>{{$property->name}}</span></li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="left-order">
                    <div class="seller">
                        <p><i class="fa fa-shopping-bag"></i>فروشنده :
                            <span>{{isset($product->seller) ? $product->seller :' سایت رسولی'}}</span></p>
                    </div>
                    <div class="guaranty">
                        <p><i class="fa fa-calendar-check-o"></i>
                            <span> سرویس ویژه سایت : ۷ روز تضمین بازگشت کالا</span></p>
                    </div>

                    {{--
                    <i class="fa fa-shopping-basket"></i>
                                        <div class="profit">
                                            <div class="right"> سود شما از این خرید</div>
                                            <div class="left">{{number_format(($product->discount*$product->price)/100)}} تومان</div>
                                        </div>--}}
                    <div class="total-price">
                        @if(isset($product->discount))
                        <p class="main-price">{{number_format($product->price)}}
                            <span>{{$product->discount}}%</span>
                        </p>
                        @endif

                        <p>
                            {{number_format($product->price -(($product->discount*$product->price)/100)) }}<span>
                                تومان
                    </span>
                        </p>

                        <div class="send">
                            <a href="{{route('frontend.product.addtocart',['id'=>$product->id])}}">افزودن به سبد
                                خرید</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="p-tabs">
            <div class="p-tabs__content">
                <div class="p-tabs__header">
                    <h5 style="color: #666;margin: 0px; font-size: 30px;">نقد و بررسی اجمالی </h5>
                    <p style="padding: 0px; line-height: 40px; font-size: 15px; font-weight: bold; color: #aaa">{{$product->name}}</p>
                </div>
                    @foreach($contents as $content)
                    {{print_r($content->content)}}
                @endforeach
            </div>
        </div>


        {{--
                <div class="text-information">
                    <i class="fa fa-arrow-left"></i>
                    <div> مشخصات فنی</div>
                </div>
                <div class="product-bottom">

                    <div class="info-right">
                        <div class="about-builder">
                            <p>کشور سازنده و خدمات مشمول دوربین مدل </p>
                            <div class="about-text">
                                <div class="about-right"></div>
                                <div class="about-left"></div>
                            </div>
                            <div class="about-text">
                                <div class="about-right"></div>
                                <div class="about-left"></div>
                            </div>
                        </div>

                        <div class="about-builder">
                            <p>کشور سازنده و خدمات مشمول دوربین مدل </p>
                            <div class="about-text">
                                <div class="about-right"></div>
                                <div class="about-left"></div>
                            </div>
                            <div class="about-text">
                                <div class="about-right"></div>
                                <div class="about-left"></div>
                            </div>
                        </div>
                    </div>
                </div>--}}


    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script>
        $('ul.expandible').each(function () {
            var $ul = $(this),
                $lis = $ul.find('li:gt(2)'),
                isExpanded = $ul.hasClass('expanded');
            $lis[isExpanded ? 'show' : 'hide']();

            if ($lis.length > 0) {
                $ul
                    .append($('<span class="showmore"><li class="expand">' + (isExpanded ? '  − بستن' : ' + موارد بیشتر') + '</li></span>')
                        .click(function (event) {
                            var isExpanded = $ul.hasClass('expanded');
                            event.preventDefault();
                            $(this).html(isExpanded ? '+ موارد بیشتر' : ' - بستن');
                            $ul.toggleClass('expanded');
                            $lis.toggle();
                        }));
            }
        });
    </script>
@endsection
