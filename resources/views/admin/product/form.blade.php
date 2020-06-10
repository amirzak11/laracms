@include('admin.partial.errors')

<div class="card card-info">
    @include('admin.partial.notification')

    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            <label class="label_item"> دسته بندی محصول
            </label>
            <div class="input-group mb-3 input-size">
                <div class="div_line">
                    <ul class="menu">
                        @if(isset($categories))
                            @include('admin.categories.child_category',['items'=>$categories['root']])
                        @else
                            دسته بندی ثبت نشده است
                        @endif
                    </ul>
                </div>
            </div>




            <div class="input-group">
                <button type="submit" class="btn btn-block btn-outline-success btn-lg"><i class="fa fa-save"></i> ذخیره
                </button>

            </div>

        </form>
    </div>
</div>

<!-- /.card-body -->
<!-- /.card -->

