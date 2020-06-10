<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use App\Models\Admin\Bannersable;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function list()
    {
        return view('admin.slideshop.list', compact('slide_shops', 'category'))->with(['panel_heading' => 'لیست اسلاید ها']);
    }

    public function create()
    {
        $allCategory = Category::get();
        $categoryIT = Category::IdTitles();

        return view('admin.banner.create', compact('allCategory', 'categoryIT'));
    }

    public function store(Request $request)
    {
        $input = [
            'name' => request()->input('name'),
        ];
        $new_banner_object = Banner::create($input);

        $files = request()->file('image_item');
        if (isset($files) && $files !== null) {
            foreach ($files as $file) {
                $random = Str::random(20);
                $new_product_name = $random . '.' . $file->getClientOriginalExtension();
                /*Product_storeAs*/
                $result = $file->storeAs('banner', $new_product_name);
                /*If Result True*/
                if ($result) {
                    /*insert to Array Input*/
                    $image_input = [
                        'name' => $new_product_name,
                        'size' => $file->getSize(),
                        'type' => $file->getMimeType(),
                    ];
                }
                $new_image_object = Image::create($image_input);
                $image_object[] = $new_image_object->id;
            }
        }
        $categories = request()->input('category');
        if (isset($categories) && $categories !== null) {
            foreach ($categories as $category) {
                $category_object[] = $category;
            }
        }
        for ($i = 0; $i < count($categories); $i++) {
            $bannersable_input = [
                'id' => $new_banner_object->id,
                'image_id' => $image_object[$i],
                'category_id' => $category_object[$i],
            ];
            $new_bannersable_object=Bannersable::create($bannersable_input);
        }

    }

}
