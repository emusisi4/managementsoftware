<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Ncssclient extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'id', 'firstname', 'lastname', 'middlename', 'clientidno', 'primarycontact', 'secondarycontact',
         'clientresidence', 'clientemployment', 'datejoined', 'clientidnature', 'employmentlocation', 'natureofemployment', 
         'nameofempployer', 'employerconctact', 'nokname', 'nokcontactone', 'nokcontacttwo', 'nokidtype', 
        'nokidnumber', 'nokresidence', 'nokrelationship', 'loansofficer', 'ucret', 'currentstatus','clientno','actno','countryname','companyname'
    ];

    public function clientLoanaccount(){
      // creating a relationship between the students model 
      return $this->hasMany(Ncssloanaccount::class, 'clientname', 'id'); 
  }
 public function clientLoans(){
        // creating a relationship between the students model 
        return $this->hasMany(Ncssloan::class, 'clientname', 'id'); 
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
