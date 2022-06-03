<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Branchperformancereport;
use App\Submheader;
use App\Expense;
use App\Expensescategory;
use App\Madeexpense;
use App\Expmothlyexpensereport;
use App\Generalexpensereportsummarry;
use App\Expmonthlyexpensesreportbycategory;
use App\Expmonthlyexpensesreportbywallet;
use App\Expdailyreport;
use App\Expmonthlyexpensesreportbytype;
use App\Incomestatementminirecord;
use App\Incomestatementsummary;
class MadeexpensesofficeConroller extends Controller
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
    $userwallet =  auth('api')->user()->mywallet;
     $branchinb = \DB::table('expenserecordtoselects')->where('ucret', $userid )->value('branch');
     $expensename = \DB::table('expenserecordtoselects')->where('ucret', $userid )->value('expensename');
     $displaynumber = \DB::table('expenserecordtoselects')->where('ucret', $userid )->value('displaynumber');


     $companyname2 = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('companyname');
     $countryname2 = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('countryname');
   //  $companyname2 = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('companyname');
     $branchname2 = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('branchname');

      if($branchname2 == '900')
        { return   Madeexpense::with(['branchName','expenseName','expenseWallet'])->latest('datemade')
     
      ->where('companyname', $companyname2)
      ->where('countryname', $countryname2)
      ->where('del', 0)
      //  ->where('branch', $branchname2)
     //   ->where('walletexpense', $userwallet)
       ->paginate(30);
      
      }
     
      if($branchname2 != '900')
      { return   Madeexpense::with(['branchName','expenseName','expenseWallet'])->latest('datemade')
   
    ->where('companyname', $companyname2)
    ->where('countryname', $countryname2)
    ->where('del', 0)
    ->where('branch', $branchname2)
   //   ->where('walletexpense', $userwallet)
     ->paginate(30);
    
    }
 
      
    }

 
    public function store(Request $request)
    {
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->mmaderole;
    $usertype =  auth('api')->user()->type;
    $usercompany =  auth('api')->user()->comp;
    $usercountry =  auth('api')->user()->countryname;
    $userwallet =  auth('api')->user()->mywallet;
     //$id1  = Expense::latest('id')->where('del', 0)->orderBy('id', 'Desc')->limit(1)->value('expenseno');
     //$hid = $id1+1;

  
     
     $generalnum1 = random_int(100, 999);
     $generalnum2 = random_int(100, 999);

$reference = $generalnum1.$generalnum2;
  //       $dats = $id;
  $exp = $request['expense'];
  $expcat = DB::table('expenses')->where('id', $exp )->value('expensecategory');
  $exptyo = \DB::table('expenses')->where('id', $exp)->value('expensetype');
  $tofixed = \DB::table('expenses')->where('id', $exp)->value('tofixed');

//////////////////////////////////////////////////////////////////////////////////////////////////////////
///if($usertype == '1')
{
$this->validate($request,[
  //  'expensename'   => 'required | String |max:191',
    'description'   => 'required',
    'amount'  => 'required',
    'expense'  => 'required',
    'datemade'  => 'required',
    'countryname'  => 'required',
    'companyname'  => 'required',
    'branchname'  => 'required',
    'walletexpense'   => 'required',
  
   // 'expensetype'   => 'sometimes |min:0'
 ]);
 

  $apptype =  DB::table('expenses')->where('expenseno', $exp )->value('approvaltype');

  $dateinact = $request['datemade'];
     $yearmade = date('Y', strtotime($dateinact));
     $monthmade = date('m', strtotime($dateinact));
       Madeexpense::Create([
      'expense' => $request['expense'],
      'approvalstate' => 0,
      'description' => $request['description'],
      'amount' => $request['amount'],
      'datemade' => $request['datemade'],
      'branch' => $request['branchname'],
      'walletexpense' => $request['walletexpense'],
    //  'explevel' => $expl,
      'category' => $expcat,
      'tofixed' => $tofixed,
      'approvaltype'=> $apptype,
      'exptype' => $exptyo,
      'yearmade' => $yearmade,
      'monthmade' => $monthmade,
      'incomerefrenceid'=> $reference,
      'countryname'=> $request['countryname'],
      'companyname'=> $request['companyname'],
      'ucret' => $userid,
    
  ]);

// ////////////////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($apptype == '1')
{
  $id = \DB::table('madeexpenses')->where('ucret', $userid )->orderBy('id', 'Desc')->value('id');
  $approvalstate = \DB::table('madeexpenses')->where('id', $id )->value('approvalstate');
     $walletofexpense = \DB::table('madeexpenses')->where('id', $id )->value('walletexpense');
     $branchinq = \DB::table('madeexpenses')->where('id', $id )->value('branch');
   
  
     $transamount = \DB::table('madeexpenses')->where('id', $id)->value('amount');
     $currentaccountbalancespending = \DB::table('expensewalets')->where('id', $walletofexpense)->value('bal');
     $branchinact = \DB::table('madeexpenses')->where('id', $id)->value('branch');
if($approvalstate == 0 )
{
   if($currentaccountbalancespending >= $transamount)
   {
    $newwalletamountrecieving = $currentaccountbalancespending-$transamount;
    $updatingthegivingaccount = \DB::table('expensewalets')->where('id', $walletofexpense)->update(['bal' =>  $newwalletamountrecieving]);
    $bstanding = \DB::table('branchcashstandings')->where('branch', $branchinq)->update(['outstanding' =>  $newwalletamountrecieving]);
    $updatingthestatus = \DB::table('madeexpenses')->where('id', $id)->update(['approvalstate' => 1]);

//// working on the monthly expenses report

$branchinact = \DB::table('madeexpenses')->where('id', $id)->value('branch');
$monthmade = \DB::table('madeexpenses')->where('id', $id)->value('monthmade');
$yearmade = \DB::table('madeexpenses')->where('id', $id)->value('yearmade');
$datemade = \DB::table('madeexpenses')->where('id', $id)->value('datemade');
$category = \DB::table('madeexpenses')->where('id', $id)->value('category');
$exptype = \DB::table('madeexpenses')->where('id', $id)->value('exptype');
$walletofexpense = \DB::table('madeexpenses')->where('id', $id)->value('walletexpense');
///
$totalbranchexpensesfotthemonth = \DB::table('madeexpenses')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branch', '=', $branchinact)
->where('approvalstate', '=', 1)
->sum('amount');
/// deleting the record
DB::table('expmothlyexpensereports')->where('branch', $branchinact)->where('yearname', $yearmade)->where('monthname', $monthmade)->delete();
/// inserting back the record
Expmothlyexpensereport::Create([
  'branch'      => $branchinact,
  
  'amount'         => $totalbranchexpensesfotthemonth,
  'monthname'         => $monthmade,
  'yearname'         => $yearmade,
    
  'ucret' => $userid,

]);
/////
$totalbranchexpensesfotthemonthcategory = \DB::table('madeexpenses')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('category', '=', $category)
->where('approvalstate', '=', 1)
->sum('amount');
/// deleting the record
DB::table('expmonthlyexpensesreportbycategories')->where('expensecategory', $category)->where('yearname', $yearmade)->where('monthname', $monthmade)->delete();
/// inserting back the record
Expmonthlyexpensesreportbycategory::Create([
  'expensecategory'      => $category,
  // 'branch'      => $branchinact,
  'amount'         => $totalbranchexpensesfotthemonthcategory,
  'monthname'         => $monthmade,
  'yearname'         => $yearmade,
    
  'ucret' => $userid,

]);
$totalbranchexpensesfotthemonthtypes = \DB::table('madeexpenses')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('exptype', '=', $exptype)
->where('approvalstate', '=', 1)
->sum('amount');
/// deleting the record
DB::table('expmonthlyexpensesreportbytypes')->where('expensetype', $exptype)->where('yearname', $yearmade)->where('monthname', $monthmade)->delete();
/// inserting back the record
Expmonthlyexpensesreportbytype::Create([
  'expensetype'      => $exptype,
  // 'branch'      => $branchinact,
  'amount'         => $totalbranchexpensesfotthemonthtypes,
  'monthname'         => $monthmade,
  'yearname'         => $yearmade,
    
  'ucret' => $userid,

]);

$newexpensebywallettotal = \DB::table('madeexpenses')
->where('datemade', '=', $datemade)
//->where('monthmade', '=', $monthmade)
//->where('yearmade', '=', $yearmade)
->where('walletexpense', '=', $walletofexpense)
->where('approvalstate', '=', 1)
->sum('amount');
DB::table('expmonthlyexpensesreportbywallets')->where('datedone', $datemade)->where('walletname', $walletofexpense)->delete();
Expmonthlyexpensesreportbywallet::Create([
  'ucret'   => $userid,
  'amount'=> $newexpensebywallettotal,
  'datedone'=> $datemade,
  'monthname'    => $monthmade,
  'walletname'    => $walletofexpense,
  'yearname'     => $yearmade,
]);
////////////////////////////////////////
$newexpensedailytotal = \DB::table('madeexpenses')
->where('datemade', '=', $datemade)
//->where('monthmade', '=', $monthmade)
//->where('yearmade', '=', $yearmade)
//->where('walletexpense', '=', $walletofexpense)
->where('approvalstate', '=', 1)
->sum('amount');
DB::table('expdailyreports')->where('datedone', $datemade)->delete();
Expdailyreport::Create([
  'ucret'   => $userid,
  'amount'=> $newexpensedailytotal,
  'datedone'=> $datemade,
  // // 'monthname'    => $monthmade,
  // // 'walletname'    => $walletofexpense,
  // 'yearname'     => $yearmade,
]);
/////////////////////////////////////////////////////////////////////////
$transactionrefrence = \DB::table('madeexpenses')->where('id', $id)->value('incomerefrenceid');

$ggetrsummaryincome = \DB::table('incomestatementsummaries')->where('statementdate', '=', $datemade)->count();
if($ggetrsummaryincome > 0)
{
  //// getting the expenses, and other incomes
  /// expenses 
  $incomestatementexpenses = \DB::table('madeexpenses')->where('datemade', '=', $datemade)->where('approvalstate', '=', 1)->sum('amount');
  $incomestatementotherincomes = \DB::table('companyincomes')->where('daterecieved', '=', $datemade)->where('status', '=', 1)->sum('amount');

$incomestatementtotalsales = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('netinvoiceincome');
$incomestatementtotalcost = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('totalcost');
$incomestatementgrossprofit = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('netsalewithoutvat');

  DB::table('incomestatementsummaries')
->where('statementdate', $datemade)
->update([
'totalsales' => $incomestatementtotalsales,
'totalcost' => $incomestatementtotalcost,
'otherincomes'=> $incomestatementotherincomes,
'expenses'=> $incomestatementexpenses,
'grossprofitonsales' => $incomestatementtotalsales-$incomestatementtotalcost,
'netprofitbeforetaxes' => $incomestatementtotalsales-$incomestatementtotalcost+$incomestatementotherincomes-$incomestatementexpenses
]);
}
//////////////
if($ggetrsummaryincome < 1)
{
    $incomestatementexpenses = \DB::table('madeexpenses')->where('datemade', '=', $datemade)->where('approvalstate', '=', 1)->sum('amount');
    $incomestatementotherincomes = \DB::table('companyincomes')->where('daterecieved', '=', $datemade)->where('status', '=', 1)->sum('amount');
  
  $incomestatementtotalsales = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('netinvoiceincome');
  $incomestatementtotalcost = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('totalcost');
  $incomestatementgrossprofit = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('netsalewithoutvat');
Incomestatementsummary::Create([
   
  'statementdate' => $datemade,

 'totalcost' => $incomestatementtotalcost,
  'totalsales' =>$incomestatementtotalsales,  
  'otherincomes'=> $incomestatementotherincomes,
  'expenses'=> $incomestatementexpenses,

  'grossprofitonsales' => $incomestatementtotalsales-$incomestatementtotalcost,
'netprofitbeforetaxes' => $incomestatementtotalsales-$incomestatementtotalcost+$incomestatementotherincomes-$incomestatementexpenses,
    
  
   


            'ucret' => $userid,
          
        ]);
}
Incomestatementminirecord::Create([
   
    'incomerefrenceid' => $transactionrefrence,
    // 'branch' => $user->branch,
    'dateoftransaction' => $datemade,  
    'sourceoftransaction' => 4,
    'typeoftransaction'=> 2,
    'descriptionoftransaction'=> 'Expense Made',
     'transactionamount' => ($transamount),   
    'incomesourcedescription' =>  'Expense made by the company',   
      'ucret' => $userid,
            
          ]);

}


















   }/// closing if there is enough balance 
     ///// closing its not 0
   


}
//// end of if



}//// closing if its  super admin







// if($usertype != '1')
// {
// $this->validate($request,[
//   //  'expensename'   => 'required | String |max:191',
//     'description'   => 'required',
//     'amount'  => 'required',
//     'expense'  => 'required',
//     'datemade'  => 'required',
//     'branch'  => 'required',
//    // 'expensetype'   => 'sometimes |min:0'
//  ]);
 

//   $apptype =  DB::table('expenses')->where('expenseno', $exp )->value('approvaltype');
//   $dateinact = $request['datemade'];
//      $yearmade = date('Y', strtotime($dateinact));
//      $monthmade = date('m', strtotime($dateinact));
//        Madeexpense::Create([
//       'expense' => $request['expense'],
//       'approvalstate' => 0,
//       'description' => $request['description'],
//       'amount' => $request['amount'],
//       'datemade' => $request['datemade'],
//       'branch' => $request['branch'],
//       'walletexpense' => $userwallet,
//     //  'explevel' => $expl,
//       'category' => $expcat,
//       'approvaltype'=> $apptype,
//       'exptype' => $exptyo,
//       'yearmade' => $yearmade,
//       'monthmade' => $monthmade,
//       'incomerefrenceid'=> $reference,
//       'countryname'=> $usercountry,
//       'companyname'=> $usercompany,
//       'ucret' => $userid,
    
//   ]);

// // ////////////////////////////////////////////////////////////////////////////////////////////////////


// /////////////////////////////////////////////////////////////////////////////////////////////////////////////
// if($apptype == '1')
// {
//   $id = \DB::table('madeexpenses')->where('ucret', $userid )->orderBy('id', 'Desc')->value('id');
//   $approvalstate = \DB::table('madeexpenses')->where('id', $id )->value('approvalstate');
//      $walletofexpense = \DB::table('madeexpenses')->where('id', $id )->value('walletexpense');
//      $branchinq = \DB::table('madeexpenses')->where('id', $id )->value('branch');
   
  
//      $transamount = \DB::table('madeexpenses')->where('id', $id)->value('amount');
//      $currentaccountbalancespending = \DB::table('expensewalets')->where('id', $walletofexpense)->value('bal');

// if($approvalstate == 0 )
// {
//    if($currentaccountbalancespending >= $transamount)
//    {
//     $newwalletamountrecieving = $currentaccountbalancespending-$transamount;
//     $updatingthegivingaccount = \DB::table('expensewalets')->where('id', $walletofexpense)->update(['bal' =>  $newwalletamountrecieving]);
//     $bstanding = \DB::table('branchcashstandings')->where('branch', $branchinq)->update(['outstanding' =>  $newwalletamountrecieving]);
//     $updatingthestatus = \DB::table('madeexpenses')->where('id', $id)->update(['approvalstate' => 1]);

// //// working on the monthly expenses report

// $branchinact = \DB::table('madeexpenses')->where('id', $id)->value('branch');
// $monthmade = \DB::table('madeexpenses')->where('id', $id)->value('monthmade');
// $yearmade = \DB::table('madeexpenses')->where('id', $id)->value('yearmade');
// $datemade = \DB::table('madeexpenses')->where('id', $id)->value('datemade');
// $category = \DB::table('madeexpenses')->where('id', $id)->value('category');
// $exptype = \DB::table('madeexpenses')->where('id', $id)->value('exptype');
// $walletofexpense = \DB::table('madeexpenses')->where('id', $id)->value('walletexpense');
// ///
// $totalbranchexpensesfotthemonth = \DB::table('madeexpenses')
// ->where('monthmade', '=', $monthmade)
// ->where('yearmade', '=', $yearmade)
// ->where('branch', '=', $branchinact)
// ->where('approvalstate', '=', 1)
// ->sum('amount');
// /// deleting the record
// DB::table('expmothlyexpensereports')->where('branch', $branchinact)->where('yearname', $yearmade)->where('monthname', $monthmade)->delete();
// /// inserting back the record
// Expmothlyexpensereport::Create([
//   'branch'      => $branchinact,
  
//   'amount'         => $totalbranchexpensesfotthemonth,
//   'monthname'         => $monthmade,
//   'yearname'         => $yearmade,
    
//   'ucret' => $userid,

// ]);
// /////
// $totalbranchexpensesfotthemonthcategory = \DB::table('madeexpenses')
// ->where('monthmade', '=', $monthmade)
// ->where('yearmade', '=', $yearmade)
// ->where('category', '=', $category)
// ->where('approvalstate', '=', 1)
// ->sum('amount');
// /// deleting the record
// DB::table('expmonthlyexpensesreportbycategories')->where('expensecategory', $category)->where('yearname', $yearmade)->where('monthname', $monthmade)->delete();
// /// inserting back the record
// Expmonthlyexpensesreportbycategory::Create([
//   'expensecategory'      => $category,
//   // 'branch'      => $branchinact,
//   'amount'         => $totalbranchexpensesfotthemonthcategory,
//   'monthname'         => $monthmade,
//   'yearname'         => $yearmade,
    
//   'ucret' => $userid,

// ]);
// $totalbranchexpensesfotthemonthtypes = \DB::table('madeexpenses')
// ->where('monthmade', '=', $monthmade)
// ->where('yearmade', '=', $yearmade)
// ->where('exptype', '=', $exptype)
// ->where('approvalstate', '=', 1)
// ->sum('amount');
// /// deleting the record
// DB::table('expmonthlyexpensesreportbytypes')->where('expensetype', $exptype)->where('yearname', $yearmade)->where('monthname', $monthmade)->delete();
// /// inserting back the record
// Expmonthlyexpensesreportbytype::Create([
//   'expensetype'      => $exptype,
//   // 'branch'      => $branchinact,
//   'amount'         => $totalbranchexpensesfotthemonthtypes,
//   'monthname'         => $monthmade,
//   'yearname'         => $yearmade,
    
//   'ucret' => $userid,

// ]);

// $newexpensebywallettotal = \DB::table('madeexpenses')
// ->where('datemade', '=', $datemade)
// //->where('monthmade', '=', $monthmade)
// //->where('yearmade', '=', $yearmade)
// ->where('walletexpense', '=', $walletofexpense)
// ->where('approvalstate', '=', 1)
// ->sum('amount');
// DB::table('expmonthlyexpensesreportbywallets')->where('datedone', $datemade)->where('walletname', $walletofexpense)->delete();
// Expmonthlyexpensesreportbywallet::Create([
//   'ucret'   => $userid,
//   'amount'=> $newexpensebywallettotal,
//   'datedone'=> $datemade,
//   'monthname'    => $monthmade,
//   'walletname'    => $walletofexpense,
//   'yearname'     => $yearmade,
// ]);
// ////////////////////////////////////////
// $newexpensedailytotal = \DB::table('madeexpenses')
// ->where('datemade', '=', $datemade)
// //->where('monthmade', '=', $monthmade)
// //->where('yearmade', '=', $yearmade)
// //->where('walletexpense', '=', $walletofexpense)
// ->where('approvalstate', '=', 1)
// ->sum('amount');
// DB::table('expdailyreports')->where('datedone', $datemade)->delete();
// Expdailyreport::Create([
//   'ucret'   => $userid,
//   'amount'=> $newexpensedailytotal,
//   'datedone'=> $datemade,
//   // // 'monthname'    => $monthmade,
//   // // 'walletname'    => $walletofexpense,
//   // 'yearname'     => $yearmade,
// ]);
// /////////////////////////////////////////////////////////////////////////
// $transactionrefrence = \DB::table('madeexpenses')->where('id', $id)->value('incomerefrenceid');

// $ggetrsummaryincome = \DB::table('incomestatementsummaries')->where('statementdate', '=', $datemade)->count();
// if($ggetrsummaryincome > 0)
// {
//   //// getting the expenses, and other incomes
//   /// expenses 
//   $incomestatementexpenses = \DB::table('madeexpenses')->where('datemade', '=', $datemade)->where('approvalstate', '=', 1)->sum('amount');
//   $incomestatementotherincomes = \DB::table('companyincomes')->where('daterecieved', '=', $datemade)->where('status', '=', 1)->sum('amount');

// $incomestatementtotalsales = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('netinvoiceincome');
// $incomestatementtotalcost = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('totalcost');
// $incomestatementgrossprofit = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('netsalewithoutvat');

//   DB::table('incomestatementsummaries')
// ->where('statementdate', $datemade)
// ->update([
// 'totalsales' => $incomestatementtotalsales,
// 'totalcost' => $incomestatementtotalcost,
// 'otherincomes'=> $incomestatementotherincomes,
// 'expenses'=> $incomestatementexpenses,
// 'grossprofitonsales' => $incomestatementtotalsales-$incomestatementtotalcost,
// 'netprofitbeforetaxes' => $incomestatementtotalsales-$incomestatementtotalcost+$incomestatementotherincomes-$incomestatementexpenses
// ]);
// }
// //////////////
// if($ggetrsummaryincome < 1)
// {
//     $incomestatementexpenses = \DB::table('madeexpenses')->where('datemade', '=', $datemade)->where('approvalstate', '=', 1)->sum('amount');
//     $incomestatementotherincomes = \DB::table('companyincomes')->where('daterecieved', '=', $datemade)->where('status', '=', 1)->sum('amount');
  
//   $incomestatementtotalsales = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('netinvoiceincome');
//   $incomestatementtotalcost = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('totalcost');
//   $incomestatementgrossprofit = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('netsalewithoutvat');
// Incomestatementsummary::Create([
   
//   'statementdate' => $datemade,

//  'totalcost' => $incomestatementtotalcost,
//   'totalsales' =>$incomestatementtotalsales,  
//   'otherincomes'=> $incomestatementotherincomes,
//   'expenses'=> $incomestatementexpenses,

//   'grossprofitonsales' => $incomestatementtotalsales-$incomestatementtotalcost,
// 'netprofitbeforetaxes' => $incomestatementtotalsales-$incomestatementtotalcost+$incomestatementotherincomes-$incomestatementexpenses,
    
  
   


//             'ucret' => $userid,
          
//         ]);
// }
// Incomestatementminirecord::Create([
   
//     'incomerefrenceid' => $transactionrefrence,
//     // 'branch' => $user->branch,
//     'dateoftransaction' => $datemade,  
//     'sourceoftransaction' => 4,
//     'typeoftransaction'=> 2,
//     'descriptionoftransaction'=> 'Expense Made',
//      'transactionamount' => ($transamount),   
//     'incomesourcedescription' =>  'Expense made by the company',   
//       'ucret' => $userid,
            
//           ]);

// }


















//    }/// closing if there is enough balance 
//      ///// closing its not 0
   


// }
// //// end of if



// }//// closing if its not super admin

















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
    'expense'   => 'required |max:191',
    'description'   => 'required',
    'amount'  => 'required',
    'datemade'  => 'required',
    'branch'  => 'required'
]);

 
     
$user->update($request->all());
    }

  
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 


     $userid =  auth('api')->user()->id;
     $userbranch =  auth('api')->user()->branch;
     $userrole =  auth('api')->user()->type;
     $usercompany =  auth('api')->user()->comp;
     $usercontry =  auth('api')->user()->countryname;


  
   
     $approvalstate = \DB::table('madeexpenses')->where('id', $id )->value('approvalstate');
     $walletofexpense = \DB::table('madeexpenses')->where('id', $id )->value('walletexpense');
     $transamount = \DB::table('madeexpenses')->where('id', $id)->value('amount');
     $companynameinaction = \DB::table('madeexpenses')->where('id', $id)->value('companyname');
     $countryname = \DB::table('madeexpenses')->where('id', $id)->value('countryname');
     $companyname = \DB::table('madeexpenses')->where('id', $id)->value('companyname');
     $branchinact = \DB::table('madeexpenses')->where('id', $id)->value('branch');
     $monthmade = \DB::table('madeexpenses')->where('id', $id)->value('monthmade');
     $yearmade = \DB::table('madeexpenses')->where('id', $id)->value('yearmade');
     $countrynameinaction = \DB::table('madeexpenses')->where('id', $id)->value('countryname');
     
     
     
     
     $currentaccountbalancespending = \DB::table('expensewalets')
     ->where('walletno', $walletofexpense)
     ->where('companyname', $companynameinaction)
     ->where('countryname', $countrynameinaction)
     ->value('bal');

  
    

if($approvalstate == 0 )
{
   if($currentaccountbalancespending >= $transamount)
   {
    $newwalletamountrecieving = $currentaccountbalancespending-$transamount;
    ///updating the expense from wallet
    $updatingthegivingaccount = \DB::table('expensewalets')
    ->where('walletno', $walletofexpense)
    ->where('countryname', $countryname)
    ->where('companyname', $companyname)
    ->update(['bal' =>  $newwalletamountrecieving]);
    // confirming product expense

    $updatingthestatus = \DB::table('madeexpenses')
    ->where('id', $id)
    ->update(['approvalstate' => 1]);
    $branchinq = \DB::table('madeexpenses')
    ->where('id', $id )
    ->value('branch');
  //  $bstanding = \DB::table('branchcashstandings')->where('branch', $branchinq)->update(['outstanding' =>  $newwalletamountrecieving]);
//// working on the monthly expenses report

$branchinact = \DB::table('madeexpenses')->where('id', $id)->value('branch');
$monthmade = \DB::table('madeexpenses')->where('id', $id)->value('monthmade');
$yearmade = \DB::table('madeexpenses')->where('id', $id)->value('yearmade');
$datemade = \DB::table('madeexpenses')->where('id', $id)->value('datemade');
$category = \DB::table('madeexpenses')->where('id', $id)->value('category');
$exptype = \DB::table('madeexpenses')->where('id', $id)->value('exptype');
$walletofexpense = \DB::table('madeexpenses')->where('id', $id)->value('walletexpense');
///
$totalbranchexpensesfotthemonth = \DB::table('madeexpenses')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branch', '=', $branchinact)
->where('countryname', '=', $countrynameinaction)
->where('companyname', '=', $companynameinaction)
->where('approvalstate', '=', 1)
->sum('amount');
/// deleting the record
DB::table('expmothlyexpensereports')->
where('branch', $branchinact)->
where('companyname', $companynameinaction)->
where('countryname', $countrynameinaction)->where('yearname', $yearmade)->where('monthname', $monthmade)->delete();
/// inserting back the record
Expmothlyexpensereport::Create([
  'branch'      => $branchinact,
  'countryname'         => $countrynameinaction,
  'companyname'         => $companynameinaction,
  'amount'         => $totalbranchexpensesfotthemonth,
  'monthname'         => $monthmade,
  'yearname'         => $yearmade,
    
  'ucret' => $userid,

]);
/////
$totalbranchexpensesfotthemonthcategory = \DB::table('madeexpenses')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('category', '=', $category)
->where('countryname', '=', $countrynameinaction)
->where('companyname', '=', $companynameinaction)
->where('approvalstate', '=', 1)
->sum('amount');
/// deleting the record
DB::table('expmonthlyexpensesreportbycategories')
->where('expensecategory', $category)
->where('yearname', $yearmade)
->where('monthname', $monthmade)
->where('countryname', '=', $countrynameinaction)
->where('companyname', '=', $companynameinaction)
->delete();
/// inserting back the record
Expmonthlyexpensesreportbycategory::Create([
  'expensecategory'      => $category,
  // 'branch'      => $branchinact,
  'amount'         => $totalbranchexpensesfotthemonthcategory,
  'countryname'         => $countrynameinaction,
  'companyname'         => $companynameinaction,
  'monthname'         => $monthmade,
  'yearname'         => $yearmade,
    
  'ucret' => $userid,

]);
$totalbranchexpensesfotthemonthtypes = \DB::table('madeexpenses')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('exptype', '=', $exptype)
->where('countryname', '=', $countrynameinaction)
->where('companyname', '=', $companynameinaction)
->where('approvalstate', '=', 1)
->sum('amount');
/// deleting the record
DB::table('expmonthlyexpensesreportbytypes')
->where('expensetype', $exptype)
->where('countryname', '=', $countrynameinaction)
->where('companyname', '=', $companynameinaction)
->where('yearname', $yearmade)
->where('monthname', $monthmade)
->delete();
/// inserting back the record
Expmonthlyexpensesreportbytype::Create([
  'expensetype'      => $exptype,
  // 'branch'      => $branchinact,
  'countryname'         => $countrynameinaction,
  'companyname'         => $companynameinaction,
  'amount'         => $totalbranchexpensesfotthemonthtypes,
  'monthname'         => $monthmade,
  'yearname'         => $yearmade,
    
  'ucret' => $userid,

]);

$newexpensebywallettotal = \DB::table('madeexpenses')
->where('datemade', '=', $datemade)
//->where('monthmade', '=', $monthmade)
//->where('yearmade', '=', $yearmade)
->where('countryname', '=', $countrynameinaction)
->where('companyname', '=', $companynameinaction)
->where('walletexpense', '=', $walletofexpense)
->where('approvalstate', '=', 1)
->sum('amount');
DB::table('expmonthlyexpensesreportbywallets')->where('datedone', $datemade)->where('walletname', $walletofexpense)->delete();
Expmonthlyexpensesreportbywallet::Create([
  'ucret'   => $userid,
  'amount'=> $newexpensebywallettotal,
  'datedone'=> $datemade,
  'monthname'    => $monthmade,
  'walletname'    => $walletofexpense,
  'countryname'         => $countrynameinaction,
  'companyname'         => $companynameinaction,
  'yearname'     => $yearmade,
]);
////////////////////////////////////////
$newexpensedailytotal = \DB::table('madeexpenses')
->where('datemade', '=', $datemade)
//->where('monthmade', '=', $monthmade)
//->where('yearmade', '=', $yearmade)
//->where('walletexpense', '=', $walletofexpense)
->where('approvalstate', '=', 1)
->sum('amount');
DB::table('expdailyreports')->where('datedone', $datemade)->delete();
Expdailyreport::Create([
  'ucret'   => $userid,
  'amount'=> $newexpensedailytotal,
  'datedone'=> $datemade,
  'countryname'         => $countrynameinaction,
  'companyname'         => $companynameinaction,
  // // 'monthname'    => $monthmade,
  // // 'walletname'    => $walletofexpense,
  // 'yearname'     => $yearmade,
]);
/////////////////////////////////////////////////////////////////////////
$transactionrefrence = \DB::table('madeexpenses')->where('id', $id)->value('incomerefrenceid');

$ggetrsummaryincome = \DB::table('incomestatementsummaries')->where('statementdate', '=', $datemade)->count();
if($ggetrsummaryincome > 0)
{
  //// getting the expenses, and other incomes
  /// expenses 
  $incomestatementexpenses = \DB::table('madeexpenses')->where('datemade', '=', $datemade)->where('approvalstate', '=', 1)->sum('amount');
  $incomestatementotherincomes = \DB::table('companyincomes')->where('daterecieved', '=', $datemade)->where('status', '=', 1)->sum('amount');

$incomestatementtotalsales = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('netinvoiceincome');
$incomestatementtotalcost = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('totalcost');
$incomestatementgrossprofit = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('netsalewithoutvat');

  DB::table('incomestatementsummaries')
->where('statementdate', $datemade)
->update([
'totalsales' => $incomestatementtotalsales,
'totalcost' => $incomestatementtotalcost,
'otherincomes'=> $incomestatementotherincomes,
'expenses'=> $incomestatementexpenses,
'grossprofitonsales' => $incomestatementtotalsales-$incomestatementtotalcost,
'netprofitbeforetaxes' => $incomestatementtotalsales-$incomestatementtotalcost+$incomestatementotherincomes-$incomestatementexpenses
]);
}
//////////////
if($ggetrsummaryincome < 1)
{
    $incomestatementexpenses = \DB::table('madeexpenses')->where('datemade', '=', $datemade)->where('approvalstate', '=', 1)->sum('amount');
    $incomestatementotherincomes = \DB::table('companyincomes')->where('daterecieved', '=', $datemade)->where('status', '=', 1)->sum('amount');
  
  $incomestatementtotalsales = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('netinvoiceincome');
  $incomestatementtotalcost = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('totalcost');
  $incomestatementgrossprofit = \DB::table('dailysummaryreports')->where('datedone', '=', $datemade)->sum('netsalewithoutvat');
Incomestatementsummary::Create([
   
  'statementdate' => $datemade,

 'totalcost' => $incomestatementtotalcost,
  'totalsales' =>$incomestatementtotalsales,  
  'otherincomes'=> $incomestatementotherincomes,
  'expenses'=> $incomestatementexpenses,

  'grossprofitonsales' => $incomestatementtotalsales-$incomestatementtotalcost,
'netprofitbeforetaxes' => $incomestatementtotalsales-$incomestatementtotalcost+$incomestatementotherincomes-$incomestatementexpenses,
    
  
   


            'ucret' => $userid,
          
        ]);
}
Incomestatementminirecord::Create([
   
    'incomerefrenceid' => $transactionrefrence,
    // 'branch' => $user->branch,
    'dateoftransaction' => $datemade,  
    'sourceoftransaction' => 4,
    'typeoftransaction'=> 2,
    'descriptionoftransaction'=> 'Expense Made',
     'transactionamount' => ($transamount),   
    'incomesourcedescription' =>  'Expense made by the company',   
      'ucret' => $userid,
            
          ]);

}


$existanceofrecordmonth = \DB::table('branchperformancereports')
->where('branchname', $branchinact )
->where('companyname', $companyname )
->where('countryname', $countryname )
->where('monthname', $monthmade )
->where('yearname', $yearmade )

->count();

$totalfixedeexpensaes = \DB::table('monthlyexpenses')
   
    ->where('branchname', '=', $branchinact)
    ->where('companyname', $companyname )
    ->where('countryname', $countryname )
    //->where('monthmade', $monthmade )
    //->where('yearmade', $yearmade )
    //->where('tofixed', 0 )
    
    ->sum('amount');
$totalvarriableexpensaes = \DB::table('madeexpenses')
   
    ->where('branch', '=', $branchinact)
    ->where('companyname', $companyname )
    ->where('countryname', $countryname )
    ->where('monthmade', $monthmade )
    ->where('yearmade', $yearmade )
    ->where('tofixed', 0 )
    
    ->sum('amount');


    if($existanceofrecordmonth  > 0) 
    {
      $yyhttred = \DB::table('branchperformancereports')
  ->where('branchname', $branchinact)
  ->where('countryname', '=', $countryname)
  ->where('companyname', '=', $companyname)
  ->where('monthname', $monthmade )
  ->where('yearname', $yearmade )
  ->update([
  //'totalmonthlyprofit' =>  $totalprofittttt, 
  'otherexpenses' =>  $totalvarriableexpensaes, 
  'totalexpensesforthemonth'=>  $totalvarriableexpensaes+$totalfixedeexpensaes, 
  'totalmonthlyexpense' =>  $totalfixedeexpensaes
  ]);
    }
    if($existanceofrecordmonth  < 1) 
    {
      //
      // , ucret, created_at, updated_at
      Branchperformancereport::Create([
        'branchname'      => $branchinact,
        'totalmonthlyexpense'       => $totalfixedeexpensaes,
 //       'totalmonthlyprofit'         => $totalprofittttt,
        'monthname'         => $monthmade,
        'yearname'         => $yearmade,
        'companyname'         => $companyname,
        'countryname'         => $countryname,
        'expecteddailyreturn' => (($totalfixedeexpensaes+$totalvarriableexpensaes)/30),
          'otherexpenses' => $totalvarriableexpensaes,
              
        'ucret' => $userid,
      
      ]);
    } 










   }/// closing if there is enough balance 
}     ///// closing its not 0
   


    
}
