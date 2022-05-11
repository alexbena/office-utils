<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function owners(){
        return $this->belongsToMany(User::class, 'user_office')->where('owned',true);
    }

    public function users(){
        return $this->belongsToMany(User::class, 'user_office');
    }
    
}
