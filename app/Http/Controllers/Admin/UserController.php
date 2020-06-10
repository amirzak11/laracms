<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Models\Information;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        /*
        $user=User::find(1);
        $user->packages()->attach([1=>['amount'=>120000,'created_at'=>date('Y-m-d H:i:s')]]);*/

        $user = User::count();

        return view('admin.dashboard.index', compact('user'));

    }

    public function list()
    {

        $users = User::all();

        return view('admin.user.list', compact('users'))->with(['panel_heading' => 'لیست کاربران']);
    }

    public function create()
    {
        return view('admin.user.create')->with(['panel_heading' => 'ثبت نام کاربر جدید']);
    }

    public function store(UserCreateRequest $userCreateRequest)
    {
        $token = Str::random(7);
        $input = [
            'name' => request()->input('name'),
            'email' => request()->input('email'),
            'mobile' => request()->input('mobile'),
            'password' => request()->input('password'),
            'role' => request()->input('roles'),
            'token' => $token,
        ];
        $new_user_object = User::create($input);
        if ($new_user_object instanceof User) {
            return redirect()->route('admin.user.list')->with('success', 'کاربر جدید با موفقیت ایجاد گردید');
        }
    }

    public function delete($user_id)
    {
        if ($user_id && ctype_digit($user_id)) {
            $user_item = User::find($user_id);
            if ($user_item && $user_item instanceof User) {
                $user_item->delete();
                return redirect()->route('admin.user.list')->with('success', 'کاربر مورد نظر با موفقیت حذف گردید');
            }
        }
    }

    public function edit($user_id)
    {
        if ($user_id && ctype_digit($user_id)) {
            $user_items = User::find($user_id);
            if ($user_items && $user_items instanceof User) {
                return view('admin.user.edit', compact('user_items'));
            }
        }
    }

    public function update(UserCreateRequest $userCreateRequest, $user_id)
    {
        $input = [
            'name' => request()->input('name'),
            'email' => request()->input('email'),
            'mobile' => request()->input('mobile'),
            'password' => request()->input('password'),
            'role' => request()->input('roles'),
            'wallet' => request()->input('wallet'),
        ];
        if (!request()->has('password')) {
            unset($input['password']);
        }

        $user_item = User::find($user_id);
        if ($user_item && $user_item instanceof User) {
            $user_item->update($input);
        }
        return redirect()->back()->with('success', 'فیلد مورد نظر با موفقیت تغییر کرد');

    }

    public function packages(Request $request, $user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return redirect()->back();
        }
        $user_packages = $user->packages()->get();

        return view('admin.user.packages', compact('user_packages'))->with(['panel_heading' => 'نمایش لیست پکیج های کاربر']);
    }


    public function login()
    {


        return view('admin.login.form');
    }

    public function login_admin(Request $request)
    {
        $information = Information::find(1);
        $input = request()->input('mobile');
        if (strpos($input, '@') !== false) {
            if (Auth::attempt(['email' => $request->input('mobile'), 'password' => $request->input('password')])) {
                return redirect()->route('admin');
            }
        } else {
            if (Auth::attempt(['mobile' => $request->input('mobile'), 'password' => $request->input('password')])) {
                return redirect()->route('admin');
            }
        }
        return redirect()->route('frontend.home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('frontend.home');
    }
}
