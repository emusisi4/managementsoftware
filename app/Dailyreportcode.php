<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dailyreportcode extends Authenticatable
{
    use HasApiTokens, Notifiable;

    // id, datedone, branch, machineno, openningcode, closingcode, salescode, payoutcode, profitcode, floatcode, totalcredits, totalcollection, created_at, updated_at, previoussalesfigure, previouspayoutfigure, resetstatus, currentpayoutfigure, , ucret
   
    protected $fillable = [
        'datedone','branch','openningcode','closingcode','salescode', 
        'payoutcode', 'profitcode','ucret','yearmade','monthmade',
        'floatcode','totalcredits','totalcollection','machineno','previoussalesfigure',
        'previouspayoutfigure','resetstatus','currentpayoutfigure','currentsalesfigure','dorder','daysalesamount','daypayoutamount',
        'virtualsales',
        'virtualcancelled',
        'virtualpayout',
        'virtualprofit',
        'machineunlockcode',
        'totalsales',
        'totalpayout',
        'totalcancelled',
        'multiplier',
        'totalprofit',
        'countryname', 'companyname', 
        'branchcomment',
       
    ];
    public function branchnameDailycodes(){
        // creating a relationship between the students model 
        return $this->belongsTo(Branch::class, 'branch'); 
    }
    public function machinenameDailycodes(){
        // creating a relationship between the students model 
        return $this->belongsTo(Machine::class, 'machineno'); 
    }
    public function generalsalesreportCountry(){
        // creating a relationship between the students model 
        return $this->belongsTo(Country::class, 'countryname'); 
    }
    
 
        public function generalsalesreportCompany(){
            // creating a relationship between the students model 
            return $this->belongsTo(Companydetail::class, 'companyname'); 
        }
    protected $hidden = [
      //  'hid', 'id',
    ];
}
