@extends('frontend.dashboard.index')

@section('profile_c')
    @include('frontend.partial.notification')
    <h1>آدرس ها</h1>
    <div class="c-profile-status-address">
        @include('admin.partial.errors')
        <div class="c-profile-address-container">
            @foreach($address_item as $item)
                <div class="c-profile-address-card">
                    <div class="c-profile-address-card__desc">
                        <h4 class="js-address-full_name">{{$user_item->name}}</h4>
                        <p class="c-checkout-address__text">
                            {{$item->province}},{{$item->city}},{{$item->address}}, پلاک{{$item->plate}},واحد {{$item->unit}}
                        </p>
                    </div>
                    <div class="c-profile-address-card__data">
                        <ul class="c-profile-address-card__methods">
                            <li><i class="fa fa-map-marker"></i>کد پستی :  {{$item->zip_code}}</li>
                            <li><i class="fa fa-mobile"></i>شماره تلفن : {{$user_item->mobile}}</li>
                        </ul>
                        <div class="c-profile-address-card__actions">
                            <a href="{{route('frontend.address.edit',$item->id)}}">ویرایش</a>
                            <a href="{{route('frontend.address.delete',$item->id)}}">حذف</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
