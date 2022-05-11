<?php

namespace App\Http\Livewire;

use App\Models\Office;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Throwable;

class ShowOffices extends Component
{
    public $offices;
    public Office $office;
    public $create_office_modal;
    public $join_office_modal;
    public $invitation_link;
    
    protected $rules = [
        'office.name' => 'required|string|max:20',
        'office.description' => 'required|string|max:250',
    ];

    protected $listeners = [
        'refreshOffices' => '$refresh', 
        'launchCreateModal',
        'launchJoinModal'
    ];

    public function mount()
    {
        $this->offices = $this->getOffices();
        $this->office = new Office();
    }

    public function launchCreateModal()
    {
        $this->create_office_modal=true;
    }

    public function launchJoinModal()
    {
        $this->join_office_modal=true;
    }

    public function getOffices()
    {
        return Auth::user()->offices;
    }

    public function getOffice($office_id)
    {
        return Office::find($office_id);
    }

    public function saveOffice()
    {
        $this->validate();

        $this->office->save();
        $this->office->owners()->attach([
            Auth::id() => ['owner' => true]
        ]);

        $this->office = new Office();
        $this->offices = $this->getOffices();
        $this->emit('refreshOffices');
    }

    public function joinOffice()
    {
        $valid_data = $this->validate([
            'invitation_link' => 'required|string|max:36'
        ]);

        $joined_office = Office::where('invite_link', $valid_data['invitation_link'])->first();
        
        if(!$joined_office){
            $this->addError('invitation_link', 'Invalid invitation code');
        }
        try{
            $joined_office->users()->attach(Auth::id());
        }catch(Throwable $e){
            $this->addError('invitation_link', 'You are already in that office');
        }
        $this->offices = $this->getOffices();
        $this->emit('refreshOffices');
    }

    public function deleteOffice($office_id)
    {
        $this->getOffice($office_id)->delete();
        $this->emit('refreshOffices');
    }

    public function render()
    {
        return view('livewire.show-offices');
    }
}
