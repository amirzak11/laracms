<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\Information;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login()
    {
        $information = Information::find(1);

        return view('frontend.users.login',compact('information'));
    }

    public function register()
    {
        return view('frontend.users.register');
    }

    public function singin(UserRegisterRequest $userRegisterRequest)
    {

        $token = Str::random(7);
        $input = [
            'mobile' => request()->input('mobile'),
            'password' => request()->input('password'),
            'token' => $token,
        ];
        $new_user_object = User::create($input);
        if ($new_user_object instanceof User) {
            return redirect()->route('frontend.user.login')->with('success', 'ثبت نام با موفقیت انجام شد');
        }
    }

    public function login_user(Request $request)
    {
        $information = Information::find(1);
        $input = request()->input('mobile');
        if (strpos($input, '@') !== false) {
            if(Auth::attempt(['email'=>$request->input('mobile'),'password'=>$request->input('password')])){
                return view('frontend.profile.view',compact('information'));
            }/*
            if ($user = User::where('email', '=', $input)->first()) {
                if($password = request()->input('password')){
                    if(Hash::check($password, $user->password)){
                        return view('frontend.dashboard.profile',compact('user'));
                    } else {
                        echo 'درست نیست';
                    }
                }
            } else {
                echo 'درست نیست';
            }*/
        } else {
            if(Auth::attempt(['mobile'=>$request->input('mobile'),'password'=>$request->input('password')])){
                return view('frontend.profile.view',compact('information'));
            }
            /*
            if ($user = User::where('mobile', '=', $input)->first()) {
                if($password = request()->input('password')){
                    if(Hash::check($password, $user->password)){
                        return view('frontend.dashboard.profile',compact('user'));
                    }
                }
            } else {
                echo 'درست نیست';
            }*/
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('frontend.home');
    }
}

