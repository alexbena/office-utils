<div>
    <form wire:submit.prevent="save">
        <input type="text" wire:model="post.title">
        <x-input label="Name" placeholder="your name" hint="Inform your full name" />

        <textarea wire:model="post.content"></textarea>
     
        <button type="submit">Save</button>
    </form>
    {{ $validatedData }}
    <div class="grid grid-cols-4 gap-4">
        @foreach ($offices as $office)
            <div>
                <x-card title="{{ $office->name }}">
                    {{ $office->description }}
                    <x-slot name="footer">
                        <div class="flex justify-between items-center">
                            <x-button wire:click="deleteOffice({{$office->id}})" label="Delete" flat negative />
                            <x-button label="View" primary />
                        </div>
                    </x-slot>
                </x-card>
            </div>
        @endforeach
    </div>
</div>
