@include('admin.partial.errors')

<div class="card card-info">

    @include('admin.partial.notification')
    <div class="card-header">

        <h3 class="card-title">
            <div class="panel-heading" >
                {{isset($panel_heading) ? $panel_heading : ''}}
                <i style="float: left" class="right fa fa-sign-in"></i>
            </div>
        </h3>
    </div>
    <div class="card-body">

        <form action="" method="post">
            {{csrf_field()}}

            <label>نام دسته بندی</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="right fa fa-categories"></i></span>
                </div>
                <input type="text" name="name" class="form-control" placeholder="نام دسته بندی" value="{{old('name',isset($categories) ? $categories->category_name : '')}}">
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

