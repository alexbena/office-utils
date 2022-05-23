<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'work_from_home',
        'office_last_date'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function officesOwned(){
        return $this->belongsToMany(Office::class, 'user_office')->where('owner',true);
    }

    public function offices(){
        return $this->belongsToMany(Office::class, 'user_office');
    }

    public function usersInDebt(){
        return $this->belongsToMany(User::class, 'user_user_debt', 'user_id', 'user_in_debt_id');
    }

    public function userDebt($user_id){
        $amount = $this->usersInDebt()->withPivot('amount')->where('user_in_debt_id', $user_id)->first()->pivot->amount;

        return $amount;
    }
}
