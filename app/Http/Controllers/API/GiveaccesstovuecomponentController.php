<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use App\Mainmenucomponent;
use App\Submheader;
use App\Branch;

use App\Componentsaccesse;

class GiveaccesstovuecomponentController extends Controller
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


      if($userrole == '101')
      {
      return   Shopbalancingrecord::with(['userbalancingBranch','branchinBalance'])->latest('id')
      
      // return   Shopbalancingrecord::latest('id')
       //  return   Branchpayout::latest('id')
         ->where('branch', $userbranch)
        ->paginate(20);
      }


      if($userrole == '100')
      {
      
      
      return   Shopbalancingrecord::with(['userbalancingBranch','branchinBalance'])->latest('id')
      
      // return   Shopbalancingrecord::latest('id')
       //  return   Branchpayout::latest('id')
         ->where('del', 0)
        ->paginate(20);
      
    }
      
    }

   
    
    public function store(Request $request)
    {
        //
       // return ['message' => 'i have data'];
       $userid =  auth('api')->user()->id;
       $userbranch =  auth('api')->user()->branch;
       $userrole =  auth('api')->user()->type;
       $companyname =  $request['companyname'];
       $countryname =  $request['countryname'];


       $this->validate($request,[
      'roleyouareaddingtocomponent'   => 'required |max:191',
      'countryname'   => 'required',
       'companyname'   => 'required',
       'components'   => 'required'
       // 'dorder'   => 'sometimes |min:0'
     ]);
     $roleee = $request['roleyouareaddingtocomponent'];
     $compo =  $request['components'];
     DB::table('componentsaccesses')->where('mmaderole', $roleee)->where('companyname', $companyname)->where('countryname', $countryname)->where('componentto', $compo)->delete();
       return Componentsaccesse::Create([
      'mmaderole' => $request['roleyouareaddingtocomponent'],
      'componentto' => $request['components'],
      'companyname' => $request['companyname'],
      'countryname' => $request['countryname'],


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
        $user = branch::findOrfail($id);

$this->validate($request,[
  'branchname'   => 'required | String |max:191'
  

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

        $user = Componentsaccesse::findOrFail($id);
        $user->delete();
       // return['message' => 'user deleted'];

    }
}
