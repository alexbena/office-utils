@extends('layouts.app')
<div>
    @section('content')
        <div class="p-6 flex-grow">
            <div class="flex flex-row-reverse mb-2">
                @livewire('show-invitation-link',['office_id' => $office->id])
            </div>
            <div>
                @livewire('show-users', ['office_id' => $office->id])
            </div>
        </div>
    @endsection
</div>
