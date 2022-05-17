<?php

namespace App\Http\Livewire;

use App\Models\Office;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use WireUi\Traits\Actions;

class ShowUsers extends Component
{
    use Actions;

    public $users;
    public $create_office_modal;
    public Office $current_office;
    public User $user;
    
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
        if(!$this->current_office->isOwner(Auth::id())){
            $this->notification()->error(
                $title = 'User not deleted',
                $description = 'You are not the owner of this office'
            );
            return; 
        }
        $user_to_delete = User::find($user_id);
        if(!$user_to_delete){
            $this->notification()->error(
                $title = 'User not deleted',
                $description = 'User do not exists'
            );
            return; 
        }
        if($this->current_office->isOwner($user_id)){
            $this->notification()->error(
                $title = 'Office not deleted',
                $description = 'User is the owner of this office'
            );
            return; 
        }
        
        $this->current_office->users()->detach($user_id);
        $this->emit('refreshUser');
        $this->notification()->success(
            $title = 'User deleted successfully',
            $description = 'You deleted the user successfully'
        );
    }

    public function goOffice($user_id) {
        if(Auth::id() != $user_id){
            $this->notification()->error(
                $title = 'You are not this user',
                $description = 'You are not this user'
            );
            return; 
        }
        
        Auth::user()->working_from_home = !Auth::user()->working_from_home;
        Auth::user()->save();
    }

    public function render()
    {
        return view('livewire.show-users');
    }
}
