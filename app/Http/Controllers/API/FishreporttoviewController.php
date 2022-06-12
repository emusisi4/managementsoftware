<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Expense;
use App\Expensescategory;
use App\Branchpayout;
use App\Branchtobalance;
use App\Branchtocollect;
use App\Incomereporttoview;
use App\Expensereporttoview;
use App\Fishreportselection;
use App\Dailyreportcode;

class FishreporttoviewController extends Controller
{
  
    public function __construct()
    {
       $this->middleware('auth:api');
      //  $this->authorize('isAdmin'); 
    }

    public function index()
    {
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $usertype =  auth('api')->user()->type;
        $userrole =  auth('api')->user()->mmaderole;
        $userbranch =  auth('api')->user()->branch;
        $usercompany =  auth('api')->user()->companyname;
        $usercountry =  auth('api')->user()->countryname;



      $startdate = \DB::table('fishreportselections')->where('ucret', '=', $userid)->orderby('id', 'desc')->limit('1')->value('startdate');
      $enddate = \DB::table('fishreportselections')->where('ucret', '=', $userid)->orderby('id', 'desc')->limit('1')->value('enddate');
      $companyname = \DB::table('fishreportselections')->where('ucret', '=', $userid)->orderby('id', 'desc')->limit('1')->value('companyname');
      $countryname = \DB::table('fishreportselections')->where('ucret', '=', $userid)->orderby('id', 'desc')->limit('1')->value('countryname');
   
      $branch = \DB::table('fishreportselections')->where('ucret', '=', $userid)->orderby('id', 'desc')->limit('1')->value('branch');
      if($usertype != "1")
      {
     
     if($branch != "900")
       {
 
     return   Dailyreportcode::with(['branchnameDailycodes', 'machinenameDailycodes','generalsalesreportCountry','generalsalesreportCompany'])->orderBy('datedone', 'DESC')
      
      ->where('companyname', $usercompany)
      ->where('countryname', $usercountry)
     ->where('branch', $branch)

     ->whereBetween('datedone', [$startdate, $enddate])
      ->paginate(100);
       }
       if($branch == "900")
       {
   //  return   Dailyreportcode::with(['branchnameDailycodes', 'machinenameDailycodes'])->orderBy('dorder', 'Asc')
     return   Dailyreportcode::with(['branchnameDailycodes', 'machinenameDailycodes', 'generalsalesreportCountry','generalsalesreportCompany'])->orderBy('datedone', 'DESC')
      
     ->where('companyname', $usercompany)
     ->where('countryname', $usercountry)
     ->whereBetween('datedone', [$startdate, $enddate])
      ->paginate(40);
       }
     
     }//// end of super admin

      if($usertype == "1")
       {
      
      if($branch != "900")
        {
  
      return   Dailyreportcode::with(['branchnameDailycodes', 'machinenameDailycodes','generalsalesreportCountry','generalsalesreportCompany'])->orderBy('datedone', 'DESC')
       
       ->where('companyname', $companyname)
       ->where('countryname', $countryname)
      ->where('branch', $branch)

      ->whereBetween('datedone', [$startdate, $enddate])
       ->paginate(100);
        }
        if($branch == "900")
        {
    //  return   Dailyreportcode::with(['branchnameDailycodes', 'machinenameDailycodes'])->orderBy('dorder', 'Asc')
      return   Dailyreportcode::with(['branchnameDailycodes', 'machinenameDailycodes', 'generalsalesreportCountry','generalsalesreportCompany'])->orderBy('datedone', 'DESC')
       
      ->where('companyname', $companyname)
      ->where('countryname', $countryname)

      ->whereBetween('datedone', [$startdate, $enddate])
       ->paginate(40);
        }
      
      }//// end of super admin
      
    

      
    }


    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];


       $this->validate($request,[
        //'branchnametobalance'   => 'required | String |max:191',
        'startdate'   => 'required',
         'enddate'   => 'required'
     ]);


     $userid =  auth('api')->user()->id;
 
  $datepaid = date('Y-m-d');
  return Fishreportselection::Create([
    'branch' => $request['branchname'],
    'startdate' => $request['startdate'],
    // 'reporttype' => $request['actionaid'],
    'enddate' => $request['enddate'],

  //  'ucret' => $userid,
   
  
]);




    }
///////////////////////////////////////////////////////////////////////























    public function show($id)
    {
        //
    }
   
    
    public function update(Request $request, $id)
    {
        //
        $user = Branchpayout::findOrfail($id);

        $this->validate($request,[
            'receiptno'   => 'required | String |max:191',
            'datemade'   => 'required',
            'branch'  => 'required',
            'amount'  => 'required'
    ]);

 
     
$user->update($request->all());
    }

   
    
    
     public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

        $user = Branchpayout::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
