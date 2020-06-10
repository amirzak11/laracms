<div id="slider-article" class="slider-article">
    <div class="header-title">
        <div class="cat-title">
            جدید ترین مقالات
        </div>
        <div class="title-line">
        </div>
    </div>
    <a id="control_next" class="control_next"><i class="fa fa-angle-left"></i></a>
    <a id="control_prev" class="control_prev"><i class="fa fa-angle-right"></i></a>
    <ul class="article-m">

        @foreach($articles as $article)
            @if($i++ and $i==10)
                @break
            @endif
            <li>
                <a href="{{route('frontend.article.view',$article->id)}}">
                    @if($image = $article->images()->get()->pluck('name')->toArray())
                        @foreach($image as$img )

                            <div class="slide-a">
                                <img
                                    src="{{asset('image/images')}}/{{$img}} ">
                            </div>
                            @break
                        @endforeach
                    @else
                        تصویر موجود نیست
                    @endif
                    {{--<img class="slide" src="image/slideshow/{{$cat->name}}">--}}
                    <p class="text">{{$article->title}}</p>
                        <p class="clock"><i class="fa fa-clock-o"></i> {{ substr($article->created_at,strpos($article->created_at, "  "),10)}}  </p>
                </a>
            </li>
        @endforeach
    </ul>
</div>
<script>
    $(document).ready(function () {
        $(".slider-article ul").hover(function () {
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

        var slideCount = $('.slider-article ul li').length;
        var slideWidth = $('.slider-article ul li').width();
        var slideHeight = $('.slider-article ul li').height();
        var slideUlWidth = slideCount * slideWidth;


        $('.slider-article ul li:last-child').prependTo('.slider-article ul');

        function moveLeft() {
            $('.slider-article ul').animate({
                left: +slideWidth
            }, 400, function () {
                $('.slider-article ul li:last-child').prependTo('.slider-article ul');
                $('.slider-article ul').css('left', '');
            });
        }

        function moveRight() {
            $('.slider-article ul').animate({
                left: -slideWidth
            }, 400, function () {
                $('.slider-article ul li:first-child').appendTo('.slider-article ul');
                $('.slider-article ul').css('left', '');
            });
        }

        $('a.control_prev').click(function () {
            clearInterval(starter);
            clearInterval(rotate);
            moveLeft();
            rotate = setInterval(a, 5000);

        });
        $('a.control_next').click(function () {
            clearInterval(starter);
            clearInterval(rotate);
            moveRight();
            rotate = setInterval(a, 5000);
        });
    });
</script>
