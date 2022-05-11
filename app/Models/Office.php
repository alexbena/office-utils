<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function owners(){
        return $this->belongsToMany(User::class, 'user_office')->where('owner',true);
    }

    public function isOwner($user_id){
        return $this->owners()->where([
            ['office_id', '=', $this->id],
            ['user_id', '=', $user_id],
            ['owner', '=', true]
        ])->exists();
    }

    public function users(){
        return $this->belongsToMany(User::class, 'user_office');
    }
    
}
