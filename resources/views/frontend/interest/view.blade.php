@extends('frontend.dashboard.index')

@section('profile_c')
    <h1>لیست علاقه مندی ها</h1>
    <div class="c-profile-status">
        <div class="c-profile-status-row">
            <div class="c-my-landing-page__wish-list-carousel">
                @foreach($interests as $interest)

                    <a href="{{route('frontend.product.list',$interest['id'])}}" class="c-checkout__group">
                        @if($image_id = $interest['id'])
                            @inject('model_product', 'App\Models\Product')
                            @if($interest_find = $model_product::find($image_id))
                                @if($images=$interest_find->images()->get()->pluck('name')->toArray())
                                    @foreach($images as $image )
                                        <div class="image_interest">
                                            <img
                                                src="{{asset('image/images')}}/{{$image}} ">
                                            <div class="item_name"> {{$interest['name']}}  </div>
                                            <div class="item_price"><p>{{number_format($interest['price'])}}</p>
                                                <span>{{$interest['discount']}}%</span></div>
                                            <div
                                                class="item_discount"> {{number_format($interest['price'] -(($interest['discount']*$interest['price'])/100)) }}
                                                <span>تومان</span></div>

                                        </div>
                                        @break
                                    @endforeach
                                @endif
                            @endif
                        @else
                            تصویر موجود نیست
                        @endif
                    </>
                @endforeach
            </div>
        </div>
    </div>
@endsection
