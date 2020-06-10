<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProvinceRequest;
use Illuminate\Http\Request;
use App\Province;
use App\City;

class ProvinceController extends Controller
{
    public function list()
    {
        $provinces = Province::all();
        return view('admin.provinces.list', compact('provinces'));
    }

    public function create()
    {
        $cites = City::all();
        $provinceIT = Province::IdTitles();

        return view('admin.provinces.create', compact('cites', 'provinceIT'));
    }

    public function store(ProvinceRequest $provinceRequest)
    {
        $input = [
            'name' => request()->input('name'),
        ];
        $new_province_object = Province::create($input);


        $cites = request()->input('city');
        for ($i = 0; $i < count($cites); $i++) {
            if (isset($cites) && !$cites[$i] == null) {
                $city_input = ['name' => $cites[$i],];
                $new_city_object = City::create($city_input);

                if ($new_province_object instanceof Province) {
                    $new_province_object->cites()->attach($new_city_object->id);
                }
            }
        }
        if (is_a($new_province_object, Province::class)) {
            return redirect()->back()->with(['success' => 'استان جدید با موفقیت اضافه شد']);
        }

    }

    public function edit($provinces_id)
    {
        $province_items = Province::find($provinces_id);
        $provinceIT = Province::IdTitles();
        $city = $province_items->cites;
        return view('admin.provinces.edit', compact('provinceIT', 'city', 'province_items'));
    }

    public function update(Request $request, $provinces_id)
    {
        $province_item = Province::find($provinces_id);
        $input = [
            'name' => request()->input('name'),
        ];

        $cites = request()->input('city');


        if (isset($cites) && $cites !== null) {
            for ($i = 0; $i < count($cites); $i++) {
                $city_input = [
                    'name' => $cites[$i],
                ];
                $new_city_object = City::create($city_input);
                if ($province_item) {
                    $province_item->cites()->attach($new_city_object->id);
                }
            }
        }

        $num_city = count($province_item->cites->pluck('id'));

        for ($i = 0; $i <= $num_city; $i++) {
            $change_city_title = request()->input('city' . $i);
            if (isset($change_city_title)) {
                $city_input = [
                    'name' => $change_city_title,
                ];
                $city_province = $province_item->cites;
                $new_image_object = City::whereId($city_province->pluck('id')[$i])->update($city_input);
            }
        }


        if (isset($province_item->name)) {
            if ($input['name'] == null) {
                return redirect()->back()->with(['error' => 'استان جدید انتخاب نکرده اید']);
            }


            if ($input && $province_item && $province_item instanceof Province) {
                $province_item->update($input);
                return redirect()->route('admin.provinces.list')->with(['success' => 'آدرس با موفقیت ویرایش شد']);
            }

        }
    }

    public function delete($provinces_id)
    {
        $provinces = Province::find($provinces_id);
        if ($provinces && $provinces instanceof Province) {
            $provinces->delete();
            return redirect()->route('admin.provinces.list')->with(['success' => 'فیلد مورد نظر با موفقیت حذف شد']);
        }
    }


    public function city_delete($city_id, $province_id)
    {
        $province_item = Province::find($province_id);
        $city_item = City::find($city_id);
        $cites = $province_item->cites->pluck('id');
        foreach ($cites as $city) {
            if ($province_item instanceof Province) {
                if ($city == $city_id) {
                    $result = $city_item->provinces()->detach();
                    if (isset($result)) {
                        $city_item->delete();
                        return redirect()->back();
                    }
                }
            }
        }
    }
}
