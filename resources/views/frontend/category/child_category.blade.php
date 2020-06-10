
@foreach ($items as $category)
    <div class="fake"></div>
    <li class="list" > <a> <i class="fa fa-sliders" style="line-height: 1.6;"></i>{{$category->title}}</a>
        @include('frontend.category.item_children')
    </li>
@endforeach

