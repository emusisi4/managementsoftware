<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\User;
use App\Accounttransaction;

use App\Couttransfer;
use App\Branchcashstanding;
use App\Branchcashtransaction;

class ApproveCashoutController extends Controller
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



      
       return   Couttransfer::with(['branchName','branchNamefrom','ceratedUserdetails'])->latest('id')
       //  return   Couttransfer::latest('id')
      // return   Madeexpense::latest('id')
        ->where('del', 0)
       ->paginate(13);

      //  if($userrole == '103')
      //  {      
      //     return   Cintransfer::with(['branchName','branchNamefrom','ceratedUserdetails','approvedUserdetails', 'statusName'])->latest('id')
      //    //  return   Cintransfer::latest('id')
      //   // return   Madeexpense::latest('id')
      //   ->where('branchto', $userbranch)
      //    ->paginate(20);
      //  }
    }

   
    
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
        'branchnametobalance'   => 'required | String |max:191',
        'description'   => 'required',
        'amount'  => 'required',
        'transferdate'  => 'required',
      
       // 'expensetype'   => 'sometimes |min:0'
     ]);


     $userid =  auth('api')->user()->id;
     $userbranch =  auth('api')->user()->branch;
     //$id1  = Expense::latest('id')->where('del', 0)->orderBy('id', 'Desc')->limit(1)->value('expenseno');
     //$hid = $id1+1;

  
     
  //       $dats = $id;
       return Couttransfer::Create([
      'branchto' => $request['branchnametobalance'],
      'branchfrom' => $userbranch,
      'description' => $request['description'],
      'amount' => $request['amount'],
      'transferdate' => $request['transferdate'],
      
 
      'ucret' => $userid,
    
  ]);
    }

 
    
    public function show($id)
    {
        //
    }
   
    
    
    public function update(Request $request, $id)
    {
        //
        $user = Madeexpense::findOrfail($id);

$this->validate($request,[
    'expense'   => 'required | String |max:191',
    'description'   => 'required',
    'amount'  => 'required',
    'datemade'  => 'required',
    'branch'  => 'required'
]);

 
     
$user->update($request->all());
    }

  
    public function destroy($id)
    {
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->mmaderole;
    
      
        //
     //   $this->authorize('isAdmin'); 
$transactionno = Str::random(20);
   
$mywallet = \DB::table('couttransfers')->where('id', '=', $id)->value('walletname');   
$amountrecieved = \DB::table('couttransfers')->where('id', '=', $id)->value('amount');


$branchinact = \DB::table('couttransfers')->where('id', '=', $id)->value('branchto');
$transactiondate = \DB::table('couttransfers')->where('id', '=', $id)->value('transferdate');
$monthto = \DB::table('couttransfers')->where('id', '=', $id)->value('monthmade');
$yearto = \DB::table('couttransfers')->where('id', '=', $id)->value('yearmade');
$companyname = \DB::table('couttransfers')->where('id', '=', $id)->value('companyname');
$countryname = \DB::table('couttransfers')->where('id', '=', $id)->value('countryname');

$currentdate = date("Y-m-d H:i:s");


$gettintthewalletbalance = \DB::table('expensewalets')
->where('companyname', '=', $companyname)
->where('countryname', '=', $countryname)
->where('walletno', '=', $mywallet)->value('bal');




if($gettintthewalletbalance >= $amountrecieved)
{

  DB::table('couttransfers')->where('id', $id)->update(['status' => '1', 'comptime' => $currentdate, 'transactionno' => $transactionno, 'ucomplete' => $userid]);
/////////////////////////////////////////
$transferamount  = \DB::table('couttransfers')->where('id', '=', $id)->value('amount');
$newtrans = \DB::table('couttransfers')->where('id', '=', $id)->value('transactionno');
$currentwalletbalance  = \DB::table('expensewalets')->where('walletno', '=', $mywallet)
->where('countryname', $countryname)
->where('companyname', $companyname)->value('bal');
$newbalance = $currentwalletbalance-$transferamount;
DB::table('expensewalets')
->where('countryname', $countryname)
->where('companyname', $companyname)
->where('walletno', $mywallet)
->update(['bal' => $newbalance]);
//// branch account 
$currentbranchbalance = \DB::table('branchcashstandings')->where('branch', '=', $branchinact)->value('outstanding');
$newbranchbalance = $currentbranchbalance+$transferamount;

DB::table('branchcashstandings')
->where('countryname', $countryname)
->where('companyname', $companyname)
->where('branch', $branchinact)
->update(['outstanding' => $newbranchbalance]);
$totalcreditsdaily = \DB::table('couttransfers')

->where('monthmade', '=', $monthto)
->where('yearmade', '=', $yearto)
->where('branchto', '=', $branchinact)
->where('companyname', '=', $companyname)
->where('countryname', '=', $countryname)
->where('transferdate', '=', $transactiondate)
->where('status', '=', 1)

 ->sum('amount');
 ///
$totaldaycollections = \DB::table('cintransfers')

  ->where('monthmade', '=', $monthto)
  ->where('yearmade', '=', $yearto)
  ->where('branchto', '=', $branchinact)
  ->where('companyname', '=', $companyname)
  ->where('countryname', '=', $countryname)
  ->where('transferdate', '=', $transactiondate)
  ->where('status', '=', 1)
 
   ->sum('amount');
//////// monthly report
$totalbranchmonthly = \DB::table('cintransfers')

->where('monthmade', '=', $monthto)
  ->where('yearmade', '=', $yearto)
  ->where('branchto', '=', $branchinact)
 ->where('companyname', '=', $companyname)
 ->where('countryname', '=', $countryname)

 ->where('status', '=', 1)
 
   ->sum('amount');

   /// working on credits daily
   $totalbranchmonthlycredit = \DB::table('couttransfers')

->where('monthmade', '=', $monthto)
  ->where('yearmade', '=', $yearto)
  ->where('branchto', '=', $branchinact)
 ->where('companyname', '=', $companyname)
 ->where('countryname', '=', $countryname)

 ->where('status', '=', 1)
 
   ->sum('amount');
////////
DB::table('mlyrpts')
->where('yeardone', '=', $yearto)
->where('monthdone', '=', $monthto)
->where('branch', '=', $branchinact)
->where('companyname', '=', $companyname)
->where('countryname', '=', $countryname)
->update(['collections' => $totalbranchmonthly, 'credits' => $totalbranchmonthlycredit]);







///////////////////////////////////////////// daily report
DB::table('dailyreportcodes')
->where('datedone', $transactiondate)
->where('branch', '=', $branchinact)
->where('companyname', '=', $companyname)
->where('countryname', '=', $countryname)
->update(['totalcollection' => $totaldaycollections, 'totalcredits'=> $totalcreditsdaily]);

Branchcashtransaction::Create([
  'transactiondate' => $transactiondate,
  'transactionno' => $newtrans,
  'transactiontype' => 2,
  'amount' => $amountrecieved,
  'oldamount' => $currentbranchbalance,
  'newamount'=> $newbranchbalance,
  'ucret' => $userid,
  'description' => 'Branch Collection',
  // 'yearmade' => $yearmade,
  // 'monthmade' => $monthmade,
  

]);
/// Updating the transaction
Accounttransaction::Create([
  'transactiondate' => $transactiondate,
'transactionno' => $newtrans,
  'transactiontype' => 1,
  'amount' => $amountrecieved,
  'walletinaction' => $mywallet,
  'accountresult'=> $newbalance,

  'companyname' => $companyname,
  'countryname'=> $countryname,

  'ucret' => $userid,
  'description' => 'Branch Credit',
  //'yearmade' => $yearmade,
 // 'monthmade' => $monthmade,
  

]);
}

}

}
