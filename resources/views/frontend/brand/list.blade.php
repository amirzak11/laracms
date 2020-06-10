<div id="slider-brand" class="slider-brand">
    <div class="header-title">
        <div class="cat-title">
             برندها
        </div>
        <div class="title-line">
        </div>
    </div>
    <a id="control_next" class="control_next_brand"><i class="fa fa-angle-left"></i></a>
    <a id="control_prev" class="control_prev_brand"><i class="fa fa-angle-right"></i></a>
    <ul class="brand-m">

            @foreach($brands as $brand)
            @if($image = $brand->images()->get()->pluck('name')->toArray())
                <li>
                    <a href="{{route('frontend.brand.view',$brand->id)}}">

                            @foreach($image as$img )

                                <div class="slide-a">
                                    <img
                                        src="{{asset('image/images')}}/{{$img}} ">
                                </div>
                                @break
                            @endforeach

                        {{--<img class="slide" src="image/slideshow/{{$cat->name}}">--}}
                        <p class="text">{{$brand->title}}</p>
                    </a>
                </li>

            @endif

            @endforeach
    </ul>
</div>
<script>
    $(document).ready(function () {
        $(".slider-brand ul").hover(function () {
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

        var slideCount = $('.slider-brand ul li').length;
        var slideWidth = $('.slider-brand ul li').width();
        var slideHeight = $('.slider-brand ul li').height();
        var slideUlWidth = slideCount * slideWidth;


        $('.slider-brand ul li:last-child').prependTo('.slider-brand ul');

        function moveLeft() {
            $('.slider-brand ul').animate({
                left: +slideWidth
            }, 400, function () {
                $('.slider-brand ul li:last-child').prependTo('.slider-brand ul');
                $('.slider-brand ul').css('left', '');
            });
        }

        function moveRight() {
            $('.slider-brand ul').animate({
                left: -slideWidth
            }, 400, function () {
                $('.slider-brand ul li:first-child').appendTo('.slider-brand ul');
                $('.slider-brand ul').css('left', '');
            });
        }

        $('a.control_prev_brand').click(function () {
            clearInterval(starter);
            clearInterval(rotate);
            moveLeft();
            rotate = setInterval(a, 5000);

        });
        $('a.control_next_brand').click(function () {
            clearInterval(starter);
            clearInterval(rotate);
            moveRight();
            rotate = setInterval(a, 5000);
        });
    });
</script>
