<?php

namespace App\Http\Livewire;

use App\Models\Office;
use Livewire\Component;

class ShowOffice extends Component
{
    public Office $office;
    
    public function mount($office)
    {
      $this->office = Office::find($office)->first();
    }

    public function render()
    {
        return view('livewire.show-office');
    }
}
