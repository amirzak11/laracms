<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/frontendlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/order.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body>
<div class="content-wrapper">
    <div class="order-header">
        <div class="c-order-header">
            <img src="{{asset('image/information/images.png')}}">
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="o-page__content">
                    @yield('step')
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
