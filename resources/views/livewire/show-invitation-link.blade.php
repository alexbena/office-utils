<div>
    <x-modal wire:model="invite_modal">
        <x-card title="Invitation Code">
            <p class="text-gray-600">
                {{ $office->invite_link }}
            </p>
     
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button primary x-on:click="close" label="Close" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
    <x-button icon="plus" primary label="Generate Invite Code" wire:click="generateInvitation" />
</div>
