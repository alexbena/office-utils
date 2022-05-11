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
        $new_guid = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
        $this->office->invite_link = $new_guid;
        $this->office->save();
        $this->invite_modal = true;
    }

    public function render()
    {
        return view('livewire.show-invitation-link');
    }
}
