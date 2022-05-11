<div>
    <x-notifications z-index="z-50" />
    <x-modal.card title="Create Office" blur wire:model="create_office_modal">
        <x-notifications z-index="z-50" />
        <form wire:submit.prevent="saveOffice">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <x-input wire:model="office.name" label="Name" placeholder="office's name"
                    hint="The name of the office" />

                <div class="col-span-1 sm:col-span-2">
                    <x-textarea wire:model="office.description" label="Description" placeholder="Your description" />
                </div>
            </div>
            </br>
            <div class="flex justify-between gap-x-4">
                <div class="flex">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button type="submit" icon="plus" primary label="Create Office" />
                </div>
            </div>
        </form>
    </x-modal.card>

    <x-modal.card title="Join Office" blur wire:model="join_office_modal">
        <x-notifications z-index="z-50" />
        <form wire:submit.prevent="joinOffice">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <x-input wire:model="invitation_link" label="Office Invitation Code" placeholder="office's invitation code" />

            </div>
            </br>
            <div class="flex justify-between gap-x-4">
                <div class="flex">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button type="submit" icon="plus" primary label="Join Office" />
                </div>
            </div>
        </form>
    </x-modal.card>

    <div class="container">
        <div class="flex justify-between items-center">
            <div class="container">
                <x-button icon="plus" primary label="Create Office" wire:click="launchCreateModal" />
            </div>
            <div class="container">
                <x-button icon="plus" primary label="Join Office" wire:click="launchJoinModal" />
            </div>
        </div>
        <div class="container">
            @if (!is_null($offices))
                <div class="grid grid-cols-4 gap-4">
                    @foreach ($offices as $office)
                        <div>
                            <x-card title="{{ $office->name }}">
                                {{ $office->description }}
                                <x-slot name="footer">
                                    <div class="flex justify-between items-center">
                                        <x-button wire:click="deleteOffice({{ $office->id }})" label="Delete" flat
                                            negative />
                                        <x-button href="/office/{{ $office->id }}" label="View" primary />
                                    </div>
                                </x-slot>
                            </x-card>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="font-sans">You don't have any office</p>
            @endif
        </div>
    </div>
</div>
