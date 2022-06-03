<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Expense;
use App\Expensescategory;
use App\Cintransfer;
use App\Branchcashstanding;
use Illuminate\Support\Str;
use App\Branchcashtransaction;
use App\Accounttransaction;
class Approvefishcashin extends Controller
{
    
    
    public function __construct()
    {
       $this->middleware('auth:api');
      //  $this->authorize('isAdmin'); 
    }

    public function index()
    {
      //$userid =  auth('api')->user()->id;
     // $userbranch =  auth('api')->user()->branch;
      //$userrole =  auth('api')->user()->type;
     //   if($userrole = 1)





       // return Student::all();
     //  return   Submheader::with(['maincomponentSubmenus'])->latest('id')
       // return   MainmenuList::latest('id')
     //    ->where('del', 0)
         //->paginate(15)
     //    ->get();


      
        return   Cintransfer::with(['branchName','branchNamefrom','ceratedUserdetails'])->latest('id')
       //  return   Cintransfer::latest('id')
      // return   Madeexpense::latest('id')
        ->where('del', 0)
       ->paginate(13);

       //  return Submheader::latest()
         //  -> where('ucret', $userid)
           

    //   return   Cintransfer::get()->count();








       // {
      // return Submheader::latest()
      //  -> where('ucret', $userid)
    //    ->paginate(15);
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



    ////
  
     
  //       $dats = $id;
       return Cintransfer::Create([
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
      
     //   $mywallet =  auth('api')->user()->mywallet;
/////// checking if the branch exists in the cash details
$mywallet = \DB::table('cintransfers')->where('id', '=', $id)->value('walletname');
$branchinact = \DB::table('cintransfers')->where('id', '=', $id)->value('branchto');
$amountrecieved = \DB::table('cintransfers')->where('id', '=', $id)->value('amount');
$transactiondate = \DB::table('cintransfers')->where('id', '=', $id)->value('transferdate');
$monthto = \DB::table('cintransfers')->where('id', '=', $id)->value('monthmade');
$yearto = \DB::table('cintransfers')->where('id', '=', $id)->value('yearmade');
$companyname = \DB::table('cintransfers')->where('id', '=', $id)->value('companyname');
$countryname = \DB::table('cintransfers')->where('id', '=', $id)->value('countryname');




$currentdate = date("Y-m-d H:i:s");

$transactionno = Str::random(20);  
DB::table('cintransfers')
->where('id', $id)
->update(['status' => '1', 'comptime' => $currentdate, 'transactionno' => $transactionno, 'ucomplete' => $userid]);

//// getting the total branch collection for the day 

//
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


   ////////////////////////////////////////

$transferamount  = \DB::table('cintransfers')->where('id', '=', $id)->value('amount');
$transactiondate = \DB::table('cintransfers')->where('id', '=', $id)->value('transferdate');
$currentwalletbalance  = \DB::table('expensewalets')->where('walletno', '=', $mywallet)
->where('countryname', $countryname)
->where('companyname', $companyname)->value('bal');
$newtrans = \DB::table('cintransfers')->where('id', '=', $id)->value('transactionno');

/// updating the collections wallet 
$newbalance = $currentwalletbalance+$transferamount;
DB::table('expensewalets')
->where('countryname', $countryname)
->where('companyname', $companyname)
->where('walletno', $mywallet)
->update(['bal' => $newbalance]);

//updating the branch balance

//getting the current branch balance
$currentbranchbalance = \DB::table('branchcashstandings')->where('branch', '=', $branchinact)->value('outstanding');
$newbranchbalance = $currentbranchbalance-$transferamount;
DB::table('branchcashstandings')
->where('branch', $branchinact)
->update(['outstanding' => $newbranchbalance]);

///branchcashtransactions
//  'transactiondate', 'branchname', 'amount', 'transactiontype', 'oldamount', 'newamount',  'ucret','countryname','companyname','yearmade','monthmade'

Branchcashtransaction::Create([
  'transactiondate' => $transactiondate,
  'transactionno' => $newtrans,
  'transactiontype' => 1,
  'amount' => $amountrecieved,
  'oldamount' => $currentbranchbalance,
  'newamount'=> $newbranchbalance,
  'ucret' => $userid,
  'description' => 'Branch Collection',
  // 'yearmade' => $yearmade,
  // 'monthmade' => $monthmade,
  

]);


Accounttransaction::Create([
  'transactiondate' => $transactiondate,
  'transactionno' => $newtrans,
  'transactiontype' => 2,
  'amount' => $amountrecieved,
  'walletinaction' => $mywallet,
  'accountresult'=> $newbalance,
  'ucret' => $userid,
  'description' => 'Branch Collection',
  //'yearmade' => $yearmade,
 // 'monthmade' => $monthmade,
  

]);

     
    }




    

    
}
