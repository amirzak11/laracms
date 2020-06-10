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
        <form action="" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            <label> عنوان اسلایدر  <i class="right fa fa-arrow-down"></i></label>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="right fa fa-slideshow-text"></i></span>
                </div>
                <input type="text" name="title" class="form-control" placeholder="عنوان اسلایدر" value="{{old('slideshow_title',isset($slideshow_items) ? $slideshow_items->title : '')}}">
            </div>
          <label>  توضیحات اسلایدر <i class="right fa fa-arrow-down"></i></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="right fa fa-pencil-square-o"></i></span>
                </div>

                <textarea name="slideshow_description" class="form-control"  value="{{old('slideshow_description',isset($slideshow_items) ? $slideshow_items->slideshow_description  : '')}}">
                    {{old('slideshow_description',isset($slideshow_items) ? $slideshow_items->description : '')}}
                </textarea>
            </div>

            <label> بارگزاری اسلایدر   <i class="right fa fa-arrow-down"></i></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="right fa fa-slideshow-image-o"></i></span>
                </div>
                <input type="file" name="slideshow_item" class="form-control" placeholder="اسلاید" value="">
                <img src="{{asset('image/images')}}/{{isset($slideshow_items->name)?$slideshow_items->slideshow_name : 'No_image_available.jpg'}}" class="img-size-100" />

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

