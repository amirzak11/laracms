@if(isset($ids))
    @if($category=\App\Traits\categories::getCategoryParent($ids))
        @foreach($category as $cat)
            @if($cat->category_id)
                <li style="margin-right: 30px; display: block; "><a href="##">{{$cat->title}}  <i class="fa fa-angle-down"></i> </a></li>
            @endif
        @endforeach
        @include('frontend.category.category_sub_box_parent_category',['category_parent'=>$category])
    @endif
@endif

