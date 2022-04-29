<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Branchcashstanding extends Authenticatable
{
    use HasApiTokens, Notifiable;


   
    protected $fillable = [
        'branch','outstanding','walletexpense','category','exptype', 'amount', 'datemade','ucret','branch','description','approvalstate',
        'countryname', 'companyname','reportedcash'
    ];
    public function branchBalance(){
        // creating a relationship between the students model 
        return $this->belongsTo(Branch::class, 'branch'); 
    }

    public function branchName2(){
        // creating a relationship between the students model 
        return $this->belongsTo(Branch::class, 'branch'); 
    }
    
    protected $hidden = [
      //  'hid', 'id',
    ];
}
