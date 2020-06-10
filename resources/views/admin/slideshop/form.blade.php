@include('admin.partial.errors')

<div class="card card-info">

    @include('admin.partial.notification')

    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
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

            <div class="input-group">
                <button type="submit" class="btn btn-block btn-outline-success btn-lg"><i class="fa fa-save"></i> ذخیره
                </button>
            </div>

        </form>

    </div>
</div>

<!-- /.card-body -->
<!-- /.card -->

