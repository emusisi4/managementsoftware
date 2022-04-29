<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cintransfer extends Authenticatable
{
    use HasApiTokens, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
  
    'branchto', 'branchfrom', 'ucret', 'transferdate', 'amount', 'description', 'status', 
    'del', 'ucomplete', 'comptime', 'monthmade', 'yearmade', 'transactionno', 'countryname', 'companyname', 'walletname'
    ];
    

    public function expenseName(){
        // creating a relationship between the students model 
        return $this->belongsTo(Expense::class, 'expense'); 
    }

    public function companyCintransfers(){
        // creating a relationship between the students model 
        return $this->belongsTo(Companydetail::class, 'companyname'); 
    } 

    public function companyCouttransfers(){
        // creating a relationship between the students model 
        return $this->belongsTo(Companydetail::class, 'companyname'); 
    } 


    public function countryCintransfers(){
        // creating a relationship between the students model 
        return $this->belongsTo(Country::class, 'countryname'); 
    } 
    public function countryCouttransfers(){
        // creating a relationship between the students model 
        return $this->belongsTo(Country::class, 'countryname'); 
    } 


    public function branchName(){
        // creating a relationship between the students model 
        return $this->belongsTo(Branch::class, 'branchto'); 
    }
    public function branchNamefrom(){
        // creating a relationship between the students model 
        return $this->belongsTo(Branch::class, 'branchfrom'); 
    }

    public function ceratedUserdetails(){
        // creating a relationship between the students model 
        return $this->belongsTo(User::class, 'ucret'); 
    }
    public function approvedUserdetails(){
        // creating a relationship between the students model 
        return $this->belongsTo(User::class, 'ucomplete'); 
    }
    public function statusName(){
        // creating a relationship between the students model 
        return $this->belongsTo(Cashtransferstate::class, 'status'); 
    }


    public function ExpenseTypeconnect(){
        // creating a relationship between the students model 
        return $this->belongsTo(ExpenseType::class, 'expensetype'); 
    }
    public function expenseCategory(){
        // creating a relationship between the students model 
        return $this->belongsTo(Expensescategory::class, 'expensecategory'); 
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
