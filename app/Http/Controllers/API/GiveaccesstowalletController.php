<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Branch;
use App\Expensewalet;
use App\Componentsaccesse;

class GiveaccesstowalletController extends Controller
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
      return   Shopbalancingrecord::with(['userbalancingBranch','branchinBalance'])->latest('id')
      
      // return   Shopbalancingrecord::latest('id')
       //  return   Branchpayout::latest('id')
         ->where('branch', $userbranch)
        ->paginate(20);
      }


      if($userrole == '100')
      {
      
      
      return   Shopbalancingrecord::with(['userbalancingBranch','branchinBalance'])->latest('id')
      
      // return   Shopbalancingrecord::latest('id')
       //  return   Branchpayout::latest('id')
         ->where('del', 0)
        ->paginate(20);
      
    }
      
    }

    
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];
       $userid =  auth('api')->user()->id;
       $userbranch =  auth('api')->user()->branch;
       $userrole =  auth('api')->user()->type;
 


       $this->validate($request,[
      'companyname'   => 'required |max:191',
       'countryname'   => 'required',
       'bal'   => 'required',
       'recievableincome'   => 'required',
       'spendable'   => 'required',
       'walletname'   => 'required'
       // 'dorder'   => 'sometimes |min:0'
     ]);
     $countryname = $request['countryname'];
     $companyname =  $request['companyname'];
     $walletname =  $request['walletname'];
$spendable =  $request['spendable'];
$bal =  $request['bal'];
$recievableincome =  $request['recievableincome'];
     /// getting the wallet name from general
     $wal =     DB::table('generalwalets')
     ->where('id', $walletname)
     ->value('name');




     DB::table('expensewalets')
     ->where('companyname', $companyname)
     ->where('countryname', $countryname)
     ->where('walletno', $walletname)->delete();
       return Expensewalet::Create([
      'countryname' => $countryname,
      'companyname' => $companyname,
      'walletno' => $walletname,
      'bal' => $bal,
      'name' => $wal,
      'walletname' => $wal,
      'spendable' => $spendable,
      'recievableincome' => $recievableincome,
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
        $user = branch::findOrfail($id);

$this->validate($request,[
  'branchname'   => 'required | String |max:191'
  

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

        $user = Componentsaccesse::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
