@extends('layouts.admin')


@section('content')

    <div class="col-12">

        <div class="card">
            @include('admin.partial.notification')
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    @include('admin.payment.columns')
                    </thead>
                    @if($payments && count($payments)>0)
                        @foreach($payments as $payment)
                            @include('admin.payment.item',$payment)
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
