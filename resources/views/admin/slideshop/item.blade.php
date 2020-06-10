<tbody>
<tr>

    <td>{{$cat->title}}</td>
    <td>
        @if (isset($cat->img_name))
            <img class="img-size-100"
                 src="{{asset('image/category')}}/{{$cat->img_name}} ">
        @else
            تصویر موجود نیست
        @endif
    </td>
    <td>@include('admin.slideshop.operations')</td>
</tr>
</tbody>
