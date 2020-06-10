<?php

namespace App\Http\Controllers\Frontend;

use App\Address;
use App\City;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Information;
use App\Models\User;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function view()
    {
        $information = Information::find(1);
        if(!Auth::check()){
            return redirect()->route('frontend.home');
        }
        $user_item= User::find(Auth::user()->id);
        $address_item = $user_item->addresses;

        return view('frontend.address.view',compact('address_item','user_item','information'));
    }

    public function create()
    {
        $information = Information::find(1);
        $cityIT = City::IdTitles();
        $provinceIT = Province::IdTitles();
        return view('frontend.address.create',compact('cityIT','provinceIT','information'));
    }
    public function store(AddressRequest $addressRequest){

        $user_item= User::find(Auth::user()->id);
        $input = [
            'province' => request()->input('province'),
            'city'=>request()->input('city'),
            'address'=>request()->input('address'),
            'plate'=> request()->input('plate'),
            'unit'=> request()->input('unit'),
            'zip_code'=> request()->input('zip_code'),
            ];
        $new_address_object= Address::create($input);
        if ($user_item instanceof User) {
            $user_item->addresses()->attach($new_address_object->id);
            return view('frontend.address.view');
        }
    }

    public function edit($address_id) {
        $information = Information::find(1);
        $address_item = Address::find($address_id);
        $cityIT = City::IdTitles();
        $provinceIT = Province::IdTitles();
        return view('frontend.address.create',compact('cityIT','provinceIT','address_item','information'));
    }

    public function update($address_id)
    {

        $address_item=Address::find($address_id);

        $input = [
            'province'=>request()->input('province'),
            'city'=>request()->input('city'),
            'address'=>request()->input('address'),
            'plate'=>request()->input('plate'),
            'unit'=>request()->input('unit'),
            'zip_code'=>request()->input('zip_code'),
        ];


        if($address_item && $address_item instanceof Address){
            $new_address_object = $address_item::whereId($address_id)->update($input);
            return redirect()->route('frontend.address.view');
        }
    }
    public function delete($address_id){
        $user_item = User::find(Auth::user()->id);
        $address_item = Address::find($address_id);
        $addresses = $user_item->addresses->pluck('id');
        foreach ($addresses as $address) {
            if ($user_item instanceof User) {
                if ($address == $address_id) {
                    $result = $user_item->addresses()->detach($address_id);
                    if (isset($result)) {
                        $address_item->delete();
                        return redirect()->back();
                    }
                }
            }
        }
    }
}
