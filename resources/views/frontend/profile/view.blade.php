@extends('frontend.dashboard.index')

@section('profile_c')
    <h1>اطلاعات شخصی</h1>
    <div class="c-profile-status">
        <div class="c-profile-status-row">
            <div class="c-profile-status-col">
                <p>نام و نام خانوادگی :</p>
                <h4>{{isset(Auth::user()->name) ? Auth::user()->name : '-'}}</h4>
            </div>
            <div class="c-profile-status-col">
                <p>آدرس ایمیل : </p>
                <h4>{{isset(Auth::user()->email) ? Auth::user()->email : '-'}}</h4>
            </div>

            <div class="c-profile-status-col">
                <p>شماره تلفن همراه :</p>
                <h4>{{isset(Auth::user()->mobile) ? Auth::user()->mobile : '-'}}</h4>
            </div>
            <div class="c-profile-status-col">
                <p>کد ملی :</p>
                <h4>{{isset(Auth::user()->code) ? Auth::user()->code : '-'}}</h4>
            </div>
            <div class="c-profile-status-col">
                <p>دریافت خبرنامه :</p>
                <h4>{{isset(Auth::user()->code) ? Auth::user()->code : '-'}}</h4>
            </div>
            <div class="c-profile-status-col">
                <p>شماره کارت :</p>
                <h4>{{isset(Auth::user()->card_number) ? Auth::user()->card_number : '-'}}</h4>
            </div>
            <div class="edit_profile">
                <a href="{{route('frontend.profile.edit')}}"><i class="fa fa-edit"></i>ویرایش اطلاعات شخصی</a>
            </div>
        </div>
    </div>

@endsection
