@extends('layouts.frontend')
@section('content')

    <div class="article-list">
        <div class="c-article">
            <div class="article-top">
                <div class="c-article_top">
                    <h5>
                        {{$articles->title}}
                    </h5>
                    @if($images = $articles->images()->get()->pluck('name')->toArray())
                        @foreach($images as$image )
                            <div class="mySlides">
                                <img class="img"
                                     src="{{asset('image/images')}}/{{$image}} ">
                            </div>
                        @endforeach
                    @else

                    @endif
                    <div class="p-tabs">
                        <div class="p-tabs__content">
                            {{print_r($articles->content)[0]}}
                        </div>
                    </div>
                </div>
                <div class="left-info">
                    <div class="top-export">
                        <div class="name-article">
                            <h4>
                                مقالات اخیر
                                <div></div>
                            </h4>
                        </div>
                        <div class="title_article">
                            <ul>
                                @foreach($all_articles as $article)
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
                                            <p>{{$article->title}}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

