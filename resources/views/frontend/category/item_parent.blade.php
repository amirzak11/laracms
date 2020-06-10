@if($category=\App\Traits\categories::getCategoryParent($ids))
    @include('frontend.category.parent_category',['category_parent'=>$category])
@endif

