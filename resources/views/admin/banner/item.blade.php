<tbody>

<tr>
    <td>{{$category->id}}</td>
    <td>{{$category->title}}</td>
    <td>
        @if (isset($category->img_name))
            <img class="img-size-100"
                 src="{{asset('image/category')}}/{{$category->img_name}} ">
        @else
            تصویر موجود نیست
        @endif
    </td>
    <td>
        {{optional($category->categories)->title}}
    </td>
    <td>@include('admin.categories.operations',compact('categories'))</td>
</tr>

</tbody>
