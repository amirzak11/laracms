
<div class="s-login-form">
    <div class="login-logo">
        <img src="{{asset('image/information/'.$information->logo_name)}}">
    </div>
    @include('frontend.partial.notification')
    <div class="card card-info">
        {{--@include('admin.partial.notification')--}}
        <label class="text-login">ورود به سایت</label>
        <div class="card-body">
            <form action="{{route('frontend.user.loginUser')}}" method="post">
                {{csrf_field()}}

                <lable class="label-text">ایمیل یا شماره تلفن</lable>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="right fa fa-user-circle"></i></span>
                    </div>
                    <input type="text" name="mobile" class="form-control"
                           placeholder="ایمیل یا شماره تلفن خود را وارد کنید..." value="">
                </div>

                <lable class="label-text">رمز عبور <a href="###">رمز عبور خودر را فراموش کرده اید</a></lable>
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
        <div class="c-account-box__footer">
            <span>کاربر جدید هستید ؟</span>
            <a href="{{route('frontend.user.register')}}">ثبت نام در سایت </a>
        </div>
    </div>
</div>
