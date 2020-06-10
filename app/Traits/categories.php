<?php


namespace App\Traits;


use App\Models\Category;

trait categories
{
    public function category()
    {
        $allCategory = Category::get();
        if (isset($allCategory) && count($allCategory) > 0) {
            $categories = $allCategory->groupBy('category_id');
            $categories['root'] = $categories[''];
            unset($categories['']);
        } else {
            $categories = $allCategory;
        }
        return $categories;
    }


    public static function getCategoryParent($category_id){

        return Category::where('id', '=', $category_id)->get();

    }

}
