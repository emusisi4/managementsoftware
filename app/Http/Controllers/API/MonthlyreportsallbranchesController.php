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
use App\Expensereporttoview;
use App\Fishreportselection;
use App\Dailyreportcode;
use App\Monthlyreporttoview;
use App\Salesdetail;
use App\Mlyrpt;
use App\Monthlyreporttoviewallbranch;

class MonthlyreportsallbranchesController extends Controller
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
        $usertype =  auth('api')->user()->type;
        $userrole =  auth('api')->user()->mmaderole;
        $userbranch =  auth('api')->user()->branch;
        $usercompany =  auth('api')->user()->companyname;
        $usercountry =  auth('api')->user()->countryname;

      //  $reporttype = \DB::table('fishreportselections')->where('ucret', '=', $userid)->value('reporttype');
        $monthtodisplay = \DB::table('fishreportselections')->where('ucret', '=', $userid)->value('monthname');
        $yeartodisplay = \DB::table('fishreportselections')->where('ucret', '=', $userid)->value('yearname');
        $branch = \DB::table('fishreportselections')->where('ucret', '=', $userid)->value('branch');
      
        $companyname = \DB::table('fishreportselections')->where('ucret', '=', $userid)->value('companyname');
        $countryname = \DB::table('fishreportselections')->where('ucret', '=', $userid)->value('countryname');
       //////////////////////////////////////////////////////////
       if($usertype != '1')
       { 

        if($userrole == '101')
        {
           // if($branch == "900")
              {
                
                return   Mlyrpt::with(['branchnameDailycodes'])->orderby('id', 'Asc')
                ->where('branch', $userbranch)
           ->where('yeardone', $yeartodisplay)
           ->where('monthdone', $monthtodisplay)
           ->where('companyname', $usercompany)
           ->where('countryname', $usercountry)
           
               ->paginate(35);
              }

            } //// end of branch manager role
        if($userrole != '101')
{
    if($branch == "900")
      {
        
        return   Mlyrpt::with(['branchnameDailycodes'])->orderby('id', 'Asc')
     
   ->where('yeardone', $yeartodisplay)
   ->where('monthdone', $monthtodisplay)
   ->where('companyname', $usercompany)
   ->where('countryname', $usercountry)
   
       ->paginate(35);
      }







      if($branch != "900")
      {
        
        return   Mlyrpt::with(['branchnameDailycodes'])->orderby('id', 'Asc')
     
   ->where('yeardone', $yeartodisplay)
   ->where('monthdone', $monthtodisplay)
   ->where('companyname', $usercompany)
   ->where('countryname', $usercountry)
   ->where('branch', $branch)
       ->paginate(35);
      }
    } //// End of user role not cashier
      
     }//// end of user type !super admin
    






        if($usertype == '1')
       { 
    if($branch == "900")
      {
        
        return   Mlyrpt::with(['branchnameDailycodes'])->orderby('id', 'Asc')
     
   ->where('yeardone', $yeartodisplay)
   ->where('monthdone', $monthtodisplay)
   ->where('companyname', $companyname)
   ->where('countryname', $countryname)
   
       ->paginate(35);
      }







      if($branch != "900")
      {
        
        return   Mlyrpt::with(['branchnameDailycodes'])->orderby('id', 'Asc')
     
   ->where('yeardone', $yeartodisplay)
   ->where('monthdone', $monthtodisplay)
   ->where('companyname', $companyname)
   ->where('countryname', $countryname)
   ->where('branch', $branch)
       ->paginate(35);
      }
      
     }//// end of user type super admin
    

      
    }


    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];

       
       $this->validate($request,[
       // 'branchname'   => 'required',
        'monthname'   => 'required',
        'yearname'   => 'required',
     
         //'sortreportby'   => 'required'
     ]);


     $userid =  auth('api')->user()->id;
     
 //  $reptov = $request['actionaidsalesreportbydate'];
  // DB::table('expensereporttoviews')->where('ucret', $userid)->where('reporttype',$reptov)->delete();
  DB::table('monthlyreporttoviewallbranches')->where('ucret', $userid)->delete();
  $datepaid = date('Y-m-d');
    
       return Monthlyreporttoviewallbranch::Create([
      
       'monthmade' => $request['monthname'],
      'yearmade' => $request['yearname'],
      'branch' => $request['branchname'],
   //   'reporttype' => $request['sortreportby'],
 
      'ucret' => $userid,
     
    
  ]);











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
