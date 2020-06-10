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

        <form action="" method="post" enctype="multipart/form-data" >
            {{csrf_field()}}
            <label>نام برند</label>
            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="نام برند" value="{{old('name',isset($brands) ? $brands->name : '')}}">
            </div>

            <label class="label_item"> بارگزاری عکس  </label>
            <div class="input-group mb-3 input-size">
                <button class="add_field_button"
                        style=" margin-top:12px;background-color:mediumseagreen;margin-left: 3px;border-radius: 2px;vertical-align: top; border: none; width: 30px; height: 30px;">
                    <i class="fa fa-plus" style="color:#fff;line-height: 30px;"></i></button>
                <div class="input-group-prepend">
                </div>
                @if(isset($image))
                    <div style="; display: inline-block;width: 200px;margin-left: 20px;" class="input_fields_wrap">
                        @for($i=0;$i<count($image);$i++)
                            <div><input style="
                            margin: 5px;
                            width: 100%;
                            display: inline-block;"
                                        type="file" name="product_item"
                                        class="form-control">
                            </div>
                        @endfor
                    </div>
                    <div style="display: inline-block; ;">
                        @foreach($image as $key)
                            <div>
                                <img style="display: inline-block; border:1px solid #aaa;border-radius: 5px;
                                     padding: 5px;
                                     margin-top: 6px;margin-right: 5px; width: 100px;height: 45px"
                                     src="{{asset('image/images')}}/{{$key->name}} ">
                                <a href="{{route('admin.image.delete',[$key->id ,$brands->id])}}"
                                   style="display: inline-block;margin-right: 20px; color:red;font-size: 20px;"
                                ><i class="fa fa-trash-o"></i></a>
                            </div>
                        @endforeach
                    </div>

                @else
                    <div class="input_fields_wrap">
                        <div><input style="margin: 5px;width: 80%" type="file"
                                    name="product_item"
                                    class="form-control"
                                    placeholder="فایل">
                        </div>
                    </div>
                @endif

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

