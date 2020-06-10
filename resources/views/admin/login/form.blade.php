<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/frontendlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/user.css')}}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="login-form">
                    <div class="s-login-form">
                        @include('frontend.partial.notification')
                        <div class="card card-info">
                            {{--@include('admin.partial.notification')--}}
                            <label class="text-login">ورود به مدریت</label>
                            <div class="card-body">
                                <form action="{{route('loginAdmin')}}" method="post">
                                    {{csrf_field()}}
                                    <lable class="label-text">ایمیل یا شماره تلفن</lable>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="right fa fa-user-circle"></i></span>
                                        </div>
                                        <input type="text" name="mobile" class="form-control"
                                               placeholder="ایمیل یا شماره تلفن خود را وارد کنید..." value="">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="right fa fa-lock"></i></span>
                                        </div>
                                        <input type="password" name="password" class="form-control"
                                               placeholder="روز عبور خود را وارد کنید..." value="">
                                    </div>

                                    <div class="input-group">
                                        <button type="submit" class="btn btn-block btn-outline-success btn-lg">
                                            <i class="fa fa-sign-in"></i>
                                            <span>ورود به سایت</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>



