@extends('layouts.admin')


@section('content')

    <div class="col-12">

        <div class="card">

            @include('admin.partial.notification')

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    @include('admin.provinces.columns')
                    </thead>
                    @if($provinces && count($provinces)>0)
                        @foreach($provinces as $province)
                            @include('admin.provinces.item',compact('province'))
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
