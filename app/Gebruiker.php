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
    
    public function updateGebruiker($id, $gebruiker)
    {
      return DB::table('gebruikers')
      ->where('id', $id)
      ->update($gebruiker);
    }
    
    public function deleteGebruiker($id)
    {
      return DB::table('gebruikers')
      ->where('id', $id)
      ->delete();
    }
    
    public function getByName($naam){
      return DB::table('gebruikers')
        ->where('voornaam', 'like','%'.$naam.'%')
        ->orWhere('achternaam', 'like','%'.$naam.'%')
        ->get();
    }

}
