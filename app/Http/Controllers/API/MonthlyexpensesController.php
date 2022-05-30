<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Monthlyexpense;


class MonthlyexpensesController extends Controller
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
     $usercompany =  auth('api')->user()->companyname;
     $usercountry =  auth('api')->user()->countryname;


     $monthtodisplay = \DB::table('fishreportselections')->where('ucret', '=', $userid)->value('monthname');
     $yeartodisplay = \DB::table('fishreportselections')->where('ucret', '=', $userid)->value('yearname');
     $branch = \DB::table('fishreportselections')->where('ucret', '=', $userid)->value('branch');
   
     $companyname = \DB::table('fishreportselections')->where('ucret', '=', $userid)->value('companyname');
     $countryname = \DB::table('fishreportselections')->where('ucret', '=', $userid)->value('countryname');


     $companyname2 = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('companyname');
     $countryname2 = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('countryname');
   //  $companyname2 = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('companyname');
     $branchname2 = \DB::table('monthlyreporttoviews')->where('ucret', '=', $userid)->value('branchname');

     if($userrole != '1')
{
     return   Monthlyexpense::with(['countryMonthlyexpense','companyMonthlyexpense','branchMonthlyexpense','expenseMonthlyexpense'])->latest('id')
      
      ->where('companyname', $usercompany)
      ->where('countryname', $usercountry)
       ->paginate(20);
    
}
if($userrole == '1')
{
  if($branchname2 == '900')
  {
    return   Monthlyexpense::with(['countryMonthlyexpense','companyMonthlyexpense','branchMonthlyexpense','expenseMonthlyexpense'])->latest('id')
      
    ->where('companyname', $companyname2)
    ->where('countryname', $countryname2)
     ->paginate(20);
  }

  if($branchname2 != '900')
  {
    return   Monthlyexpense::with(['countryMonthlyexpense','companyMonthlyexpense','branchMonthlyexpense','expenseMonthlyexpense'])->latest('id')
    ->where('branchname', $branchname2)
    ->where('companyname', $companyname2)
    ->where('countryname', $countryname2)
     ->paginate(20);
  }
    
    
}
     

      
    }

    
    
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];



       $this->validate($request,[
        'expense'   => 'required',
        'companyname'   => 'required',
        'countryname'  => 'required',
        'description'  => 'required',
        'branchname'  => 'required',
        'amount' => 'required',
       // 'expensetype'   => 'sometimes |min:0'
     ]);
$exp = $request['expense'];
$companyname = $request['companyname'];
$countryname = $request['countryname'];
$branch = $request['branchname'];
     $userid =  auth('api')->user()->id;
     //$id1  = Expense::latest('id')->where('del', 0)->orderBy('id', 'Desc')->limit(1)->value('expenseno');
    // $hid = $id1+1;

  
     
  //       $dats = $id;



//  $doesthemmonthlyexpenseexist  = \DB::table('monthlyexpenses')
//  ->where('expensename', '=', $exp)
//  ->where('companyname', '=', $companyname)
//   ->count();


  DB::table('monthlyexpenses')
  ->where('branchname', $branch)
  ->where('expensename', $exp)

  ->where('companyname', $companyname)
  ->where('countryname', $countryname)
  ->delete();


       return Monthlyexpense::Create([

      'expensename' => $request['expense'],
      'description' => $request['description'],
      'branchname' => $request['branchname'],
     'amount' => $request['amount'],
     'companyname' => $request['companyname'],
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
