
@extends('layouts.admin')


@section('content')

    <div class="col-12">

        <div class="card">
            @include('admin.partial.notification')
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    @include('admin.user.columns')
                    </thead>
                    @if($users && count($users)>0)
                        @foreach($users as $user)
                            @include('admin.user.item',$user)
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
