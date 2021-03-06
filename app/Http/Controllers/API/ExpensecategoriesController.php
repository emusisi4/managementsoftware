<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Branch;
use App\Productcategory;
use App\Expensescategory;

class ExpensecategoriesController extends Controller
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
      $companyname2 = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('companyname');
      $countryname2 = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('countryname');
    //  $companyname2 = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('companyname');
      $branchname2 = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('branchname');
    //  if($userrole == '101')
      {
    //  return   Product::with(['userbalancingBranch','branchinBalance'])->latest('id')
   // return   Productcategory::with(['brandName','productCategory','productSupplier','unitMeasure'])->latest('id')
   //   return   Expensescategory::latest('id')
   return   Expensescategory::with(['expenseCategorycountry','expenseCategorycompany'])->latest('id')
       //  return   Branchpayout::latest('id')
         ->where('companyname', $companyname2)
         ->where('countryname', $countryname2)
        ->paginate(20);
      }


     // if($userrole == '100')
      {
      
      
     // return   Product::with(['userbalancingBranch','branchinBalance'])->latest('id')
      
      // return   Product::latest('id')
       //  return   Branchpayout::latest('id')
    //     ->where('del', 0)
     //   ->paginate(20);
      
    }
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
     $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
        $usercompany =  auth('api')->user()->comp;
        $usercontry =  auth('api')->user()->countryname;

  $datepaid = date('Y-m-d');
//  $inpbranch = $request['branchnametobalance'];

$dateinq =  $request['datedone'];
if($userrole == '1')

{
  $this->validate($request,[
    'expcatcatname'   => 'required  |max:191',
  'description'   => 'required',
  'companyname'   => 'required',
  'countryname'   => 'required'
   // 'dorder'   => 'sometimes |min:0'
 ]);
        Expensescategory::Create([
    

      'companyname' => $request['companyname'],
      'countryname' => $request['countryname'],
      'expcatcatname' => $request['expcatcatname'],
      'description' => $request['description'],
     
      'ucret' => $userid,
    
  ]);
}    

if($userrole != '1')

{
  Expensescategory::Create([
    

    'companyname' => $usercompany,
    'countryname' => $usercontry,
    'expcatcatname' => $request['expcatcatname'],
    'description' => $request['description'],
   
   
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
        $user = Expensescategory::findOrfail($id);

$this->validate($request,[
    'expcatcatname'   => 'required  |max:191',
    'description'   => 'required'
  

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

        $user = Expensescategory::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
