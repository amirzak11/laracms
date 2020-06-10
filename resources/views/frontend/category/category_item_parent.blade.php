
@if(isset($ids))
    @if($category=\App\Traits\categories::getCategoryParent($ids))
        @foreach($category as $cat)
            <li style="display: inline-block"><span>/</span><a href="##">{{$cat->title}} </a> </li>
        @endforeach

        @include('frontend.category.category_parent_category',['category_parent'=>$category])
    @endif
@endif

