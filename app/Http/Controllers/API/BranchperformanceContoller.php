<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Branch;
use App\Dailyreportcode;
use App\Shopbalancingrecord;
use App\Salesdetail;
use App\Branchandcode;
use App\Currentmachinecode;
use App\Branchperformancereport;

  use App\Daysummarry;

class BranchperformanceContoller extends Controller
{
    
    public function __construct()
    {
       $this->middleware('auth:api');
      //  $this->authorize('isAdmin'); 
    }

    public function index()
    {
      $userid =  auth('api')->user()->id;
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $usertype =  auth('api')->user()->type;
      $userrole =  auth('api')->user()->mmaderole;
      $userbranch =  auth('api')->user()->branch;
      $usercompany =  auth('api')->user()->companyname;
      $usercountry =  auth('api')->user()->countryname;

    //  $reporttype = \DB::table('fishreportselections')->where('ucret', '=', $userid)->value('reporttype');
      $monthtodisplay = \DB::table('fishreportselections')->where('ucret', '=', $userid)->value('monthname');
      $yeartodisplay = \DB::table('fishreportselections')->where('ucret', '=', $userid)->value('yearname');
      $branch = \DB::table('fishreportselections')->where('ucret', '=', $userid)->value('branch');
    
      $companyname = \DB::table('fishreportselections')->where('ucret', '=', $userid)->value('companyname');
      $countryname = \DB::table('fishreportselections')->where('ucret', '=', $userid)->value('countryname');
      
      if($usertype != '1')
      
      {
         return   Branchperformancereport::with(['countryBranchperformancereport','companyBranchperformancereport','branchBranchperformancereport'])->orderBy('branchname', 'Desc')
         ->where('monthname', $monthtodisplay)
         ->where('yearname', $yeartodisplay)
         ->where('countryname', $usercountry)
         ->where('companyname', $usercompany)
         ->paginate(15);
       }
       //// end of usertype is super admin
      if($usertype == '1')
      
     {
        return   Branchperformancereport::with(['countryBranchperformancereport','companyBranchperformancereport','branchBranchperformancereport'])->orderBy('branchname', 'Desc')
        // ->where('countryname', $countryname)
        ->where('countryname', $countryname)
        ->where('companyname', $companyname)
        ->where('monthname', $monthtodisplay)
        ->where('yearname', $yeartodisplay)
        ->paginate(15);
      }
      //// end of usertype is super admin
    }

   
    public function store(Request $request)
    {
      ////checking if the branch has fish
      $fishgame = 'fish';
      $soccer = 'soccer';
      $virtual = 'virtual';


      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;

      $usercompany =  auth('api')->user()->comp;
      $usercountry =  auth('api')->user()->countryname;
      $branchforaction = $request['branchnametobalance'];


    //  if($userrole == '1')
      {


      /// checking if the branch has a machine code set for it
      $doesthebranchhaveacdelock = \DB::table('branchandcodes')->where('branch', $branchforaction )->count();
if($doesthebranchhaveacdelock > 0)
     {
$machinefloatcodelastloaded  = Branchandcode::where('branch', $branchforaction)->orderBy('id', 'Desc')->limit(1)->value('floatcode');
} 
if($doesthebranchhaveacdelock < 1) 
{
  $machinefloatcodelastloaded = '-';
}    //     
    ////////////////////////////////////////////////////////


$doesthebranchhavefish = \DB::table('branchandproducts')->where('branch', $branchforaction )->where('sysname', $fishgame )->count();
$doesthebranchhavesoccer = \DB::table('branchandproducts')->where('branch', $branchforaction )->where('sysname', $soccer )->count();
$doesthebranchhavevirtual = \DB::table('branchandproducts')->where('branch', $branchforaction )->where('sysname', $virtual )->count();

      //// branch in action
      $branchforaction = $request['branchnametobalance'];
      $countryname    = $request['countryname'];
      $companyname    = $request['companyname'];
    /// number of machines 
    $totalfishmacinesinthebranch = \DB::table('branchesandmachines')->where('branchname', '=', $branchforaction)->count();

    $this->validate($request,[
      'datedone'   => 'required  |max:191',
      'branchnametobalance'   => 'required',
      'reportedcash' => 'required',
      'bio' => 'required',
      'machineonecurrentcode'  => 'required',
      'machineonesales'  => 'required',
      'machineonepayout'  => 'required',
      'countryname'  => 'required',
      'companyname'  => 'required',
      'machineonefloat'  => 'required'
    
     ]);


     $datepaid = date('Y-m-d');
     $inpbranch = $request['branchnametobalance'];
     $dateinq =  $request['datedone'];

       /// checking if the machine was reset
  $machineresetstatus = \DB::table('machineresets')->where('branch', $inpbranch)->where('machine', '101')->orderBy('id', 'Desc')->limit(1)->value('resetdate');
     if( $machineresetstatus  != $dateinq)
{

            /// getting the expenses
            $totalexpense = \DB::table('madeexpenses')->where('datemade', '=', $dateinq)->where('branch', '=', $inpbranch)->where('explevel', '=', 1)
            ->where('approvalstate', '=', 1)
            ->sum('amount');
     
        /// getting the cashin
$totalcashin = \DB::table('couttransfers')->where('transferdate', '=', $dateinq)->where('branchto', '=', $inpbranch)
->where('status', '=', 1)
->where('countryname', '=', $countryname)
->where('companyname', '=', $companyname)
->sum('amount');
      /// getting the cashout
$totalcashout = \DB::table('cintransfers')
->where('transferdate', '=', $dateinq)
->where('branchto', '=', $inpbranch)
->where('countryname', '=', $countryname)
->where('companyname', '=', $companyname)
->where('status', '=', 1)->sum('amount');
     
      /// getting the payout
$totalpayout = \DB::table('branchpayouts')
->where('datepaid', '=', $dateinq)
->where('branch', '=', $inpbranch)
->where('countryname', '=', $countryname)
->where('companyname', '=', $companyname)
->sum('amount');
     
     
      /// checking if a record exists for balancing
             $branchinbalanced  = \DB::table('shopbalancingrecords')
             ->where('branch', '=', $inpbranch)
             ->where('countryname', '=', $countryname)
             ->where('companyname', '=', $companyname)
             ->count();
     
     ///getting the openning balance
     if($branchinbalanced > 0)
     {
     $openningbalance  = Shopbalancingrecord::where('branch', $inpbranch)
                  ->where('countryname', '=', $countryname)
                  ->where('companyname', '=', $companyname)
                  ->orderBy('id', 'Desc')
                  ->limit(1)
                  ->value('clcash');
     }
     if($branchinbalanced < 1)
     {
     $openningbalance  = Branch::where('branchno', $inpbranch)
     ->where('countryname', '=', $countryname)
      ->where('companyname', '=', $companyname)
      ->orderBy('id', 'Desc')->limit(1)->value('openningbalance');
     }
   
     /// working on fish sales and codes
     //gitting the days code from sles and payout

     $dateinact = $request['datedone'];
     $yearmade = date('Y', strtotime($dateinact));
     $monthmade = date('m', strtotime($dateinact));

    $machineoneopenningcode = \DB::table('currentmachinecodes')->where('branch', $inpbranch)->where('machineno', '101')->orderBy('id', 'Desc')->limit(1)->value('machinecode');
      
///// Getting the machine multiplier
$multiplier = \DB::table('branchesandmachines')
->where('branchname', $inpbranch)
->where('countryname', '=', $countryname)
->where('companyname', '=', $companyname)
->where('machinename', '101')->orderBy('id', 'Desc')->limit(1)->value('machinmultiplier');






    $machineonecurrentcode = $request['machineonecurrentcode'];
    $machineonesales = $request['machineonesales'];
    $machineonepayout = $request['machineonepayout'];
    $machineonefloat = $request['machineonefloat'];
    
    
     $machineoneclosingcode = $machineonecurrentcode;
     $fishincome = ($machineoneclosingcode - $machineoneopenningcode)*$multiplier;
     $closingbalance = $openningbalance + $fishincome + $totalcashin - $totalcashout -$totalexpense -$totalpayout;

     /// working on todays saes and payout 
     $latestsalescode = \DB::table('dailyreportcodes')
     ->where('branch', $inpbranch)
     ->where('machineno', '101')
     ->where('countryname', '=', $countryname)
     ->where('companyname', '=', $companyname)
     ->orderBy('id', 'Desc')
     ->limit(1)
     ->value('salescode');


     $latestpayoutcode = \DB::table('dailyreportcodes')
     ->where('branch', $inpbranch)
     ->where('machineno', '101')
     ->where('countryname', '=', $countryname)
     ->where('companyname', '=', $companyname)
     ->orderBy('id', 'Desc')
     ->limit(1)
     ->value('payoutcode');
     $todayssales = $machineonesales - $latestsalescode;
     $todayspayout = $machineonepayout - $latestpayoutcode;
    Shopbalancingrecord::Create([
           'fishincome' => $fishincome,
           'fishsales' => $todayssales,
           'fishpayout' => $todayspayout,
           'datedone' => $request['datedone'],
           'branch' => $request['branchnametobalance'],
           'scpayout' => 0,
           'scsales' =>0,
           'sctkts' => 0,
           'vsales' => 0,
           'vcan' => 0,
           'vprof' => 0,
           'vpay' => 0,
           'vtkts' => 0,
           'comment' => $request['comment'],
           'expenses' => $totalexpense,
           'cashin'    => $totalcashin,
           'cashout'   => $totalcashout,
           'opbalance'    => $openningbalance,
           'clcash'    => $closingbalance,
           'reportedcash'    => $request['reportedcash'],
           'comment'    => $request['bio'],
           'multiplier' => $multiplier,


           'countryname'    => $request['countryname'],
           'companyname'    => $request['companyname'],

           'totalsales' => $todayssales*$multiplier,
           'totalpayout' => $todayspayout*$multiplier,
           'totalcancelled' => 0,
           'totalprofit' => ($todayssales*$multiplier)-($todayspayout*$multiplier),


           'ucret' => $userid,
         
       ]);

////////// working on shop balance

$currentbranchbalance = \DB::table('branchcashstandings')
->where('branch', $inpbranch)
->where('countryname', '=', $countryname)
->where('companyname', '=', $companyname)
->orderBy('id', 'Desc')
->limit(1)
->value('outstanding');


 $machinemoney = ( ($todayssales*$multiplier)-($todayspayout*$multiplier));
$totaltipup = $currentbranchbalance+$machinemoney;
$result2 = \DB::table('branchcashstandings')
->where('branch', $inpbranch)
->where('countryname', '=', $countryname)
->where('companyname', '=', $companyname)
->update(['outstanding' =>  $totaltipup, 'reportedcash' =>  $request['reportedcash']]);
























       //// Saving the current machinecodes
       Currentmachinecode::Create([
        'machineno' => '101',
        'datedone' => $request['datedone'],
        'countryname'    => $request['countryname'],
        'companyname'    => $request['companyname'],
        'branch' => $request['branchnametobalance'],
        'machinecode' => $machineoneclosingcode,
        'ucret' => $userid,
      
    ]);
    //ooooooooooooooooooooooooooooooooooooooooooooooooooooooo
/// working and Updating the daily Codes
    /////////////////////////////////////////// checking if there is a sale or payout
    $existpreviouswork = \DB::table('dailyreportcodes')
    ->where('branch', '=', $inpbranch)
    ->where('countryname', '=', $countryname)
->where('companyname', '=', $companyname)
->where('machineno', '=', 101)->count();
  
    
       if($existpreviouswork > 0)
       {
      $previoussalesfigure = \DB::table('dailyreportcodes')
      ->where('branch', $inpbranch)
      ->where('countryname', '=', $countryname)
      ->where('companyname', '=', $companyname)
      ->where('machineno', '101')
      ->orderBy('id', 'Desc')
      ->limit(1)
      ->value('salescode');
      $previouspayoutfigure = \DB::table('dailyreportcodes')
      ->where('branch', $inpbranch)
      ->where('machineno', '101')
      ->where('countryname', '=', $countryname)
->where('companyname', '=', $companyname)
      ->orderBy('id', 'Desc')
      ->limit(1)
      ->value('payoutcode');
       }
       if($existpreviouswork < 1)
       {
         $previoussalesfigure = 0;
         $previouspayoutfigure = 0;
       }
 
       
/// calculating the current or dayz sales and payout
$todayssaes1 = $machineonesales - $previoussalesfigure;
$todayspayout11 = $machineonepayout - $previouspayoutfigure;
if($todayssaes1 >= 0)
{
$todayssaes = $todayssaes1;
}
if($todayssaes1 < 0)
{
$todayssaes = $machineonesales;
}
//
if($todayspayout11 >= 0)
{
$todayspayout = $todayspayout11;
}
if($todayspayout11 < 0)
{
$todayspayout = $machineonepayout;
}
///// getting the branch order
$dorder = \DB::table('branches')->where('id', '=', $userbranch)->count('dorder');
/// deleting the existing record
$bxn = $request['branchnametobalance'];
$datedonessd = $request['datedone'];
DB::table('dailyreportcodes')->where('branch', $bxn)->where('datedone', $datedonessd)->where('machineno', 101)->delete();


    /// working and Updating the daily Codes
    Dailyreportcode::Create([
      'machineno'    => '101',
      'companyname'     => $request['companyname'],
      'countryname'       => $request['countryname'],

      'datedone'     => $request['datedone'],
      'branch'       => $request['branchnametobalance'],
      'closingcode'  => $machineoneclosingcode,
      'floatcode'    => $request['machineonefloat'],
      'openningcode' =>    $machineoneopenningcode,
      'salescode'    =>    $machineonesales,
      'payoutcode'   =>    $machineonepayout,
      'profitcode'   =>    $machineonesales-$machineonepayout,
      'previoussalesfigure'  =>    $previoussalesfigure,
      'previouspayoutfigure' =>    $previouspayoutfigure,
      'currentpayoutfigure'  =>    $todayspayout,
      'currentsalesfigure'   =>    $todayssaes,
      'dorder'  =>    $dorder,
      'ucret'   => $userid,
      'totalcollection' => $totalcashout,
      'totalcredits'=> $totalcashin,
      'daysalesamount' => $todayssaes*$multiplier,
      'daypayoutamount' => $todayspayout*$multiplier,
      'monthmade'    => $monthmade,
      'multiplier' => $multiplier,
      'machineunlockcode' => $machinefloatcodelastloaded,
      'yearmade'     => $yearmade,

      'totalsales' => $todayssaes*$multiplier,
      'totalpayout' => $todayspayout*$multiplier,
      'totalcancelled' => 0,
      'totalprofit' => ($todayssaes*$multiplier)-($todayspayout*$multiplier),
    
    ]);

{
  // //$branchinmonthlyreport = \DB::table('mlyrpts')->where('branch', $branchforaction)->where('companyname', $yearmade)->where('monthdone', $monthmade)->count();

  $brancchssjh = $request['branchnametobalance'];
  DB::table('mlyrpts')->where('branch', $brancchssjh)
  ->where('yeardone', $yearmade)
  ->where('countryname', '=', $countryname)
  ->where('companyname', '=', $companyname)
  ->where('monthdone', $monthmade)->delete();
  // extracting the new sales figure for the  month
$newsalesfigure = \DB::table('dailyreportcodes')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('countryname', '=', $countryname)
  ->where('companyname', '=', $companyname)
->where('branch', '=', $brancchssjh)
->sum('daysalesamount');
/// new payout figure
$newspayoutfigure = \DB::table('dailyreportcodes')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('countryname', '=', $countryname)
  ->where('companyname', '=', $companyname)
->where('branch', '=', $brancchssjh)
->sum('daypayoutamount');

/// new collections figure
$newcollectionsfigure = \DB::table('cintransfers')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branchto', '=', $brancchssjh)
->where('countryname', '=', $countryname)
  ->where('companyname', '=', $companyname)
->where('status', '=', 1)
->sum('amount');
/// new credits figure
$newcreditsfigure = \DB::table('couttransfers')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branchto', '=', $brancchssjh)
->where('status', '=', 1)
->sum('amount');
/// new expenses figure
$newexpensesfigure = \DB::table('madeexpenses')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branch', '=', $brancchssjh)
->where('countryname', '=', $countryname)
  ->where('companyname', '=', $companyname)
->where('approvalstate', '=', 1)
->sum('amount');

$newtotalsales = \DB::table('dailyreportcodes')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branch', '=', $brancchssjh)
->sum('totalsales');
$newtotalpayout = \DB::table('dailyreportcodes')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('countryname', '=', $countryname)
  ->where('companyname', '=', $companyname)
->where('branch', '=', $brancchssjh)
->sum('totalpayout');
$newtotalcancelled = \DB::table('dailyreportcodes')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branch', '=', $brancchssjh)
->where('countryname', '=', $countryname)
  ->where('companyname', '=', $companyname)
->sum('totalcancelled');

$newtotalprofit = \DB::table('dailyreportcodes')
->where('monthmade', '=', $monthmade)
->where('yearmade', '=', $yearmade)
->where('branch', '=', $brancchssjh)
->where('countryname', '=', $countryname)
  ->where('companyname', '=', $companyname)
->sum('totalprofit');


  // insertion query
  Mlyrpt::Create([

    'branch'       => $brancchssjh,
 
    'dorder'  =>    $dorder,
    'ucret'   => $userid,
    'sales' => $newsalesfigure,
    'payout'=> $newspayoutfigure,
    'collections' => $newcollectionsfigure,
    'credits' => $newcreditsfigure,
    'expenses' => $newexpensesfigure,
    'profit' => $newsalesfigure-$newspayoutfigure,
    'ntrevenue'  => $newsalesfigure-$newspayoutfigure-$newexpensesfigure,
    'monthdone'    => $monthmade,
    'yeardone'     => $yearmade,
    'countryname'    => $countryname,
    'companyname'     => $companyname,

    'totalsales' => $newtotalsales,
    'totalpayout' => $newtotalpayout,
    'totalcancelled' => $newtotalcancelled,
    'totalprofit' =>$newtotalprofit,
  
  ]);


}

///// working the dailysummary
$datedonessd = $request['datedone'];
// sales summary
$newsalesasummaryfortheday = \DB::table('dailyreportcodes')
->where('datedone', '=', $datedonessd)
->where('countryname', '=', $countryname)
  ->where('companyname', '=', $companyname)
->sum('daysalesamount');
$newpayoutsummaryfortheday = \DB::table('dailyreportcodes')
->where('datedone', '=', $datedonessd)
->where('countryname', '=', $countryname)
  ->where('companyname', '=', $companyname)
->sum('daypayoutamount');

$newvirtualsalessummaryfortheday = \DB::table('dailyreportcodes')
->where('datedone', '=', $datedonessd)
->where('countryname', '=', $countryname)
  ->where('companyname', '=', $companyname)
->sum('virtualsales');
$newvirtualpayoutsummaryfortheday = \DB::table('dailyreportcodes')
->where('datedone', '=', $datedonessd)
->where('countryname', '=', $countryname)
  ->where('companyname', '=', $companyname)
->sum('virtualpayout');
$newvirtualcancelledsummaryfortheday = \DB::table('dailyreportcodes')
->where('datedone', '=', $datedonessd)
->where('countryname', '=', $countryname)
  ->where('companyname', '=', $companyname)
->sum('virtualcancelled');
$newvirtualprofitummaryfortheday = \DB::table('dailyreportcodes')
->where('datedone', '=', $datedonessd)
->where('countryname', '=', $countryname)
  ->where('companyname', '=', $companyname)
->sum('virtualprofit');


//////////////////////////////////////////////////////////////////////////////
DB::table('daysummarries')->where('datedone', $datedonessd)->delete();
    
Daysummarry::Create([
  'salesamount'      => $newsalesasummaryfortheday,
  'datedone'       => $datedonessd,
  'payoutamount'         => $newpayoutsummaryfortheday,
  'monthdone'         => $monthmade,
  'yeardone'         => $yearmade,
  'companyname'         => $companyname,
  'countryname'         => $countryname,
  'totalsales' => $newvirtualsalessummaryfortheday+$newsalesasummaryfortheday-$newvirtualcancelledsummaryfortheday,
    'totalpayout' => $newpayoutsummaryfortheday+$newvirtualpayoutsummaryfortheday,
    'totalcancelled' => $newvirtualcancelledsummaryfortheday,
    'totalprofit' =>$newvirtualprofitummaryfortheday+$newsalesasummaryfortheday-$newpayoutsummaryfortheday,
  'ucret' => $userid,

]);





    ///// Updating the collection and credits 


    
    DB::table('salesdetails')
    ->where('branch', $bxn)
    ->where('datedone', $datedonessd)
    ->where('machineno', 101)
    ->where('countryname', '=', $countryname)
  ->where('companyname', '=', $companyname)
  ->delete();
    
    Salesdetail::Create([
      'machineno'      => '101',
      'datedone'       => $request['datedone'],
      'branch'         => $request['branchnametobalance'],
      
      'previoussalesfigure' => $previoussalesfigure,
      'previouspayoutfigure' => $previouspayoutfigure,
    
      'currentsalesfigure'   =>    $machineonesales,
      'currentpayoutfigure'   =>   $machineonepayout,
      'companyname'         => $companyname,
  'countryname'         => $countryname,
      'salesamount'    =>    ($machineonesales - $machineonepayout)*$multiplier,
      'salesfigure'    =>    $machineonesales - $machineonepayout,
      //'payoutamount'    =>    ($machineonepayout - $machineonepayout)*500,
      'monthmade'    => $monthmade,
      'yearmade'    => $yearmade,
      'daysalesamount' => $todayssaes*$multiplier,
      'daypayoutamount' => $todayspayout*$multiplier,
      
      
      'ucret' => $userid,
    
    ]);

    
}// closing if the machine was not reset 
      }///////////////////////////////////////////////////////////////////// end of super admin 







































    }// store close




      
 
    public function show($id)
    {
        //
    }
   
  
    
    public function update(Request $request, $id)
    {
        //
        $user = branch::findOrfail($id);

$this->validate($request,[
  'branchname'   => 'required | String |max:191'
  

    ]);

 
     
$user->update($request->all());
    }

  
    
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 
     $bxn = \DB::table('shopbalancingrecords')->where('id', '=', $id)->value('branch');
     $datedonessd = \DB::table('shopbalancingrecords')->where('id', '=', $id)->value('datedone');

        $user = Shopbalancingrecord::findOrFail($id);
        $user->delete();

        // $bxn = \DB::table('shopbalancingrecords')->where('id', '=', $id)->value('branch');
        // $datedonessd = \DB::table('shopbalancingrecords')->where('id', '=', $id)->value('datedone');
       
       
//         /// deleting from the daily record
//     
DB::table('dailyreportcodes')->where('branch', $bxn)->where('datedone', $datedonessd)->delete();
DB::table('currentmachinecodes')->where('branch', $bxn)->where('datedone', $datedonessd)->delete();


    }
}
