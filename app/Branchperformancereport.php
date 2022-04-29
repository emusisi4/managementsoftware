<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Branchperformancereport extends Authenticatable
{
    use HasApiTokens, Notifiable;


    protected $fillable = [
        'branchname', 'totalmonthlyexpense', 'totalmonthlyprofit', 'totalmonthlyexpenses', 'monthname',
         'yearname', 'expecteddailyreturn', 'constantmonthlyexpenses', 'otherexpenses', 
         'totalexpensesforthemonth', 'ucret','companyname','countryname'
    ];
    

    public function branchandUsername(){
        // creating a relationship between the students model 
        return $this->belongsTo(User::class, 'username'); 
    }

    public function branchanduserBranchname(){
        // creating a relationship between the students model 
        return $this->belongsTo(Branch::class, 'branchname'); 
    }
    public function countryBranchperformancereport(){
        // creating a relationship between the students model 
        return $this->belongsTo(Country::class, 'countryname'); 
    }
    public function branchBranchperformancereport(){
        // creating a relationship between the students model 
        return $this->belongsTo(Branch::class, 'branchname'); 
    }
    public function companyBranchperformancereport(){
        // creating a relationship between the students model 
        return $this->belongsTo(Companydetail::class, 'companyname'); 
    }


   
    protected $hidden = [
      //  'hid', 'id',
    ];
}
