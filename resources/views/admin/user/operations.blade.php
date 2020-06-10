<a title="حذف رکورد" href="{{route('admin.user.delete',$user->id)}}">
    <i class="fa fa-trash-o"></i>
</a>
<a title="ویرایش رکورد"  href="{{route('admin.user.edit',$user->id)}}">
    <i class="fa fa-edit"></i>
</a>

<a title="نمایش لیست پکیج های خریداری شده" href="{{route('admin.user.packages',$user->id)}}">
    <i class="fa fa-list"></i>
</a>


