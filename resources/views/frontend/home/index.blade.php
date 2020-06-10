@extends('layouts.frontend')

@section('content')

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

    <div class="container--banner">
        @foreach($banners as $banner)
            <div>

            </div>
        @endforeach


        {{--<div>
            <img src="{{asset('image/banner/1.png')}}">
            <img src="{{asset('image/banner/2.png')}}">
        </div>

        <div>
            <img src="{{asset('image/banner/5.png')}}">
        </div>
        <div>
            <img src="{{asset('image/banner/3.png')}}">
            <img src="{{asset('image/banner/4.png')}}">
        </div>--}}
    </div>


    <div class="container--slide">

        @foreach($cat as $category)
            @if(isset($category->products) && count($category->products) > 0)
                @if(isset($category))
                    @include('frontend.slideShop.list',compact('category'))
                @endif
            @endif
        @endforeach

    </div>

    <div class="container--slide">
        @include('frontend.brand.list')
    </div>

    <div class="container--slide">
        @include('frontend.article.list')
    </div>


@endsection
