<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Branchcashtransaction extends Authenticatable
{
    use HasApiTokens, Notifiable;


    protected $fillable = [
        'transactiondate', 'branchname', 'amount',
         'transactiontype', 'oldamount', 'newamount',  'ucret','countryname','companyname','yearmade','monthmade','transactionno'
    ];
    

    public function branchandUsername(){
        // creating a relationship between the students model 
        return $this->belongsTo(User::class, 'username'); 
    }

    public function branchanduserBranchname(){
        // creating a relationship between the students model 
        return $this->belongsTo(Branch::class, 'branchname'); 
    }



   
    protected $hidden = [
      //  'hid', 'id',
    ];
}
