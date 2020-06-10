<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <link rel="stylesheet" href=src="{{asset('css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href=src="{{asset('css/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href=src="{{asset('css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href=src="{{asset('css/custom-style.css')}}">
    <link rel="stylesheet" href=src="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href=src="{{asset('css/frontendlte.min.css')}}">
    <link rel="stylesheet" href=src="{{asset('css/user.css')}}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="login-form">
                    @include('frontend.users.register_form')
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
