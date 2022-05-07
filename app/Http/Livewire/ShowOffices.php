<?php

namespace App\Http\Livewire;

use App\Models\Office;
use Livewire\Component;

class ShowOffices extends Component
{
    public $offices;
    public Office $office;

    protected $listeners = ['refreshOffices' => '$refresh'];

    public function mount(){
        $this->offices = $this->getOffices();
    }

    public function getOffices()
    {
        return Office::all();
    }

    public function getOffice($office_id)
    {
        return Office::find($office_id);
    }

    protected $rules = [
        'office.name' => 'required|string|min:50',
        'office.description' => 'required|string|max:250',
    ];
 
    public function saveOffice()
    {
        $this->validate();
 
        $this->office->save();
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
