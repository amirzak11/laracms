<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Property;
use App\Traits\brandsable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{


    public function index()
    {

        $categories = Category::get();
        /*$categories=Category::whereNull('category_id')->with('childrenCategories')->get();*/
        return view('admin.categories.categories', compact('categories'));
    }

    public function list()
    {

        $categories = Category::all();
        return view('admin.categories.list', compact('categories'));
    }

    public function create()
    {

        $properties = Property::all();
        $allCategory = Category::get();
        if (isset($allCategory) && count($allCategory) > 0) {
            $categories = $allCategory->groupBy('category_id');
            $categories['root'] = $categories[''];
            unset($categories['']);
        } else {
            $categories = $allCategory;
        }
        $categoryIT = Category::IdTitles();
        $brandIT = Brand::BrandIdTitles();
        return view('admin.categories.create', compact('categories', 'brandIT', 'properties', 'categoryIT'));
    }

    public function store(CategoryRequest $categoryRequest)
    {

        $input = [
            'title' => request()->input('name'),
        ];

        $parent = request()->input('parent');

        if (isset($parent) && $parent != 0 && $parent != null) {
            $input['category_id'] = $parent;
        }
        if (request()->has('image_item')) {
            $input['type'] = request()->file('image_item')->getMimeType();
            $input['size'] = request()->file('image_item')->getSize();
            $random = Str::random(20);
            $new_image_name = $random . '.' . request()->file('image_item')->getClientOriginalExtension();
            /*image_storeAs*/
            $result = $categoryRequest->file('image_item')->storeAs('category', $new_image_name);
            if ($result) {
                $input['img_name'] = $new_image_name;
            }

        }

        $new_category_object = Category::create($input);

        $brand_title = request()->input('brand');
        if (isset($brand_title) && $brand_title !== null) {
            for ($i = 0; $i < count($brand_title); $i++) {

                if ($new_category_object instanceof Category) {
                    $new_category_object->brands()->attach($brand_title[$i]);
                }
            }
        }
        $properties_title = request()->input('property_title');
        for ($i = 0; $i < count($properties_title); $i++) {

            if (isset($properties_title) && !$properties_title[$i] == null) {
                $property_input = ['title' => $properties_title[$i],];
                $new_property_object = Property::create($property_input);

                if ($new_category_object instanceof Category) {
                    $new_category_object->properties()->attach($new_property_object->id);
                }
            }
        }
        if (is_a($new_category_object, Category::class)) {
            return redirect()->back()->with(['success' => 'دسته بندی جدید با موفقیت اضافه شد']);
        }

    }

    public function edit($categories_id)
    {
        $category_items = Category::find($categories_id);
        $categoryIT = Category::IdTitles();
        $brandIT = Brand::BrandIdTitles();
        $property = $category_items->properties;
        $brand = $category_items->brands;
        return view('admin.categories.edit', compact('brand','categoryIT', 'property', 'category_items', 'brandIT'));
    }

    public function update(Request $request, $categories_id)
    {
        $category_item = Category::find($categories_id);
        $input = [
            'title' => request()->input('name'),
        ];
        $parent = request()->input('parent');

        $properties_title = request()->input('property_title');


        if (isset($properties_title) && $properties_title !== null) {
            for ($i = 0; $i < count($properties_title); $i++) {
                $property_input = [
                    'title' => $properties_title[$i],
                ];
                $new_property_object = Property::create($property_input);
                if ($category_item) {
                    $category_item->properties()->attach($new_property_object->id);
                }
            }
        }

        $num_property = count($category_item->properties->pluck('id'));

        for ($i = 0; $i <= $num_property; $i++) {
            $change_property_title = request()->input('property_title' . $i);
            if (isset($change_property_title)) {
                $property_input = [
                    'title' => $change_property_title,
                ];
                $property_category = $category_item->properties;
                $new_image_object = Property::whereId($property_category->pluck('id')[$i])->update($property_input);
            }
        }


        if (isset($parent) && $parent != 0 && $parent != null) {
            $input['category_id'] = $parent;
        }

        $brand_title = request()->input('brand');

        if (isset($brand_title) && $brand_title !== null) {
            for ($i = 0; $i < count($brand_title); $i++) {
                $brand_title[$i];
                if ($category_item instanceof Category) {
                    $category_item->brands()->attach($brand_title[$i]);
                }
            }
        }
        if (isset($category_item->title)) {
            if ($input['title'] == null) {
                return redirect()->back()->with(['error' => 'دسته بندی جدیدی انتخاب نکرده اید']);
            }

            /******************************************************************************/
            if (request()->has('image_item')) {
                $input['size'] = request()->file('image_item')->getSize();
                $input['type'] = request()->file('image_item')->getMimeType();
                /*File_Name_Random*/
                $random = Str::random(20);
                $new_file_name = $random . '.' . request()->file('image_item')->getClientOriginalExtension();
                /*File_storeAs*/
                $result = $request->file('image_item')->storeAs('category', $new_file_name);

                if ($result) {
                    /*insert to Array Input*/
                    $input['img_name'] = $new_file_name;
                    /*save to database*/
                }

                if (isset($category_item->img_name)) {
                    $image_name = $category_item->img_name;
                    if (isset($image_name) && $image_name != '') {
                        Storage::delete('category/' . $image_name);
                    }
                }
            }


            /********************************************************************************************************/
            if ($input && $category_item && $category_item instanceof Category) {
                $category_item->update($input);
                return redirect()->route('admin.categories.list')->with(['success' => 'دسته بندی با موفقیت ویرایش شد']);
            }

        }
    }

    public
    function delete($categories_id)
    {
        $categories = Category::find($categories_id);
        if ($categories && $categories instanceof Category) {
            $categories->delete();
            return redirect()->route('admin.categories.list')->with(['success' => 'فیلد مورد نظر با موفقیت حذف شد']);
        }
    }


    public
    function property_delete($property_id, $category_id)
    {
        $category_item = Category::find($category_id);
        $property_item = Property::find($property_id);
        $properties = $category_item->properties->pluck('id');

        foreach ($properties as $property) {
            if ($category_item instanceof Category) {
                if ($property == $property_id) {
                    $result = $category_item->properties()->detach();
                    if (isset($result)) {
                        $property_item->delete();
                        return redirect()->back();
                    }
                }
            }
        }
    }
}






