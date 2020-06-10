@if(isset($categories[$category->id]))

    <ul class="items">

        <div>همه دسته بندی های {{$category->title}} <i style="font-size: 10px;color: #000" class="fa fa-angle-left"></i></div>
        {{--@include('frontend.category.child_cat',['items'=>$categories[$category->id]])--}}
        @foreach ($categories[$category->id] as $category)
            @if(isset($category->category_id))
                <li><a href="{{route('frontend.search.list',$category->id)}}">
                            {{$category->title}}
                        @if(isset($categories[$category->id]))
                            <i style="font-size: 15px ;color: #000" class="fa fa-angle-left"></i>
                        @endif
                    </a>
                </li>
                @if(isset($categories[$category->id]))
                    @foreach ($categories[$category->id] as $category)
                        @if(isset($category->category_id))
                            <li>
                                 <a href="{{route('frontend.search.list',$category->id)}}" style="color: #888">
                                    {{$category->title}}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endif
        @endforeach
    </ul>
@endif

