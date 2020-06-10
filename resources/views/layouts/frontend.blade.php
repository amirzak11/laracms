<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <link rel="stylesheet" href="{{asset('css/frontendlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style_slide.css')}}">
    <link rel="stylesheet" href="{{asset('css/slide_shop_style.css')}}">
    <link rel="stylesheet" href="{{asset('css/slide_article_style.css')}}">
    <link rel="stylesheet" href="{{asset('css/slide_brand_style.css')}}">

    <link rel="stylesheet" href="{{asset('css/footer_style.css')}}">
    <link rel="stylesheet" href="{{asset('css/profile_style.css')}}">
    <link rel="stylesheet" href="{{asset('css/nav.css')}}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<style>
    .showmore {
        cursor: pointer;
        font-weight: bold;
    }
    </style>
<body>

<script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>
<div class="wrapper">
    @include('frontend.partial.nav')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                    @yield('profile_content')
                </div>
            </div>
        </section>
        <section class="c-footer">
            <div class="row">
                @include('frontend.footer.index')
            </div>
        </section>
    </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

<script  src="{{asset('js/script_public.js')}}"></script>
<script  src="{{asset('jquery/script_slide.js')}}"></script>
</body>

</html>
