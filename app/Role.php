<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Role extends Authenticatable
{
    use HasApiTokens, Notifiable;


    protected $fillable = ['sysname','rolename','roleid','description','countryname', 'companyname', 'roletype'];
    protected $hidden = [
      //  'hid', 'id',
    ];

    public function userRole(){
      // creating a relationship between the students model 
      return $this->hasMany(User::class, 'type', 'id'); 
  }
}
