<div>
    @extends('layouts.app')

    @section('content')
        <div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 sm:px-6 lg:px-8">
            <div class="container">
                @livewire('show-invitation-link',['office_id' => $office->id])
            </div>
            <div class="flex items-center justify-center">
                @livewire('show-users', ['office_id' => $office->id])
            </div>
        </div>
    @endsection
</div>
