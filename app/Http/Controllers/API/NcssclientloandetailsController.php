<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Branch;
use App\Customer;
use App\Customersreporttoview;
use App\Ncssloan;
class NcssclientloandetailsController extends Controller
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
      $usercomopany =  auth('api')->user()->usercompany;
      $usercountry =  auth('api')->user()->usercontry;
      $ctview =    \DB::table('ncssclienttoviewdetails')->where('ucret', '=', $userid)->value('clientname');
      $actno =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('actno');
 
      return   Ncssloan::latest('id')
       //  return   Branchpayout::latest('id')
        ->where('clientname', $ctview)
        ->paginate(50);
      

     


    
      
    }

 
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
       'firstname'   => 'required  |max:191',
       'lastname'   => 'required  |max:225',
       'clientidno' => 'required',
       'primarycontact' => 'required',
       'clientresidence'   => 'required',
       'clientidnature'   => 'required  |max:225',
       'employerconctact' => 'required',

       'branchname' => 'required',
       'clientemployment'   => 'required',
       'employmentlocation'   => 'required  |max:225',




       'nokname' => 'required',
       'nokcontactone'   => 'required',
       'nokresidence'   => 'required  |max:225',
       'nokrelationship' => 'required',



       'datejoined' => 'required'
       // 'dorder'   => 'sometimes |min:0'
     ]);
     $userid =  auth('api')->user()->id;
     $latedsid = \DB::table('ncssclients')->orderBy('id', 'Desc')->value('id');
$newid = $latedsid+1;
$clientno = "ncss".$newid;


/// working on the customer account number 
do {
    $clientaccountnumber = random_int(100000, 9999999999);
} while (Ncssclient::where("actno", "=", $clientaccountnumber)->first());



  $datepaid = date('Y-m-d');
//  $inpbranch = $request['branchnametobalance'];



       return Ncssclient::Create([
    

      'firstname' => $request['firstname'],
     'lastname'=> $request['lastname'],
     'middlename'=> $request['middlename'],
     'clientno'=> $clientno,
      'clientidno' => $request['clientidno'],
      'primarycontact' => $request['primarycontact'],
      'clientresidence' => $request['clientresidence'],
      'clientidnature' => $request['clientidnature'],
      'datejoined' => $request['datejoined'],
      
      'natureofemployment' => $request['natureofemployment'],
      'nameofempployer' => $request['nameofempployer'],

      'employerconctact' => $request['employerconctact'],
      'branchname' => $request['branchname'],
      'clientemployment' => $request['clientemployment'],
      'nokresidence' => $request['nokresidence'],
      'nokrelationship' => $request['nokrelationship'],
      'employmentlocation' => $request['employmentlocation'],
      'nokname' => $request['nokname'],
      'nokcontactone' => $request['nokcontactone'],
      'actno'=> $clientaccountnumber,

      'ucret' => $userid,
    
  ]);
    }
//     public function customerstamento(){
   
//       $userid =  auth('api')->user()->id;
//       $userbranch =  auth('api')->user()->branch;
//       $userrole =  auth('api')->user()->type;
//       $existanceinthetable = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->count();
     
     
     
//       if($existanceinthetable < 1 )
//       { Customersreporttoview::Create([
//         //  'branch', 'ucret','startdate','enddate',
//           //    'productcode' => $request['productcode'],
//               'customername' => $request['customername'],
//               // 'enddate' => $request['enddate'],
//               // 'supplier' => $request['suppliername'],
//               'ucret' => $userid,
            
//           ]);
// }
// if($existanceinthetable > 0 )
// { 
//   Customersreporttoview::Create([
//   //  'branch', 'ucret','startdate','enddate',
//     //    'productcode' => $request['productcode'],
//         'startdate' => $request['startdate'],
//         'enddate' => $request['enddate'],
//         'supplier' => $request['suppliername'],
//         'ucret' => $userid,
      
//     ]);
// }
// }
   
public function customerstatementrecords()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $customername = \DB::table('customersreporttoviews')->where('ucret', $userid )->value('customername');
  $startdate = \DB::table('customersreporttoviews')->where('ucret', $userid )->value('startdate');
  $enddate = \DB::table('customersreporttoviews')->where('ucret', $userid )->value('enddate');

 return   Customerstatement::with(['customerName','createdbyName'])->orderBy('id', 'Asc')
 /// return   Customerstatement::orderBy('id', 'Desc')
  ->whereBetween('transactiondate', [$startdate, $enddate])
  
 ->where('customername', $customername)
//   ->where('del', 0)
    ->paginate(90);





  
}

    public function satecustomerstatementtoview(){
   
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
        $existanceinthetable = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->count();
       
       
       
        if($existanceinthetable < 1 )
        { Customersreporttoview::Create([
          //  'branch', 'ucret','startdate','enddate',
            //    'productcode' => $request['productcode'],
                'customername' => $request['customername'],
                // 'enddate' => $request['enddate'],
                // 'supplier' => $request['suppliername'],
                'ucret' => $userid,
              
            ]);
}
if($existanceinthetable > 0 )
{ 
  $result = DB::table('customersreporttoviews')
  ->where('ucret', $userid)
  ->update([
    'customername' => $request['customername']
  ]);
}
}
    public function show($id)
    {
        //
    }
  //////////////////////////////////

  public function findcustomerlegeraccount(){
    if($search = \Request::get('q')){
      $users = Customer::where(function($query) use ($search){
        $query->where('customername', 'LIKE', "%$search%");
      //  ->where('uracode', 'LIKE', "%$search%");
      })
        -> paginate(30);
       return $users;
    }else{
      return   Customer::latest('id')
      //  ->where('brand', $productbrand)
        ->where('del', 0)
            ->paginate(20);
    }
    
  }

  ////////////////////
    
    public function update(Request $request, $id)
    {
        //
        $user = Customer::findOrfail($id);

$this->validate($request,[
  'customername'   => 'required  |max:191'
  

    ]);

 
     
$user->update($request->all());
    }

 
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

        $user = Customer::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
