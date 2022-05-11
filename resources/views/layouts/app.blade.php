@extends('layouts.base')

@include('layouts.nav')

@section('body')
    @yield('content')
    
    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
