@extends('layouts.frontend')

@section('content')
    <div class="container--home">
        <div class="a-container">
            <div class="contact-us">
                <div class="form_contact_us">
                    <div class="c-info-page__title">
                        <h3>تماس با ما</h3>
                        <p>برای پیگیری یا سوال درباره سفارش و ارسال پیام بهتر است از فرم زیر استفاده کنید.</p>
                    </div>
                    <form method="post" action="">
                        <div class="c-group">
                            <p>نام نام خانوادگی<span>*</span></p> <input class="name" type="text" name="name">
                        </div>
                        <div class="c-group">
                            <p>ایمیل <span>*</span></p> <input class="email" type="email" name="email">
                        </div>
                        <div class="c-group">
                            <p> تلفن تماس<span>*</span></p> <input class="tell" type="text" name="tell">
                        </div>
                        <div class="c-group">
                            <p>موضوع <span>*</span></p> <input class="subject" type="text" name="subject">
                        </div>
                        <div class="c-group">
                            <p>شماره سفارش</p> <input class="order_number" type="text" name="order_number">
                        </div>
                        <div class="c-group">
                            <p>متن پیام<span>*</span></p> <textarea class="text" name="text"></textarea>
                        </div>
                        <div class="c-group">
                            <input class="submit" type="submit" value="ارسال">
                        </div>
                    </form>
                </div>
                <div class="c-contact-us-info">
                    <div class="contact-tell">
                        <p>تلفن تماس و فکس : <span>{{$information->tell}}</span> <span>(پاسخگویی ۲۴ ساعته، ٧ روز هفته)</span></p>
                    </div>
                    <div class="contact-address">
                        <h3>آدرس :</h3>
                        <p> {{$information->address}}</p>
                        <p>ایمیل سازمانی : {{$information->email}}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
