<div>

    <x-modal wire:model="invite_modal">
        <x-card title="Consent Terms">
            <p class="text-gray-600">
                Lorem Ipsum...
            </p>
     
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="I Agree" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
    
    <x-button icon="plus" primary label="Generate Invite Link" wire:click="generateInvitation" />
</div>
