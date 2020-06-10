@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="card">
            @include('admin.partial.notification')
            <div class="card-body">
                <table id="" class="table table-bordered table-striped">
                    <thead>
                    @include('admin.product.columns')
                    </thead>
                    @if($products)
                        @foreach($products as $product)
                            @include('admin.product.item',$product)
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
