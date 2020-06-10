@if(isset($category))

        @if(isset($category_parent))
            @foreach($category as $cat)

                @if($ids=$cat->category_id)
                    @include('frontend.category.category_sub_box_item_parent',compact('ids'))
                @endif
                @break
            @endforeach

        @else
            @foreach($category as $cat)
                @if($ids=$category->category_id)
                    @include('frontend.category.category_sub_box_item_parent',compact('ids'))
                @endif
                @break
            @endforeach
        @endif

@endif





