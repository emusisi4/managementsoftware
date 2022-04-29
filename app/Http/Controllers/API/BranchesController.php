<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use Illuminate\Support\Facades\DB;
use App\Branch;
use App\Madeexpense;
use App\Branchstatement;
use App\Branchcashstanding;

class BranchesController extends Controller
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
        //  $userid =  auth('api')->user()->id;
       

     //   $this->authorize('isSuperadmin'); 
     //   return   User::with(['userRole','userBranch'])->latest('id')

  return   Branch::with(['companyDet','countryBranch'])->latest('id')

  // ->where('del', 0)
  ->paginate(10);
    }

   
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



     


     $userid =  auth('api')->user()->id;
     $usercountry =  auth('api')->user()->countryname;
     $usercompany =  auth('api')->user()->comp;
     $usertype =  auth('api')->user()->type;
     $id1  = Branch::latest('id')->orderBy('id', 'Desc')->limit(1)->value('id');
     $hid = $id1+1;

     $currentdatetime = date("Y-m-d H:i:s");
     $currentdate = date("Y-m-d");
  //       $dats = $id;
  /// start of superadmin
  if($usertype == 1)
   {  
    $this->validate($request,[
      'branchname'   => 'required',
      'location'   => 'required',
      'companyname'   => 'required',
      'countryname'   => 'required',
     // 'dorder'   => 'sometimes |min:0'
   ]);
    Branch::Create([
      'branchname' => $request['branchname'],
     //'branchno' => $hid,
      'location' => $request['location'],
      'contact' => $request['contact'],
      'companyname' => $request['companyname'],
      'countryname' => $request['countryname'],
      'ucret' => $userid,
    
  ]);

  Branchstatement::Create([
    'branchname' => $hid,
   
    'datedone' => $currentdate,
    'statementtype' => 'Account Openning',
    'statementstatus' => 'Credit',
    'transactionamount' => 0,
    'closingbalance' => $request['openningbalance'],
  
  
      'ucret' => $userid,
    
  ]);

  Branchcashstanding::Create([
    'branch' => $hid,
   
    'outstanding' => 0,
    'companyname' => $request['companyname'],
    'countryname' => $request['countryname'],
  
  
      'ucret' => $userid,
    
  ]);


} /// end of super admin

/// start of otherz
if($usertype != 1)
{  
  
 Branch::Create([
   'branchname' => $request['branchname'],
  'branchno' => $hid,
   'location' => $request['location'],
   'contact' => $request['contact'],
   'companyname' => $request['companyname'],
   'countryname' => $request['countryname'],
   'ucret' => $userid,
 
]);

Branchstatement::Create([
 'branchname' => $hid,

 'datedone' => $currentdate,
 'statementtype' => 'Account Openning',
 'statementstatus' => 'Credit',
 'transactionamount' => 0,
 'closingbalance' => $request['openningbalance'],


   'ucret' => $userid,
 
]);

Branchcashstanding::Create([
 'branch' => $hid,

 'outstanding' => 0,
 'companyname' => $request['companyname'],
 'countryname' => $request['countryname'],


   'ucret' => $userid,
 
]);


} /// end of others
  



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

   
    
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

        $user = Branch::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
