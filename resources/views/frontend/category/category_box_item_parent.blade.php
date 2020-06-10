@if(isset($ids))
    @if($category=\App\Traits\categories::getCategoryParent($ids))
        @foreach($category as $cat)
            @if(!$cat->category_id)
                <li style="margin-right: 10px; display: block; "> <a href="##"> {{$cat->title}}  <i class="fa fa-angle-left" ></i> </a></li>
            @endif
        @endforeach
        @include('frontend.category.category_box_parent_category',['category_parent'=>$category])
    @endif
@endif

