@extends('layouts.admin')


@section('content')

    <div class="col-12">

        <div class="card">

            @include('admin.partial.notification')

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    @include('admin.categories.columns')
                    </thead>
                    @if($categories && count($categories)>0)
                        @foreach($categories as $category)
                            @include('admin.categories.item',compact('category'))
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
