<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'admin'
    ];
    
    
    public function filiale()
    {
        return $this->belongsTo('\App\Filiale', 'filiale_id');
    }
    
    public function isAdmin()
    {
        return $this->admin;
    }
    
    public function isEnabled()
    {
        return $this->enabled;
    }
    
    public function canGenerateLetters()
    {
        return $this->can_generate_letters;
    }
}
