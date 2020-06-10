
@include('admin.partial.errors')

<div class="card card-info">

    @include('admin.partial.notification')

    <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            <label class="label_item"> ایجاد بنر جدید </label>
            <div class="input-group mb-3" style=";">

                <div class="input_fields_banner" style="width: 100%; ;">
                    <button class="add_field_banner"
                            style=" margin-bottom:12px;background-color:mediumseagreen;margin-left: 3px;border-radius: 2px;vertical-align: top; border: none; width: 30px; height: 30px;">
                        <i class="fa fa-plus" style="color:#fff;line-height: 30px;"></i>
                    </button>
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

