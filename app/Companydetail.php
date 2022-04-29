<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Companydetail extends Authenticatable
{
    use HasApiTokens, Notifiable;

   
    protected $fillable = [
      
       'currency', 'currencysymbol', 'logo', 'countryname', 'emailaddress', 'location','countryname', 'companyname', 'contactperson', 'contactnumber'
        
    ];
    public function students(){
        // creating a relationship between the students model 
        return $this->hasMany(Product::class, 'brand', 'id'); 
    }
    
    public function userCompany(){
        // creating a relationship between the students model 
        return $this->hasMany(User::class, 'comp', 'id'); 
    }
    public function companyCintransfers(){
        // creating a relationship between the students model 
        return $this->hasMany(Cintransfer::class, 'companyname', 'id'); 
    }
    public function companyCouttransfers(){
        // creating a relationship between the students model 
        return $this->hasMany(Couttransfer::class, 'companyname', 'id'); 
    }
    
    public function countryName(){
        // creating a relationship between the students model 
        return $this->belongsTo(Country::class, 'countryname'); 
    }
    public function companyDet(){
        // creating a relationship between the students model 
        return $this->hasMany(Branch::class, 'companyname', 'id'); 
    }
    public function generalsalesreportCompany(){
        // creating a relationship between the students model 
        return $this->hasMany(Dailyreportcode::class, 'companyname', 'id'); 
    }
    public function generalwalletsCompany(){
               return $this->hasMany(Generalwalet::class, 'companyname', 'id'); 
    }

    public function codeCompany(){
        // creating a relationship between the students model 
        return $this->hasMany(Coderset::class, 'companyname', 'companyname'); 
    } 
    public function companyMonthlyexpense(){
        // creating a relationship between the students model 
        return $this->hasMany(Monthlyexpense::class, 'companyname', 'id'); 
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
