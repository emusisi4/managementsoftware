<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Generalwalet extends Authenticatable
{
    use HasApiTokens, Notifiable;


  
    protected $fillable = ['branch','countryname', 'companyname', 'ucret','name','walletno'
    ];
    public function generalwalletsCompany(){
    
      return $this->belongsTo(Companydetail::class, 'companyname'); 
    }

    public function generalwalletsCountry(){
    
      return $this->belongsTo(Country::class, 'countryname'); 
    }
    protected $hidden = [
      //  'hid', 'id',
    ];

  
}
