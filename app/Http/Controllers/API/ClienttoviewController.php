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
use App\Sortlistreportaccess;

class ClienttoviewController extends Controller
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


     //if($userrole == '101')
      {
      
      //   return   Dailyreportcode::with(['branchName','expenseName'])->latest('id')
      return   Dailyreportcode::with(['branchnameDailycodes', 'machinenameDailycodes'])->orderby('daysalesamount', 'Dec')
       //return   Dailyreportcode::orderBy('daysalesamount', 'Desc')
       // ->where('del', 0)
      //  ->where('branch', $userbranch)
      //  ->where('explevel', 1)
       ->paginate(35);
      }
     


       // return Student::all();
     //  return   Submheader::with(['maincomponentSubmenus'])->latest('id')
       // return   MainmenuList::latest('id')
     //    ->where('del', 0)
         //->paginate(15)
     //    ->get();

   //   return   Branchpayout::with(['ExpenseTypeconnect','expenseCategory','payingUserdetails'])->latest('id')
     //  return   Branchpayout::latest('id')
     //   ->where('del', 0)
     //  ->paginate(13);

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
   //    'branchnametobalance'   => 'required | String |max:191',
       // 'startdate'   => 'required',
      //  'enddate'   => 'required'
     //    'sortby'   => 'required'
     ]);


     $userid =  auth('api')->user()->id;
     
   $reptov = $request['actionaidsalesreportbydate'];
  // DB::table('expensereporttoviews')->where('ucret', $userid)->where('reporttype',$reptov)->delete();
  DB::table('sortlistreportaccesses')->where('ucret', $userid)->delete();
  $datepaid = date('Y-m-d');
     
  //       $dats = $id;





//if($reptov == "salesdetailsbybranch")
{
//  DB::table('fishreportselections')->where('ucret', $userid)->delete();
//// checking the existance od a record 
$myrecordexists = \DB::table('fishreportselections')->where('ucret', '=', $userid)->count();
if($myrecordexists < 1 )
{
  Fishreportselection::Create([
    'branch' => $request['branchname'],
    'startdate' => $request['startdate'],
    'monthname' => $request['monthname'],
    'yearname' => $request['yearname'],
   // 'reporttype' => $request['actionaid'],
    'enddate' => $request['enddate'],

    'ucret' => $userid,
   
  
]);
}

if($myrecordexists > 0){
  $branch = $request['branchname'];
  $country = $request['countryname'];
  $company = $request['companyname'];
  $startdate = $request['startdate'];
  $enddate = $request['enddate'];

  $month = $request['monthname'];
  $yeart = $request['yearname'];


  $monthselection = strlen($month);
  if($monthselection > 0)
  {
  $res = \DB::table('fishreportselections')->where('ucret', $userid)->update(['monthname' =>  $month]);
}


$yearselection = strlen($yeart);
if($yearselection > 0)
{
$res = \DB::table('fishreportselections')->where('ucret', $userid)->update(['yearname' =>  $yeart]);
}


  $branchselection = strlen($branch);
  if($branchselection > 0)
  {
  $res = \DB::table('fishreportselections')->where('ucret', $userid)->update(['branch' =>  $branch]);
}
$countryselection = strlen($country);
if($countryselection > 0)
{
$res = \DB::table('fishreportselections')->where('ucret', $userid)->update(['countryname' =>  $country]);
}

$companyselection = strlen($company);
if($companyselection > 0)
{
$res = \DB::table('fishreportselections')->where('ucret', $userid)->update(['companyname' =>  $company]);
}



$startdateselection = strlen($startdate);
if($startdateselection > 0)
{
$res = \DB::table('fishreportselections')->where('ucret', $userid)->update(['startdate' =>  $startdate]);
}

$enddateselection = strlen($enddate);
if($enddateselection > 0)
{
$res = \DB::table('fishreportselections')->where('ucret', $userid)->update(['enddate' =>  $enddate]);
}

}/// end of record exists







}///


// if($reptov == "expreportbywallet")
// {
//      return Expensereporttoview::Create([
//     'branch' => $request['branchnametobalance'],
//     'startdate' => $request['startdate'],
//     'reporttype' => $request['actionaid'],
//     'enddate' => $request['enddate'],

//     'ucret' => $userid,
   
  
// ]);
// }///









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

    //     $this->validate($request,[
    //         'receiptno'   => 'required | String |max:191',
    //         'datemade'   => 'required',
    //         'branch'  => 'required',
    //         'amount'  => 'required'
    // ]);

 
     
$user->update($request->all());
    }

      
    
    
    
     public function destroy($id)
    {
//// Getting the client details 

$clientno = \DB::table('ncssclients')->where('id', $id )->value('clientno');
$userid =  auth('api')->user()->id;

 DB::table('ncssclienttoviewdetails')->where('ucret', $userid)->delete();
//// checking the existance od a record 
// $myrecordexists = \DB::table('fishreportselections')->where('ucret', '=', $userid)->count();
DB::insert('insert into ncssclienttoviewdetails (clientname, ucret) values (?, ?)', [$clientno, $userid]);

///        return['message' => $id];

    }
}
