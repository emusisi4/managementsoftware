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
use App\Cintransfer;
use App\Couttransfer;
use App\Madeexpense;
class CashCollectionController extends Controller
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
    $branchname = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('branchname');
    $countryname = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('countryname');
    $companyname = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('companyname');

    if($branchname != "900")
    {
    return   Cintransfer::with(['branchName','branchNamefrom','ceratedUserdetails','approvedUserdetails', 'statusName','companyCintransfers','countryCintransfers'])->latest('id')
    ->where('branchto', $branchname)
    ->where('countryname', $countryname)
    ->where('companyname', $companyname)
    ->paginate(30);
    }

    if($branchname == "900")
    {
    return   Cintransfer::with(['branchName','branchNamefrom','ceratedUserdetails','approvedUserdetails', 'statusName','companyCintransfers','countryCintransfers'])->latest('id')
  //  ->where('branch', $branchname)
    ->where('countryname', $countryname)
    ->where('companyname', $companyname)
    ->paginate(30);
    }




     

      
    }

    
    
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];

       $userid =  auth('api')->user()->id;
       $userbranch =  auth('api')->user()->branch;
       $userrole =  auth('api')->user()->mmaderole;
       $usertype =  auth('api')->user()->type;
     
 //    if($usertype == '1')
     // start of superadmin
      { 
          
        $this->validate($request,[
        'branchnametobalance'   => 'required',
        'description'   => 'required',
        'amount'  => 'required',
        'transferdate'  => 'required',
        'countryname'  => 'required',
        'companyname'  => 'required',
        'walletinaction'  => 'required',
      
       // 'expensetype'   => 'sometimes |min:0'
     ]);

     $dateinact = $request['transferdate'];
     $yearmade = date('Y', strtotime($dateinact));
     $monthmade = date('m', strtotime($dateinact));


     $userid =  auth('api')->user()->id;
     $userbranch =  auth('api')->user()->branch;
     //$id1  = Expense::latest('id')->where('del', 0)->orderBy('id', 'Desc')->limit(1)->value('expenseno');
     //$hid = $id1+1;

  
     
  //       $dats = $id;
        Cintransfer::Create([
      'branchto' => $request['branchnametobalance'],
      'branchfrom' => $userbranch,
      'description' => $request['description'],
      'amount' => $request['amount'],
      'transferdate' => $request['transferdate'],
      'monthmade' =>  $monthmade,
      'yearmade' =>  $yearmade,
      
      'countryname' => $request['countryname'],
      'companyname' =>  $request['companyname'],
      'walletname' =>  $request['walletinaction'],
      'ucret' => $userid,

    
    
  ]);

} /// end od superadmin

////////////////// normal user 
     
// if($usertype != '1')
// // start of superadmin
//  { 
     
//    $this->validate($request,[
//    'branchnametobalance'   => 'required',
//    'description'   => 'required',
//    'amount'  => 'required',
//    'transferdate'  => 'required',

 
//   // 'expensetype'   => 'sometimes |min:0'
// ]);

// $dateinact = $request['transferdate'];
// $yearmade = date('Y', strtotime($dateinact));
// $monthmade = date('m', strtotime($dateinact));


// $userid =  auth('api')->user()->id;
// $userbranch =  auth('api')->user()->branch;
// $usercompany =  auth('api')->user()->comp;
// $usercountry =  auth('api')->user()->countryname;
// $userwallet =  auth('api')->user()->mywallet;
// //$id1  = Expense::latest('id')->where('del', 0)->orderBy('id', 'Desc')->limit(1)->value('expenseno');
// //$hid = $id1+1;



// //       $dats = $id;
//    Cintransfer::Create([
//  'branchto' => $request['branchnametobalance'],
//  'branchfrom' => $userbranch,
//  'description' => $request['description'],
//  'amount' => $request['amount'],
//  'transferdate' => $request['transferdate'],
//  'monthmade' =>  $monthmade,
//  'yearmade' =>  $yearmade,
//  'countryname' => $usercountry,
//  'companyname' =>  $usercompany,
//  'walletname' =>  $userwallet,

//  'ucret' => $userid,



// ]);} 

  /////////////////////// adding the expensse
  ///id, expense, amount, datemade, ucret, branch, description, approvalstate, del, created_at, updated_at, explevel, walletexpense, category, exptype, monthmade, yearmade
  Madeexpense::Create([
    'branch' => $request['branchnametobalance'],
    'expense' => 34,
    'description' => 'Deposit Charge',
    'amount' => 1000,
    'datemade' => $request['transferdate'],
    'explevel' =>'2',
    'walletexpense'=> '1',
    'category'  => '8',
    'exptype'  => '2',
    'monthmade' =>  $monthmade,
    'yearmade' =>  $yearmade,
    

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
        //
     //   $this->authorize('isAdmin'); 

        $user = Cintransfer::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }



}
