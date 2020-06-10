<div id="slider_shop" class="slider{{$category->id}}">
    <div class="header-title">
        <div class="cat-title">

            {{$category->title}}

        </div>
        <div class="line_space"></div>
        <div class="title-line">
            <a href="{{route('frontend.search.list',$category->id)}}"> <i class="fa fa-plus"> </i>  مشاهده همه  </a>
        </div>
    </div>


    <a id="control_next" class="control_next{{$category->id}}"><i class="fa fa-angle-left"></i></a>
    <a id="control_prev" class="control_prev{{$category->id}}"><i class="fa fa-angle-right"></i></a>
    <ul>
        @foreach($category->products as $product)

            <li>
                <a href="{{route('frontend.product.list',$product->id)}}">
                    @if($image = $product->images()->get()->pluck('name')->toArray())
                        @foreach($image as$img )
                            <div class="slide">
                                <img
                                    src="{{asset('image/images')}}/{{$img}} ">
                            </div>
                            @break
                        @endforeach
                    @else
                        تصویر موجود نیست
                    @endif
                    {{--<img class="slide" src="image/slideshow/{{$category->name}}">--}}
                    <p class="text">{{$product->name}}</p>
                    @if($product->discount)
                        <p class="price"><span class="discount">{{$product->discount}}%</span><span
                                class="price_subline">{{number_format($product->price)}}</span></p>
                    @endif

                    <p class="price" style="font-size: 18px;padding: 0px; padding-left: 10px;">{{number_format($product->price -(($product->discount*$product->price)/100)) }}
                        تومان</p>
                </a>
                <a href="{{route('frontend.interest.add',$product->id)}}" class="galb" title="افزودن به علاقه مندی ها"><i class="fa fa-heart"></i></a>
            </li>
        @endforeach
    </ul>
</div>
<script>
    $(document).ready(function () {
        $(".slider{{$category->id}} ul").hover(function () {
            clearInterval(starter);
            clearInterval(rotate);
        }, function () {
            rotate = setInterval(a, 4000);
        });

        var rotate;
        var a = function () {

            moveRight();
        }
        var starter = setInterval(a, 4000);

        var slideCount = $('.slider{{$category->id}} ul li').length;
        var slideWidth = $('.slider{{$category->id}} ul li').width();
        var slideHeight = $('.slider{{$category->id}} ul li').height();
        var sliderUlWidth = slideCount * slideWidth;


        $('.slider{{$category->id}} ul li:last-child').prependTo('.slider{{$category->id}} ul');

        function moveLeft() {
            $('.slider{{$category->id}} ul').animate({
                left: +slideWidth
            }, 400, function () {
                $('.slider{{$category->id}} ul li:last-child').prependTo('.slider{{$category->id}} ul');
                $('.slider{{$category->id}} ul').css('left', '');
            });
        }

        function moveRight() {
            $('.slider{{$category->id}} ul').animate({
                left: -slideWidth
            }, 400, function () {
                $('.slider{{$category->id}} ul li:first-child').appendTo('.slider{{$category->id}} ul');
                $('.slider{{$category->id}} ul').css('left', '');
            });
        }

        $('a.control_prev{{$category->id}}').click(function () {
            clearInterval(starter);
            clearInterval(rotate);
            moveLeft();
            rotate = setInterval(a, 5000);

        });
        $('a.control_next{{$category->id}}').click(function () {
            clearInterval(starter);
            clearInterval(rotate);
            moveRight();
            rotate = setInterval(a, 5000);
        });
    });
</script>
