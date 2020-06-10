<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\User;
use App\Traits\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use categories;
    public function view()
    {
        $information = Information::find(1);
        return view('frontend.profile.view',compact('information'));
    }

    public function edit()
    {
        $information = Information::find(1);
        return view('frontend.profile.form',compact('information'));
    }

    public function update(Request $request)
    {
        $user_item=User::find(Auth::user()->id);

        $input = [
            'name' => request()->input('name'),
            'email' => request()->input('email'),
            'mobile' => request()->input('mobile'),
            'code' => request()->input('code'),
            'card_number'=>request()->input('card_number'),

        ];
        $new_user_object=$user_item::whereId(Auth::user()->id,'=','id')->update($input);
        if($new_user_object){
            return redirect()->route('frontend.profile.view');
        }
    }


}
