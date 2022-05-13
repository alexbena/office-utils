@extends('layouts.base')

@section('body')
    @include('layouts.topbar')
    <div class="flex h-screen">
        @include('layouts.nav')
        @yield('content')
    </div>
    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
