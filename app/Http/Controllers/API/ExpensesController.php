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

class ExpensesController extends Controller
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
       
     $companyname2 = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('companyname');
     $countryname2 = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('countryname');
   //  $companyname2 = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('companyname');
     $branchname2 = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('branchname');
    //  if($branchname2 != '900')
      {

      
         return   Expense::with(['ExpenseTypeconnect','expenseCategory'])->latest('id')
        ->where('del', 0)
        ->where('companyname', $companyname2)
        ->where('countryname', $countryname2)
       // ->where('countryname', $countryname2)
        ->where('del', 0)
       ->paginate(100);
     
     }

      
    }

    
    
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
        'expensename'   => 'required | String |max:191',
        'expensecategory'   => 'required',
        'approvaltype'  => 'required',
        'expensegroup'  => 'required',
        'description'  => 'required',
        'countryname'  => 'required',
        'companyname'  => 'required',
        'expensetype' => 'required',
       // 'comment'  => 'required',
       // 'expensetype'   => 'sometimes |min:0'
     ]);


     $userid =  auth('api')->user()->id;
     $id1  = Expense::latest('id')->where('del', 0)->orderBy('id', 'Desc')->limit(1)->value('expenseno');
     $hid = $id1+1;

  
     
  //       $dats = $id;
       return Expense::Create([
      'expensename' => $request['expensename'],
     'expenseno' => $hid,
      'description' => $request['description'],
      'expensecategory' => $request['expensecategory'],
     // 'expensetype' => $request['expensetype'],
     'approvaltype' => $request['approvaltype'],
     'tofixed' => $request['expensegroup'],
     'expensetype' => $request['companyname'],
     'companyname' => $request['expensetype'],
     'countryname' => $request['countryname'],
      'ucret' => $userid,
    
  ]);
    }

 
    
    public function show($id)
    {
        //
    }
   
  
    public function findExpensefromexpenseslist(){
      if($search = \Request::get('q')){
        $users = Expense::where(function($query) use ($search){
          $query->where('expensename', 'LIKE', "%$search%");
        //  ->where('uracode', 'LIKE', "%$search%");
        })
          -> paginate(30);
         return $users;
      }else{
        return  Expense::with(['ExpenseTypeconnect','expenseCategory'])->latest('id')
      //  ->where('category', $productcategory)
        //  ->where('brand', $productbrand)
          ->where('del', 0)
              ->paginate(20);
      }
      
    }

    public function search(){

      if ($search = \Request::get('q')) {
          $users = Expense::where(function($query) use ($search){
              $query->where('expensename','LIKE',"%$search%")
                      ->orWhere('description','LIKE',"%$search%");
          })->paginate(20);
      }else{
          $users = Expense::latest()->paginate(5);
      }

      return $users;
    }



     public function update(Request $request, $id)
    {
        //
        $user = Expense::findOrfail($id);

$this->validate($request,[
  'expensename'   => 'required | String |max:191',
  'expensecategory'   => 'required',
//  'expensetype'  => 'required'
    ]);

 
     
$user->update($request->all());
    }

    
    
    public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

        $user = Expense::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
