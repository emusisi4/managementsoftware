<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Country extends Authenticatable
{
    use HasApiTokens, Notifiable;

   
    protected $fillable = [
        'name','countryname', 'companyname', 
        
    ];

    public function countryMonthlyexpense(){
        // creating a relationship between the students model 
        return $this->hasMany(Monthlyexpense::class, 'countryname', 'id'); 
    } 





    public function countryBranchperformancereport(){
     
        return $this->hasMany(Branchperformancereport::class, 'countryname', 'id'); 
    }


    public function countryName(){
     
        return $this->hasMany(Companydetail::class, 'countryname', 'id'); 
    }
    public function countryBranchstanding(){
        // creating a relationship between the students model 
        return $this->hasMany(Branchcashstanding::class, 'countryname', 'id'); 
    } 
    public function countryBranch(){
        // creating a relationship between the students model 
        return $this->hasMany(Branch::class, 'countryname', 'id'); 
    } 
    public function codeCountry(){
        // creating a relationship between the students model 
        return $this->hasMany(Coderset::class, 'countryname', 'countryname'); 
    } 
    public function generalwalletsCountry(){
        // creating a relationship between the students model 
        return $this->hasMany(Expensewalet::class, 'countryname', 'countryname'); 
    } 
   
    public function generalsalesreportCountry(){
        // creating a relationship between the students model 
        return $this->hasMany(Dailyreportcode::class, 'countryname', 'countryname'); 
    } 
    public function countryCintransfers(){
        // creating a relationship between the students model 
        return $this->hasMany(Cintransfer::class, 'countryname', 'id'); 
    }
    
    public function countryCouttransfers(){
        // creating a relationship between the students model 
        return $this->hasMany(Couttransfer::class, 'countryname', 'id'); 
    }




















    public function branchBalancingrecord(){
        // creating a relationship between the students model 
        return $this->belongsTo(Branch::class, 'branch'); 
    }

    public function expenseCategory(){
        // creating a relationship between the students model 
        return $this->belongsTo(Branch::class, 'bpaying'); 
    }
    public function payingUserdetails(){
        // creating a relationship between the students model 
        return $this->belongsTo(User::class, 'ucret'); 
    }
    public function userbalancingBranch(){
        // creating a relationship between the students model 
        return $this->belongsTo(User::class, 'ucret'); 
    }
    public function branchinBalance(){
        // creating a relationship between the students model 
        return $this->belongsTo(Branch::class, 'branch'); 
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
