<div>
    <form wire:submit.prevent="saveOffice">

        <x-input wire:model="office.name" label="Name" placeholder="office's name" hint="The name of the office" />
        <x-textarea wire:model="office.description" label="Description" placeholder="Your description" />
        <button type="submit">Save</button>
    </form>

    <div class="grid grid-cols-4 gap-4">
        @foreach ($offices as $office)
            <div>
                <x-card title="{{ $office->name }}">
                    {{ $office->description }}
                    <x-slot name="footer">
                        <div class="flex justify-between items-center">
                            <x-button wire:click="deleteOffice({{ $office->id }})" label="Delete" flat negative />
                            <x-button label="View" primary />
                        </div>
                    </x-slot>
                </x-card>
            </div>
        @endforeach
    </div>
</div>
