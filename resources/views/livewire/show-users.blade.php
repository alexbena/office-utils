<div>
    <div class="container">
        <div class="container">
            @if (!is_null($users))
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($users as $user)
                        <div>
                            <x-card title="{{ $user->name }}">
                                {{ $user->email }}
                                <x-slot name="footer">
                                    <div class="flex justify-between items-center">
                                        <x-button wire:click="deleteUser({{ $user->id }})" label="Delete" flat
                                            negative />
                                        <x-button href="/user/{{ $user->id }}" label="View" primary />
                                    </div>
                                </x-slot>
                            </x-card>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="font-sans">You don't have any user</p> 
            @endif
        </div>
    </div>
</div>
