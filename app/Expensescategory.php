<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Expensescategory extends Authenticatable
{
    use HasApiTokens, Notifiable;


      
    protected $fillable = [
        'expcatcatname', 'description','ucret','companyname','countryname'
       
    ];
    
    public function expenseCategorycountry(){
        // creating a relationship between the students model 
        return $this->belongsTo(Country::class, 'countryname'); 
    }
    public function expenseCategorycompany(){
        // creating a relationship between the students model 
        return $this->belongsTo(Companydetail::class, 'companyname'); 
    }







    
    public function students(){
   
        return $this->hasMany(Product::class, 'category', 'id'); 
    }
    public function expenseCategoryrpt(){
   
        return $this->hasMany(Madeexpense::class, 'category', 'id'); 
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
