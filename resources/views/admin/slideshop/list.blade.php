@extends('layouts.admin')


@section('content')

    <div class="col-12">

        <div class="card">
            @include('admin.partial.notification')
            <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    @include('admin.slideshop.columns')
                    </thead>

                    @if($category && count($category)>0)
                        @foreach($category as $cat)
                            @include('admin.slideshop.item')
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
