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
use App\Ncssloan;
use App\Ncsscustomersavingsaccount;
use App\Ncssclientaccountstatement;
class NcssloansController extends Controller
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
       
 return   Ncssloan::with(['clientLoans'])->orderBy('id', 'Asc')

     // return   Ncssloan::latest('id')
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
   /// getting the loan number
   
      do {
        $loannumber = random_int(100000, 999999);
    } while (Ncssloan::where("loannumber", "=", $loannumber)->first());
    

      if($usertype == '1')
{
       $this->validate($request,[
        'countryname' => 'required',
        'companyname' => 'required',
       'companyclients'   => 'required  |max:191',
       'loanamountrequested'   => 'required  |max:225',
       'requestdate' => 'required',
       'expecteddate' => 'required',
       'loansecurity'   => 'required',
       'securitydesciption'   => 'required  |max:225',
       'loanofficername' => 'required',
      
       'branchname' => 'required'
       // 'dorder'   => 'sometimes |min:0'
     ]);
   

     $dowehaveaclient = \DB::table('ncssclients')->count();
     $latedsid = \DB::table('ncssclients')->orderBy('id', 'Desc')->value('id');

/// working on the loan number  



  $datepaid = date('Y-m-d');

  //// getting the client details
  $clientno = $request['companyclients'];
  $clientaccountnumber = \DB::table('ncssclients')->where('id', $clientno )->value('actno');

//id, clientname, accountnumber, loandate, loanamount, installmentamount, numberofdaystopay, totalreturn,
// loanpaymenttype, startdateofpayment, interestrate, countryname, companyname, requestdate, loanamountrequested, expecteddate

Ncssloan::Create([
    'companyname' => $request['companyname'],
    'countryname' => $request['countryname'],
    'accountnumber' => $clientaccountnumber,
    'loannumber' => $loannumber,
    'loanamountrequested'=> $request['loanamountrequested'],
      'clientname' => $request['companyclients'],
     'requestdate'=> $request['requestdate'],
     'expecteddate'=> $request['expecteddate'],
  

      'ucret' => $userid,
    
  ]);

  /// 
  $latedsid = \DB::table('ncssclients')->orderBy('id', 'Desc')->value('id');
  //////////////////////////////////////////////////////////////////////
/// working on the loans accouunt insertion
//id, clientname, accountbalance, dateopenned, openninguser, created_at, updated_at, latesttransactiondate, accountnumber
// Ncssloanaccount::Create([
//  'clientname' => $newid,
//  'accountbalance'=> 0,
// // 'latesttransactiondate'=> $mytime,
//  'dateopenned'=> $request['datejoined'],
//  'companyname' => $request['companyname'],
//  'countryname' => $request['countryname'],
//  'openninguser' => 700,
//  'accountnumber' => $clientaccountnumber,
//  'loannumber'=> $loannumber,
//  'ucret' => $userid,
 
// ]);

// Ncsscustomersavingsaccount::Create([
//   'clientname' => $newid,
//   'bal'=> 0,
//   'companyname' => $request['companyname'],
//   'countryname' => $request['countryname'],
//   'accountnumber' => $clientaccountnumber,
//   'dateopenned'=> $request['datejoined'],
//   'openninguser' => 700,
  
//   'ucret' => $userid,
 
//  ]);


////id, clientname, opbal, transactiontype, amountintransaction, resultantbal, 
///comment, transactiondate, transactinguser, affectedaccountclient, affectedcompanyaccount, ucret, created_at, updated_at, del, udel, actno
// Ncssclientaccountstatement::Create([
//   'clientname' => $newid,
//   'openningbalance'=> 0,
//   'comment'=> 'New account openning',
//   'transactiontype'=> 3,
//   'amountintransaction' => 0,
//   'companyname' => $request['companyname'],
//   'countryname' => $request['countryname'],
//   'amountinaction'=> 0,
//   'runningbalance'=> 0,
//   'resultantbal' => 0,
//   'transactiondate'=> $request['datejoined'],
//   'transactinguser' => $userid,
//   'accountnumber' => $clientaccountnumber,
//   'ucret' => $userid,
 
//  ]);
 
 }//// closing if the usertype superadmin

if($usertype != '1')
{
    $this->validate($request,[
     //   'countryname' => 'required',
       // 'companyname' => 'required',
       'companyclients'   => 'required  |max:191',
       'loanamountrequested'   => 'required  |max:225',
       'requestdate' => 'required',
       'expecteddate' => 'required',
       'loansecurity'   => 'required',
       'securitydesciption'   => 'required  |max:225',
       'loanofficername' => 'required',
      
       'branchname' => 'required'
       // 'dorder'   => 'sometimes |min:0'
     ]);
   

    //  $dowehaveaclient = \DB::table('ncssclients')->count();
    //  $latedsid = \DB::table('ncssclients')->orderBy('id', 'Desc')->value('id');

/// working on the loan number  



  $datepaid = date('Y-m-d');

  //// getting the client details
  $clientno = $request['companyclients'];
  $clientaccountnumber = \DB::table('ncssclients')->where('id', $clientno )->value('actno');

//id, clientname, accountnumber, loandate, loanamount, installmentamount, numberofdaystopay, totalreturn,
// loanpaymenttype, startdateofpayment, interestrate, countryname, companyname, requestdate, loanamountrequested, expecteddate

Ncssloan::Create([
    'companyname' => $usercomopany,
    'countryname' => $usercountry,
    'accountnumber' => $clientaccountnumber,
    'loannumber' => $loannumber,
    'loanamountrequested'=> $request['loanamountrequested'],
    'clientname' => $request['companyclients'],
    'requestdate'=> $request['requestdate'],
    'expecteddate'=> $request['expecteddate'],
  

      'ucret' => $userid,
    
  ]);
  //////////////////////////////////////////////////////////////////////
/// working on the loans accouunt insertion
//id, clientname, accountbalance, dateopenned, openninguser, created_at, updated_at, latesttransactiondate, accountnumber
// Ncssloanaccount::Create([
//  'clientname' => $newid,
//  'accountbalance'=> 0,
// // 'latesttransactiondate'=> $mytime,
//  'dateopenned'=> $request['datejoined'],
//  'companyname' => $request['companyname'],
//  'countryname' => $request['countryname'],
//  'openninguser' => 700,
//  'accountnumber' => $clientaccountnumber,
//  'loannumber'=> $loannumber,
//  'ucret' => $userid,
 
// ]);

// Ncsscustomersavingsaccount::Create([
//   'clientname' => $newid,
//   'bal'=> 0,
//   'companyname' => $request['companyname'],
//   'countryname' => $request['countryname'],
//   'accountnumber' => $clientaccountnumber,
//   'dateopenned'=> $request['datejoined'],
//   'openninguser' => 700,
  
//   'ucret' => $userid,
 
//  ]);


////id, clientname, opbal, transactiontype, amountintransaction, resultantbal, 
///comment, transactiondate, transactinguser, affectedaccountclient, affectedcompanyaccount, ucret, created_at, updated_at, del, udel, actno
// Ncssclientaccountstatement::Create([
//   'clientname' => $newid,
//   'openningbalance'=> 0,
//   'comment'=> 'New account openning',
//   'transactiontype'=> 3,
//   'amountintransaction' => 0,
//   'companyname' => $request['companyname'],
//   'countryname' => $request['countryname'],
//   'amountinaction'=> 0,
//   'runningbalance'=> 0,
//   'resultantbal' => 0,
//   'transactiondate'=> $request['datejoined'],
//   'transactinguser' => $userid,
//   'accountnumber' => $clientaccountnumber,
//   'ucret' => $userid,
 
//  ]);
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
        $user = Ncssloan::findOrfail($id);

$this->validate($request,[
  'loanamount'   => 'required',
 
  'paymentplan'   => 'required  |max:191',
  'intrestrate'   => 'required  |max:191',
  'paymentperiod'   => 'required  |max:191',
  'totalinterest'   => 'required  |max:191',
  'startdateofpayment' => 'required  |max:191'

    ]);
    $paymentperiod = $request['paymentperiod'];
    $pplan = $request['paymentplan'];
    $totalinterest = $request['totalinterest'];
    $loanamount = $request['loanamount'];
    $startdateofpayment = $request['startdateofpayment'];
    $totalpayback = $totalinterest+$loanamount;
    
    if($pplan == '600')
    {
      $loanpaymentlength = ($paymentperiod*30);
$installmentamount = round(($totalpayback/$loanpaymentlength),0);
    }
    if($pplan == '601')
    {
      $loanpaymentlength = round((($paymentperiod*30)/7), 0);
$installmentamount = round(($totalpayback/$loanpaymentlength),0);
    }
    $noofdays = ($paymentperiod*30);
    $result2 = \DB::table('ncssloans')
    ->where('id', $id)
    //->where('countryname', '=', $countryname)
  //  ->where('companyname', '=', $companyname)
    ->update([
      'loandate' =>  $startdateofpayment, 
      'loanamount' =>  $loanamount,
      'totalreturn' =>  $totalpayback,
      'installmentamount' =>  $installmentamount,
      'numberofdaystopay' =>  $noofdays,
      'loanpaymenttype'=> $pplan,
      'startdateofpayment'=>$request['startdateofpayment'],

      'interestrate' =>  $request['intrestrate'],
      'loanpaymenttype'=> $pplan,
      'startdateofpayment'=>$request['startdateofpayment'],
      'requeststate' => 1,
      
      ]);
     

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
