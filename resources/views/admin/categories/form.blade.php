@include('admin.partial.errors')

<div class="card card-info">

    @include('admin.partial.notification')

    <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">نام دسته بندی   </span>
                </div>
                <input type="text" name="name" class="form-control" placeholder="نام دسته بندی"
                       value="{{old('name',isset($category_items->title) ? $category_items->title : '')}}">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text-1">  والد </span>
                </div>
                <select name="parent" style="" class="form-control ass js-example-basic-multiple">
                    <option value="0">بدون والد</option>
                    @foreach($categoryIT as $id => $title)
                        <option
                            value="{{$id}}"
                            {{isset($category_items->category_id) && $category_items->category_id == $id ? 'selected' : ''}}>
                            {{$title}}
                        </option>
                    @endforeach
                </select>

            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">  برندها </span>
                </div>

                @if(isset($brand))
                    @foreach($brand as $name )
                        <input value="{{$name->name}}">
                    @endforeach
                @else

                    <select style="" class="form-control ass js-example-basic-multiple" name="brand[]" multiple="multiple">
                        <option value="0">بدون برند</option>
                        @if(isset($brandIT))
                            @foreach($brandIT as $id => $name)
                                <option
                                    value="{{$id}}">
                                    {{$name}}
                                </option>
                            @endforeach
                        @endif
                    </select>
                @endif
            </div>

            <label class="label_item"> ویژگی های دسته </label>
            <div class="input-group mb-3" style=";">
                @if(isset($property))
                    <div class="input_fields" style="width: 100%; ;">

                        <table id="table_field_new" class="table table-bordered table-striped">
                            <thead>
                            <th>عنوان ویژگی</th>
                            <th>عملیات</th>
                            </thead>
                            <tbody>
                            @for($i=0;$i<count($property);$i++)
                                <tr style="row-span: 2 ;column-span: 2 ">
                                    <div>
                                        <td>
                                            <input value="{{$property[$i]->title}}"
                                                   style="display: inline-block; margin: 5px;width: 100%" type="text"
                                                   name="property_title{{$i}}" class="form-control"
                                                   placeholder="مثال = ویژگی : دارد">
                                        </td>
                                    </div>
                                    <td>
                                        <a href="{{route('admin.category_property.delete',[$property[$i]->id ,$category_items->id])}}"
                                           style="display: block;margin:2px;padding: 8px 0px ;text-align: right; color:red;font-size: 20px;"
                                        ><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                        <button class="add_field"
                                style=" margin-bottom:12px;background-color:mediumseagreen;margin-left: 3px;border-radius: 2px;vertical-align: top; border: none; width: 30px; height: 30px;">
                            <i class="fa fa-plus" style="color:#fff;line-height: 30px;"></i>
                        </button>
                    </div>
                @else
                    <div class="input_fields">
                        <button class="add_field"
                                style=" margin-bottom:12px;background-color:mediumseagreen;margin-left: 3px;border-radius: 2px;vertical-align: top; border: none; width: 30px; height: 30px;">
                            <i class="fa fa-plus" style="color:#fff;line-height: 30px;"></i>
                        </button>
                        <table id="table_field_new" class="table table-bordered table-striped">
                            <thead>
                            <th>عنوان ویژگی</th>

                            </thead>
                            <tbody>
                            <td>
                                <div>
                                    <input style="margin: 5px;width: 100%" type="text" name="property_title[]"
                                           class="form-control"
                                           placeholder="عنوان ویژگی">
                                </div>
                            </td>
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>
            <label> بارگزاری عکس <i class="right fa fa-arrow-down"></i></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="right fa fa-file-image-o"></i></span>
                </div>
                <input type="file" name="image_item" class="form-control" placeholder="عکس"/>
                <img
                    src="{{asset('="image/')}}{{isset($image_items->img_name)?'category/'.$image_items->img_name : 'images/No_image_available.jpg'}}"
                    class="img-size-100"/>
            </div>

            <div class="input-group">
                <button type="submit" class="btn btn-block btn-outline-success btn-lg"><i class="fa fa-save"></i> ذخیره
                </button>


            </div>

        </form>

    </div>
</div>
