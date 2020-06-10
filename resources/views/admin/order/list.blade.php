@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="card">
            @include('admin.partial.notification')
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    @include('admin.order.columns')
                    </thead>
                    @if($orders && count($orders)>0)
                        @foreach($orders as $order)
                            @include('admin.order.item',$order)
                        @endforeach
                    @else
                        @include('admin.partial.no_item')
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
