<div>
    @if (!is_null($users))
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @foreach ($users as $user)
                <div>
                    <x-card title="{{ $user->name }}">
                        {{ $user->email }}
                        <x-slot name="footer">
                            <div class="flex justify-between items-center">
                                <x-button wire:click="deleteUser({{ $user->id }})" label="Remove" flat
                                    negative />
                                <x-button label="Change work status" primary wire:click="goOffice({{ $user->id }})" />
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
