@if(isset($categoryBrand))
    @foreach($categoryBrand as $cat)
        <li class="list" style="margin-right: 10px;">
            <a style="font-family: 'Iranian Sans'"> <input type="radio" aria-selected="true" name="categories"
                                                           value=
                                                           "{{$category->id}}"
                                                           @if($cat->id==$category->id)
                                                           checked
                    @endif
                >
                {{$category->title}}
            </a>
            @if(isset($categories[$category->id]))
                <ul class="items">
                    @include('admin.categories.child_category',['items'=>$categories[$category->id]])
                </ul>
            @endif
        </li>
    @endforeach
@else
    <li class="list" style="margin-right: 10px;">
        <a style="font-family: 'Iranian Sans'"> <input type="radio" aria-selected="true" name="categories" value="{{$category->id}}">
            {{$category->title}}
        </a>
        @if(isset($categories[$category->id]))
            <ul class="items">
                @include('admin.categories.child_category',['items'=>$categories[$category->id]])
            </ul>
        @endif
    </li>
@endif
