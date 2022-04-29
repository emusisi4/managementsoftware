<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Monthlyreporttoview extends Authenticatable
{
    use HasApiTokens, Notifiable;

   
    protected $fillable = [
     
      'monthname', 'yearname', 'branchname','countryname', 'companyname',  'reporttype', 'ucret', 
       
    ];
    


    protected $hidden = [
      //  'hid', 'id',
    ];
}
