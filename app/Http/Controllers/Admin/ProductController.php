<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Model\Admin\Content;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Information;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::all();
        return view('admin.product.list', compact('products'))->with(['panel_heading' => 'لیست فایل ها']);
    }

    public function create()
    {
        $brands = Brand::all();
        $properties = Property::all();
        $allCategory = Category::get();
        if (isset($allCategory) && count($allCategory) > 0) {
            $categories = $allCategory->groupBy('category_id');
            $categories['root'] = $categories[''];
            unset($categories['']);
        } else {
            $categories = $allCategory;
        }
        $category = Category::find(request()->input('categories'));
        if ($category instanceof Category) {
            $properties = $category->properties;
        } else {
            $properties = null;
        }
        return view('admin.product.create2', compact('categories', 'category', 'brands', 'allCategory', 'properties'))->with(['panel_heading' => 'ثبت محصول جدید']);
    }

    public function edit($product_id)
    {
        $product_items = Product::find($product_id);
        $cat_item = $product_items->categories;
        foreach ($cat_item as $cat) {
            $category_item = Category::find($cat->id);
            if ($category_item instanceof Category) {
                $brand = $category_item->brands;
            }
            if ($category_item instanceof Category) {
                $properties = $category_item->properties;
            }
        }

        if ($product_items instanceof Product) {
            $properties_product = $product_items->properties->pluck('name');
        }

        if (isset($brand)) {

        } else {
            $brand = null;
        }
        $brands = Brand::all();
        $allCategory = Category::get();
        if ($product_id && ctype_digit($product_id)) {
            $allCategory = Category::get();
        }
        if (isset($allCategory) && count($allCategory) > 0) {
            $categories = $allCategory->groupBy('category_id');
            $categories['root'] = $categories[''];
            unset($categories['']);
        } else {
            $categories = $allCategory;
        }
        $brand_product = $product_items->brands;
        $image = $product_items->images;
        $categoryBrand = $product_items->categories;
        if ($product_items && $product_items instanceof Product) {
            return view('admin.product.edit', compact('product_items', 'brands', 'brand', 'brand_product', 'properties', 'properties_product', 'cat_item', 'categories', 'categoryBrand', 'image', 'allCategory'));
        }
    }

    public function create_category(Request $request)
    {

        $properties = Property::all();
        $brands = Brand::all();
        $allCategory = Category::get();
        if (isset($allCategory) && count($allCategory) > 0) {
            $categories = $allCategory->groupBy('category_id');
            $categories['root'] = $categories[''];
            unset($categories['']);
        } else {
            $categories = $allCategory;
        }
        return view('admin.product.create', compact('allCategory', 'categories', 'brands', 'properties'))->with(['panel_heading' => 'ثبت محصول جدید']);
    }

    public function store(ProductRequest $productRequest)
    {

        /*create information product*/
        $input = [
            'name' => request()->input('name'),
            'number' => request()->input('number'),
            'seller' => request()->input('seller'),
            'warranty' => request()->input('warranty'),
            'price' => request()->input('price'),
            'discount' => request()->input('discount'),
        ];
        $new_product_object = Product::create($input);
        /*create relation image and product*/
        $files = request()->file('product_item');
        if (isset($files) && $files !== null) {
            foreach ($files as $file) {
                $random = Str::random(20);
                $new_product_name = $random . '.' . $file->getClientOriginalExtension();
                /*Product_storeAs*/
                $result = $file->storeAs('images', $new_product_name);
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
                if ($new_product_object instanceof Product) {
                    $new_product_object->images()->attach($new_image_object);
                }
            }
        }
        /*create properties relation product */
        $properties_title = request()->input('property_title');
        $properties_name = request()->input('property_name');
        if (isset($properties_title)) {
            for ($i = 0; $i < count($properties_title); $i++) {
                if (!$properties_name[$i] == null) {
                    $property_input = [
                        'title' => $properties_title[$i],
                        'name' => $properties_name[$i],
                    ];
                    $new_property_object = Property::create($property_input);
                    if ($new_product_object instanceof Product) {
                        $new_product_object->properties()->sync($new_property_object->id);
                    }
                }
            }
        }
        /*get content information from input */

        /*content insert to Array Input*/
        if (request()->input('article-ckeditor')) {
            $content_input = [
                'content' => request()->input('article-ckeditor'),
            ];
            $new_content_object = Content::create($content_input);
            if ($new_product_object instanceof Product) {
                $new_product_object->content()->attach($new_content_object);
            }
        }
        /*find input categories to table Category*/
        $category = Category::find(request()->input('categories'));
        /*get brand information from input */
        $brand = request()->input('brand');
        /*creating relationship tables Brand AND Category with Product */
        if ($new_product_object instanceof Product) {
            if ($productRequest->has('categories')) {
                $new_product_object->categories()->sync($category);
            }
            if ($productRequest->has('brand')) {
                $new_product_object->brands()->sync($brand);
            }
        }
        return redirect()->route('admin.product.list')->with('success', 'محصول جدید با موفقیت ایجاد گردید');
    }

    public function update(ProductRequest $productRequest, $product_id)
    {
        $product_item = Product::find($product_id);
        /*Insert Request form data*/
        $input = [
            'name' => request()->input('name'),
            'description' => request()->input('description'),
            'seller' => request()->input('seller'),
            'warranty' => request()->input('warranty'),
            'price' => request()->input('price'),
            'discount' => request()->input('discount'),
        ];
        $files = request()->file('product_item');
        if (isset($files) && $files !== null) {
            foreach ($files as $file) {
                $random = Str::random(20);
                $new_product_name = $random . '.' . $file->getClientOriginalExtension();
                /*Product_storeAs*/
                $result = $file->storeAs('images', $new_product_name);
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
                if ($product_item) {
                    $product_item->images()->attach($new_image_object->id);
                }
            }
        }
        $num_images = count($product_item->images->pluck('id'));
        for ($i = 0; $i <= $num_images; $i++) {
            $change_images = request()->file('product_item' . $i);
            if (isset($change_images)) {
                $random = Str::random(20);
                $new_product_name = $random . '.' . $change_images->getClientOriginalExtension();
                $result = $change_images->storeAs('images', $new_product_name);
                if ($result) {
                    /*insert to Array Input*/
                    $image_input = [
                        'name' => $new_product_name,
                        'size' => $change_images->getSize(),
                        'type' => $change_images->getMimeType(),
                    ];
                    $img = $product_item->images;
                    $image = Image::whereId($img->pluck('id'))->pluck('name');
                    if (isset($image)) {
                        Storage::delete('images', $image[0]);
                    }
                    $new_image_object = Image::whereId($img->pluck('id')[$i])->update($image_input);
                }
            }
        }
        $properties_title = request()->input('property_title');
        $properties_name = request()->input('property_name');

        $prp = $product_item->properties;


        /*if ($product_item instanceof Product) {
            dd($properties_product = $product_item->properties->pluck('name'));

        dd($prp[6]->id);
        }*/


        $product_properties = $product_item->properties->pluck('id');

        if (isset($properties_title)) {

            for ($i = 0; $i < count($properties_name); $i++) {

                if (!$properties_title[$i] == null) {
                    $new_property_object = Property::whereId($product_properties[$i], '=', 'id')->update(['title' => $properties_title[$i]]);
                }
                if (!$properties_name[$i] == null) {
                    $new_property_object = Property::whereId($product_properties[$i], '=', 'id')->update(['name' => $properties_name[$i]]);
                }
            }
        }

        $num_property = count($product_item->properties->pluck('id'));
        for ($i = 0; $i <= $num_property; $i++) {
            $change_property_title = request()->input('property_title' . $i);
            $change_property_name = request()->input('property_name' . $i);
            if (isset($change_property_title) or isset($change_property_name)) {
                $property_input = [
                    'title' => $change_property_title,
                    'name' => $change_property_name,
                ];
                $property_product = $product_item->properties;
                $new_image_object = Property::whereId($property_product->pluck('id')[$i])->update($property_input);
            }
        }

        if ($product_item instanceof Product) {
            $product_item->update($input);
            $category = request()->input('categories');
            $brand = request()->input('brand');
            if ($product_item->has('categories')) {
                $product_item->categories()->sync($category);
            }
            if ($productRequest->has('brand')) {
                $product_item->brands()->sync($brand);
            }
        }

        return redirect()->route('admin.product.list')->with('success', 'فایل جدید با موفقیت ایجاد گردید');
    }

    public function img_delete($image_id, $product_id)
    {
        $product_item = Product::find($product_id);
        $image_item = Image::find($image_id);
        if (isset($image_item)) {
            unlink(storage_path('../public/image/images/' . $image_item->name));
        }
        $images = $product_item->images->pluck('id');
        foreach ($images as $image) {
            if ($image == $image_id) {
                $result = $image_item->products()->detach();
                if (isset($result)) {
                    $image_item->delete();
                    return redirect()->back();
                }
            }
        }
    }

    public function property_delete($property_id, $product_id)
    {
        $product_item = Product::find($product_id);
        $property_item = Property::find($property_id);
        $properties = $product_item->properties->pluck('id');
        foreach ($properties as $property) {
            if ($property == $property_id) {
                $result = $property_item->products()->detach();
                if (isset($result)) {
                    $property_item->delete();
                    return redirect()->back();
                }
            }
        }
    }

    public function delete($product_id)
    {
        if ($product_id && ctype_digit($product_id)) {
            $product_item = Product::find($product_id);
            if ($product_item && $product_item instanceof Product) {
                $image_name = $product_item->name;
                $product_item->delete();

                if (isset($image_name) && $image_name != '') {
                    Storage::delete('images/' . $image_name);
                }
                return redirect()->route('admin.product.list')->with('success', 'فیلد مورد نظر با موفقیت حذف گردید');
            }
        }
    }

    public function category_create()
    {
        return view('admin.product.category_create');
    }

    public function category_store(CategoryRequest $categoryRequest)
    {
        $input = [
            'category_name' => request()->input('name')
        ];
        $new_category_object = Category::create($input);
        if ($new_category_object instanceof Category) {
            return redirect()->route('admin.product.create')->with(['success' => 'دسته بندی جدید با موفقیت اضافه شد']);
        }
    }

    public function brand_create()
    {
        return view('admin.product.brand_create');
    }

    public function brand_store(BrandRequest $brandRequest)
    {

        $input = [
            'name' => request()->input('name')
        ];

        $new_category_object = Brand::create($input);
        if ($new_category_object instanceof Brand) {
            return redirect()->route('admin.product.create')->with(['success' => 'برند جدید با موفقیت اضافه شد']);
        }
    }
}
