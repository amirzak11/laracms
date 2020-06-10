@extends('layouts.admin')

@section('content')
    <table id="example1" class="table table-bordered table-striped">
        <tr>
            <th>پکیج</th>
            <th>مبلغ پرداخت شده</th>
            <th>تاریخ پرداخت</th>
        </tr>
        @if($user_packages && count($user_packages)>0)
            @foreach($user_packages as $package)
            <tr>
                <td>{{$package->package_title}}</td>
                <td>{{$package->pivot->amount }}</td>
                <td>{{$package->pivot->created_at }}</td>
            </tr>
            @endforeach
        @else
            @include('admin.partial.no_item')
        @endif
    </table>
@endsection
