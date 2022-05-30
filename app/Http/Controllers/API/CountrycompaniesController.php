<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Expense;
use App\Expensescategory;
use App\Dailyreportcode;
use App\Countryandcorresponding;

class CountrycompaniesController extends Controller
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
///id, branch, ucret, created_at, updated_at, codeinuse
     $branch = DB::table('floatcodesperformances')->where('ucret', $userid)->value('branch');
     $codeinuse = DB::table('floatcodesperformances')->where('ucret', $userid)->value('codeinuse');
    
      
    return   Dailyreportcode::with(['branchnameDailycodes', 'machinenameDailycodes'])->orderby('datedone', 'Dec')
      //return   Dailyreportcode::latest('id')
       // ->where('del', 0)
     ->where('machineunlockcode', $codeinuse)
    // ->whereBetween('datedone', [$startdat, $enddate])
  //   ->where('branch', $branch)
       ->paginate(22);
      


   



      
    }

  
    public function store(Request $request)
    {
    
        $this->validate($request,[
        // 'expense'   => 'required | String |max:191',
        // 'description'   => 'required',
        // 'amount'  => 'required',
        // 'datemade'  => 'required',
        // 'branch'  => 'required',
       // 'expensetype'   => 'sometimes |min:0'
     ]);


     $userid =  auth('api')->user()->id;
     
     
     $existanceofrecord = \DB::table('countryandcorrespondings')->where('ucret', $userid )->count();
    /// DB::table('countryandcorrespondings')->where('ucret', $userid)->value('ucret');
    //    DB::table('countryandcorrespondings')->where('ucret', $userid)->delete();
     $datepaid = date('Y-m-d');
    
if($existanceofrecord < 1)
 { return Countryandcorresponding::Create([
   /// 'branch' => $branch,
    'countryname' => $request['countryname'],
    

    'ucret' => $userid,
   
    
  ]);
} ///// 

if($existanceofrecord > 0)
{
    $country =  $request['countryname'];
    $countryselection = strlen($country);
if($countryselection > 0)
{
$res = \DB::table('countryandcorrespondings')->where('ucret', $userid)->update(['countryname' =>  $country]);
}
$company =  $request['companyname'];
 $companyselection = strlen($company);
if($companyselection > 0)
{
$res = \DB::table('countryandcorrespondings')->where('ucret', $userid)->update(['companyname' =>  $company]);
}

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

   
    
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

        $user = Madeexpense::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
