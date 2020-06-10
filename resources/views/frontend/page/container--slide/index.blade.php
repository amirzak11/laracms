
<div class="container--slide">
    @foreach($category as $cat)
        @if(isset($cat->products) && count($cat->products) > 0)
            @include('frontend.slideShop.list',compact('cat'))
            {{$cat->banners}}
        @endif
    @endforeach
</div>
