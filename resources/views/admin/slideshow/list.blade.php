@extends('layouts.admin')


@section('content')

    <div class="col-12">

        <div class="card">
            <a class="  alert-secondary text-bold" href="{{route('admin.slideshow.create')}}" style="border-radius: 0px 0px 5px 5px; margin:0 auto ;width: 20%; text-align: center">
                اضافه کردن اسلایدر جدید
                 <i class="fa fa-plus"></i>
            </a>
            @include('admin.partial.notification')
            <div class="card-body">


                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    @include('admin.slideshow.columns')

                    </thead>
                    @if($slideshows && count($slideshows)>0)
                        @foreach($slideshows as $slideshow)
                            @include('admin.slideshow.item',$slideshow)
                        @endforeach
                    @else
                        @include('admin.partial.no_item')
                </table>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <!-- /.card -->


@endsection
