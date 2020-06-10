@extends('layouts.admin')


@section('content')

    <div class="col-12">

        <div class="card">

            @include('admin.partial.notification')

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    @include('admin.brands.columns')
                    </thead>
                    @if($brands && count($brands)>0)
                        @foreach($brands as $brand)
                            @include('admin.brands.item',$brand)
                        @endforeach
                    @else
                        @include('admin.partial.no_item')
                    @endif
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <!-- /.card -->


@endsection
