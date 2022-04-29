<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Companybranchinaction extends Authenticatable
{
    use HasApiTokens, Notifiable;


    protected $fillable = [
     'company', 'ucret','countryname', 'companyname','branch'
    ];
    

    


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      //  'hid', 'id',
    ];
    public function branchName(){
      // creating a relationship between the students model 
      return $this->belongsTo(Branch::class, 'branchto'); 
  }
}
