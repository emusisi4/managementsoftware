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
use App\Branchtocollect;
use App\Incomereporttoview;
use App\Branchinaction;
class BranchtoworkonController extends Controller
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
      

       $this->validate($request,[
        'mycpmponentto'   => 'required  |max:191'
      
     ]);


     $userid =  auth('api')->user()->id;
   
   DB::table('branchinactions')->where('ucret', $userid)->delete();

       return Branchinaction::Create([
      'branch' => $request['mycpmponentto'],
    
      'ucret' => $userid,
    
  ]);
    }
///////////////////////////////////////////////////////////////////////
















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
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
