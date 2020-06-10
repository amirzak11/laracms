
<div class="s-login-form">
    <div class="login-logo">
        <img src="{{asset('image/information/images.png')}}">
    </div>
    @include('frontend.partial.errors')

    <div class="card card-info">
        {{--@include('admin.partial.notification')--}}
        <label class="text-login">ورود به سایت</label>
        <div class="card-body">
            <form action="" method="post">
                {{csrf_field()}}
                <div class="tip">
                    <p>
                        ثبت نام تنها با شماره تلفن همراه امکان پذیر است.
                    </p>
                </div>
                <lable class="label-text"> شماره موبایل</lable>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="right fa fa-user-circle"></i></span>
                    </div>
                    <input type="text" name="mobile" class="form-control" placeholder="ایمیل یا شماره تلفن خود را وارد کنید..." value="">
                </div>

                <lable class="label-text">رمز عبور </lable>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="right fa fa-lock"></i></span>
                    </div>
                    <input type="password" name="password" class="form-control"  placeholder="روز عبور خود را وارد کنید..." >
                </div>

                <div class="input-group">
                    <button type="submit" class="btn btn-block btn-outline-success btn-lg">
                        <i class="fa fa-sign-in"></i>
                        <span>ورود به سایت</span>
                    </button>
                </div>
            </form>
        </div>
        <div class="c-account-box__footer">
            <span>قبلا در سایت ثبت نام کردید ؟</span>
            <a href="{{route('frontend.user.login')}}">   وارد شوید   </a>
        </div>
    </div>
</div>
