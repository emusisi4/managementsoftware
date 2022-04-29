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
use App\Branchpayout;
use App\Branchtobalance;

class BranchbalacingController extends Controller
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
     //   if($userrole = 1)





       // return Student::all();
     //  return   Submheader::with(['maincomponentSubmenus'])->latest('id')
       // return   MainmenuList::latest('id')
     //    ->where('del', 0)
         //->paginate(15)
     //    ->get();

      return   Branchpayout::with(['ExpenseTypeconnect','expenseCategory','payingUserdetails'])->latest('id')
     //  return   Branchpayout::latest('id')
        ->where('del', 0)
       ->paginate(13);

       //  return Submheader::latest()
         //  -> where('ucret', $userid)
           










       // {
      // return Submheader::latest()
      //  -> where('ucret', $userid)
    //    ->paginate(15);
      //  }

      
    }

   
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];


       $this->validate($request,[
      //  'branchnametobalance'   => 'required  |max:191',
     //   'datedone'   => 'required'
     //'amount'   => 'sometimes |min:0'
     ]);


     $userid =  auth('api')->user()->id;
   //  $userbranch =  auth('api')->user()->branch;
   //  $id1  = Expense::latest('id')->where('del', 0)->orderBy('id', 'Desc')->limit(1)->value('expenseno');
   //  $hid = $id1+1;
   //DB::table('branchtobalances')->where('ucret', $userid)->delete();
   $existanceofarecord = \DB::table('branchtobalances')
   ->where('ucret', '=', $userid)
   ->count();

  $datepaid = date('Y-m-d');
  
  //       $dats = $id;

  if($existanceofarecord < 1)
{       return Branchtobalance::Create([
      'branchnametobalance' => $request['branchname'],
      'companyname' => $request['companyname'],
      'countryname' => $request['countryname'],
      'datedone' => $request['datedone'],
     
 
      'ucret' => $userid,
    
  ]);


 
} // closing if there is no record

if($existanceofarecord > 0 )
{ 
  $branchnametobalance = $request['branchname'];
  $country = $request['countryname'];
  $company = $request['companyname'];
 
  $datedone = $request['datedone'];

  
  $branbal = strlen($branchnametobalance);
if($branbal > 0)
{
$res = \DB::table('branchtobalances')->where('ucret', $userid)->update(['branchnametobalance' =>  $branchnametobalance]);
}

$countryselection = strlen($country);
if($countryselection > 0)
{
$res = \DB::table('branchtobalances')->where('ucret', $userid)->update(['countryname' =>  $country]);
}

$companyselection = strlen($company);
if($companyselection > 0)
{
$res = \DB::table('branchtobalances')->where('ucret', $userid)->update(['companyname' =>  $company]);
}




}








    }
///////////////////////////////////////////////////////////////////////


public function savebranchtobalance(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
        'branchnametobalance'   => 'required | String |max:191'
     //'amount'   => 'sometimes |min:0'
     ]);


     $userid =  auth('api')->user()->id;
   //  $userbranch =  auth('api')->user()->branch;
   //  $id1  = Expense::latest('id')->where('del', 0)->orderBy('id', 'Desc')->limit(1)->value('expenseno');
   //  $hid = $id1+1;

  $datepaid = date('Y-m-d');
     
  //       $dats = $id;
       return Branchtobalance::Create([
      'branchnametobalance' => $request['branchnametobalance'],
     
 
      'ucret' => $userid,
    
  ]);
    }



































    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function Branchtotalsd()
    {
        //getSinglebranchpayoutdaily
        $ed = '0';
      //  return Branchpayout::where('del',0)->sum('amount');
      return   Branchpayout::latest('id')
      //  return   Branchpayout::latest('id')
         ->where('del', 0);
     //  ->paginate(13);
 
    }
   
  
    
    public function update(Request $request, $id)
    {
        //
        $user = Branchpayout::findOrfail($id);

        $this->validate($request,[
            'receiptno'   => 'required | String |max:191',
            'datemade'   => 'required',
            'branch'  => 'required',
            'amount'  => 'required'
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

        $user = Branchpayout::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
