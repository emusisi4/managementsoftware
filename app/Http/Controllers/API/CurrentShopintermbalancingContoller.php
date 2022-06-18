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
use App\Interimshopbalancing;
use App\Salesdetail;
use App\Currentmachinecode;
use App\Mlyrpt;

  use App\Daysummarry;

class CurrentShopintermbalancingContoller extends Controller
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
      $userrole =  auth('api')->user()->type;

      if($userrole == '101')
      {
      return   Interimshopbalancing::with(['userbalancingBranch','branchinBalance'])->orderBy('datedone', 'Desc')
      
      // return   Interimshopbalancing::latest('id')
       //  return   Branchpayout::latest('id')
        ->where('ucret', $userid)
        ->paginate(40);
      }


      if($userrole != '101')
      {
      
      
      return   Interimshopbalancing::with(['userbalancingBranch','branchinBalance'])->orderBy('datedone', 'Desc')
      
      // return   Interimshopbalancing::latest('id')
       //  return   Branchpayout::latest('id')
         ->where('del', 0)
        ->paginate(40);
      
    }
    if($userrole == '103')
    {
    
    
    return   Interimshopbalancing::with(['userbalancingBranch','branchinBalance'])->orderBy('datedone', 'Desc')
    
    // return   Interimshopbalancing::latest('id')
     //  return   Branchpayout::latest('id')
     ->where('ucret', $userid)
      ->paginate(40);
    
  }
    }

   
    public function store(Request $request)
    {
       ////checking if the branch has fish
       $fishgame = 'fish';
       $soccer = 'soccer';
       $virtual = 'virtual';
 
 
       $userid =  auth('api')->user()->id;
       $userbranch =  auth('api')->user()->branch;
       $userrole =  auth('api')->user()->mmaderole;
       $usertype =  auth('api')->user()->type;
       $usercompany =  auth('api')->user()->companyname;
       $usercountry =  auth('api')->user()->countryname;
      
      
      
      
       if($usertype == '1')
       {
         $countryname    = $request['countryname'];
         $companyname    = $request['companyname'];
       }
       if($usertype != '1')
       {
        
         $countryname    = $usercountry;
         $companyname    = $usercompany;
       
       }
      
      
       $branchforaction = $request['branchname'];
       $branchto = $request['branchname'];
 
 
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
       $branchforaction = $request['branchname'];
 
   
      
     /// number of machines 
     $totalfishmacinesinthebranch = \DB::table('branchesandmachines')->where('branchname', '=', $branchforaction)->count();
 if($usertype == '1')
 {
     $this->validate($request,[
       'datedone'   => 'required  |max:191',
       'branchname'   => 'required',
       'reportedcash' => 'required',
       'bio' => 'required',
       'machineonecurrentcode'  => 'required',
       'machineonesales'  => 'required',
       'machineonepayout'  => 'required',
       'countryname'  => 'required',
       'companyname'  => 'required',
       'machineonefloat'  => 'required'
     
      ]);
     }
 
 
     if($usertype != '1')
     {
       $this->validate($request,[
         'datedone'   => 'required  |max:191',
         'branchname'   => 'required',
         'reportedcash' => 'required',
         'bio' => 'required',
         'machineonecurrentcode'  => 'required',
         'machineonesales'  => 'required',
         'machineonepayout'  => 'required',
        // 'countryname'  => 'required',
        // 'companyname'  => 'required',
         'machineonefloat'  => 'required'
       
        ]);
     }
 
 
      $datepaid = date('Y-m-d');
      $inpbranch = $request['branchname'];
      $dateinq =  $request['datedone'];
 
        /// checking if the machine was reset
   $machineresetstatus = \DB::table('machineresets')->where('branch', $inpbranch)->where('machine', '101')->orderBy('id', 'Desc')->limit(1)->value('resetdate');
      if( $machineresetstatus  != $dateinq)
 {
 
             /// getting the expenses
 $totalexpense = \DB::table('madeexpenses')
 ->where('datemade', '=', $dateinq)
 ->where('branch', '=', $inpbranch)
 ->where('countryname', '=', $countryname)
 ->where('companyname', '=', $companyname)
 ->where('explevel', '=', 1)
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
      $openningbalance  = Branch::where('id', $inpbranch)
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
 
      $latestfloatcode = \DB::table('dailyreportcodes')
      ->where('branch', $inpbranch)
      ->where('machineno', '101')
      ->where('countryname', '=', $countryname)
      ->where('companyname', '=', $companyname)
      ->orderBy('id', 'Desc')
      ->limit(1)
      ->value('floatcode');
 
 
 
 $currentfcode = $request['machineonefloat'];
 
      if($latestfloatcode >= $currentfcode)
      {
        $timeworkedinminutes = $latestfloatcode - $currentfcode;
        $timeworkedinhours = (($latestfloatcode - $currentfcode)/60);
        $remainingtimeinhours =  ($currentfcode/60);
        $remainningtimeidays = ($currentfcode/60/24);
      }
     //  if($latestfloatcode < $currentfcode)
     //  {
     //    $timeworkedinminutes = $latestfloatcode - $currentfcode;
     //    $timeworkedinhours = (($latestfloatcode - $currentfcode)/60);
     //    $remainingtimeinhours =  ($currentfcode/60);
     //    $remainningtimeidays = ($currentfcode/60/24);
     //  }
 
 
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
            'branch' => $request['branchname'],
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
 
 
            'countryname'    => $countryname,
            'companyname'    => $companyname,
 
            'totalsales' => $todayssales*$multiplier,
            'totalpayout' => $todayspayout*$multiplier,
            'totalcancelled' => 0,
            'totalprofit' => ($todayssales*$multiplier)-($todayspayout*$multiplier),
 
 
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

        $user = Interimshopbalancing::findOrFail($id);
        $user->delete();

        // $bxn = \DB::table('shopbalancingrecords')->where('id', '=', $id)->value('branch');
        // $datedonessd = \DB::table('shopbalancingrecords')->where('id', '=', $id)->value('datedone');
       
       
//         /// deleting from the daily record
//     
DB::table('dailyreportcodes')->where('branch', $bxn)->where('datedone', $datedonessd)->delete();
DB::table('currentmachinecodes')->where('branch', $bxn)->where('datedone', $datedonessd)->delete();


    }
}
