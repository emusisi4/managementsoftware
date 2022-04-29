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
use App\Shopingcat;
use App\Productsale;
use App\Orderdetail;
use App\Salessummary;
use App\Dailysummaryreport;
use App\Incomestatementrecord;
use App\Incomestatementminirecord;
use App\Incomestatementsummary;
class UpdatestckvaluesController extends Controller
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

    //  return   Branchpayout::with(['ExpenseTypeconnect','expenseCategory','payingUserdetails'])->latest('id')
       return   Orderssummary::latest('id')
       // ->where('del', 0)
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
      $userid =  auth('api')->user()->id;
      $branch =  auth('api')->user()->branch;
   $datepaid = date('Y-m-d');
 
   
  // $users = DB::table('products')->where('ucret', $userid)->get();
  $users = DB::table('products')->get();
     //getting the total invoice
   
///////////////////////////////////////////////////////////////////////////////// getting the branch balance


   foreach ($users as $user) {

//     DB::table('expensewalets')
// ->where('walletno', 6)
// ->update(['bal' => $newvatout]);
$updatedatentime = date('Y-m-d H:i:s');
     $prodcode = $user->id;
     $productcostprice = $user->unitcost;
     $productquantity = $user->qty;

     DB::table('products')
     ->where('id', $prodcode)
     ->update([
     'stockvalue' => $productcostprice*$productquantity,
     'laststockupdate' => $updatedatentime     
     ]);
      
 }
   
  
    }
///////////////////////////////////////////////////////////////////////






    public function show($id)
    {
        //
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

   
    
    
    
     public function destroy($id)
    {
        //
     //   $this->authorize('isAdmin'); 

       // $user = Shopingcat::findOrFail($id);
      //  $user->delete();
       // return['message' => 'user deleted'];
       $userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;
       DB::delete('delete from shopingcats where ucret = ?',[$userid]);

    }
}
