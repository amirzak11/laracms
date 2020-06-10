@foreach($category_parent as $cat)
    @if($cat && $ids=$cat->category_id)
        @include('frontend.category.item_parent',compact('ids'))
    @endif
    <li style=" margin: 1px"><span>/</span><a href="##">{{$cat->title}} </a> </li>
@endforeach




