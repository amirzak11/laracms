<tbody>
<tr>
    <td>{{$slideshow->id}} </td>
    <td>{{$slideshow->title}}</td>
    <td>{{$slideshow->description}}</td>
    <td>
        @if (isset($slideshow->name))
            <img class="img-size-100"
                 src="{{asset('image/slideshow')}}/{{$slideshow->name}} ">
        @else
            تصویر موجود نیست
        @endif
    </td>
    <td>@include('admin.slideshow.operations',$slideshow)</td>
</tr>
</tbody>
