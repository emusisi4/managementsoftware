<?php


namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Expensewalet extends Authenticatable
{
    use HasApiTokens, Notifiable;


    protected $fillable = [
        'walletno', 'name', 'ucret','amount','walletname','countryname','bal', 'companyname', 'recievableincome'
    ];
    
    public function students(){
     return $this->hasMany(Expense::class, 'expensetype', 'id'); 
  }
  public function expenseWallet(){
    return $this->hasMany(Madeexpense::class, 'walletexpense', 'id'); 
}

public function accountTransferfrom(){
  return $this->hasMany(Cashtransfer::class, 'accountinact', 'id'); 
}

public function debitAccoubt(){
  // creating a relationship between the students model 
  return $this->hasMany(Customerpayment::class, 'accountdebited', 'id'); 
}

  
public function creditAccoubt(){
  // creating a relationship between the students model 
  return $this->hasMany(Customerpayment::class, 'accountcredited', 'id'); 
}
public function accountTransferto(){
  return $this->hasMany(Cashtransfer::class, 'destination', 'id'); 
}

public function generalwalletsCountry(){
  // creating a relationship between the students model 
  return $this->belongsTo(Country::class, 'countryname'); 
}
public function generalwalletsCompany(){
  // creating a relationship between the students model 
  return $this->belongsTo(Companydetail::class, 'companyname'); 
}


    protected $hidden = [
      //  'hid', 'id',
    ];
}