<?php

namespace App\Http\Livewire;

use App\Models\Office;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShowOffices extends Component
{
    public $offices;
    public Office $office;
    public $create_office_modal;

    protected $rules = [
        'office.name' => 'required|string|max:20',
        'office.description' => 'required|string|max:250',
    ];

    protected $listeners = [
        'refreshOffices' => '$refresh', 
        'launchCreateModal'
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

    public function getOffices()
    {
        return Office::all();
    }

    public function getOffice($office_id)
    {
        return Office::find($office_id);
    }

    public function saveOffice()
    {
        $this->validate();
        $this->office->save();
        $this->office = new Office();
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
