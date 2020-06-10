@extends('frontend.dashboard.index')

@section('profile_c')
    <h1>ویرایش اطلاعات شخصی</h1>
    <form action="" method="post">
        <div class="c-profile-status">
            {{csrf_field()}}
            <div class="c-profile-status-row">
                <div class="c-profile-status-col">
                    <p>نام و نام خانوادگی :</p>
                    <input class="input-group-text" name="name"
                           value="{{old('name',isset(Auth::user()->name) ? Auth::user()->name : '')}}">
                </div>
                <div class="c-profile-status-col">
                    <p>آدرس ایمیل : </p>
                    <input type="email" class="input-group-text" name="email"
                           value="{{old('email',isset(Auth::user()->email) ? Auth::user()->email : '')}}">
                </div>
                <div class="c-profile-status-col">
                    <p>شماره تلفن همراه :</p>
                    <input class="input-group-text" name="mobile"
                           value="{{old('mobile',isset(Auth::user()->mobile) ? Auth::user()->mobile : '')}}">
                </div>
                <div class="c-profile-status-col">
                    <p>کد ملی :</p>
                    <input class="input-group-text" name="code"
                           value="{{old('code',isset(Auth::user()->code) ? Auth::user()->code : '')}}">
                </div>
                <div class="c-profile-status-col">
                    <p>دریافت خبرنامه :</p>
                    <input class="input-group-text" value="{{isset(Auth::user()->code) ? Auth::user()->code : ''}}">
                </div>
                <div class="c-profile-status-col">
                    <p>شماره کارت :</p>
                    <input class="input-group-text" name="card_number"
                           value="{{old('card_number',isset(Auth::user()->card_number) ? Auth::user()->card_number : '')}}">
                </div>
                <div class="edit_profile" style="margin: 20px;">
                    <button type="submit" style="width: 40%" class="btn btn-block btn-outline-success btn-lg">
                        <i class="fa fa-sign-in"></i>
                        <span>ذخیره</span>
                    </button>
                </div>
            </div>
        </div>
    </form>

@endsection
