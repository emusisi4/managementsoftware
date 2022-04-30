<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
    
        'name', 'email', 'password', 'type', 'bio',
         'photo', 'zeros', 'ucret', 'branch', 'comp', 'ucoz', 'mmaderole', 'haswalet', 'mywallet',
         'countryname', 'companyname',  'visibletoall'];
         

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function branchandUsername(){
        // creating a relationship between the students model 
        return $this->hasMany(Branchanduser::class, 'username', 'id'); 
    }

    
    public function userBranch(){
   
        return $this->belongsTo(Branch::class, 'branch'); 
    }
    public function userRole(){
        // creating a relationship between the students model 
        return $this->belongsTo(Role::class, 'type'); 
    }
    public function userCompany(){
        // creating a relationship between the students model 
        return $this->belongsTo(Companydetail::class, 'companyname'); 
    }
    public function userCountry(){
    return $this->belongsTo(Country::class, 'countryname'); 
    }
    public function userCompanycintransfers(){
        // creating a relationship between the students model 
        return $this->hasMany(Cintransfer::class, 'companyname', 'id'); 
    }

    
   


    public function createdbyName(){
        // creating a relationship between the students model 
        return $this->hasMany(User::class, 'ucret', 'id'); 
    }
    public function transferingUser(){
        // creating a relationship between the students model 
        return $this->hasMany(Cashtransfer::class, 'ucret', 'id'); 
    }
    public function acceptinguserUser(){
        // creating a relationship between the students model 
        return $this->hasMany(Cashtransfer::class, 'ucomplete', 'id'); 
    }
    public function productSaleuser(){
        // creating a relationship between the students model 
        return $this->hasMany(Productsale::class, 'ucret', 'id'); 
    }
    public function userRecieving(){
        // creating a relationship between the students model 
        return $this->hasMany(Salesreturn::class, 'userrecieving', 'id'); 
    }
    public function userCreating(){
        // creating a relationship between the students model 
        return $this->hasMany(Salesreturn::class, 'ucret', 'id'); 
    }
    public function cashierName(){
        // creating a relationship between the students model 
        return $this->hasMany(Salesreturn::class, 'cashiername', 'id'); 
    }
    public function transUser(){
        // creating a relationship between the students model 
        return $this->hasMany(Customerpayment::class, 'ucret', 'id'); 
    }
    public function userbalancingBranch(){
        // creating a relationship between the students model 
        return $this->hasMany(Shopbalancingrecord::class, 'ucret', 'id'); 
    }
    public function usernameBalance(){
        // creating a relationship between the students model 
        return $this->hasMany(Userbalance::class, 'username', 'id'); 
    }
    public function usernameTransferfrom(){
        // creating a relationship between the students model 
        return $this->hasMany(Userbalance::class, 'transferfrom', 'id'); 
    }
    public function usernameTransferto(){
        // creating a relationship between the students model 
        return $this->hasMany(Userbalance::class, 'transferto', 'id'); 
    }
    
    
}
