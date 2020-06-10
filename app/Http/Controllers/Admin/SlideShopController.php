<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlideshopRequest;
use App\Http\Requests\SlideshowRequest;
use App\Models\Admin\SlideShop;
use App\Models\Category;
use Illuminate\Http\Request;

class SlideShopController extends Controller
{
    public function list()
    {

        $slide_shops = SlideShop::all()->pluck('category_id')->toArray();
        foreach ($slide_shops as $slide){
            $category[] = Category::find($slide);
        }
        return view('admin.slideshop.list', compact('slide_shops','category'))->with(['panel_heading' => 'لیست اسلاید ها']);
    }

    public function create()
    {
        $allCategory = Category::get();$allCategory = Category::get();

        return view('admin.slideshop.create', compact('allCategory'))->with(['panel_heading' => 'ثبت اسلاید جدید']);
    }

    public function store(SlideshopRequest $slideshopRequest)
    {

        $categories = request()->input('categories');
        $input = [
            'category_id' => $categories,
        ];

        $new_slide_object = SlideShop::create($input);
        if ($new_slide_object instanceof SlideShop) {
            return redirect()->route('admin.slideshop.list')->with('success', 'اسلاید جدید با موفقیت ایجاد گردید');
        }
    }

    public function delete($cat_id)
    {
        $slideshop_item=SlideShop::query()
            ->where('category_id', 'LIKE', "%{$cat_id}%")
            ->first();
            if ($slideshop_item) {
                $slideshop_item->delete();
                return redirect()->route('admin.slideshop.list')->with('success', 'فیلد مورد نظر با موفقیت حذف گردید');
            }
    }



}

