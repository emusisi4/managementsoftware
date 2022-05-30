<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Expense;
use App\Expensescategory;
use App\Couttransfer;

class CashCreditController extends Controller
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
     $branchname = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('branchname');
     $countryname = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('countryname');
     $companyname = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('companyname');
 
     if($branchname != "900")
     {
     return   Couttransfer::with(['branchName','branchNamefrom','ceratedUserdetails','approvedUserdetails', 'statusName'])->latest('id')
     ->where('branchto', $branchname)
     ->where('countryname', $countryname)
     ->where('companyname', $companyname)
     ->paginate(30);
     }
 
     if($branchname == "900")
     {
     return   Couttransfer::with(['branchName','branchNamefrom','ceratedUserdetails','approvedUserdetails', 'statusName'])->latest('id')
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
       $usercompany =  auth('api')->user()->comp;
       $usercountry =  auth('api')->user()->countryname;
       $userwallet =  auth('api')->user()->mywallet;
       $usertype =  auth('api')->user()->type;
     

      

     $userid =  auth('api')->user()->id;
     $userbranch =  auth('api')->user()->branch;
     //$id1  = Expense::latest('id')->where('del', 0)->orderBy('id', 'Desc')->limit(1)->value('expenseno');
     //$hid = $id1+1;

     $dateinact = $request['transferdate'];
     $yearmade = date('Y', strtotime($dateinact));
     $monthmade = date('m', strtotime($dateinact));
     
  //       $dats = $id;
  //if($usertype == '1')
  // start of superadmin
   { 
       
     $this->validate($request,[
     'branchname'   => 'required',
     'description'   => 'required',
     'amount'  => 'required',
     'transferdate'  => 'required',
     'countryname'  => 'required',
     'companyname'  => 'required',
     'walletinaction'  => 'required',
   
    // 'expensetype'   => 'sometimes |min:0'
  ]);

       Couttransfer::Create([
        'branchto' => $request['branchname'],
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
    }

  


  









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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

        $user = Couttransfer::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }



}
