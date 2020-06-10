@include('admin.partial.errors')
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<div class="card card-info">

    @include('admin.partial.notification')
    <div class="card-header">

        <h3 class="card-title">
            <div class="panel-heading">
                {{isset($panel_heading) ? $panel_heading : ''}}
                <i style="float: left" class="right fa fa-sign-in"></i>
            </div>
        </h3>
    </div>
    <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <label>نام و آدرس سایت</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="right fa fa-categories"></i></span>
                </div>
                <input type="text" name="name" class="form-control" placeholder="نام وب سایت"
                       value="{{old('name',isset($info) ? $info->name : '')}}">
                <input type="text" name="address_web" class="form-control" placeholder="آدرس وب سایت"
                       value="{{old('address_web',isset($info) ? $info->address_web : '')}}">
            </div>

            <label> بارگزاری لوگو </label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="right fa fa-file-image-o"></i></span>
                </div>
                <input type="file" name="logo_item" class="form-control" placeholder="عکس"/>
                <img
                    src="{{asset('image')}}/{{isset($info->logo_name)?'information/'.$info->logo_name : 'images/No_image_available.jpg'}}"
                    class="img-size-100"/>
            </div>

            <label>اطلاعات سایت</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="right fa fa-categories"></i></span>
                </div>
                <input type="text" name="tell" class="form-control" placeholder="تلفن"
                       value="{{old('tell',isset($info) ? $info->tell : '')}}">

                <input type="email" name="email" class="form-control" placeholder="ایمیل"
                       value="{{old('email',isset($info) ? $info->email : '')}}">
                <input type="text" name="instagram" class="form-control" placeholder="اینستاگرام"
                       value="{{old('instagram',isset($info) ? $info->instagram : '')}}">
                <input type="text" name="youtube" class="form-control" placeholder="یوتوب"
                       value="{{old('youtube',isset($info) ? $info->youtube : '')}}">
            </div>

            <label> آدرس </label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="right fa fa-pencil-square-o"></i></span>
                </div>

                <textarea name="address" class="form-control"
                          value="{{old('address',isset($info) ? $info->address  : '')}}">
                    {{old('address',isset($info) ? $info->address : '')}}
                </textarea>

            </div>
            <label> توضیحات </label>
            <div class="input-group mb-3">
                <textarea name="description" class="form-control"
                      value="">
                    {{old('description',isset($info) ? $info->description : '')}}
                </textarea>
            </div>

            <textarea id="content" name="content">
                            {{old('content',isset($info) ? $info->content : '')}}
            </textarea>

            <script src="vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('content', {
                    height: 300,
                    filebrowserUploadUrl: "{{route('admin.product.store')}}"
                });
            </script>
            <div class="input-group">
                <button type="submit" class="btn btn-block btn-outline-success btn-lg"><i class="fa fa-save"></i> ذخیره
                </button>


            </div>

        </form>

    </div>
</div>

<!-- /.card-body -->
<!-- /.card -->

