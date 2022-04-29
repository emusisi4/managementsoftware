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
use App\Companydetail;
class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     //  
 return   Companydetail::with(['countryName'])->latest('id')
 // return   Companydetail::latest('id')

  // ->where('del', 0)
  ->paginate(20);
    }

   
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
        'currency'   => 'required | String |max:191',
        'currencysymbol'   => 'required',

        'countryname' => 'required',

        'location'   => 'required | String |max:191',
      
        'currency'   => 'required | String |max:191',
      //  'companyname'   => 'required',
        'emailaddress'   => 'required | email |max:191',
        'contactperson'   => 'required',
        'contactnumber'   => 'required',

    //    'name'   => 'required',
       // 'rolename'   => 'required',
      //  'email'   => 'required',
      //  'password'   => 'required',

      //  'branch'   => 'required',
         //'dorder'   => 'sometimes |min:0'
     ]);


     $userid =  auth('api')->user()->id;
     $id1  = Branch::latest('id')->orderBy('id', 'Desc')->limit(1)->value('id');
     $hid = $id1+1;

     $currentdatetime = date("Y-m-d H:i:s");
     $currentdate = date("Y-m-d");
  //       $dats = $id;
  ///  'companyname', 'currency', 'currencysymbol', 'logo', 'countryname', 'emailaddress', 'location', 'contactperson', 'contactnumber'
  Companydetail::Create([
      'currency' => $request['currency'],
     'currencysymbol' => $request['currencysymbol'],
      'location' => $request['location'],
      'contact' => $request['contact'],
      'companyname' => $request['companyname'],
      'emailaddress' => $request['emailaddress'],
      'contactperson' => $request['contactperson'],
      'countryname' => $request['countryname'],
      'contactnumber' => $request['contactnumber'],
    
   
      'ucret' => $userid,
    
  ]);


//   Branchstatement::Create([
//   'currency' => $hid,
 
//   'datedone' => $currentdate,
//   'statementtype' => 'Account Openning',
//   'statementstatus' => 'Credit',
//   'transactionamount' => 0,
//   'closingbalance' => $request['openningbalance'],


//     'ucret' => $userid,
  
// ]);



    }

   
    
    public function show($id)
    {
        //
    }
   
  
    
    public function update(Request $request, $id)
    {
        //
        $user = Companydetail::findOrfail($id);

$this->validate($request,[
  'currency'   => 'required | String |max:191',
  'currencysymbol'   => 'required',

  'countryname' => 'required',

  'location'   => 'required | String |max:191',

  'currency'   => 'required | String |max:191',
  'companyname'   => 'required',
  'emailaddress'   => 'required | email |max:191',
  'contactperson'   => 'required',
  'name'   => 'required',
  'rolename'   => 'required',
  'branch'   => 'required',
  'contactnumber'   => 'required',
  

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
