<tbody>
<tr>
    <td>{{$article->id}} </td>
    <td>{{$article->title}}</td>
    <td>
        @if (isset($article->name))
            <img class="img-size-100"
                 src="{{asset('image/article')}}/{{$article->name}} ">
        @else
            تصویر موجود نیست
        @endif
    </td>
    <td>@include('admin.article.operations',$article)</td>
</tr>
</tbody>
