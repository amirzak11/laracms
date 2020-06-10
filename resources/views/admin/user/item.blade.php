<tbody>

<tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>
        @if($user->role==0)
            <span class="badge badge-success">کاربر عادی</span>
        @endif
        @if($user->role==1)
            <span class="badge badge-danger">کاربر مدیر</span>
        @endif
    </td>
    <td>{{$user->email}}</td>
    <td>{{$user->wallet}}</td>
    <td>@include('admin.user.operations',$user)</td>
</tr>

</tbody>
