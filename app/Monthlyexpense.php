<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Monthlyexpense extends Authenticatable
{
    use HasApiTokens, Notifiable;


  
   
    protected $fillable = [
        
      // 'branch', 'expense', 'amount', 'description','countryname', 'companyname',  'ucret','yearname','monthname'
        'branchname', 'expensename', 'amount', 'description', 'ucret', 'companyname', 'countryname', 'monthname', 'yearname'
    ];
    
    public function countryMonthlyexpense(){
        // creating a relationship between the students model 
        return $this->belongsTo(Country::class, 'countryname'); 
    }


    public function companyMonthlyexpense(){
        // creating a relationship between the students model 
        return $this->belongsTo(Companydetail::class, 'companyname'); 
    }
    public function branchMonthlyexpense(){
        // creating a relationship between the students model 
        return $this->belongsTo(Branch::class, 'branchname'); 
    }
    public function expenseMonthlyexpense(){
        // creating a relationship between the students model 
        return $this->belongsTo(Expense::class, 'expensename'); 
    }
    public function ExpenseTypeconnect(){
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



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      //  'hid', 'id',
    ];
}
