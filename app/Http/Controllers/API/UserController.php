<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
      //  $this->authorize('isAdmin'); 
    }
    public function index()
    {
      //  $userid =  auth('api')->user()->id;
       

     //   $this->authorize('isSuperadmin'); 
     //   return   User::with(['userRole','userBranch'])->latest('id')
  return   User::with(['userRole', 'userCompany', 'userCountry','userBranch','createdbyName'])->latest('id')

     // ->where('del', 0)
     ->paginate(20);

    }

    
    
    public function store(Request $request)
    {
        //
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
        //
        $this->validate($request,[
         'name'   => 'required | String |max:191',
         'email'   => 'required | String |email|max:191|unique:users',
         'password'   => 'required  |min:6',
        'branchname' => 'required',
         'rolename'   => 'required'


        // 'type'   => 'required'
          ]);
        //  $userid =  auth('api')->user()->id;
         
       // $companyjj  = Expense::latest('id')->where('del', 0)->orderBy('id', 'Desc')->limit(1)->value('expenseno');
        $company = \DB::table('companybranchinactions')->where('ucret', '=', $userid)->value('company');
        return User::Create([
            'name' => $request['name'],
            'email' => $request['email'],
            'type' => $request['rolename'],
            'companyname' => $request['companyname'],
            'comp' => $request['companyname'],
            'countryname' => $request['countryname'],
            'mmaderole' => $request['rolename'],
            'branch' => $request['branchname'],
            'comp' => $company,
              'ucret' => $userid,
            'password' => Hash::make($request['password']),
        ]);
    }

    
    public function show($id)
    {
        //

    }

   
    
    public function update(Request $request, $id)
    {
        //
        $user = User::findOrfail($id);

        $this->validate($request,[
            'name'   => 'required | String |max:191',
         'email'   => 'required | String |email|max:191|unique:users',
         'password'   => 'required  |min:6',
        'branchname' => 'required',
         'rolename'   => 'required'

        
            ]);
        
        
    $user->update($request->all());
       // return ['message' => 'Userd updated'];
    }

    
    
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
    }
}
