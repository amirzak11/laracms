<div class="o-page__aside">
    <div class="c-profile-box">
        <div class="c-profile-box-header">
            <img src="{{asset('image/user/testimony.png')}}">
            <div class="c-profile-box-header-content">
                <h6>{{isset(Auth::user()->name) ? Auth::user()->name : 'نام وارد نشده است' }}</h6>
                <p>{{isset(Auth::user()->mobile) ? Auth::user()->mobile : 'شماره موبایل وارد نشده است'}}</p>
            </div>
        </div>
        <div class="c-profile-box__tabs">

            <a href="{{route('frontend.user.logout')}}"> خروج از حساب</a>
        </div>
    </div>

    <div class="c-profile-menu">
        <div class="c-profile-menu-row">
            <p>حساب کاربری شما</p>
        </div>
        <div class="c-profile-menu-row">
            <div class="c-profile-menu-col">
                <a href="{{route('frontend.profile.view')}}"> <i class="fa fa-user"> </i>پروفایل</a>
            </div>
            <div class="c-profile-menu-col">
                <a href="{{route('frontend.order.view')}}"> <i class="fa fa-first-order"> </i>همه سفارشات</a>
            </div>

            <div class="c-profile-menu-col">
                <a href="{{route('frontend.address.view')}}"> <i class="fa fa-location-arrow"> </i>آدرس ها</a>
            </div>

            <div class="c-profile-menu-col">
                <a href="{{route('frontend.interest.view')}}" > <i class="fa fa-heart-o"> </i>لیست علاقه مندی ها</a>
            </div>
            <div class="c-profile-menu-col">
                <a> <i class="fa fa-info"> </i>اطلاعات شخصی</a>
            </div>
        </div>


    </div>
</div>
