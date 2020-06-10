@include('admin.partial.errors')

<div class="card card-info">

    @include('admin.partial.notification')

    <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">نام استان  </span>
                </div>
                <input type="text" name="name" class="form-control" placeholder="نام استان"
                       value="{{old('name',isset($province_items->name) ? $province_items->name : '')}}">
            </div>


            <label class="label_item"> شهر های استان </label>
            <div class="input-group mb-3" style=";">
                @if(isset($city))
                    <div class="input_fields" style="width: 100%; ;">

                        <table id="table_field_new" class="table table-bordered table-striped">
                            <thead>
                            <th>نام شهر</th>
                            <th>عملیات</th>
                            </thead>
                            <tbody>
                            @for($i=0;$i<count($city);$i++)
                                <tr style="row-span: 2 ;column-span: 2 ">
                                    <div>
                                        <td>
                                            <input value="{{$city[$i]->name}}"
                                                   style="display: inline-block; margin: 5px;width: 100%" type="text"
                                                   name="city{{$i}}" class="form-control"
                                                   >
                                        </td>
                                    </div>
                                    <td>
                                        <a href="{{route('admin.city_province.delete',[$city[$i]->id ,$province_items->id])}}"
                                           style="display: block;margin:2px;padding: 8px 0px ;text-align: right; color:red;font-size: 20px;"
                                        ><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                        <button class="add_field_city"
                                style=" margin-bottom:12px;background-color:mediumseagreen;margin-left: 3px;border-radius: 2px;vertical-align: top; border: none; width: 30px; height: 30px;">
                            <i class="fa fa-plus" style="color:#fff;line-height: 30px;"></i>
                        </button>
                    </div>
                @else
                    <div class="input_fields">
                        <button class="add_field_city"
                                style=" margin-bottom:12px;background-color:mediumseagreen;margin-left: 3px;border-radius: 2px;vertical-align: top; border: none; width: 30px; height: 30px;">
                            <i class="fa fa-plus" style="color:#fff;line-height: 30px;"></i>
                        </button>
                        <table id="table_field_new" class="table table-bordered table-striped">
                            <thead>
                            <th>نام شهر</th>

                            </thead>
                            <tbody>
                            <td>
                                <div>
                                    <input style="margin: 5px;width: 100%" type="text" name="city[]"
                                           class="form-control"
                                           placeholder="نام شهر">
                                </div>
                            </td>
                            </tbody>
                        </table>
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

