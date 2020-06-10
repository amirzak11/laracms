<tbody>

<tr>

    <td>
        {{$order->id}}
    </td>
    <td>{{$order->order_number}}</td>
    <td>
        {{\App\Models\User::find($order->user_id)['id']}}
    </td>
    <td>
        {{\App\Models\User::find($order->user_id)['name']}}
    </td>

    <td>
        {{\App\Models\User::find($order->user_id)['mobile']}}
    </td>
    <td>
        {{$order->order_date}}
    </td>


    <td>
        <a href="{{route('admin.order.details',$order->id)}}">  جزییات سفارش</a>
    </td>
    <td>@include('admin.order.operations',$order)</td>

</tr>

</tbody>
