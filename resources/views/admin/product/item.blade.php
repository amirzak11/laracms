<tbody>
<tr>
    <td>
        @if($product->categories())
            @foreach($product->categories()->pluck('title') as $key => $item)
                {{$item}}
            @endforeach
        @endif
    </td>

    <td>{{$product->name}}</td>

    <td>
        @if($images = $product->images()->get()->pluck('name')->toArray())
            @foreach($images as$image)

                <img class="img-size-100"
                     src="{{asset('image/images')}}/{{$image}} ">
            @endforeach
        @else
            تصویر موجود نیست
        @endif
    </td>
    <td>@include('admin.product.operations',$product)</td>
</tr>
</tbody>
