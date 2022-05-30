<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Carbon;

use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Branch;
use App\Ncssloanaccount;
use App\Customersreporttoview;
use App\Ncssclient;
use App\Ncsscustomersavingsaccount;
use App\Ncssclientaccountstatement;
class NcssclientsController extends Controller
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
      $userrole =  auth('api')->user()->mmaderole;
      $usercomopany =  auth('api')->user()->usercompany;
      $usercountry =  auth('api')->user()->usercontry;

  
   {
       
      return   Ncssclient::latest('id')
       //  return   Branchpayout::latest('id')
        //->where('branch', $userbranch)
        ->paginate(50);
      
      
      }///


     


    
      
    }

 
    public function store(Request $request)
    {
      $userid =  auth('api')->user()->id;
      $usertype =  auth('api')->user()->type;
      $usercompany =  auth('api')->user()->comanyname;
      $usercountry =  auth('api')->user()->countryname;
      $userbranch =  auth('api')->user()->branch;


      if($usertype == '1')
{
       $this->validate($request,[
       'firstname'   => 'required  |max:191',
       'lastname'   => 'required  |max:225',
       'clientidno' => 'required',
       'primarycontact' => 'required',
       'clientresidence'   => 'required',
       'clientidnature'   => 'required  |max:225',
       'employerconctact' => 'required',
       'countryname' => 'required',
       'companyname' => 'required',
       'branchname' => 'required',
       'clientemployment'   => 'required',
       'employmentlocation'   => 'required  |max:225',




       'nokname' => 'required',
       'nokcontactone'   => 'required',
       'nokresidence'   => 'required  |max:225',
       'nokrelationship' => 'required',



       'datejoined' => 'required'
       // 'dorder'   => 'sometimes |min:0'
     ]);
   

     $dowehaveaclient = \DB::table('ncssclients')->count();
     $latedsid = \DB::table('ncssclients')->orderBy('id', 'Desc')->value('id');
if($dowehaveaclient > 0)
{
$newid = $latedsid+1;
$clientno = $newid;

}

if($dowehaveaclient < 1)
{
$newid = '100';
$clientno = $newid;

}
/// working on the customer account number 
do {
    $clientaccountnumber = random_int(100000, 9999999999);
} while (Ncssclient::where("actno", "=", $clientaccountnumber)->first());



  $datepaid = date('Y-m-d');
  //$mytime = Carbon\Carbon::now();
//  $inpbranch = $request['branchnametobalance'];



   Ncssclient::Create([
    
    'id' => $clientno,
      'firstname' => $request['firstname'],
     'lastname'=> $request['lastname'],
     'middlename'=> $request['middlename'],
     'clientno'=> $clientno,
      'clientidno' => $request['clientidno'],
      'primarycontact' => $request['primarycontact'],
      'clientresidence' => $request['clientresidence'],
      'companyname' => $request['companyname'],
      'countryname' => $request['countryname'],
      'clientidnature' => $request['clientidnature'],
      'datejoined' => $request['datejoined'],
      
      'natureofemployment' => $request['natureofemployment'],
      'nameofempployer' => $request['nameofempployer'],

      'employerconctact' => $request['employerconctact'],
      'branchname' => $request['branchname'],
      'clientemployment' => $request['clientemployment'],
      'nokresidence' => $request['nokresidence'],
      'nokrelationship' => $request['nokrelationship'],
      'employmentlocation' => $request['employmentlocation'],
      'nokname' => $request['nokname'],
      'nokcontactone' => $request['nokcontactone'],
      'actno'=> $clientaccountnumber,

      'ucret' => $userid,
    
  ]);
  //////////////////////////////////////////////////////////////////////
/// working on the loans accouunt insertion
//id, clientname, accountbalance, dateopenned, openninguser, created_at, updated_at, latesttransactiondate, accountnumber
Ncssloanaccount::Create([
 'clientname' => $newid,
 'accountbalance'=> 0,
// 'latesttransactiondate'=> $mytime,
 'dateopenned'=> $request['datejoined'],
 'companyname' => $request['companyname'],
 'countryname' => $request['countryname'],
 'openninguser' => 700,
 'accountnumber' => $clientaccountnumber,
 'ucret' => $userid,
 
]);

Ncsscustomersavingsaccount::Create([
  'clientname' => $newid,
  'bal'=> 0,
  'companyname' => $request['companyname'],
  'countryname' => $request['countryname'],
  'accountnumber' => $clientaccountnumber,
  'dateopenned'=> $request['datejoined'],
  'openninguser' => 700,
  
  'ucret' => $userid,
 
 ]);


////id, clientname, opbal, transactiontype, amountintransaction, resultantbal, 
///comment, transactiondate, transactinguser, affectedaccountclient, affectedcompanyaccount, ucret, created_at, updated_at, del, udel, actno
Ncssclientaccountstatement::Create([
  'clientname' => $newid,
  'openningbalance'=> 0,
  'comment'=> 'New account openning',
  'transactiontype'=> 3,
  'amountintransaction' => 0,
  'companyname' => $request['companyname'],
  'countryname' => $request['countryname'],
  'amountinaction'=> 0,
  'runningbalance'=> 0,
  'resultantbal' => 0,
  'transactiondate'=> $request['datejoined'],
  'transactinguser' => $userid,
  'accountnumber' => $clientaccountnumber,
  'ucret' => $userid,
 
 ]);
 
 }//// closing if the usertype superadmin

if($usertype != '1')
{
       $this->validate($request,[
       'firstname'   => 'required  |max:191',
       'lastname'   => 'required  |max:225',
       'clientidno' => 'required',
       'primarycontact' => 'required',
       'clientresidence'   => 'required',
       'clientidnature'   => 'required  |max:225',
       'employerconctact' => 'required',

       'branchname' => 'required',
       'clientemployment'   => 'required',
       'employmentlocation'   => 'required  |max:225',




       'nokname' => 'required',
       'nokcontactone'   => 'required',
       'nokresidence'   => 'required  |max:225',
       'nokrelationship' => 'required',



       'datejoined' => 'required'
       // 'dorder'   => 'sometimes |min:0'
     ]);
   

     $dowehaveaclient = \DB::table('ncssclients')->count();
     $latedsid = \DB::table('ncssclients')->orderBy('id', 'Desc')->value('id');
if($dowehaveaclient > 0)
{
$newid = $latedsid+1;
$clientno = $newid;

}

if($dowehaveaclient < 1)
{
$newid = '100';
$clientno = $newid;

}
/// working on the customer account number 
do {
    $clientaccountnumber = random_int(100000, 9999999999);
} while (Ncssclient::where("actno", "=", $clientaccountnumber)->first());



  $datepaid = date('Y-m-d');
//  $inpbranch = $request['branchnametobalance'];



   Ncssclient::Create([
    
    'id' => $clientno,
      'firstname' => $request['firstname'],
     'lastname'=> $request['lastname'],
     'middlename'=> $request['middlename'],
     'clientno'=> $clientno,
      'clientidno' => $request['clientidno'],
      'primarycontact' => $request['primarycontact'],
      'clientresidence' => $request['clientresidence'],
      'companyname' => $usercompany,
      'countryname' => $countryname,
      'clientidnature' => $request['clientidnature'],
      'datejoined' => $request['datejoined'],
      
      'natureofemployment' => $request['natureofemployment'],
      'nameofempployer' => $request['nameofempployer'],

      'employerconctact' => $request['employerconctact'],
      'branchname' => $request['branchname'],
      'clientemployment' => $request['clientemployment'],
      'nokresidence' => $request['nokresidence'],
      'nokrelationship' => $request['nokrelationship'],
      'employmentlocation' => $request['employmentlocation'],
      'nokname' => $request['nokname'],
      'nokcontactone' => $request['nokcontactone'],
      'actno'=> $clientaccountnumber,

      'ucret' => $userid,
    
  ]);
  //////////////////////////////////////////////////////////////////////
/// working on the loans accouunt insertion
//id, clientname, accountbalance, dateopenned, openninguser, created_at, updated_at, latesttransactiondate, accountnumber
Ncssloanaccount::Create([
 'clientname' => $newid,
 'accountbalance'=> 0,
 'middlename'=> $request['middlename'],
 'dateopenned'=> $request['datejoined'],
 'companyname' => $usercompany,
      'countryname' => $countryname,
 'openninguser' => 700,
 'accountnumber' => $clientaccountnumber,
 'ucret' => $userid,

]);

Ncsscustomersavingsaccount::Create([
  'clientname' => $newid,
  'bal'=> 0,
  'accountnumber' => $clientaccountnumber,
  'dateopenned'=> $request['datejoined'],
  'openninguser' => 700,
  'companyname' => $usercompany,
  'countryname' => $countryname,
  'ucret' => $userid,
 
 ]);


////id, clientname, opbal, transactiontype, amountintransaction, resultantbal, 
///comment, transactiondate, transactinguser, affectedaccountclient, affectedcompanyaccount, ucret, created_at, updated_at, del, udel, actno
 Ncssclientaccountstatement::Create([
  'clientname' => $newid,
  'openningbalance'=> 0,
  'comment'=> 'New account openning',
  'transactiontype'=> 3,
  'amountintransaction' => 0,
  'resultantbal' => 0,
  'amountinaction'=> 0,
  'runningbalance'=> 0,
  'companyname' => $usercompany,
  'countryname' => $countryname,
  'transactiondate'=> $request['datejoined'],
  'transactinguser' => $userid,
  'accountnumber' => $clientaccountnumber,
  'ucret' => $userid,
 
 ]);


 ///
 
 }//// closing if the usertype is not superadmin

    }



    
public function customerstatementrecords()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $customername = \DB::table('customersreporttoviews')->where('ucret', $userid )->value('customername');
  $startdate = \DB::table('customersreporttoviews')->where('ucret', $userid )->value('startdate');
  $enddate = \DB::table('customersreporttoviews')->where('ucret', $userid )->value('enddate');

 return   Customerstatement::with(['customerName','createdbyName'])->orderBy('id', 'Asc')
 /// return   Customerstatement::orderBy('id', 'Desc')
  ->whereBetween('transactiondate', [$startdate, $enddate])
  
 ->where('customername', $customername)
//   ->where('del', 0)
    ->paginate(90);





  
}

    public function satecustomerstatementtoview(){
   
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
        $existanceinthetable = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->count();
       
       
       
        if($existanceinthetable < 1 )
        { Customersreporttoview::Create([
          //  'branch', 'ucret','startdate','enddate',
            //    'productcode' => $request['productcode'],
                'customername' => $request['customername'],
                // 'enddate' => $request['enddate'],
                // 'supplier' => $request['suppliername'],
                'ucret' => $userid,
              
            ]);
}
if($existanceinthetable > 0 )
{ 
  $result = DB::table('customersreporttoviews')
  ->where('ucret', $userid)
  ->update([
    'customername' => $request['customername']
  ]);
}
}
    public function show($id)
    {
        //
    }
  //////////////////////////////////

  public function findcustomerlegeraccount(){
    if($search = \Request::get('q')){
      $users = Customer::where(function($query) use ($search){
        $query->where('customername', 'LIKE', "%$search%");
      //  ->where('uracode', 'LIKE', "%$search%");
      })
        -> paginate(30);
       return $users;
    }else{
      return   Customer::latest('id')
      //  ->where('brand', $productbrand)
        ->where('del', 0)
            ->paginate(20);
    }
    
  }

  ////////////////////
    
    public function update(Request $request, $id)
    {
        //
        $user = Customer::findOrfail($id);

$this->validate($request,[
  'customername'   => 'required  |max:191'
  

    ]);

 
     
$user->update($request->all());
    }

 
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

        $user = Customer::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
