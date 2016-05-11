<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Gebruiker extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'voornaam','achternaam', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin($user)
    {
      return DB::table('gebruikers')
      ->where('id', $user)
      ->get()[0]->isAdmin;
    }

}
