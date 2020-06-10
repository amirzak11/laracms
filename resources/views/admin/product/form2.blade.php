@include('admin.partial.errors')
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

<div class="card card-info">
    @include('admin.partial.notification')
    <div class="card-body">
        <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="input-group mb-3 input-size">
                <div class="input-group-prepend">
                    <span class="input-group-text-1">انتخاب دسته</span>
                </div>
                <select name="categories" style="width: 80%;" class="form-control js-example-basic-multiple">
                    @if(isset($cat_item) && count($cat_item))
                        @foreach($cat_item as $cat)
                            <option value="{{$cat->id}}">
                                {{$cat->title}}
                            </option>
                        @endforeach
                            @foreach($allCategory as $category)
                                <option value="{{$category->id}}">
                                    {{$category->title}}
                                </option>
                            @endforeach
                    @elseif(isset($category))
                        <option value="{{$category->id}}">
                            {{$category->title}}
                        </option>
                    @else
                        <option value="0">
                            بدون دسته
                        </option>
                        @foreach($allCategory as $category)
                            <option value="{{$category->id}}">
                                {{$category->title}}
                            </option>
                        @endforeach
                    @endif

                </select>
            </div>



            <div class="input-group mb-3 input-size">
                <div class="input-group-prepend">
                    <span class="input-group-text-1">انتخاب برند</span>
                </div>
                <select style="width: 80%;" class="form-control ass js-example-basic-multiple" name="brand[]" multiple="multiple">
                    @if(isset($brand))
                        <option value="">
                            انتخاب برند
                        </option>
                        @foreach($brand as $name)
                            <option value="{{$name->id}}">
                                {{$name->name}}
                            </option>
                        @endforeach
                    @else
                        <option value="0">
                            بدون برند
                        </option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}">
                                {{$brand->name}}
                            </option>
                        @endforeach
                    @endif
                </select>

            </div>
            <div class="input-group mb-3 input-size">
                <div class="input-group-prepend">
                    <span class="input-group-text">* نام محصول</span>
                </div>
                <input type="text" name="name" class="form-control" placeholder="نام محصول"
                       value="{{old('name',isset($product_items) ? $product_items->name : '')}}">
            </div>
            <div class="input-group mb-3 input-size">
                <div class="input-group-prepend">
                    <span class="input-group-text">* تعداد موجود</span>
                </div>
                <input type="number" name="number" min="0" class="form-control" placeholder="تعداد"
                       value="{{old('name',isset($product_items) ? $product_items->number : '')}}">
            </div>
            <div class="input-group mb-3 input-size">
                <div class="input-group-prepend">
                    <span class="input-group-text">* قیمت </span>
                </div>
                <input type="text" name="price" class="form-control" placeholder="قیمت"
                       value="{{old('name',isset($product_items) ? $product_items->price : '')}}">
            </div>
            <div class="input-group mb-3 input-size">
                <div class="input-group-prepend">
                    <span class="input-group-text">درصد تخفیف </span>
                </div>
                <input type="text" name="discount" class="form-control" placeholder="تخفیف"
                       value="{{old('name',isset($product_items) ? $product_items->discount : '')}}">
            </div>
            <div class="input-group mb-3 input-size">
                <div class="input-group-prepend">
                    <span class="input-group-text">گارانتی</span>
                </div>
                <input type="text" name="warranty" class="form-control" placeholder="گارانتی"
                       value="{{old('name',isset($product_items) ? $product_items->warranty : '')}}">
            </div>
            <div class="input-group mb-3 input-size">
                <div class="input-group-prepend">
                    <span class="input-group-text">نام فروشنده</span>
                </div>
                <input type="text" name="seller" class="form-control" placeholder="نام فروشنده"
                       value="{{old('name',isset($product_items) ? $product_items->seller : '')}}">
            </div>

            <label class="label_item"> ویژگی محصول </label>
            <div class="input-group mb-3 input-size" style=";">

                @if(isset($properties))
                    <div class="input_fields_new" style="width: 100%; ;">
                        <table id="table_field_new" class="table table-bordered table-striped">
                            <thead>
                            <th>نام ویژگی</th>
                            <th>ویژگی</th>

                            </thead>
                            <tbody>
                            @for($i=0;$i<count($properties);$i++)
                                <tr style="row-span: 2 ;column-span: 2 ">
                                    <div>
                                        <td>
                                            <input value="{{$properties[$i]->title}}"
                                                   style="display: inline-block; margin: 5px;width: 100%" type="text"
                                                   name="property_title[{{$i}}]" class="form-control"
                                            >
                                        </td>
                                        <td>
                                            <input value="{{$properties[$i]->name}}"
                                                   style="display: inline-block; margin: 5px;width: 100%" type="text"
                                                   name="property_name[{{$i}}]" class="form-control"
                                            >
                                        </td>
                                    </div>

                                </tr>
                            @endfor
                            </tbody>
                        </table>
                        <button class="add_field_new"
                                style=" margin-bottom:12px;background-color:mediumseagreen;margin-left: 3px;border-radius: 2px;vertical-align: top; border: none; width: 30px; height: 30px;">
                            <i class="fa fa-plus" style="color:#fff;line-height: 30px;"></i>
                        </button>
                    </div>
                @else
                    <div class="input_fields_new">
                        <button class="add_field_new"
                                style=" margin-bottom:12px;background-color:mediumseagreen;margin-left: 3px;border-radius: 2px;vertical-align: top; border: none; width: 30px; height: 30px;">
                            <i class="fa fa-plus" style="color:#fff;line-height: 30px;"></i>
                        </button>
                        <table id="table_field_new" class="table table-bordered table-striped">
                            <thead>
                            <th>نام ویژگی</th>
                            <th>ویژگی</th>
                            <th>عملیات</th>
                            </thead>
                            <tbody>
                            <td>
                                <div>
                                    <input style="margin: 5px;width: 100%" type="text" name="property_title[]"
                                           class="form-control"
                                           placeholder="نام ویژگی">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input style="margin: 5px;width: 100%" type="text" name="property_name[]"
                                           class="form-control"
                                           placeholder="ویژگی">
                                </div>
                            </td>
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>

            <label class="label_item"> توضیحات محصول </label>
            <div class="input-group mb-3 input-size">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="right fa fa-pencil-square-o"></i></span>
                </div>

                <textarea name="description" class="form-control"
                          value="{{old('description',isset($product_items) ? $product_items->description  : '')}}">
                        {{old('description',isset($product_items) ? $product_items->description : '')}}
                    </textarea>
            </div>

            <label class="label_item"> بارگزاری عکس محصول </label>
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
                                        type="file" name="product_item{{$i}}"
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
                                <a href="{{route('admin.image.delete',[$key->id ,$product_items->id])}}"
                                   style="display: inline-block;margin-right: 20px; color:red;font-size: 20px;"
                                ><i class="fa fa-trash-o"></i></a>
                            </div>
                        @endforeach
                    </div>

                @else
                    <div class="input_fields_wrap">
                        <div><input style="margin: 5px;width: 80%" type="file"
                                    name="product_item[]"
                                    class="form-control"
                                    placeholder="فایل">
                        </div>
                    </div>
                @endif

            </div>
            <textarea id="article-ckeditor" name="article-ckeditor"></textarea>

            <script src="vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
            <script>
                CKEDITOR.replace( 'article-ckeditor',{
                    height:300,
                    filebrowserUploadUrl:"{{route('admin.product.store')}}"
                } );
            </script>

            <div class="input-group">
                <button type="submit" class="btn btn-block btn-outline-success btn-lg"><i class="fa fa-save"></i> ذخیره
                </button>
            </div>
        </form>
    </div>

</div>



