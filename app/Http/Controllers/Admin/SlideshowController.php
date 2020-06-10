<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileRequest;
use App\Http\Requests\SlideshowRequest;
use App\Models\File;
use App\Models\Slideshow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SlideshowController extends Controller
{

    public function list()
    {
        $slideshows = Slideshow::all();
        return view('admin.slideshow.list', compact('slideshows'))->with(['panel_heading' => 'لیست اسلاید ها']);
    }

    public function create()
    {
        return view('admin.slideshow.create')->with(['panel_heading' => 'ثبت اسلاید جدید']);
    }

    public function store(SlideshowRequest $slideshowRequest)
    {
        /*Insert Request form data*/
        $input = [
            'title' => request()->input('title'),
            'description' => request()->input('description'),
            'type' => request()->file('slideshow_item')->getMimeType(),
            'size' => request()->file('slideshow_item')->getSize(),

        ];

        /*Slideshow_Name_Random*/
        $random = Str::random(20);
        $new_slideshow_name = $random . '.' . request()->file('slideshow_item')->getClientOriginalExtension();
        /*Slideshow_storeAs*/
        $result = $slideshowRequest->file('slideshow_item')->storeAs('slideshow', $new_slideshow_name);
        /*If Result True*/

        if ($result) {
            /*insert to Array Input*/
            $input['name'] = $new_slideshow_name;
            /*save to database*/
            $new_slideshow_object = Slideshow::create($input);

            if ($new_slideshow_object instanceof Slideshow) {
                return redirect()->route('admin.slideshow.list')->with('success', 'اسلاید جدید با موفقیت ایجاد گردید');
            }
        }

    }

    public function delete($slideshow_id)
    {

        if ($slideshow_id && ctype_digit($slideshow_id)) {
            $slideshow_item = Slideshow::find($slideshow_id);
            if ($slideshow_item && $slideshow_item instanceof Slideshow) {

                $image_name = $slideshow_item->slideshow_name;

                $slideshow_item->delete();

                if (isset($image_name) && $image_name != '') {
                    Storage::delete('slideshow/' . $image_name);
                }
                return redirect()->route('admin.slideshow.list')->with('success', 'فیلد مورد نظر با موفقیت حذف گردید');
            }
        }
    }

    public function edit($slideshow_id)
    {
        if ($slideshow_id && ctype_digit($slideshow_id)) {
            $slideshow_items = Slideshow::find($slideshow_id);
            if ($slideshow_items && $slideshow_items instanceof Slideshow) {
                return view('admin.slideshow.edit', compact('slideshow_items'));
            }
        }
    }

    public function update(SlideshowRequest $slideshowRequest, $slideshow_id)
    {
        $slideshow_item = Slideshow::find($slideshow_id);
        /*Insert Request form data*/
        $input = [
            'title' => request()->input('title'),
            'description' => request()->input('description'),
        ];

        if (request()->has('slideshow_item')) {
            $input['size']=request()->file('slideshow_item')->getSize();
            $input['type']=request()->file('slideshow_item')->getMimeType();
            /*Slideshow_Name_Random*/
            $random = Str::random(20);
            $new_slideshow_name = $random . '.' . request()->file('slideshow_item')->getClientOriginalExtension();
            /*Slideshow_storeAs*/
            $result = $slideshowRequest->file('slideshow_item')->storeAs('slideshow', $new_slideshow_name);

            if ($result) {
                /*insert to Array Input*/
                $input['name'] = $new_slideshow_name;
                /*save to database*/
            }

            if(isset($slideshow_item->name)){
                $image_name = $slideshow_item->name;
                if (isset($image_name) && $image_name != '') {
                    Storage::delete('slideshow/' . $image_name);
                }
            }
        }
        if ($slideshow_item instanceof Slideshow) {
            $slideshow_item->update($input);
            return redirect()->route('admin.slideshow.list')->with('success', 'اسلاید جدید با موفقیت ایجاد گردید');
        }
    }
}
