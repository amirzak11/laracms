<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function list()
    {
        $brands = Brand::all();
        return view('admin.brands.list', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(BrandRequest $brandRequest)
    {
        $input = [
            'name' => request()->input('name')
        ];

        $new_brand_object = Brand::create($input);

        /*create relation image and article*/

        $files = request()->file('product_item');

        if (isset($files) && $files !== null) {
            $random = Str::random(20);
            $new_article_name = $random . '.' . $files->getClientOriginalExtension();
            /*Product_storeAs*/
            $result = $files->storeAs('images', $new_article_name);
            /*If Result True*/
            if ($result) {
                /*insert to Array Input*/
                $image_input = [
                    'name' => $new_article_name,
                    'size' => $files->getSize(),
                    'type' => $files->getMimeType(),
                ];
            }
            $new_image_object = Image::create($image_input);
            if ($new_brand_object instanceof Brand) {
                $new_brand_object->images()->attach($new_image_object);
            }

        }

        if ($new_brand_object instanceof Brand) {
            return redirect()->back()->with(['success' => 'برند جدید با موفقیت اضافه شد']);
        }
    }

    public function edit($brands_id)
    {

        $brands = Brand::find($brands_id);
        $image = $brands->images;
        return view('admin.brands.edit', compact('image','brands'));
    }

    public function update(Request $request, $brands_id)
    {
        $input = [
            'name' => request()->input('name'),
        ];
        $brands = Brand::find($brands_id);
        if (isset($brands->name)) {
            if ($input['name'] == $brands->name) {
                return redirect()->back()->with(['error' => 'برند جدیدی انتخاب نکرده اید']);
            }
            if ($input && $brands && $brands instanceof Brand) {
                $brands->update($input);
                return redirect()->route('admin.brands.list')->with(['success' => 'برند با موفقیت ویرایش شد']);
            }

        }
    }

    public function delete($brands_id)
    {
        $brands = Brand::find($brands_id);

        if ($brands && $brands instanceof Brand) {
            $brands->delete();
            return redirect()->route('admin.brands.list')->with(['success' => 'فیلد مورد نظر با موفقیت حذف شد']);
        }
    }
}

