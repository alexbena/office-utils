<div>
    <x-notifications z-index="z-50" />

    @if (!is_null($users))
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @foreach ($users as $user)
                <div>
                    <x-card title="{{ $user->name }}">
                        @if($user->working_from_home)
                            <x-button rounded positive label="Working from office"/>
                        @else
                            <div>
                                <x-button rounded warning label="Working from home" />
                                <p>Days not going to the office: <strong>{{ $this->lastOfficeDay($user->id) }}</strong></p>
                            </div>
                        @endif
                        @if(auth()->user()->id == $user->id)
                            <x-slot name="footer">
                                <div class="flex justify-between items-center">
                                    <x-button wire:click="deleteUser({{ $user->id }})" label="Remove" flat
                                        negative />
                                    <x-button label="Change work status" primary wire:click="goOffice({{ $user->id }})" />
                                </div>
                            </x-slot>
                        @else
                            <p>This users owns you: <strong>{{ $this->userDebt($user->id) }}€</strong></p>
                            <x-slot name="footer">
                                <div class="flex flex-wrap items-center">
                                    <form wire:submit.prevent="addDebt({{ $user->id }})">
                                        <x-input wire:model="amount" label="Debt Amount:" placeholder="new debt amount" />
                                        <x-button class="mt-4" label="Increase Debt Ammount" primary type="submit"/>
                                    </form>
                                </div>
                            </x-slot>
                        @endif
                    </x-card>
                </div>
            @endforeach
        </div>
    @else
        <p class="font-sans">You don't have any user</p> 
    @endif
</div>
