@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <div class="card">
            @include('admin.partial.notification')
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    @include('admin.article.columns')

                    </thead>
                    @if($articles && count($articles)>0)
                        @foreach($articles as $article)
                            @include('admin.article.item',$article)
                        @endforeach
                    @else
                        @include('admin.partial.no_item')
                </table>
                @endif
            </div>
        </div>
    </div>

@endsection
