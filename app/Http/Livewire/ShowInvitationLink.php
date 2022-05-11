<?php

namespace App\Http\Livewire;

use App\Models\Office;
use Livewire\Component;

class ShowInvitationLink extends Component
{
    public Office $office;
    public $invite_modal;
    
    public function mount($office_id)
    {
      $this->office = Office::find($office_id)->first();
    }

    protected $listeners = [
        'generateInvitation' => '$refresh', 
    ];

    public function generateInvitation(){
        $new_guid = com_create_guid();
        $this->office->invite_link = $new_guid;
        $this->office->save();
        $this->invite_modal = true;
    }

    public function render()
    {
        return view('livewire.show-invitation-link');
    }
}
