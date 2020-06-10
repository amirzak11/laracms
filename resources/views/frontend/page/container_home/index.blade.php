<div class="container--home">
    <div class="s-container">
        <div class="slideShow_container">
            @if(isset($slideShow))
                @foreach($slideShow as $slide)
                    <div class="mySlide fade">
                        <img
                            src="{{asset('image/slideshow')}}/{{$slide->name}}">
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="s-container-left">
        <div><img src="{{asset('image/slide/1.png')}}"></div>
        <div><img src="{{asset('image/slide/2.png')}}"></div>
    </div>
</div>
