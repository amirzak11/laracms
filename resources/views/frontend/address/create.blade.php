@extends('frontend.dashboard.index')

@section('profile_c')
    @include('frontend.partial.notification')
    <div class="c-profile-status">
        @include('admin.partial.errors')

        <form action="" method="post">
            {{csrf_field()}}
            <div class="c-profile-status-row">
                <div class="c-profile-status-col">
                    <p>استان<span style="color: red">*</span></p>
                    <select name="province" style="" class="form-control ass js-example-basic-multiple">
                        <option value={{isset($address_item->province) ? $address_item->province : null}}>{{isset($address_item->province) ? $address_item->province : 'استان مورد نظر خود را انتخاب کنید'}} </option>
                        @foreach($provinceIT as $id => $title)
                            <option value="{{$title}}">
                                {{$title}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="c-profile-status-col">
                    <p>شهر <span style="color: red">*</span></p>
                    <select name="city" style="" class="form-control ass js-example-basic-multiple">
                        <option value={{isset($address_item->city) ? $address_item->city : null}}>{{isset($address_item->city) ? $address_item->city : 'شهر مورد نظر خود را انتخاب کنید'}} </option>
                        @foreach($cityIT as $id => $title)
                            <option value="{{$title}}">
                                {{$title}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="c-profile-status-col zip_code">
                    <p>آدرس پستی <span style="color: red">*</span></p>
                    <textarea name="address"  cols="56" rows="2">
                        {{isset($address_item->address) ? $address_item->address : ''}}
                    </textarea>
                </div>
                <div class="c-profile-status-col">
                    <p>پلاک<span style="color: red">*</span></p>
                    <input type="text" name="plate" value="{{isset($address_item->plate) ? $address_item->plate : ''}}" class="form-control" placeholder="پلاک">
                </div>
                <div class="c-profile-status-col">
                    <p>واحد</p>
                    <input type="text" name="unit" value="{{isset($address_item->unit) ? $address_item->unit : ''}}" class="form-control" placeholder="واحد">
                </div>

                <div class="c-profile-status-col zip_code">
                    <p>کد پستی<span style="color: red">*</span></p>
                    <input type="text" name="zip_code" value="{{isset($address_item->zip_code) ? $address_item->zip_code : ''}}" class="form-control" placeholder="کد پستی">
                </div>
                <div class="edit_profile">
                    <button type="submit" class="btn btn-block btn-outline-success btn-lg">
                        <i class="fa fa-sign-in"></i>
                        <span>ذخیره</span>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <h1>آخرین سفارش ها</h1>
    <div class="c-profile-status">
        <div style="height: 300px;" class="c-profile-status-row">

        </div>
    </div>
@endsection
