<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Ncssloanaccount extends Authenticatable
{
    use HasApiTokens, Notifiable;


    protected $fillable = [
        'clientname', 'accountbalance', 'dateopenned', 'ucret','openninguser', 'latesttransactiondate', 'accountnumber','companyname','countryname'
    ];
    

    public function clientLoanaccount(){
        // creating a relationship between the students model 
        return $this->belongsTo(Ncssclient::class, 'clientname'); 
    }
    
    public function tres(){
      // creating a relationship between the students model 
      return $this->hasMany(Rolenaccmain::class, 'component', 'id'); 
  }
    public function students(){
      // creating a relationship between the students model 
      return $this->hasMany(Submheader::class, 'mainheadercategory', 'id'); 
  }
  public function Rolesdeta(){
    // creating a relationship between the students model 
    return $this->hasMany(Rolenaccmain::class, 'component', 'id'); 
}
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      //  'hid', 'id',
    ];
}
