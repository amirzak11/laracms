<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformationRequest;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InformationController extends Controller
{
    public function edit()
    {
        $info = Information::find(1);
        return view('admin.information.edit', compact('info'));
    }

    public function update(InformationRequest $informationRequest)
    {
        $info=Information::find(1);

        $input = [
            'name' => request()->input('name'),
            'address_web' => request()->input('address_web'),
            'tell' => request()->input('tell'),
            'address' => request()->input('address'),
            'instagram' => request()->input('instagram'),
            'youtube' => request()->input('youtube'),
            'description'=>request()->input('description'),
            'content'=>request()->input('content'),

        ];
        if (request()->has('logo_item')) {
            $input['logo_size'] = request()->file('logo_item')->getSize();
            $input['logo_type'] = request()->file('logo_item')->getMimeType();
            $random = Str::random(10);
            $new_logo_name = $random . '.' . request()->file('logo_item')->getClientOriginalExtension();
            $result = $informationRequest->file('logo_item')->storeAs('information', $new_logo_name);
            if ($result) {
                $input['logo_name'] = $new_logo_name;

            }
            if(isset($info->logo_name)){
               $image_name=$info->logo_name;
                if(isset($image_name)&& $image_name!=''){
                    Storage::delete('information/'.$image_name);
                }
            }
        }
        if($info instanceof Information){
            $info->update($input);
            return redirect()->route('admin.info.edit')->with('success','با موفقیت ایجاد گردید');
        }

    }

}
