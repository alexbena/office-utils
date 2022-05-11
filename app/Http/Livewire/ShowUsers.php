<?php

namespace App\Http\Livewire;

use App\Models\Office;
use Livewire\Component;

class ShowUsers extends Component
{
    public $users;
    public $create_office_modal;
    public Office $current_office;

    protected $listeners = [
        'refreshUser' => '$refresh', 
        'launchCreateModal'
    ];

    public function mount($office_id)
    {
        if($office_id){
            $this->current_office = Office::find($office_id);
            $this->users = $this->current_office->users;
        }else{
            $this->users = null;
        }
    }

    public function deleteUser($user_id)
    {
        $this->current_office->users()->detach($user_id);
        $this->emit('refreshUser');
    }

    public function render()
    {
        return view('livewire.show-users');
    }
}
