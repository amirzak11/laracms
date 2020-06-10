@extends('layouts.admin')


@section('content')

    <div class="panel panel-default">
        <div class="panel-list">
            @include('admin.product.form')
            <div class="min-nav-left">
                <div class="link_buttom">
                    <a class="add_buttom" href="{{route('admin.categories.create')}}">
                        <i class="fa fa-plus"></i> دسته بندی جدید
                    </a>
                    <a class="add_buttom" href="{{route('admin.product.brands.create')}}">
                        <i class="fa fa-plus"></i> برند جدید
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
