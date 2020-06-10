@extends('layouts.frontend')
@section('profile_content')
    <div class="o-page__profile">
        @include('frontend.sidebar.sidebar')
        <div class="o-page__content">
            @yield('profile_c')
        </div>
    </div>
@endsection
