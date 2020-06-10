@extends('layouts.frontend')

@section('content')
    <div class="container--home">
        <div class="a-container">
            <div class="c-about-us__head">
                <div class="c-about-us__head-title">
                    <img src="{{asset('image/information/'.$information->logo_name)}}">
                    <p>راه حل امروزی برای خرید</p>
                    <br>
                    <p class="description">
                    {{$information->description}}
                    </p>
                </div>
                <div class="c-about-us__head-content">
                    {{print_r($information->content)}}
                </div>
            </div>
        </div>

    </div>

@endsection
