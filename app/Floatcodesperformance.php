<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Floatcodesperformance extends Authenticatable
{
    use HasApiTokens, Notifiable;


   
    protected $fillable = [
        'branch', 'ucret','countryname', 'companyname', 'codeinuse',
    ];
    

    protected $hidden = [
      //  'hid', 'id',
    ];
//     public function branchName(){
//       // creating a relationship between the students model 
//       return $this->belongsTo(Branch::class, 'branchto'); 
//   }
}
