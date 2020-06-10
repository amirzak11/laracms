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

            <label>نام کاربری</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="right fa fa-user"></i></span>
                </div>
                <input type="text" name="name" class="form-control" placeholder="نام کاربری" value="{{old('name',isset($user_items) ? $user_items->name : '')}}">
            </div>

            <label>آدرس ایمیل</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="right fa fa-address-card-o"></i></span>
                </div>
                <input type="text" name="email" class="form-control" placeholder="ایمیل" value="{{old('email',isset($user_items) ? $user_items->email : '')}}">
            </div>

            <label>شماره تلفن همراه</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="right fa fa-address-card-o"></i></span>
                </div>
                <input type="text" name="mobile" class="form-control" placeholder="شماره تلفن همراه" value="{{old('mobile',isset($user_items) ? $user_items->mobile : '')}}">
            </div>


            <label>رمز عبور</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="right fa fa-user-secret"></i></span>
                </div>
                <input type="password" name="password" class="form-control" placeholder="رمز عبور">
            </div>

            <div class="form-group">
                <label>نقش کاربری</label>
                <select class="form-control select2" name="roles" style="width: 100%;">
                    <option value="0" {{isset($user_items) && $user_items->roles==0 ? 'selected': ''}}>کاربر عادی</option>
                    <option value="1" {{isset($user_items) && $user_items->roles==1 ? 'selected': ''}}>کاربر مدیر</option>
                </select>
            </div>

          {{--  <label>موجودی کیف پول</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="right fa fa-google-wallet"></i></span>
                </div>
                <input type="text" name="wallet" class="form-control" placeholder="موجودی" value="{{old('wallet',isset($user_items) ? $user_items->wallet :'')}}">
            </div>--}}


            <div class="input-group">
                <button type="submit" class="btn btn-block btn-outline-success btn-lg"><i class="fa fa-save"></i> ذخیره
                </button>


            </div>

        </form>

    </div>
</div>

<!-- /.card-body -->
<!-- /.card -->

