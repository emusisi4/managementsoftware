<?php

  

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
  

use Illuminate\Http\Request;
use App\Machine;
use App\Country;
use App\Branchandproduct;
use App\Bettingproduct;
use App\State;
use App\Branch;
use App\Role;
use App\Usertype; 
use App\Roletoaddcomponent;
use App\Thecomponent;
use App\Formcomponent;
use App\Submheader;
use App\Mainmenu;
use App\Mainmenucomponent;
use App\Expense;
use App\Branchtobalance;
use App\Shopbalancingrecord;
use App\Branchtocollect;
use App\Bopenningbalance;
use App\Expensetype;
use App\Expensescategory;
use App\User;
use App\Currentmachinecode;
use App\Branchanduser;
use App\Expensewalet;
use App\Sortlistreport;
use App\Mymonth;
use App\Myyear;
use App\Collectionreporttoview;
use App\Generalreport;
use App\Incomesource;
use App\Branchandcode;
use App\Transactiontype;
use App\Dailyreportcode;
use App\Productcategory;
use App\Brand;
use App\Unitmeasure;
use App\Supplier;
use App\Purchasessummary;
use App\Product;
use NumberToWords\NumberToWords;
use App\Customer;
use App\Companydetail;
use App\Branchcashstanding;
use App\Generalwalet;
use App\Ncssidtype;
use App\Ncssclient;
use App\Ncssemployee;
use Terbilang;
use App\Ncssloansecurity;
use App\Ncsscompanypaymentplan;
class APIController extends Controller

{
  

////  sportsbetting




public function generalclientdetails()
{
$userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;
$usercompany =  auth('api')->user()->companyname;
$usercountry =  auth('api')->user()->countryname;


$superadminselectedcountry =    \DB::table('countryinactions')->where('ucret', '=', $userid)->value('countryname');
$data = Ncssclient::latest('id')
 // ->where('countryname', '=', $superadminselectedcountry)
  ->get();
   return response()->json($data);

////
// if($userrole == '1')
// { $data = Ncssclient::latest('id')
//  // ->where('countryname', '=', $superadminselectedcountry)
//   ->get();
//    return response()->json($data); }



// if($userrole != '1')
// { $data = Companydetail::latest('id')
//   ->where('id', '=', $usercompany)
//   ->get();
//    return response()->json($data); 
//   }



}


public function companypaymentplanslist()
{
$userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;
$usercompany =  auth('api')->user()->companyname;
$usercountry =  auth('api')->user()->countryname;
if($userrole == '1')
{
$data = Ncsscompanypaymentplan::latest('id')
//  ->where('countryname', '=', $superadminselectedcountry)
  ->get();
   return response()->json($data);
}
if($userrole != '1')
{

$data = Ncsscompanypaymentplan::latest('id')
 ->where('countryname', '=', $usercountry)
 ->where('companyname', '=', $usercompany)
 ->get();
  return response()->json($data);

}

}
public function generalbranches()
{
$userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;
$usercompany =  auth('api')->user()->companyname;
$usercountry =  auth('api')->user()->countryname;

$data = Branch::latest('id')
 // ->where('countryname', '=', $superadminselectedcountry)
  ->get();
   return response()->json($data);

}
public function generalloanofficers()
{
$userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;
$usercompany =  auth('api')->user()->companyname;
$usercountry =  auth('api')->user()->countryname;

$data = Ncssemployee::latest('id')
 // ->where('countryname', '=', $superadminselectedcountry)
  ->get();
   return response()->json($data);

}
public function getgeneralloansecurities()
{
$userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;
$usercompany =  auth('api')->user()->companyname;
$usercountry =  auth('api')->user()->countryname;

$data = Ncssloansecurity::latest('id')
 // ->where('countryname', '=', $superadminselectedcountry)
  ->get();
   return response()->json($data);

}
public function getcompaniesdetails()
{
$userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;
$usercompany =  auth('api')->user()->companyname;
$usercountry =  auth('api')->user()->countryname;


$superadminselectedcountry =    \DB::table('countryinactions')->where('ucret', '=', $userid)->value('countryname');


////
if($userrole == '1')
{ $data = Companydetail::latest('id')
 // ->where('countryname', '=', $superadminselectedcountry)
  ->get();
   return response()->json($data); }



if($userrole != '1')
{ $data = Companydetail::latest('id')
  ->where('id', '=', $usercompany)
  ->get();
   return response()->json($data); 
  }



}


















/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



public function brancheslist()

{ 
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $usercompany =  auth('api')->user()->companyname;
  $usercountry =  auth('api')->user()->countryname;
  if($userrole == '1')
  {
    $data = Branch::get(); return response()->json($data);
  }
  if($userrole != '1')
  {
    $data = Branch::latest('id')
    ->where('countryname', '=', $usercountry)
    ->where('companyname', '=', $usercompany)
    ->get(); return response()->json($data);
  }
 

}




    public function getBranches()

    { 
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $usercompany =  auth('api')->user()->companyname;
      $usercountry =  auth('api')->user()->countryname;
      if($userrole == '1')
      {
        $data = Branch::get(); return response()->json($data);
      }
      if($userrole != '1')
      {
        $data = Branch::latest('id')
        ->where('countryname', '=', $usercountry)
        ->where('companyname', '=', $usercompany)
        ->get(); return response()->json($data);
      }
     
    
    }


    

    public function generalwalletlist()
{
  $userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;
$usercompany =  auth('api')->user()->companyname;
$usercountry =  auth('api')->user()->countryname;

//if($userrole == '1')
{ $data = Generalwalet::get(); return response()->json($data); }



// if($userrole != '1')
// { $data = Country::latest('id')
//   ->where('id', '=', $usercountry)
//   ->get();
//    return response()->json($data); 
//   }

    // { 
      
    //   $data = Country::get(); return response()->json($data);
    //  }
}

    
    public function getCountries()
{
  $userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;
$usercompany =  auth('api')->user()->companyname;
$usercountry =  auth('api')->user()->countryname;

if($userrole == '1')
{ $data = Country::get(); return response()->json($data); }



if($userrole != '1')
{ $data = Country::latest('id')
  ->where('id', '=', $usercountry)
  ->get();
   return response()->json($data); 
  }

    { 
      
      $data = Country::get(); return response()->json($data);
     }
}





    
    
    
    public function     customerordernoinaction()
    {
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
        $customerorderno =    \DB::table('custinactionsprofs')->where('ucret', '=', $userid)->value('customerorderno');

      //  $customerorderno =    \DB::table('customers')->where('id', '=', $cinact)->value('customerorderno');
       
               return response()->json($customerorderno);
  }


    public function     creditcustomerinaction()
    {
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
        $cinact =    \DB::table('custinactionsprofs')->where('ucret', '=', $userid)->value('customername');

        $customername =    \DB::table('customers')->where('id', '=', $cinact)->value('customername');
       
               return response()->json($customername);
  }
  
  public function gettheinvoiceinactiondate()
  {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $cname =    \DB::table('creditsalessummarries')->where('ucret', '=', $userid)->orderBy('id', 'Desc')->value('invoicedate');
    //  $customername =    \DB::table('customers')->where('id', '=', $cname)->value('customername');
           
      return response()->json($cname);
}
  public function creditinvoicenumbertoprint()
  {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $cname =    \DB::table('creditsalessummarries')->where('ucret', '=', $userid)->orderBy('id', 'Desc')->value('invoiceno');
    //  $customername =    \DB::table('customers')->where('id', '=', $cname)->value('customername');
           
      return response()->json($cname);
}

public function customerinvoicecontact()
  {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $cname =    \DB::table('creditsalessummarries')->where('ucret', '=', $userid)->orderBy('id', 'Desc')->value('customername');
      $customername =    \DB::table('customers')->where('id', '=', $cname)->value('contact');
           
      return response()->json($customername);
}

  public function     creditinvoicecustomername()
  {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $cname =    \DB::table('creditsalessummarries')->where('ucret', '=', $userid)->orderBy('id', 'Desc')->value('customername');
      $customername =    \DB::table('customers')->where('id', '=', $cname)->value('customername');
           
      return response()->json($customername);
}

public function customercontact()
  {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $cname =    \DB::table('creditsalessummarries')->where('ucret', '=', $userid)->orderBy('id', 'Desc')->value('customername');
      $customername =    \DB::table('customers')->where('id', '=', $cname)->value('location');
             return response()->json($customername);
}
public function customeraddress()
  {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $cname =    \DB::table('creditsalessummarries')->where('ucret', '=', $userid)->orderBy('id', 'Desc')->value('customername');
      $customername =    \DB::table('customers')->where('id', '=', $cname)->value('location');
             return response()->json($customername);
}
   






////////////////////
    public function     getthinvoicedocumentno()
    {
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
        $invoiceno =    \DB::table('invoicetoviews')->where('ucret', '=', $userid)->value('invoiceno');
        $doccumentno =    \DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $invoiceno)->value('purchaseno');
               return response()->json($doccumentno);
  }


  

  public function loggedinuserid()
  {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
     // $loggedinuserrole =  auth('api')->user()->mywallet;
     
             return response()->json($userid);
}
  
  public function loggedinuserrole()
  {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->mmaderole;
     // $loggedinuserrole =  auth('api')->user()->mywallet;
     
             return response()->json($userrole);
}

  public function loggedinuserbranch()
  {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $momowallet =  auth('api')->user()->mywallet;
     
             return response()->json($userbranch);
}

  public function momowallet()
  {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $momowallet =  auth('api')->user()->mywallet;
     
             return response()->json($momowallet);
}





    public function getthinvoicenumberactive()
    {
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
        $invoiceno =    \DB::table('invoicetoviews')->where('ucret', '=', $userid)->value('invoiceno');
       
               return response()->json($invoiceno);
  }

  public function gettheinvoicedate()
  {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $invoiceno =    \DB::table('invoicetoviews')->where('ucret', '=', $userid)->value('invoiceno');
      $invoicedate =    \DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $invoiceno)->value('invoicedate');
     
             return response()->json($invoicedate);
}
public function getthinvoicesuppliername()
  {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $invoiceno =    \DB::table('invoicetoviews')->where('ucret', '=', $userid)->value('invoiceno');
      $supplierid =    \DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $invoiceno)->value('suppliername');
      $suppliername =    \DB::table('customers')->where('id', '=', $supplierid)->value('customername');
     
             return response()->json($suppliername);
}
public function getinvoicepaymentstatus()
  {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $invoiceno =    \DB::table('invoicetoviews')->where('ucret', '=', $userid)->value('invoiceno');
      $invoicepaymentstatus =    \DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $invoiceno)->value('paymentstatus');
     // $suppliername =    \DB::table('suppliers')->where('id', '=', $supplierid)->value('suppname');
     
             return response()->json($invoicepaymentstatus);
}

public function gettheinvoicedeliverystatus()
  {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
    
      $invoiceno =    \DB::table('invoicetoviews')->where('ucret', '=', $userid)->value('invoiceno');
      $invoicedeliverystatus =    \DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $invoiceno)->value('status');
     
             return response()->json($invoicedeliverystatus);
}

//////////////////////////





































public function clientnumberinquestion()
  {
    
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $ctview =    \DB::table('ncssclienttoviewdetails')->where('ucret', '=', $userid)->value('clientname');
      $cno =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('clientno');
     
     
             return response()->json($cno);
    }




public function clientnameinquestion()
  {
    
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
    
      $ctview =    \DB::table('ncssclienttoviewdetails')->where('ucret', '=', $userid)->value('clientname');
    $fname =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('firstname');
    $middlename =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('middlename');
    $lastname =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('lastname');
     $cnma = $fname." ".$middlename." ".$lastname;
             return response()->json($cnma);
    }




public function clientidtypeinquestion()
  {
    
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
    
    $ctview =    \DB::table('ncssclienttoviewdetails')->where('ucret', '=', $userid)->value('clientname');
    $idtype =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('clientidnature');
    $idname =    \DB::table('ncssidtypes')->where('id', '=', $idtype)->value('idtypename');
 
  
             return response()->json($idname);
    }




public function clientidnumberinquestion()
  {
    
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
    
      $ctview =    \DB::table('ncssclienttoviewdetails')->where('ucret', '=', $userid)->value('clientname');
    $idnumber =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('clientidno');
     
             return response()->json($idnumber);
    }



public function clientresidenseinquestion()
  {
    
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $ctview =    \DB::table('ncssclienttoviewdetails')->where('ucret', '=', $userid)->value('clientname');
      $clientresidense =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('clientresidence');
     
             return response()->json($clientresidense);
    }




public function clientdatejoinedinquestion()
  {
    
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
    
      $ctview =    \DB::table('ncssclienttoviewdetails')->where('ucret', '=', $userid)->value('clientname');
      $datejoined =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('datejoined');
     
             return response()->json($datejoined);
    }




public function clientnoknameinquestion()
  {
    
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
    
      $ctview =    \DB::table('ncssclienttoviewdetails')->where('ucret', '=', $userid)->value('clientname');
      $nokname =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('nokname');
     
             return response()->json($nokname);
    }




public function clientstatusinquestion()
  {
    
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
    
      $invoiceno =    \DB::table('invoicetoviews')->where('ucret', '=', $userid)->value('invoiceno');
      $vattotal =    \DB::table('purchases')->where('supplierinvoiceno', '=', $invoiceno)->sum('vattotal');
     
             return response()->json($vattotal);
    }




public function clientnokcontactinquestion()
  {
    
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $ctview =    \DB::table('ncssclienttoviewdetails')->where('ucret', '=', $userid)->value('clientname');
      $nokcontactone =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('nokcontactone');
     
             return response()->json($nokcontactone);
    }




public function clientnokresidenceinquestion()
  {
    
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
    
      $ctview =    \DB::table('ncssclienttoviewdetails')->where('ucret', '=', $userid)->value('clientname');
      $nokresidence =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('nokresidence');
     
             return response()->json($nokresidence);
    }




public function clientaccountnumberinquestion()
  {
    
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
    
      $ctview =    \DB::table('ncssclienttoviewdetails')->where('ucret', '=', $userid)->value('clientname');
      $actno =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('actno');
     
             return response()->json($actno);
    }




public function clienttotalnumberofloansinquestion()
  {
    
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $ctview =    \DB::table('ncssclienttoviewdetails')->where('ucret', '=', $userid)->value('clientname');
      $actno =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('actno');
      // $actno =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('clientno');
      $totalloans = \DB::table('ncssloans')

  
    ->where('clientname', '=', $ctview)
    ->where('accountnumber', '=', $actno)
    ->count();
             return response()->json($totalloans);
    }




public function clienttotalamountofloansinquestion()
  {
    
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
    
      $ctview =    \DB::table('ncssclienttoviewdetails')->where('ucret', '=', $userid)->value('clientname');
      $actno =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('actno');
      // $actno =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('clientno');
      $totalloans = \DB::table('ncssloans')

  
    ->where('clientname', '=', $ctview)
    ->where('accountnumber', '=', $actno)
    ->sum('loanamount');
     
             return response()->json($totalloans);
    }



    public function clienttotalamountofloanstoreturn()
    {
      
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
      
        $ctview =    \DB::table('ncssclienttoviewdetails')->where('ucret', '=', $userid)->value('clientname');
        $actno =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('actno');
        // $actno =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('clientno');
        $totalloans = \DB::table('ncssloans')
  
    
      ->where('clientname', '=', $ctview)
      ->where('accountnumber', '=', $actno)
      ->sum('totalreturn');
       
               return response()->json($totalloans);
      }
  

public function clienttotalamountofloanspaidinquestion()
  {
    
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
    
      $ctview =    \DB::table('ncssclienttoviewdetails')->where('ucret', '=', $userid)->value('clientname');
      $actno =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('actno');
      // $actno =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('clientno');
      $totalloanspaid = \DB::table('ncssloanpayments')

  
    ->where('clientname', '=', $ctview)
    ->where('accountnumber', '=', $actno)
    ->sum('amountpaid');
             return response()->json($totalloanspaid);
    }




public function clienttotalloanbalanceinquestion()
  {
    
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
    
      $ctview =    \DB::table('ncssclienttoviewdetails')->where('ucret', '=', $userid)->value('clientname');
      $actno =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('actno');
      // $actno =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('clientno');
      $totalloanspaid = \DB::table('ncssloanpayments')

  
    ->where('clientname', '=', $ctview)
    ->where('accountnumber', '=', $actno)
    ->sum('amountpaid');
    $totalloantaken = \DB::table('ncssloans')

  
    ->where('clientname', '=', $ctview)
    ->where('accountnumber', '=', $actno)
    ->sum('totalreturn');

    $loanbalance = $totalloantaken-$totalloanspaid;
     
             return response()->json($loanbalance);
    }




public function clienttotalsavingsmadeinquestion()
  {
    
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
    
      $ctview =    \DB::table('ncssclienttoviewdetails')->where('ucret', '=', $userid)->value('clientname');
      $actno =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('actno');
      
      
      $savingtimes =    \DB::table('ncssclientdeposits')
       ->where('clientname', '=', $ctview)
       ->where('accountnumber', '=', $actno)
       ->where('del', '=', 0)
       ->count();
    
     
             return response()->json($savingtimes);
    }




public function clienttotalamountofsavingsinquestion()
  {
    
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
    $ctview =    \DB::table('ncssclienttoviewdetails')->where('ucret', '=', $userid)->value('clientname');
    $actno =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('actno');
    // $actno =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('clientno');
    
    
    $totalsavingsddff = \DB::table('ncssclientdeposits')


  ->where('clientname', '=', $ctview)
  ->where('accountnumber', '=', $actno)
  ->sum('amount');
   
           return response()->json($totalsavingsddff);
    }




public function clienttotalamountwithdrawninquestion()
  {
    
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
    $ctview =    \DB::table('ncssclienttoviewdetails')->where('ucret', '=', $userid)->value('clientname');
    $actno =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('actno');
    // $actno =    \DB::table('ncssclients')->where('id', '=', $ctview)->value('clientno');
    
    
    $totalsavingsddff = \DB::table('ncssclientwithdraws')


  ->where('clientname', '=', $ctview)
  ->where('accountnumber', '=', $actno)
  ->where('del', '=', 0)
  ->sum('amount');
   
           return response()->json($totalsavingsddff);
           
    }





public function clientavailablesavingsbalanceinquestion()
  {
    
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
    
      $invoiceno =    \DB::table('invoicetoviews')->where('ucret', '=', $userid)->value('invoiceno');
      $vattotal =    \DB::table('purchases')->where('supplierinvoiceno', '=', $invoiceno)->sum('vattotal');
     
             return response()->json($vattotal);
    }




public function clientnokrelationshipinquestion()
  {
    
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
    
      $invoiceno =    \DB::table('invoicetoviews')->where('ucret', '=', $userid)->value('invoiceno');
      $vattotal =    \DB::table('purchases')->where('supplierinvoiceno', '=', $invoiceno)->sum('vattotal');
     
             return response()->json($vattotal);
    }




public function clientprimarycontactinquestion()
  {
    
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
    
      $invoiceno =    \DB::table('invoicetoviews')->where('ucret', '=', $userid)->value('invoiceno');
      $vattotal =    \DB::table('purchases')->where('supplierinvoiceno', '=', $invoiceno)->sum('vattotal');
     
             return response()->json($vattotal);
    }


































public function gettheinvoicevatamount()
  {
    
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
    
      $invoiceno =    \DB::table('invoicetoviews')->where('ucret', '=', $userid)->value('invoiceno');
      $vattotal =    \DB::table('purchases')->where('supplierinvoiceno', '=', $invoiceno)->sum('vattotal');
     
             return response()->json($vattotal);
    }

public function gettheinvoicegrandtotal()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;

  $invoiceno =    \DB::table('invoicetoviews')->where('ucret', '=', $userid)->value('invoiceno');
  $grandtotal =    \DB::table('purchases')->where('supplierinvoiceno', '=', $invoiceno)->sum('grandtotal');
 
         return response()->json($grandtotal);
}


public function gettheinvoicetotalwithoutvat()
  {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
    
      $invoiceno =    \DB::table('invoicetoviews')->where('ucret', '=', $userid)->value('invoiceno');
      $totalwithoutvat =    \DB::table('purchases')->where('supplierinvoiceno', '=', $invoiceno)->sum('linetotal');
     
             return response()->json($totalwithoutvat);
}

























    public function getRoles()

    { 
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
     

      $data = Role::get(); 
      if($userrole !=   '900'){
         return response()->json($data);
      }
     
     }

     
public function Bopenningbalance()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];


   // $closingcash = \DB::table('shopbalancingrecords')
   
   // ->where('branch', '=', $branchto)
   // ->orderByDesc('id')
   // ->limit(1)
   // ->get('clcash');

    $branchto  = Branchtocollect::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
   // $closingcash  = Shopbalancingrecord::where('branch', $branchto)->orderBy('id', 'Desc')->limit(1)->value('clcash');
//
$closingcash  = Branchcashstanding::where('branch', $branchto)->orderBy('id', 'Desc')->limit(1)->value('outstanding');
    return $closingcash;
}



}
public function Branchtobalancedayscashout()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
     $branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
     $dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
  //  $bnames  = Branch::where('id', $branchto)->value('branchname');
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];
   $totalcashout = \DB::table('cintransfers')
   
    ->where('branchto', '=', $branchto)
    ->where('transferdate', '=', $dateinquestion)
    ->where('status', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('amount');
    return $totalcashout;
}

}

public function Branchtobalancedayexpenses()
{
   

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
     $branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
     $dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
  //  $bnames  = Branch::where('id', $branchto)->value('branchname');
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];
   $totalexpenses = \DB::table('madeexpenses')
   
    ->where('branch', '=', $branchto)
    ->where('datemade', '=', $dateinquestion)
    ->where('approvalstate', '=', 1)
    ->where('explevel', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('amount');
    return $totalexpenses;
}

}
public function Branchtobalancedaypayout()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
     $branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
     $dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
  //  $bnames  = Branch::where('id', $branchto)->value('branchname');
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];
   $totalpayout = \DB::table('branchpayouts')
   
    ->where('branch', '=', $branchto)
    ->where('datepaid', '=', $dateinquestion)
   // ->where('approvalstate', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('amount');
    return $totalpayout;
}

}


public function Branchtobalancedayscashin()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
     $branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
     $dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
  //  $bnames  = Branch::where('id', $branchto)->value('branchname');
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];
   $totalcashin = \DB::table('couttransfers')
   
    ->where('branchto', '=', $branchto)
    ->where('transferdate', '=', $dateinquestion)
    ->where('status', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('amount');
    return $totalcashin;
}

}

public function Bopenningbalancetoday()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];


   // $closingcash = \DB::table('shopbalancingrecords')
   
   // ->where('branch', '=', $branchto)
   // ->orderByDesc('id')
   // ->limit(1)
   // ->get('clcash');

    $branchto  = Branchtocollect::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
    $closingcash  = Shopbalancingrecord::where('branch', $branchto)->orderBy('id', 'Desc')->limit(1)->value('clcash');

    return $closingcash;
}



}






public function administratoraccountbalance()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;

 $invoicelockstatus = \DB::table('expensewalets')->where('walletno', '=', 2)->value('bal');

    return $invoicelockstatus;
   
}


public function bankaccountbalance()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;

 $invoicelockstatus = \DB::table('expensewalets')->where('walletno', '=', 4)->value('bal');

    return $invoicelockstatus;
   
}







public function todaystotalcashsales()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->mmaderole;
  $currentdate = date('Y-m-d');
if($userrole == '101')
{
  $ttsales = \DB::table('productsales')
   
    ->where('branch', '=', $userbranch)
   ->where('datesold', '=', $currentdate)
   ->where('saletype', '=', 1)
  //  ->where('status', '=', 0)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('linetotal');

    return $ttsales;
} 
}


public function totaldebtorsbalance()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->mmaderole;
  $currentdate = date('Y-m-d');

  $totalcustomerdebts = \DB::table('customers')->where('customertype', '=', 1)->where('bal', '>', 0)->sum('bal');
  $totalsupplierdebt = \DB::table('customers')->where('customertype', '=', 2)->where('bal', '<', 0)->sum('bal');
  $possupplierdebt =  ($totalsupplierdebt*(-1));
 // $repotytype  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('reporttype');
$totaltoreturn = $totalcustomerdebts+$possupplierdebt;
    return $totaltoreturn;

}
public function totalcreditorsbalance()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->mmaderole;
  $currentdate = date('Y-m-d');
  $totalcustomercredits = \DB::table('customers')->where('customertype', '=', 1)->where('bal', '<', 0)->sum('bal');
  $totalsuppliercredit = \DB::table('customers')->where('customertype', '=', 2)->where('bal', '>', 0)->sum('bal');
  $posscustomerdebt =  ($totalcustomercredits*(-1));
 // $repotytype  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('reporttype');
$totaltoreturn = $totalsuppliercredit+$posscustomerdebt;
    return $totaltoreturn;

}

public function todaystotalcreditsales()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->mmaderole;
  $currentdate = date('Y-m-d');
if($userrole == '101')
{
  $ttsales = \DB::table('creditsalessummarries')
   
   // ->where('branch', '=', $userbranch)
   ->where('invoicedate', '=', $currentdate)
   //->where('saletype', '=', 2)

  //  ->where('status', '=', 0)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('invoiceamount');

    return $ttsales;
} 
}

public function todaystotalsales()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->mmaderole;
  $currentdate = date('Y-m-d');
if($userrole == '101')
{
  $ttsales = \DB::table('productsales')
   
    ->where('branch', '=', $userbranch)
   ->where('datesold', '=', $currentdate)
  //  ->where('status', '=', 0)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('linetotal');

    return $ttsales;
} 
if($userrole != '101')
{
  $ttsales = \DB::table('productsales')
   
  //  ->where('branch', '=', $userbranch)
   ->where('datesold', '=', $currentdate)
  //  ->where('status', '=', 0)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('linetotal');

    return $ttsales;
}     
}




public function postypes()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;

 $invoicelockstatus = \DB::table('postypes')->value('posname');

    return $invoicelockstatus;
   
}

public function lastipdatetimeanddate()
{
  $monthtodisplay = \DB::table('products')->value('laststockupdate');

 
    return $monthtodisplay;
   
}
public function currentstockvalues()
{
  $totalcattotal = \DB::table('products')
   ->sum('stockvalue');
    return $totalcattotal;
   
}
public function shopcashbalance()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;

 $invoicelockstatus = \DB::table('expensewalets')->where('branchname', '=', $userbranch)->value('bal');

    return $invoicelockstatus;
   
}


public function inputvatamount()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;

 $invoicelockstatus = \DB::table('expensewalets')->where('walletno', '=', 5)->value('bal');

    return $invoicelockstatus;
   
}

public function cashsalesproductlist()
{
 
$data = Product::orderBy('qty', 'Desc')
->where('qty','>', 0)
->get();
    return response()->json($data);
}
public function productstopurchaselist()
{
 
$data = Product::orderBy('id', 'Asc')
//->where('del', 0)
->get();
    return response()->json($data);
}

public function outputvatamount()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;

 $invoicelockstatus = \DB::table('expensewalets')->where('walletno', '=', 6)->value('bal');

    return $invoicelockstatus;
   
}

























public function Carttotal()
{
   

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

{

  
    $currentdate = date('Y-m-d');
   $totalcattotal = \DB::table('shopingcats')
   
    ->where('ucret', '=', $userid)
  //  ->where('transferdate', '=', $currentdate)
    ->where('status', '=', 0)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('linetotal');
    return $totalcattotal;
}

}

public function Ordertotal()
{
   

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

{

  
    $currentdate = date('Y-m-d');
   $totalcattotal = \DB::table('ordermakings')
   
    ->where('ucret', '=', $userid)
  //  ->where('transferdate', '=', $currentdate)
   // ->where('status', '=', 0)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('linetotalcost');
    return $totalcattotal;
}

}



public function invoicelockstatus()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $invoiceno =    \DB::table('invoicetoviews')->where('ucret', '=', $userid)->value('invoiceno');
 $invoicelockstatus = \DB::table('purchasessummaries')->where('supplierinvoiceno', '=', $invoiceno)->value('invoicelockstatus');
 //DB::table('invoicetoviews')->where('ucret', $userid)->delete();
 //DB::table('invoincestoappenditems')->where('ucret', $userid)->delete();
    return $invoicelockstatus;
   
}

public function isthereclosingstock()
{
  $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
       $currentdate = $updatedatentime = date('Y-m-d');


       $mycurrentdate = date('Y-m-d');
$previousday = (date('Y-m-d', strtotime('-1 day', strtotime($mycurrentdate))));
        // $receiptno = \DB::table('salessummaries') ->where('ucret', '=', $userid)->orderBy('id', 'Desc')->value('invoiceno');

 $branchtobalanceexisits = \DB::table('stockvalues')

  
    ->where('dateinaction', '=', $previousday)
    ->where('closingstock', '>', 0)
    ->count();

    return $branchtobalanceexisits;
   
}
public function thereexistsaninvoice()
{
  $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
       
        // $receiptno = \DB::table('salessummaries') ->where('ucret', '=', $userid)->orderBy('id', 'Desc')->value('invoiceno');

 $branchtobalanceexisits = \DB::table('invoincestoappenditems')

  
    ->where('ucret', '=', $userid)
    ->count();

    return $branchtobalanceexisits;
   
}

public function myexistinginvoice()
     {
         $userid =  auth('api')->user()->id;
         $userbranch =  auth('api')->user()->branch;
         $userrole =  auth('api')->user()->type;
       
     
         $branchtobalanceexisits = \DB::table('invoincestoappenditems')

  
         ->where('ucret', '=', $userid)
         ->value('invoiceno');
     
         return $branchtobalanceexisits;
     
   }


public function existanceofitemsoncart()
{
  $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
       
        // $receiptno = \DB::table('salessummaries') ->where('ucret', '=', $userid)->orderBy('id', 'Desc')->value('invoiceno');

 $branchtobalanceexisits = \DB::table('shopingcats')

  
    ->where('ucret', '=', $userid)
    ->count();

    return $branchtobalanceexisits;
   
}




     public function getIfthebranchisalreadybalanced()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;

//////////// geting the shop to balance
$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
 $branchtobalanceexisits = \DB::table('shopbalancingrecords')

    ->where('branch', '=', $branchto)
    ->where('datedone', '=', $dateinquestion)
    ->count();

    return $branchtobalanceexisits;
   
}

public function transactiontypeslist()
     {
         $userid =  auth('api')->user()->id;
         $userbranch =  auth('api')->user()->branch;
         $userrole =  auth('api')->user()->type;
       
     
        $data = Transactiontype::latest('id')
     //   ->where('id', '=', $userbranch)
        ->get();
        
                return response()->json($data);
     
   }

    
             

            public function productsavailableforsalelist()
            {
                $userid =  auth('api')->user()->id;
                $userbranch =  auth('api')->user()->branch;
                $userrole =  auth('api')->user()->type;
              ///BookingDates::where('email', Input::get('email'))
   // ->orWhere('name', 'like', '%' . Input::get('name') . '%')->get();
            //$verit = 'alle';
               $data = Product::orderBy('id', 'Asc')
            //   ->where('productname', 'like', '%' . $verit . '%')
               ->where('qty', '>', 0)
             //  ->limit(1000)
               ->get();
              // ->paginate(13);
               
                       return response()->json($data);
            
          }

       






public function incomesourceslist()
     {
         $userid =  auth('api')->user()->id;
         $userbranch =  auth('api')->user()->branch;
         $userrole =  auth('api')->user()->type;
       
     
        $data = Incomesource::latest('id')
     //   ->where('id', '=', $userbranch)
        ->get();
        
                return response()->json($data);
     
   }
   
public function mybranch()
     {
         $userid =  auth('api')->user()->id;
         $userbranch =  auth('api')->user()->branch;
         $userrole =  auth('api')->user()->type;
        /// $roleto  = Bran::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('rolename');  
      
        // if($userrole == '101')
        // {
        // $data = Branchanduser::latest('id')
        // ->where('username', '=', $userid)
        // ->get();
        
        //         return response()->json($data);
        // }
        if($userrole == '101')
        {
        $data = Branch::latest('id')
        ->where('del', '=', 0)
        ->get();
        
                return response()->json($data);
        }
        if($userrole != '101')
        {
        $data = Branch::latest('id')
        ->where('del', '=', 0)
        ->get();
                return response()->json($data);
        }
   }
   
   public function branchmachineslist()
   {
       $userid =  auth('api')->user()->id;
       $userbranch =  auth('api')->user()->branch;
       $userrole =  auth('api')->user()->type;
      /// $roleto  = Bran::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('rolename');  
     
      $data = Machine::orderby('id', 'Asc')
      //->where('sysname', '!=', $component)
      ->get();
              return response()->json($data);
 }

   public function bettingproducts()
   {
       $userid =  auth('api')->user()->id;
       $userbranch =  auth('api')->user()->branch;
       $userrole =  auth('api')->user()->type;
      /// $roleto  = Bran::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('rolename');  
     
      $data = Bettingproduct::latest('id')
      //->where('sysname', '!=', $component)
      ->get();
              return response()->json($data);
 }
 public function currentlyselecteddebitcollectionsreport()

{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;


$wordCount = \DB::table('collectionreporttoviews')
  ->where('reporttype', '=', 2)
    ->where('ucret', '=', $userid)
   
    ->count();

    return $wordCount;
    
  
}
 

 public function yearslist()
     {
         $userid =  auth('api')->user()->id;
         $userbranch =  auth('api')->user()->branch;
         $userrole =  auth('api')->user()->type;
        /// $roleto  = Bran::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('rolename');  
       
        $data = Myyear::orderBy('id', 'Asc')
        //->where('sysname', '!=', $component)
        ->get();
                return response()->json($data);
   }
   
   public function monthlyexpenseorderby()
   {
       $userid =  auth('api')->user()->id;
       $userbranch =  auth('api')->user()->branch;
       $userrole =  auth('api')->user()->type;
      /// $roleto  = Bran::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('rolename');  
     
      $data = Sortlistreport::orderBy('id', 'Asc')
      ->where('sover', '=', 3)
      ->get();
              return response()->json($data);
 }
   public function monthreportslist2()
   {
       $userid =  auth('api')->user()->id;
       $userbranch =  auth('api')->user()->branch;
       $userrole =  auth('api')->user()->type;
      /// $roleto  = Bran::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('rolename');  
     
      $data = Sortlistreport::orderBy('id', 'Asc')
      ->where('sover', '=', 2)
      ->get();
              return response()->json($data);
 }
   public function monthreportslist()
   {
       $userid =  auth('api')->user()->id;
       $userbranch =  auth('api')->user()->branch;
       $userrole =  auth('api')->user()->type;
      /// $roleto  = Bran::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('rolename');  
     
      $data = Generalreport::orderBy('id', 'Asc')
      //->where('sysname', '!=', $component)
      ->get();
              return response()->json($data);
 }
   public function montheslist()
   {
       $userid =  auth('api')->user()->id;
       $userbranch =  auth('api')->user()->branch;
       $userrole =  auth('api')->user()->type;
      /// $roleto  = Bran::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('rolename');  
     
      $data = Mymonth::orderBy('id', 'Asc')
      //->where('sysname', '!=', $component)
      ->get();
              return response()->json($data);
 }
 
 
 
 public function expensetypeslist()
     {
         $userid =  auth('api')->user()->id;
         $userbranch =  auth('api')->user()->branch;
         $userrole =  auth('api')->user()->type;
        /// $roleto  = Bran::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('rolename');  
       
        $data = Expensetype::latest('id')
        //->where('sysname', '!=', $component)
        ->get();
                return response()->json($data);
   }

   public function expensewalletslist()
   {
       $userid =  auth('api')->user()->id;
       $userbranch =  auth('api')->user()->branch;
       $userrole =  auth('api')->user()->type;
      /// $roleto  = Bran::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('rolename');  
     
      $data = Expensewalet::latest('id')
      //->where('sysname', '!=', $component)
      ->get();
              return response()->json($data);
 }
 
 public function unitmeasurelist()
 {
     $userid =  auth('api')->user()->id;
     $userbranch =  auth('api')->user()->branch;
     $userrole =  auth('api')->user()->type;
   
   
    $data = Unitmeasure::latest('id')
    //->where('sysname', '!=', $component)
    ->get();
            return response()->json($data);
}

public function walletstorecievemoney()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->mmaderole;
    $userwallet =  auth('api')->user()->mywallet;
    $usercountryname =  auth('api')->user()->countryname;
    $usercompanyname =  auth('api')->user()->companyname;
  
  if($userrole == '101')
 {  
   $data = Expensewalet::latest('id')
   ->where('wallenno', '=', $userwallet)
   ->where('usercompany', '=', $usercompanyname)
   ->where('usercountry', '=', $usercountryname)
   ->get();
  }
  if($userrole != '101')
  {  
    $data = Expensewalet::latest('id')
    ->where('usercompany', '=', $usercompanyname)
    ->where('usercountry', '=', $usercountryname)
    ->where('recievableincome', '=', 1)
    ->get();
   }
           return response()->json($data);
}
public function walletsofeapenselist()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
    $companyname =  auth('api')->user()->companyname;
    $countryname =  auth('api')->user()->countryname;
   
   $data = Expensewalet::latest('id')
   ->where('usercompany', '=', $usercompanyname)
   ->where('usercountry', '=', $usercountryname)
   ->where('spendable', '=', 0)
   ->get();
           return response()->json($data);
}
public function productslist()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
  
  
   $data = Product::latest('id')
   //->where('sysname', '!=', $component)
   ->get();
           return response()->json($data);
}



public function currencyinwords()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
//////getting the receipt number 
///$customertype = DB::table('customers')->where('id', $id)->value('customertype');
/// getting the receipt no 
$receiptno = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->value('receiptno');
$receiptamount = \DB::table('customerpayments')->where('receiptno', '=', $receiptno)->value('amountpaid');  


   return Terbilang::make($receiptamount);
   

}




// /////////////////////////////////////////////////////////////////


public function customernamestatementprint()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
//////getting the receipt number 
///$customertype = DB::table('customers')->where('id', $id)->value('customertype');
/// getting the receipt no 
$cust = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->value('customername');
$customernameto = \DB::table('customers')->where('id', '=', $cust)->value('customername');  


return response()->json($customernameto);
   

}


public function customeraddresstoprint()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
//////getting the receipt number 
///$customertype = DB::table('customers')->where('id', $id)->value('customertype');
/// getting the receipt no 
$cust = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->value('customername');
$customernameto = \DB::table('customers')->where('id', '=', $cust)->value('location');  


return response()->json($customernameto);
   

}

public function cuctomercontacttoprint()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
//////getting the receipt number 
///$customertype = DB::table('customers')->where('id', $id)->value('customertype');
/// getting the receipt no 
$cust = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->value('customername');
$customernameto = \DB::table('customers')->where('id', '=', $cust)->value('contact');  


return response()->json($customernameto);
   

}

public function customertypeprint()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
//////getting the receipt number 
///$customertype = DB::table('customers')->where('id', $id)->value('customertype');
/// getting the receipt no 
$cust = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->value('customername');
$customernameto = \DB::table('customers')->where('id', '=', $cust)->value('customertype');  


return response()->json($customernameto);
   

}
public function customeraccountbalance()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
//////getting the receipt number 
///$customertype = DB::table('customers')->where('id', $id)->value('customertype');
/// getting the receipt no 
$cust = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->value('customername');
$customernameto = \DB::table('customers')->where('id', '=', $cust)->value('bal');  


return response()->json($customernameto);
   

}



























/////////////////////////////////////////////////////////////////////////////


public function receiptamountinfigures()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
//////getting the receipt number 
///$customertype = DB::table('customers')->where('id', $id)->value('customertype');
/// getting the receipt no 
$receiptno = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->value('receiptno');
$receiptamount = \DB::table('customerpayments')->where('receiptno', '=', $receiptno)->value('amountpaid');  


return response()->json($receiptamount);
   

}


public function customertoprintreceiptname()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;

    
$receiptno = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->value('customername');
$customername  = \DB::table('customers')->where('id', '=', $receiptno)->value('customername');  


return response()->json($customername);
   

}


public function customertype()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;

    
$receiptno = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->value('customertype');
//$customername  = \DB::table('customers')->where('id', '=', $receiptno)->value('customername');  


return response()->json($receiptno);
   

}



public function receiptnoinprint()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;

    
$receiptno = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->value('receiptno');
//$customername  = \DB::table('customers')->where('id', '=', $receiptno)->value('customername');  


return response()->json($receiptno);
   

}



public function receiptdatetoprint()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;

    
///$receiptno = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->value('receiptno');
//$customername  = \DB::table('customers')->where('id', '=', $receiptno)->value('customername');  
$receiptno = \DB::table('customerpayments')->where('receiptno', '=', $receiptno)->value('datepaid');  

return response()->json($receiptno);
   

}


public function cashierrecievingpayment()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;

    
///$receiptno = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->value('receiptno');
//$customername  = \DB::table('customers')->where('id', '=', $receiptno)->value('customername');  
$receiptno = \DB::table('customerpayments')->where('receiptno', '=', $receiptno)->value('datepaid');  
$cashierpaying = \DB::table('customerpayments')->where('receiptno', '=', $receiptno)->value('ucret');  
$cashiername = \DB::table('users')->where('id', '=', $cashierpaying)->value('name'); 
return response()->json($cashiername);
   

}



public function paymentnaration()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;

    
$receiptno = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->value('receiptno');
//$customername  = \DB::table('customers')->where('id', '=', $receiptno)->value('customername');  
///$receiptno = \DB::table('customerpayments')->where('receiptno', '=', $receiptno)->value('datepaid');  
$narration = \DB::table('customerpayments')->where('receiptno', '=', $receiptno)->value('description');  
//$cashiername = \DB::table('users')->where('id', '=', $cashierpaying)->value('name'); 
return response()->json($narration);
   

}


public function customerbalance()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;

    
$receiptno = \DB::table('customersreporttoviews')->where('ucret', '=', $userid)->value('receiptno');
$customerbalance  = \DB::table('customers')->where('id', '=', $receiptno)->value('bal');  
///$receiptno = \DB::table('customerpayments')->where('receiptno', '=', $receiptno)->value('datepaid');  
///$narration = \DB::table('customers')->where('id', '=', $receiptno)->value('description');  
//$cashiername = \DB::table('users')->where('id', '=', $cashierpaying)->value('name'); 
return response()->json($customerbalance);
   

}










 public function productbrandslist()
 {
     $userid =  auth('api')->user()->id;
     $userbranch =  auth('api')->user()->branch;
     $userrole =  auth('api')->user()->type;
   
   
    $data = Brand::latest('id')
    //->where('sysname', '!=', $component)
    ->get();
            return response()->json($data);
}

 public function productcategorieslist()
 {
     $userid =  auth('api')->user()->id;
     $userbranch =  auth('api')->user()->branch;
     $userrole =  auth('api')->user()->type;
   
   
    $data = Productcategory::latest('id')
    //->where('sysname', '!=', $component)
    ->get();
            return response()->json($data);
}


public function expensecategorieslist()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
   /// $roleto  = Bran::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('rolename');  
  
   $data = Expensescategory::latest('id')
   //->where('sysname', '!=', $component)
   ->get();
           return response()->json($data);
}


public function cashierslist()
{
    $userid =  auth('api')->user()->id;
    $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->type;
   /// $roleto  = Bran::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('rolename');  
  
   $data = User::latest('id')
   ->where('visibletoall', '=', 0)
   ->get();
           return response()->json($data);
}
     public function branchDetails()
     {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $usercompany =  auth('api')->user()->companyname;
      $usercountry =  auth('api')->user()->countryname;
     
     
     
      $data = Branch::get(); 
     // return response()->json($data);
      if($userrole == '1')
      {
        $data = Branch::get(); return response()->json($data);
      }
      if($userrole != '1')
      {
        $data = Branch::latest('id')
        ->where('countryname', '=', $usercountry)
        ->where('companyname', '=', $usercompany)
        ->get(); return response()->json($data);
      }
   }
    public function getcomponentslist()
    {
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;
        $roleto  = Roletoaddcomponent::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('rolename');  
      
$data = Thecomponent::latest('id')
//->where('sysname', '!=', $component)
->get();
        return response()->json($data);
    




    }

    public function getSubmenues()
    {
     
$data = Submheader::latest('id')
->where('del', 0)
->get();
        return response()->json($data);
    }


    
    public function orderlistfordatesalesreport()
    {
     $misory1 = "datesov";
     $misory2 = "salessov";
$data = Sortlistreport::latest('id')
->where('sover', 1) 
//->where('sover', $misory2)
->get();
        return response()->json($data);
    }
      
    public function invoiceslist()
    {
     
$data = Purchasessummary::latest('id')
//->where('del', 0)
->get();
        return response()->json($data);
    }
    


    public function customerslist()
    {
     
$data = Customer::latest('id')
->where('status', 1)
->get();
        return response()->json($data);
    }


    public function supplierslist()
    {
     
$data = Customer::latest('id')
//->where('del', 0)
->get();
        return response()->json($data);
    }
    
    public function loanofficerslist()
    {
     
$data = Ncssemployee::latest('id')
//->where('del', 0)
->get();
        return response()->json($data);
    }
    public function idtypeslist()
    {
     
$data = Ncssidtype::latest('id')
//->where('del', 0)
->get();
        return response()->json($data);
    }
    public function lut()
    {
      $usertype =  auth('api')->user()->type;
        return response()->json($usertype);
    }
    public function lur()
    {
     

$userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->mmaderole;

        return response()->json($userrole);
    }
    public function mainmenulist()
    {
     
$data = Mainmenucomponent::latest('id')
//->where('del', 0)
->get();
        return response()->json($data);
    }

    public function getformfeatures()
    {
        $userid =  auth('api')->user()->id;
        $userbranch =  auth('api')->user()->branch;
        $userrole =  auth('api')->user()->type;

   
$data = Formcomponent::latest('id')
//->where('id', $userbranch)
->get();
        return response()->json($data);
  
    }
    
    public function userslist()

    {
      $data = User::get();
       return response()->json($data); 
      }

   
      public function getUsertypes()

      {
        $data = Usertype::get();
         return response()->json($data); 
        }

        

        // public function getFloatcodes(Request $request)

        // {
        //    $data = Branchandcode::where('branch', $request->branch)->get();
        //     return response()->json($data); 
        //   }
        
        
        public function getcompanysecurities(Request $request)

        {
$userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;

$countryinaction = \DB::table('countryandcorrespondings')
// ->where('countryname', $inpbranch)
// ->where('countryname', '=', $countryname)
->where('ucret', '=', $userid)
->orderBy('id', 'Desc')
->limit(1)
->value('countryname');
$companyinaction = \DB::table('countryandcorrespondings')
// ->where('countryname', $inpbranch)
// ->where('countryname', '=', $countryname)
->where('ucret', '=', $userid)
->orderBy('id', 'Desc')
->limit(1)
->value('companyname');
           $data = Ncssloansecurity::where('companyname', $companyinaction)-> where('countryname', $countryinaction)->get();
            return response()->json($data); 
          }




          public function companynameinaction()
          {
          /// Getting the Logged in User details
           $userid =  auth('api')->user()->id;
           $userbranch =  auth('api')->user()->branch;
           $userrole =  auth('api')->user()->type;
           $companyname =  auth('api')->user()->companyname;
           $countryname =  auth('api')->user()->countryname;
          
           $countryinaction = \DB::table('monthlyreporttoviews')
           // ->where('countryname', $inpbranch)
           // ->where('countryname', '=', $countryname)
           ->where('ucret', '=', $userid)
           ->orderBy('id', 'Desc')
           ->limit(1)
           ->value('countryname');
           $companyinaction = \DB::table('monthlyreporttoviews')
           // ->where('countryname', $inpbranch)
           // ->where('countryname', '=', $countryname)
           ->where('ucret', '=', $userid)
           ->orderBy('id', 'Desc')
           ->limit(1)
           ->value('companyname');


            $currentdate = date('Y-m-d');
           return $startdate  = \DB::table('companydetails')
           ->where('id',$companyinaction)
          
           ->value('companyname');
            
           
          }



          public function countrynameinaction()
          {
          /// Getting the Logged in User details
           $userid =  auth('api')->user()->id;
           $userbranch =  auth('api')->user()->branch;
           $userrole =  auth('api')->user()->type;
           $companyname =  auth('api')->user()->companyname;
           $countryname =  auth('api')->user()->countryname;
          
           $countryinaction = \DB::table('monthlyreporttoviews')
           // ->where('countryname', $inpbranch)
           // ->where('countryname', '=', $countryname)
           ->where('ucret', '=', $userid)
           ->orderBy('id', 'Desc')
           ->limit(1)
           ->value('countryname');
           $companyinaction = \DB::table('monthlyreporttoviews')
           // ->where('countryname', $inpbranch)
           // ->where('countryname', '=', $countryname)
           ->where('ucret', '=', $userid)
           ->orderBy('id', 'Desc')
           ->limit(1)
           ->value('companyname');


            $currentdate = date('Y-m-d');
           return $startdate  = \DB::table('countries')
           ->where('id',$countryinaction)
          
           ->value('countryname');
            
           
          }

        

        public function getcompanyemployees(Request $request)

        {
$userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;

$countryinaction = \DB::table('countryandcorrespondings')
// ->where('countryname', $inpbranch)
// ->where('countryname', '=', $countryname)
->where('ucret', '=', $userid)
->orderBy('id', 'Desc')
->limit(1)
->value('countryname');
$companyinaction = \DB::table('countryandcorrespondings')
// ->where('countryname', $inpbranch)
// ->where('countryname', '=', $countryname)
->where('ucret', '=', $userid)
->orderBy('id', 'Desc')
->limit(1)
->value('companyname');
           $data = Ncssemployee::where('companyname', $companyinaction)-> where('countryname', $countryinaction)->get();
            return response()->json($data); 
          }

          public function getcompanywallets(Request $request)

          {
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  
  
  $companyinaction = \DB::table('countryandcorrespondings')
  // ->where('countryname', $inpbranch)
  // ->where('countryname', '=', $countryname)
  ->where('ucret', '=', $userid)
  ->orderBy('id', 'Desc')
  ->limit(1)
  ->value('companyname');
  $countryinaction = \DB::table('countryandcorrespondings')
  // ->where('countryname', $inpbranch)
  // ->where('countryname', '=', $countryname)
  ->where('ucret', '=', $userid)
  ->orderBy('id', 'Desc')
  ->limit(1)
  ->value('countryname');
             $data = Expensewalet::where('companyname', $companyinaction)
             ->where('countryname', '=', $countryinaction)
             ->get();
              return response()->json($data); 
            }
        
          public function getcompanyexpenses(Request $request)

          {
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  
  
  $companyinaction = \DB::table('countryandcorrespondings')
  // ->where('countryname', $inpbranch)
  // ->where('countryname', '=', $countryname)
  ->where('ucret', '=', $userid)
  ->orderBy('id', 'Desc')
  ->limit(1)
  ->value('companyname');
  $countryinaction = \DB::table('countryandcorrespondings')
  // ->where('countryname', $inpbranch)
  // ->where('countryname', '=', $countryname)
  ->where('ucret', '=', $userid)
  ->orderBy('id', 'Desc')
  ->limit(1)
  ->value('countryname');
             $data = Expense::where('companyname', $companyinaction)
             ->where('countryname', '=', $countryinaction)
             ->get();
              return response()->json($data); 
            }
  



        public function getcompanybranches(Request $request)

        {
$userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$usertype =  auth('api')->user()->type;
$userrole =  auth('api')->user()->mmaderole;
$usercompany =  auth('api')->user()->companyname;
$usercountry =  auth('api')->user()->countryname;




if($usertype != '1')
{
  if($userrole == '100' || $userrole == '102')
  {

           $data = Branch::where('companyname', $usercompany)->get();
            return response()->json($data); 
  } 

  if($userrole == '101')
  {

           $data = Branch::where('id', $userbranch)->get();
            return response()->json($data); 
  } 
  /// end of shop manager      
         
}       
/// End of usertype ==1   






if($usertype == '1')
{
$companyinaction = \DB::table('countryandcorrespondings')
// ->where('countryname', $inpbranch)
// ->where('countryname', '=', $countryname)
->where('ucret', '=', $userid)
->orderBy('id', 'Desc')
->limit(1)
->value('companyname');
           $data = Branch::where('companyname', $companyinaction)->get();
            return response()->json($data); 
         
         
}       
/// End of usertype ==1   

         
         
          }









        public function getcompanieswallets(Request $request)

        {
$userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;


$companyinaction = \DB::table('countryandcorrespondings')
// ->where('countryname', $inpbranch)
// ->where('countryname', '=', $countryname)
->where('ucret', '=', $userid)
->orderBy('id', 'Desc')
->limit(1)
->value('companyname');
           $data = Expensewalet::where('companyname', $companyinaction)->get();
            return response()->json($data); 
          }

          


//           public function getcompanybranches(Request $request)

//           {
//             $userid =  auth('api')->user()->id;
//  $userbranch =  auth('api')->user()->branch;
//  $userrole =  auth('api')->user()->type;
  
 
//  $countryinaction = \DB::table('countryandcorrespondings')
// // ->where('countryname', $inpbranch)
// // ->where('countryname', '=', $countryname)
// ->where('ucret', '=', $userid)
// ->orderBy('id', 'Desc')
// ->limit(1)
// ->value('countryname');
// $compainactions = \DB::table('countryandcorrespondings')
// // ->where('countryname', $inpbranch)
// // ->where('countryname', '=', $countryname)
// ->where('ucret', '=', $userid)
// ->orderBy('id', 'Desc')
// ->limit(1)
// ->value('companyname');
//              $data = Ncssemployee::where('countryname', $countryinaction)->where('companyname', $compainactions)->get();
//               return response()->json($data); 
//             }



          public function companyactiveclients(Request $request)

          {
            $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
  
 
 $countryinaction = \DB::table('countryandcorrespondings')
// ->where('countryname', $inpbranch)
// ->where('countryname', '=', $countryname)
->where('ucret', '=', $userid)
->orderBy('id', 'Desc')
->limit(1)
->value('countryname');
$compainactions = \DB::table('countryandcorrespondings')
// ->where('countryname', $inpbranch)
// ->where('countryname', '=', $countryname)
->where('ucret', '=', $userid)
->orderBy('id', 'Desc')
->limit(1)
->value('companyname');
             $data = Ncssclient::where('countryname', $countryinaction)->where('companyname', $compainactions)->get();
              return response()->json($data); 
            }











          public function getcountriescompanies(Request $request)

          {
            $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
  
 
 $countryinaction = \DB::table('countryandcorrespondings')
// ->where('countryname', $inpbranch)
// ->where('countryname', '=', $countryname)
->where('ucret', '=', $userid)
->orderBy('id', 'Desc')
->limit(1)
->value('countryname');
             $data = Companydetail::where('countryname', $countryinaction)->get();
              return response()->json($data); 
            }

    public function getStates(Request $request)

    { $data = State::where('country_id', $request->country_id)->get(); return response()->json($data); }

///////////////////////////////////////////////////////////

public function selectedreporttype()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  // $detoinact  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  
  $repotytype  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('reporttype');
  // $totalsales = \DB::table('dailyreportcodes')
   
  //  ->where('datedone', '=', $detoinact)
  // //  ->where('transferdate', '=', $currentdate)
  // //  ->where('status', '=', 1)
  //  ->sum('daysalesamount');
    return $repotytype;
  
 
}

































///////////////////////////////////////////////////////////////
public function incomestatementsales()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $startdate  = \DB::table('salesreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('salesreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
  $totalsales = \DB::table('salessummaries')
   
  //  ->where('datedone', '=', $dateinquestion)
     ->whereBetween('invoicedate', [$startdate, $enddate])
     ->sum('invoiceamount');
      return $totalsales;
  
  
  
 
}





public function administrativeexpensestotal()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $startdate  = \DB::table('salesreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('salesreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
  $totalsales = \DB::table('madeexpenses')
   
      ->where('category', '=', 3457)
     ->whereBetween('datemade', [$startdate, $enddate])
     ->sum('amount');
      return $totalsales;
  
  
  
 
}


public function financeexpensestotal()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $startdate  = \DB::table('salesreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('salesreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
  $totalsales = \DB::table('madeexpenses')
   
      ->where('category', '=', 3458)
     ->whereBetween('datemade', [$startdate, $enddate])
     ->sum('amount');
      return $totalsales;
  
  
  
 
}

public function operationsexpensestotal()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $startdate  = \DB::table('salesreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('salesreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
  $totalsales = \DB::table('madeexpenses')
   
      ->where('category', '=', 3456)
     ->whereBetween('datemade', [$startdate, $enddate])
     ->sum('amount');
      return $totalsales;
  
  
  
 
}










public function incomestatementotherincomes()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $startdate  = \DB::table('salesreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('salesreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
  $totalsales = \DB::table('companyincomes')
   
  //  ->where('datedone', '=', $dateinquestion)
     ->whereBetween('daterecieved', [$startdate, $enddate])
     ->sum('amount');
      return $totalsales;
  
  
  
 
}

public function incomestatementgrossprofit()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $startdate  = \DB::table('salesreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('salesreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
  $totalsales = \DB::table('salessummaries')
   
  //  ->where('datedone', '=', $dateinquestion)
     ->whereBetween('invoicedate', [$startdate, $enddate])
     ->sum('lineprofit');
      return $totalsales;
  
  
  
 
}


public function incomestatementcostofsales()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $startdate  = \DB::table('salesreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('salesreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
  $totalsales = \DB::table('salessummaries')
   
  //  ->where('datedone', '=', $dateinquestion)
     ->whereBetween('invoicedate', [$startdate, $enddate])
     ->sum('totalcost');
      return $totalsales;
  
  
  
 
}











public function incomestatementclosingstock()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $startdate  = \DB::table('salesreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('salesreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');



  $openningst  = \DB::table('stockvalues')->where('dateinaction', $startdate)->orderBy('id', 'Desc')->limit(1)->value('closingstock');
  // $totalsales = \DB::table('salessummaries')
   
  // //  ->where('datedone', '=', $dateinquestion)
  //    ->whereBetween('invoicedate', [$startdate, $enddate])
  //    ->sum('invoiceamount');
      return $openningst;
  
  
  
 
}
  
public function incomestatementopenningstock()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $startdate  = \DB::table('salesreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('salesreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');



  $openningst  = \DB::table('stockvalues')->where('dateinaction', $startdate)->orderBy('id', 'Desc')->limit(1)->value('openningstock');
  // $totalsales = \DB::table('salessummaries')
   
  // //  ->where('datedone', '=', $dateinquestion)
  //    ->whereBetween('invoicedate', [$startdate, $enddate])
  //    ->sum('invoiceamount');
      return $openningst;
  
  
  
 
}
  
public function incomestatementstartdate()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $incomestatementstartdate  = \DB::table('salesreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  
  // $totalsales = \DB::table('dailyreportcodes')
   
  //  ->where('monthmade', '=', $monthtoview)
  //  ->where('yearmade', '=', $yearview)
  //  ->where('branch', '=', $branchtoview)
  //  ->sum('daypayoutamount');
    return $incomestatementstartdate;
  
 
}


public function incomestatementenddate()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $incomestatementstartdate  = \DB::table('salesreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
  
  // $totalsales = \DB::table('dailyreportcodes')
   
  //  ->where('monthmade', '=', $monthtoview)
  //  ->where('yearmade', '=', $yearview)
  //  ->where('branch', '=', $branchtoview)
  //  ->sum('daypayoutamount');
    return $incomestatementstartdate;
  
 
}































////////////////////////////////////////
public function payoutmonthly()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $yearview  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearname');
  $monthtoview  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
  $branchtoview  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchname');
  // $monthtoview  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $totalsales = \DB::table('dailyreportcodes')
   
   ->where('monthmade', '=', $monthtoview)
   ->where('yearmade', '=', $yearview)
   ->where('branch', '=', $branchtoview)
   ->sum('daypayoutamount');
    return $totalsales;
  
 
}
public function mothlyreportyear()
{
/// Getting the Logged in User details
$userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;
$usercompany =  auth('api')->user()->companyname;
$usercountry =  auth('api')->user()->countryname;

     
  $currentdate = date('Y-m-d');
  $yearview  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearname');
  
  return $yearview;
}















public function generalreportselectedenddate()
{
/// Getting the Logged in User details
$userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;

    
 $currentdate = date('Y-m-d');
 $yearview  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
//  $monthtoview  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
//  $branchtov  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchname');

 return $yearview;
}

public function generalreportselectedstartdate()
{
/// Getting the Logged in User details
$userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;

    
 $currentdate = date('Y-m-d');
 $yearview  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
//  $monthtoview  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
//  $branchtov  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchname');

 return $yearview;
}









































public function selectedbranchreportmonth()
{
/// Getting the Logged in User details
$userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;

    
 $currentdate = date('Y-m-d');
 $yearview  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearname');
 $monthtoview  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
 $branchtov  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchname');

 return $monthtoview;
}

public function selecteddailyexpensesreport2()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $yearview  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
 
  return $yearview;
}
public function selecteddailyexpensesreport()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $yearview  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
 
  return $yearview;
}


public function seleceteddatefordailyreportenddate()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $yearview  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
 
  return $yearview;
}

public function seleceteddatefordailyreport()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $yearview  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
 
  return $yearview;
}

public function branchandmonthreport()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

  // $yearview  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearname');
  $monthtoview  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
  return $monthtoview;
}

public function branchandyearreport()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $yearview  = DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearname');
 // $monthtoview  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
  return $yearview;
}

public function mothlyreportyearexpenses()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $yearview  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearname');
  $monthtoview  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
  return $yearview;
}
public function mothlyreportmonthexpenses()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $yearview  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearname');
  $monthtoview  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
  return $monthtoview;
}
public function mothlyreportmonth()
{
/// Getting the Logged in User details
$userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;
$usercompany =  auth('api')->user()->companyname;
$usercountry =  auth('api')->user()->countryname;

     
  $currentdate = date('Y-m-d');
 // $yearview  = \DB::table('monthlyreporttoviewallbranches')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearmade');
  $monthtoview  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
  return $monthtoview;
}
public function mothlyreportmonthallbrnchyear()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $yearview  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearname');
  $monthtoview  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
  return $yearview;
}

public function mothlyreportmonthallbrnchmonth()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $yearview  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearname');
  $monthtoview  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
  return $monthtoview;
}

public function collectionsmonthly()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $yearview  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearname');
  $monthtoview  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
  $branchtoview  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchname');
  // $monthtoview  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  if($branchtoview != "900")
  {
  $totalsales = \DB::table('dailyreportcodes')
   
   ->where('monthmade', '=', $monthtoview)
   ->where('yearmade', '=', $yearview)
   ->where('branch', '=', $branchtoview)
   ->sum('totalcollection');
    return $totalsales;
  }
  if($branchtoview == "900")
  {
  $totalsales = \DB::table('dailyreportcodes')
   
   ->where('monthmade', '=', $monthtoview)
   ->where('yearmade', '=', $yearview)
  // ->where('branch', '=', $branchtoview)
   ->sum('totalcollection');
    return $totalsales;
  }
 
}






public function capitalaccountcurrentbalance()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
 $currentdate = date('Y-m-d');
  return $startdate  = \DB::table('expensewalets')->where('id', 2)->value('bal');
}


public function pettycashaccountcurrentbalance()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

 $currentdate = date('Y-m-d');
  return $startdate  = \DB::table('expensewalets')->where('id', 3)->value('bal');
 
}




public function bankaccountcurrentbalance()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  return $startdate  = \DB::table('expensewalets')->where('id', 4)->value('bal');
 
}


public function myshopbalance()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
 $companyname =  auth('api')->user()->companyname;
 $countryname =  auth('api')->user()->countryname;

     
  $currentdate = date('Y-m-d');
 return $startdate  = \DB::table('branchcashstandings')
 ->where('branch',$userbranch)
 ->where('companyname', $companyname)
 ->where('countryname', $countryname)
 ->value('outstanding');
  
 
}
public function collectionsaccountcurrentbalance()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
 $companyname =  auth('api')->user()->companyname;
 $countryname =  auth('api')->user()->countryname;

     
  $currentdate = date('Y-m-d');
 return $startdate  = \DB::table('expensewalets')
 ->where('walletno', 1)
 ->where('companyname', $companyname)
 ->where('countryname', $countryname)
 ->value('bal');
  
 
}

////////////////////////////////////////////

public function totalrangecredits()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $startdate  = \DB::table('collectionreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('collectionreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
  $branch  = \DB::table('collectionreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branch');
  if($branch == "900")
  {
    $totalsales = \DB::table('couttransfers')
   
    //  ->where('datedone', '=', $dateinquestion)
       ->whereBetween('transferdate', [$startdate, $enddate])
       ->sum('amount');
        return $totalsales;
      
  }
  if($branch != "900")
  {
    $totalsales = \DB::table('couttransfers')
   
       ->where('branchto', '=', $branch)
       ->whereBetween('transferdate', [$startdate, $enddate])
       ->sum('amount');
        return $totalsales;
      
  }
 
}

public function totalrangeincome()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $startdate  = \DB::table('collectionreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('collectionreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
  $branch  = \DB::table('collectionreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branch');
  if($branch == "900")
  {
    $totalsales = \DB::table('dailyreportcodes')
   
    
       ->whereBetween('datedone', [$startdate, $enddate])
       ->sum('totalprofit');
        return $totalsales;
      
  }
  if($branch != "900")
  {
    $totalsales = \DB::table('dailyreportcodes')
   
       ->where('branch', '=', $branch)
       ->whereBetween('datedone', [$startdate, $enddate])
       ->sum('totalprofit');
        return $totalsales;
      
  }
 
}


public function totalcodecredits()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $branch = DB::table('floatcodesperformances')->where('ucret', $userid)->value('branch');
     $codeinuse = DB::table('floatcodesperformances')->where('ucret', $userid)->value('codeinuse');
  
    $totalsales = \DB::table('dailyreportcodes')
    ->where('branch', '=', $branch)
   ->where('machineunlockcode', '=', $codeinuse)
     //  ->whereBetween('transferdate', [$startdate, $enddate])
       ->sum('totalcredits');

      
        return ($totalsales);
      
  }
public function tatalgeneratedbythecode()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $branch = DB::table('floatcodesperformances')->where('ucret', $userid)->value('branch');
     $codeinuse = DB::table('floatcodesperformances')->where('ucret', $userid)->value('codeinuse');
  
    $totalsales = \DB::table('dailyreportcodes')
    ->where('branch', '=', $branch)
   ->where('machineunlockcode', '=', $codeinuse)
     //  ->whereBetween('transferdate', [$startdate, $enddate])
       ->sum('daysalesamount');

       $totalpayout = \DB::table('dailyreportcodes')
       ->where('branch', '=', $branch)
      ->where('machineunlockcode', '=', $codeinuse)
        //  ->whereBetween('transferdate', [$startdate, $enddate])
          ->sum('daypayoutamount');
        return ($totalsales - $totalpayout);
      
  }
public function totalrangecollections()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $startdate  = \DB::table('collectionreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('collectionreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
  $branch  = \DB::table('collectionreporttoviews')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branch');
  if($branch == "900")
  {
    $totalsales = \DB::table('cintransfers')
   
    //  ->where('datedone', '=', $dateinquestion)
       ->whereBetween('transferdate', [$startdate, $enddate])
       ->sum('amount');
        return $totalsales;
      
  }
  if($branch != "900")
  {
    $totalsales = \DB::table('cintransfers')
   
       ->where('branchto', '=', $branch)
       ->whereBetween('transferdate', [$startdate, $enddate])
       ->sum('amount');
        return $totalsales;
      
  }
 
}


public function dailytotalsales()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $startdate  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
  $branch  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branch');
  if($branch == "900")
  {
    $totalsales = \DB::table('dailyreportcodes')
   
    //  ->where('datedone', '=', $dateinquestion)
       ->whereBetween('datedone', [$startdate, $enddate])
       ->sum('daysalesamount');
        return $totalsales;
      
  }
  if($branch != "900")
  {
    $totalsales = \DB::table('dailyreportcodes')
   
       ->where('branch', '=', $branch)
       ->whereBetween('datedone', [$startdate, $enddate])
       ->sum('daysalesamount');
        return $totalsales;
      
  }
 
}
public function dailytotalpayout()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $startdate  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
  $branch  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branch');
  if($branch == "900")
  {
  $totalsales = \DB::table('dailyreportcodes')
   
//  ->where('datedone', '=', $dateinquestion)
   ->whereBetween('datedone', [$startdate, $enddate])
   ->sum('daypayoutamount');
    return $totalsales;
  }
///////////////$branch  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branch');
  if($branch != "900")
  {
    $totalsales = \DB::table('dailyreportcodes')
   
  ->where('branch', '=', $branch)
   ->whereBetween('datedone', [$startdate, $enddate])
   ->sum('daypayoutamount');
    return $totalsales;
  }
 
}
public function dailycollection()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $startdate  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
  // $monthtoview  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
  // $branchtoview  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchname');
  // // $monthtoview  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $totalsales = \DB::table('dailyreportcodes')
   
//  ->where('datedone', '=', $dateinquestion)
   ->whereBetween('datedone', [$startdate, $enddate])
   ->sum('totalcollection');
    return $totalsales;
  
 
}













































































public function salestotalmonthly()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $yearview  = \DB::table('monthlyreporttoviewallbranches')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearname');
  $monthtoview  = \DB::table('monthlyreporttoviewallbranches')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
  $branchtoview  = \DB::table('monthlyreporttoviewallbranches')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchname');
  // $monthtoview  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $totalsales = \DB::table('dailyreportcodes')
   
   ->where('monthmade', '=', $monthtoview)
   ->where('yearmade', '=', $yearview)
  // ->where('branch', '=', $branchtoview)
   ->sum('daysalesamount');
    return $totalsales;
  
 
}

public function selectedmonthlyreport()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $detoinact  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  
  $totalsales = \DB::table('dailyreportcodes')
   
   ->where('datedone', '=', $detoinact)
  //  ->where('transferdate', '=', $currentdate)
  //  ->where('status', '=', 1)
   ->sum('daysalesamount');
    return $totalsales;
  
 
}




public function expensefrominvestmentmonth()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $startdate  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');

  $branch  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branch');
  $monthname  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
  $yearname  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearname');
  $walletname  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('walletname');

  $categoryname  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('categoryname');
  $typename  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('typename');

  $totalsales = \DB::table('madeexpenses')
  ->where('monthmade', '=', $monthname)
  ->where('yearmade', '=', $yearname)
  //->where('branch', '=', $branch)
 ->where('approvalstate', '=', 1)
 ->where('walletexpense', '=', 2)
    ->sum('amount');
    return $totalsales;
  
 
}







public function expensefromcollectionmonth()
{
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

 $currentdate = date('Y-m-d');
  $startdate  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
  $branch  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branch');
  $monthname  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
  $yearname  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearname');
  $walletname  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('walletname');
  $categoryname  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('categoryname');
  $typename  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('typename');

  $totalsales = \DB::table('madeexpenses')
 ->where('monthmade', '=', $monthname)
 ->where('yearmade', '=', $yearname)
->where('walletexpense', '=', 1)
->where('approvalstate', '=', 1)
   ->sum('amount');
    return $totalsales;
}

public function branchmonthexpensefrominvestmentmonth()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $startdate  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');

  $branch  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branch');
  $monthname  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
  $yearname  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearname');
  $walletname  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('walletname');

  $categoryname  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('categoryname');
  $typename  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('typename');

  $totalsales = \DB::table('madeexpenses')
  ->where('monthmade', '=', $monthname)
  ->where('yearmade', '=', $yearname)
  ->where('branch', '=', $branch)
 ->where('approvalstate', '=', 1)
 ->where('walletexpense', '=', 2)
    ->sum('amount');
    return $totalsales;
  
 
}


public function branchmonthexpensefromcollectionmonth()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $startdate  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');

  $branch  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branch');
  $monthname  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
  $yearname  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearname');
  $walletname  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('walletname');

  $categoryname  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('categoryname');
  $typename  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('typename');

  $totalsales = \DB::table('madeexpenses')
  ->where('monthmade', '=', $monthname)
  ->where('yearmade', '=', $yearname)
  ->where('branch', '=', $branch)
 ->where('approvalstate', '=', 1)
 ->where('walletexpense', '=', 1)
    ->sum('amount');
    return $totalsales;
  
 
}



public function rangeexpensesinvestment()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $startdate  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');

  $branch  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branch');
  $monthname  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
  $yearname  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearname');
  $walletname  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('walletname');

  $categoryname  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('categoryname');
  $typename  = \DB::table('expensesreporttoviewdetails')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('typename');
if($branch == "900")
{
  $totalsales = \DB::table('madeexpenses')
  //->where('monthmade', '=', $monthname)
 // ->where('yearmade', '=', $yearname)
 // ->where('branch', '=', $branch)
 //->whereBetween('datemade', [$startdat, $enddate])
 //->where('approvalstate', '=', 1)
// ->where('walletexpense', '=', 1)
    ->sum('amount');
    return $totalsales;
}
if($branch != "900")
{
  $totalsales = \DB::table('madeexpenses')
  ->where('monthmade', '=', $monthname)
  ->where('yearmade', '=', $yearname)
  ->where('branch', '=', $branch)
 ->where('approvalstate', '=', 1)
 ->where('walletexpense', '=', 1)
    ->sum('amount');
    return $totalsales;
}
  
 
}

























public function totalmonthlyprofitselectedreport()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->mmaderole;
 $usercompany =  auth('api')->user()->companyname;
 $usercountry =  auth('api')->user()->countryname;
 $usertype =  auth('api')->user()->type;
     
  $currentdate = date('Y-m-d');
  $monthto  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
  $yearto  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearname');
  $branch  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branch');
  $countryname  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('countryname');
  $companyname  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('companyname');
  
  
  if($usertype != "1")

  {                  
          if($userrole == "101")    
          {
           
            $totalsales = \DB::table('dailyreportcodes')
            
          ->where('monthmade', '=', $monthto)
          ->where('yearmade', '=', $yearto)
          ->where('branch', '=', $userbranch)
          ->where('companyname', '=', $usercompany)
          ->where('countryname', '=', $usercountry)
            //  ->where('status', '=', 1)
            ->sum('totalprofit');
              return $totalsales;
            
          } 
          //// End of branch Manager
                            if($userrole != "101")
                            {
                                     
                                            if($branch == "900")
                                            
                                            {
                                            $totalsales = \DB::table('dailyreportcodes')
                                            
                                          ->where('monthmade', '=', $monthto)
                                          ->where('yearmade', '=', $yearto)

                                          ->where('companyname', '=', $usercompany)
                                          ->where('countryname', '=', $usercountry)
                                            //  ->where('status', '=', 1)
                                            ->sum('totalprofit');
                                              return $totalsales;
                                            }
                                            if($branch != "900")
                                          
                                            {
                                            $totalsales = \DB::table('dailyreportcodes')
                                            
                                          ->where('monthmade', '=', $monthto)
                                          ->where('yearmade', '=', $yearto)
                                          ->where('branch', '=', $branch)
                                          ->where('companyname', '=', $usercompany)
                                          ->where('countryname', '=', $usercountry)
                                            //  ->where('status', '=', 1)
                                            ->sum('totalprofit');
                                              return $totalsales;
                                            }
                            } /// end of if the userrole is not Branch manager 


          }/// end of usertype != superadmin
  if($usertype == "1")
  {                              
                                if($branch == "900")
                              
                                {
                                $totalsales = \DB::table('dailyreportcodes')
                                
                              ->where('monthmade', '=', $monthto)
                              ->where('yearmade', '=', $yearto)

                              ->where('companyname', '=', $companyname)
                              ->where('countryname', '=', $countryname)
                                //  ->where('status', '=', 1)
                                ->sum('totalprofit');
                                  return $totalsales;
                                }
                                if($branch != "900")
                              
                                {
                                $totalsales = \DB::table('dailyreportcodes')
                                
                              ->where('monthmade', '=', $monthto)
                              ->where('yearmade', '=', $yearto)
                              ->where('branch', '=', $branch)
                              ->where('companyname', '=', $companyname)
                              ->where('countryname', '=', $countryname)
                                //  ->where('status', '=', 1)
                                ->sum('totalprofit');
                                  return $totalsales;
                                }
          }/// end of usertype == superadmin
 
}


public function totalmonthlycollectionsselectedreport()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $usertype =  auth('api')->user()->type;
 $userrole =  auth('api')->user()->mmaderole;
 $usercompany =  auth('api')->user()->companyname;
 $usercountry =  auth('api')->user()->countryname;
     
  $currentdate = date('Y-m-d');
  $monthto  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
  $yearto  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearname');
  $branch  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branch');
  $countryname  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('countryname');
  $companyname  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('companyname');


if($usertype != "1")
{
  if($userrole == "101")
  {
                                 
                                                {
                                                  $totalsales = \DB::table('cintransfers')
                                                  
                                                  ->where('monthmade', '=', $monthto)
                                                  ->where('yearmade', '=', $yearto)
                                                  ->where('branchto', '=', $userbranch)
                                                  ->where('companyname', '=', $usercompany)
                                                  ->where('countryname', '=', $usercountry)
                                                ->where('status', '=', 1)
                                                ->sum('amount');
                                                    return $totalsales;
                                                } 
}///////////////////////////////////////////////////////////////////////////////////
  if($userrole != "101")
  {
                                    if($branch == "900")
                                  {
                                    $totalsales = \DB::table('cintransfers')
                                    
                                    ->where('monthmade', '=', $monthto)
                                    ->where('yearmade', '=', $yearto)
                                    ->where('companyname', '=', $usercompany)
                                  ->where('countryname', '=', $usercountry)
                                  ->where('status', '=', 1)
                                    ->sum('amount');
                                      return $totalsales;
                                  } 
                                                if($branch != "900")
                                                {
                                                  $totalsales = \DB::table('cintransfers')
                                                  
                                                  ->where('monthmade', '=', $monthto)
                                                  ->where('yearmade', '=', $yearto)
                                                  ->where('branchto', '=', $branch)
                                                  ->where('companyname', '=', $usercompany)
                                                  ->where('countryname', '=', $usercountry)
                                                ->where('status', '=', 1)
                                                ->sum('amount');
                                                    return $totalsales;
                                                } 
}///////////////////////////////////////////////////////////////////////////////////
}
///////////////////////////////////////////////////



 if($usertype == "1")
{
  
  if($branch == "900")
 {
  $totalsales = \DB::table('cintransfers')
   
  ->where('monthmade', '=', $monthto)
  ->where('yearmade', '=', $yearto)
  ->where('companyname', '=', $companyname)
 ->where('countryname', '=', $countryname)
 ->where('status', '=', 1)
   ->sum('amount');
    return $totalsales;
 } 
 if($branch != "900")
 {
  $totalsales = \DB::table('cintransfers')
   
  ->where('monthmade', '=', $monthto)
  ->where('yearmade', '=', $yearto)
  ->where('branchto', '=', $branch)
  ->where('companyname', '=', $companyname)
 ->where('countryname', '=', $countryname)
 ->where('status', '=', 1)
 ->sum('amount');
    return $totalsales;
 }
 } /// end of super admin
 
}

public function totalmonthlysalesselectedreport()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $usertype =  auth('api')->user()->type;
 $userrole =  auth('api')->user()->mmaderole;
 $usercompany =  auth('api')->user()->companyname;
 $usercountry =  auth('api')->user()->countryname;
     
 $monthto  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
 $yearto  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearname');
 $branch  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branch');
 $countryname  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('countryname');
 $companyname  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('companyname');

 if($usertype != "1")

{ 
  if($userrole == "101")    
  {
       

  $totalsales = \DB::table('dailyreportcodes')
  ->where('branch', '=', $userbranch)
   ->where('monthmade', '=', $monthto)
   ->where('yearmade', '=', $yearto)
   ->where('companyname', '=', $usercompany)
   ->where('countryname', '=', $usercountry)
  ->sum('daysalesamount');
    return $totalsales;
          
}
  /////////////// end of branch manager 
  if($userrole != "101")    
  {
       
 if($branch == "900")
 
{ 
  $totalsales = \DB::table('dailyreportcodes')
  
   ->where('monthmade', '=', $monthto)
   ->where('yearmade', '=', $yearto)
   ->where('companyname', '=', $usercompany)
   ->where('countryname', '=', $usercountry)
  ->sum('daysalesamount');
    return $totalsales;
  }
  if($branch != "900")
 
{ $totalsales = \DB::table('dailyreportcodes')
  
   ->where('monthmade', '=', $monthto)
   ->where('yearmade', '=', $yearto)
   ->where('branch', '=', $branch)
   ->where('companyname', '=', $usercompany)
   ->where('countryname', '=', $usercountry)
  ->sum('daysalesamount');
    return $totalsales;
  }
}/////////////////////////end of nob branch manager role



}///////////////////////////////////////////////////////////////////// end of non super admin
 if($usertype == "1")

{                  
       
 if($branch == "900")
 
{ $totalsales = \DB::table('dailyreportcodes')
  
   ->where('monthmade', '=', $monthto)
   ->where('yearmade', '=', $yearto)
   ->where('companyname', '=', $companyname)
   ->where('countryname', '=', $countryname)
  ->sum('daysalesamount');
    return $totalsales;
  }
  if($branch != "900")
 
{ $totalsales = \DB::table('dailyreportcodes')
  
   ->where('monthmade', '=', $monthto)
   ->where('yearmade', '=', $yearto)
   ->where('branch', '=', $branch)
   ->where('companyname', '=', $companyname)
   ->where('countryname', '=', $countryname)
  ->sum('daysalesamount');
    return $totalsales;
  }
}///////////////////////////////////////////////////////////////////// end of super admin
 
}

public function totalmonthlypayoutselectedreport()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $usertype =  auth('api')->user()->type;
 $userrole =  auth('api')->user()->mmaderole;
 $usercompany =  auth('api')->user()->companyname;
 $usercountry =  auth('api')->user()->countryname;

 $monthto  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('monthname');
 $yearto  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('yearname');
 $branch  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branch');
 $countryname  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('countryname');
 $companyname  = \DB::table('fishreportselections')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('companyname');
 
 
 
 
 if($usertype != "1")
 {
  if($userrole == "101")
  {
 
  
  $totalsales = \DB::table('dailyreportcodes')
   
    ->where('monthmade', '=', $monthto)
    ->where('yearmade', '=', $yearto)
    ->where('branch', '=', $userbranch)
    ->where('companyname', '=', $usercompany)
    ->where('countryname', '=', $usercountry)
   ->sum('daypayoutamount');
     return $totalsales;
 }
 /////////////////// End of branch Manager
  if($userrole != "101")
  {
 
 if($branch == "900")
  
 {
  
  $totalsales = \DB::table('dailyreportcodes')
   
    ->where('monthmade', '=', $monthto)
    ->where('yearmade', '=', $yearto)
    ->where('companyname', '=', $usercompany)
    ->where('countryname', '=', $usercountry)
   ->sum('daypayoutamount');
     return $totalsales;
 }
 if($branch != "900")
 
 {
  $totalsales = \DB::table('dailyreportcodes')
   
  ->where('monthmade', '=', $monthto)
  ->where('yearmade', '=', $yearto)
  ->where('branch', '=', $branch)
  ->where('companyname', '=', $usercompany)
  ->where('countryname', '=', $usercountry)
 ->sum('daypayoutamount');
   return $totalsales;
 } 

 }/////////////////////////////////end of Admin Role







} ///////////////////////////////////////////////////// End of  None super admin

 if($usertype == "1")
 {
 if($branch == "900")
  
 {
  
  $totalsales = \DB::table('dailyreportcodes')
   
    ->where('monthmade', '=', $monthto)
    ->where('yearmade', '=', $yearto)
    ->where('companyname', '=', $companyname)
    ->where('countryname', '=', $countryname)
   ->sum('daypayoutamount');
     return $totalsales;
 }
 if($branch != "900")
 
 {
  $totalsales = \DB::table('dailyreportcodes')
   
  ->where('monthmade', '=', $monthto)
  ->where('yearmade', '=', $yearto)
  ->where('branch', '=', $branch)
  ->where('companyname', '=', $companyname)
  ->where('countryname', '=', $countryname)
 ->sum('daypayoutamount');
   return $totalsales;
 } 

} ///////////////////////////////////////////////////// End of super admin



}

































public function selecteddatetotalsales()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  $startdate  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('startdate');
  $enddate  = \DB::table('sortlistreportaccesses')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('enddate');
  $totalsales = \DB::table('dailyreportcodes')
   
  //  ->where('datedone', '=', $detoinact)
   ->whereBetween('datedone', [$startdate, $enddate])
  //  ->where('transferdate', '=', $currentdate)
  //  ->where('status', '=', 1)
   ->sum('daysalesamount');
    return $totalsales;
  
 
}

public function todayscashintotal()
{
/// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;

     
  $currentdate = date('Y-m-d');
  if($userrole == '101')
  {    
  $totalbranchopenning = \DB::table('couttransfers')
   
   ->where('branchto', '=', $userbranch)
   ->where('transferdate', '=', $currentdate)
   ->where('status', '=', 1)
   ->sum('amount');
    return $totalbranchopenning;
  }
  if($userrole != '101')
  {    
  $totalbranchopenning = \DB::table('couttransfers')
   
  // ->where('branchto', '=', $userbranch)
   ->where('transferdate', '=', $currentdate)
   ->where('status', '=', 1)
   ->sum('amount');
    return $totalbranchopenning;
  }

}
public function todayscashouttotal()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

  
   //  $openningbalance  = Branchcasstanding::latest('id')->where('branch', $userbranch)->value('outstanding');
    // $dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
  
     
    $currentdate = date('Y-m-d');
   $totalbranchopenning = \DB::table('cintransfers')
   
    ->where('branchto', '=', $userbranch)
    ->where('transferdate', '=', $currentdate)
    ->where('status', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('amount');
    return $totalbranchopenning;
}


}
public function todaysexpensestotal()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

  
   //  $openningbalance  = Branchcasstanding::latest('id')->where('branch', $userbranch)->value('outstanding');
    // $dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
  
     
    $currentdate = date('Y-m-d');
   $totalbranchopenning = \DB::table('madeexpenses')
   
    ->where('branch', '=', $userbranch)
    ->where('datemade', '=', $currentdate)
    ->where('approvalstate', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('amount');
    return $totalbranchopenning;
}

}




public function todayspayouttotal()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

  
   //  $openningbalance  = Branchcasstanding::latest('id')->where('branch', $userbranch)->value('outstanding');
    // $dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
  
     
    $currentdate = date('Y-m-d');
   $totaldayspayout = \DB::table('branchpayouts')
   
    ->where('bpaying', '=', $userbranch)
    ->where('datepaid', '=', $currentdate)
   // ->where('approvalstate', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('amount');
    return $totaldayspayout;
}

}

























/////////////////////////////////////////////////////////////////
public function shopopenningpalance()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

  
   //  $openningbalance  = Branchcasstanding::latest('id')->where('branch', $userbranch)->value('outstanding');
    // $dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
  
     
    $currentdate = date('Y-m-d');
   $totalbranchopenning = \DB::table('branchcashstandings')
   
    ->where('branch', '=', $userbranch)
   // ->where('datepaid', '=', $currentdate)
   // ->where('approvalstate', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('outstanding');
    return $totalbranchopenning;
}

}
///////////////////////////////////////////////////////////////////////////////


public function totalnumberofdaysforcode()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;
//////////
$branch = DB::table('floatcodesperformances')->where('ucret', $userid)->value('branch');
$codeinuse = DB::table('floatcodesperformances')->where('ucret', $userid)->value('codeinuse');

 $numbero = \DB::table('dailyreportcodes')

    ->where('branch', '=', $branch)
    ->where('machineunlockcode', '=', $codeinuse)
    ->count();

    return $numbero;
   
}



public function dailyfishreportAccessComponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

$comp ='dailyreportscomponentvue';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}


public function getallowedtomanageadate()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "dailybranchreportcomponent";
$actonaddnew = 'addnew';

$wordCount = \DB::table('mycomponentfeatures')
  ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}
public function genrealfishreportsAccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

$comp ='fishreportsgeneral';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}







public function mainmenuaccessComponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

$comp ='mainmenucomponentsvue';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}






public function netvatvatcomponentcomponentaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='netvatvatcomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}


public function bankwalletcomponentaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='bankwalletcomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

public function inputvatcomponentaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='outputvacomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function outputcomponentaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='outputvacomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}


public function branchwalletcomponentaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='branchwalletcomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}




public function administratorcomponentaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='administratortwalletcomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}














public function generalPointofsalecomponentaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='generalPointofsalecomponentaccess';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function loidrerror()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

    return $assignedrole;
   
}
public function loidtypeerror()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $usertype =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

  
    return $usertype;
   
}


public function generalcomponentaccessComponentfeatures()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='formcomponentsmanagement';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
/////////////// Expenses catiomdmmd
public function componentaccessExpensecategories()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='expensecategorycomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

public function componentaccessExpensetype()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='expensetypecomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}



////////////////////////// f
































///////////////////////////////////////////////////////////////


public function gencomponentaccessCompanyincomes()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='generalecompanyincomes';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}


public function gencomponentaccessExpenses()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='generalexpensescomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

public function existsausercreditcustomer()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

 $roleisallowedtoaccess = \DB::table('custinactionsprofs')
    ->where('ucret', '=', $userid)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function gencomponentaccessCahtransactions()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='gencashtransactionsComp';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}


public function categoriesComponentaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='categoriesComponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function brandsComponentaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='brandsComponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function unitsofmeasureComponentaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='unitsofmeasureComponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function companyproductsComponentaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='companyproductsComponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function purchasesComponentaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='purchasesComponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function purchaserecordsComponentaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='purchaserecordsComponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

public function salesdetailsComponentaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='salesdetailsComponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
















































































public function generalProductscomponentAccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='generalProductscomponentAccess';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}










public function gencomponentaccessHrms()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='gencomponentaccessHrms';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

// ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss


public function generalExpensesmainpageAccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='generalexpensesmaincomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

//////////////////////

public function allowedexpensecategories()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='generalexpensecategoriescomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

public function allowedrequestexpenses()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='generalexpenserequestscomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}


public function allowedmonthlyexpenses()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='collectionsaccountbalancecomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}



public function allowedcompanyexpenses()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='generalregisteredcompanyexpensescomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}


public function allowedtoseebranchaccountbalance()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='branchaccountbalancecomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

public function allowedtoseecollectionsaccount()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='collectionsaccountbalancecomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}


public function allowedtosepettycashaccount()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='pettycashaccountbalancecomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}




public function allowedtoseebankaccount()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='bankaccountbalancecomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}


public function allowedtoseeadminaccount()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='adminaccountbalancecomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}












public function candocredits()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "shopcreditscomponent";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}



public function candocollections()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "shopcollectionscomponent";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}










public function candeletecredit()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "shopcreditscomponent";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}
public function candeletecollection()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "shopcollectionscomponent";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}

public function caneditcredits()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "shopcreditscomponent";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}

public function caneditcollections()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "shopcollectionscomponent";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}

public function candoshopbalancing()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "bettingshopbalancingcomponent";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}










////////////////////////////////////////////////////////////////////////////////

public function allowedbranchstandingcomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='shopstandingcomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

public function allowedcreditscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='shopcreditscomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}



public function allowedcollectionscomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='shopcollectionscomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}



public function allowedshopbalancingcomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='bettingshopbalancingcomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

//////////////////////////////////////////////


public function allowedadilysalesreportcomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='dailysalesreportcomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

public function allowedgenealsalesreportcomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='generalsalesreportcomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function allowedmonthlysalesreportcomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;


  
$comp ='monthlysalesreportcomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function allowedabranchperformancesalesreportcomponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;


  
$comp ='branchperformancesalesreportcomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
















////////////////////////////////////////////////////////































public function generalsalesreportaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='sportsbettingsalesreport';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

// sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss
public function generalsportsfinancialsaccessSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='sportsfinancialscomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}













public function generalcomponentaccessSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='generalcomponentaccessSettings';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
///////----------------------------------------------------------------///////////////////

public function getAddnewpayout()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "payoutcomponent-branch";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}

public function getauthorisedtransferlist()
{
 
$data = User::latest('id')
->where('haswalet', 1)
//->where('id','!=', $userid)
->get();
    return response()->json($data);
}
public function getExpensestomake()
{
  $userid =  auth('api')->user()->id;
     $userbranch =  auth('api')->user()->branch;
    $userrole =  auth('api')->user()->mmaderole; 
    $usertype =  auth('api')->user()->type; 


   
$data = Expense::latest('id')
//->where('collectionswallet', 1)
->get();
    return response()->json($data);
 



}

public function expensablewallets()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $usertype =  auth('api')->user()->type;
  $userrolle =  auth('api')->user()->mmaderole;
  $usercompany =  auth('api')->user()->companyname;
  $usercountry =  auth('api')->user()->countryname;
 
$data = Expensewalet::latest('id')
->where('companyname',   $usercompany )
->where('countryname',   $usercountry )
->where('spendable', 1)
->get();
    return response()->json($data);
}


public function getexpensetypeslist()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $usertype =  auth('api')->user()->type;
  $userrolle =  auth('api')->user()->mmaderole;
  $usercompany =  auth('api')->user()->companyname;
  $usercountry =  auth('api')->user()->countryname;

//if($usertype == '1')
{
  $data = Expensetype::latest('id')
//->where('del', 0)
->get();
    return response()->json($data);
  }

  // if($usertype != '1')
  // {
  //   $data = Expensescategory::latest('id')
  // ->where('del', 0)
  // ->where('companyname', $usercompany)
  // ->get();
  //     return response()->json($data);
  //   }
  }




public function getexpensecategorieslist()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $usertype =  auth('api')->user()->type;
  $userrolle =  auth('api')->user()->mmaderole;
  $usercompany =  auth('api')->user()->companyname;
  $usercountry =  auth('api')->user()->countryname;

if($usertype == '1')
{
  $data = Expensescategory::latest('id')
//->where('del', 0)
->get();
    return response()->json($data);
  }

  if($usertype != '1')
  {
    $data = Expensescategory::latest('id')
  ->where('del', 0)
  ->where('companyname', $usercompany)
  ->get();
      return response()->json($data);
    }


}










public function getWallets()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $usertype =  auth('api')->user()->type;
  $userrolle =  auth('api')->user()->mmaderole;
  $usercompany =  auth('api')->user()->companyname;
  $usercountry =  auth('api')->user()->countryname;
  $userwallet =  auth('api')->user()->mywallet;
 if($usertype == '1')
{

$data = Expensewalet::latest('id')
//->where('del', 0)
     ->get();
    return response()->json($data);

}
if($usertype != '1')
{
  if($userrolle == '100')
  {
$data = Expensewalet::latest('id')
     ->where('companyname', $usercompany)
     ->where('countryname', $usercountry)
     ->where('recievableincome', 1)
     
     ->get();
    return response()->json($data);
  }
  if($userrolle != '100')
  {
$data = Expensewalet::latest('id')
     ->where('companyname', $usercompany)
     ->where('countryname', $usercountry)
     ->where('walletno', $userwallet)
     
     ->get();
    return response()->json($data);
  }

}











  }












/// brands
public function getcompaniesd()
{
$userid =  auth('api')->user()->id;
$userbranch =  auth('api')->user()->branch;
$userrole =  auth('api')->user()->type;
//  if($userrole == 101)
{
$data = Company::latest('id')
//->where('id', $userbranch)
->get();
return response()->json($data);
}

}
////
//////////////////

public function allowedtomakecashtransfer()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $udefinedrole =  auth('api')->user()->mmaderole;

    //$data = DB::table('users')->count();
    $component = "makecashtransfercomponent";
    $actonaddnew = 'addnew';

    $wordCount = \DB::table('mycomponentfeatures')
      ->where('component', '=', $component)
        ->where('formcomponent', '=', $actonaddnew)
        ->where('rolein', '=', $udefinedrole)
        ->count();

        return $wordCount;
        
      
    }
    














/////////////////////
public function getaddnewofficeexpense()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $udefinedrole =  auth('api')->user()->mmaderole;

    //$data = DB::table('users')->count();
    $component = "makeexpenseofficecomponent";
    $actonaddnew = 'addnew';

    $wordCount = \DB::table('mycomponentfeatures')
      ->where('component', '=', $component)
        ->where('formcomponent', '=', $actonaddnew)
        ->where('rolein', '=', $udefinedrole)
        ->count();

        return $wordCount;
        
      
    }
    public function getAddnewexpenserecord()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $udefinedrole =  auth('api')->user()->mmaderole;

    //$data = DB::table('users')->count();
    $component = "branchexpenserecords-branch";
    $actonaddnew = 'addnew';

    $wordCount = \DB::table('mycomponentfeatures')
      ->where('component', '=', $component)
        ->where('formcomponent', '=', $actonaddnew)
        ->where('rolein', '=', $udefinedrole)
        ->count();

        return $wordCount;
        
      
    }


    public function geteditofficeexpense()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "makeexpenseofficecomponent";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}

    public function editbranchpayout()
    {
      $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "payoutcomponent-branch";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}

public function getdeleteofficeexpense()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "makeexpenseofficecomponent";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}
public function deletebranchpayout()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "payoutcomponent-branch";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}


public function Branchtodayscashin()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
     $branchto  = Branchtocollect::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
    /// $dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
  //  $bnames  = Branch::where('id', $branchto)->value('branchname');
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];
    $currentdate = date('Y-m-d');
   $totalcashin = \DB::table('couttransfers')
   
    ->where('branchto', '=', $branchto)
    ->where('transferdate', '=', $currentdate)
    ->where('status', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('amount');
    return $totalcashin;
}

}

public function Branchtodayspayout()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

  
     $branchto  = Branchtocollect::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
    // $dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
  
     
    $currentdate = date('Y-m-d');
   $totalpayout = \DB::table('branchpayouts')
   
    ->where('branch', '=', $branchto)
    ->where('datepaid', '=', $currentdate)
   // ->where('approvalstate', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('amount');
    return $totalpayout;
}

}

public function Branchnametocollectfrom()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
     $branchto  = Branchtocollect::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
     $bnames  = Branch::where('id', $branchto)->value('branchname');
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];
   // $bnames = \DB::table('branches')
   
  //  ->where('id', '=', $bnames)
    //->orderByDesc('id')
    //->limit(1)
  //  ->sum('clcash');
    return $bnames;
}



}

public function Branchtodayscashout()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{
  $currentdate = date('Y-m-d');
    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
     $branchto  = Branchtocollect::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
     //$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
  //  $bnames  = Branch::where('id', $branchto)->value('branchname');
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];
   $totalcashout = \DB::table('couttransfers')
   
    ->where('branchto', '=', $branchto)
    ->where('transferdate', '=', $currentdate)
    ->where('status', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('amount');
    return $totalcashout;
}

}
public function Branchtodaysexpenses()
{
   

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
     $branchto  = Branchtocollect::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
   //  $dateinquestion  = Branchtocollect::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
  //  $bnames  = Branch::where('id', $branchto)->value('branchname');
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];
    $currentdate = date('Y-m-d');
   $totalexpenses = \DB::table('madeexpenses')
   
    ->where('branch', '=', $branchto)
    ->where('datemade', '=', $currentdate)
    ->where('approvalstate', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->sum('amount');
    return $totalexpenses;
}

}


public function geteditcashcollection()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "cashcollectioncomponent-admin";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}
//////////////////////////////////////////////////

public function getaddnewcashcredit()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "cashcreditcomponent-admin";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}
public function getdeletecashcredit()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "cashcreditcomponent-admin";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}
public function geteditcashcredit()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "cashcreditcomponent-admin";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}


































public function getaddnewcashcollection()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "cashcollectioncomponent-admin";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}
public function getdeletecashcollection()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "cashcollectioncomponent-admin";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}











public function geteditbranchexpenserecord()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "branchexpenserecords-branch";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}


public function deletebranchexpenserecord()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "branchexpenserecords-branch";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}
///////////////////////////////////////

public function getaddnewexpensetype()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "expensetypescomponent";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}


public function geteditexpensetype()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "expensetypescomponent";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
 
  
}

public function getdeleteexpensetype()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "expensetypescomponent";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}


//////////////////////////////////////////////
public function getaddCompanyexpense()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "allcompanyexpenses";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}


public function geteditCompanyexpense()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "allcompanyexpenses";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
 
  
}

public function deleteCompanyexpense()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "allcompanyexpenses";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}





public function getexpensecategoriesdy()
{
    $data = Expensescategory::get();

    return response()->json($data);
}


public function getexpensetypes()
{
    $data = Expensetype::get();

    return response()->json($data);
}



// $userid =  auth('api')->user()->id;
//   $userbranch =  auth('api')->user()->branch;
//   $userrole =  auth('api')->user()->type;
//   $assignedrole =  auth('api')->user()->mmaderole;

// $comp ='componentfeaturesdetails';
//  $roleisallowedtoaccess = \DB::table('componentsaccesses')

//     ->where('componentto', '=', $comp)
//     ->where('mmaderole', '=', $assignedrole)
//     ->count();

//     return $roleisallowedtoaccess;


///////////////////////
public function allowedtoviewcapitalaccount()
{
  $comp ='minicapitalcomponent';
    $userid =  auth('api')->user()->id;
      $userbranch =  auth('api')->user()->branch;
      $userrole =  auth('api')->user()->type;
      $assignedrole =  auth('api')->user()->mmaderole;
    
    
     $roleisallowedtoaccess = \DB::table('componentsaccesses')
    
        ->where('componentto', '=', $comp)
        ->where('mmaderole', '=', $assignedrole)
        ->count();
    
        return $roleisallowedtoaccess;
  
}
public function allowedtoviewpettycashaccount()
{
 

$comp ='minipetycashcomponent';
$userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;


 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
    
  
}
public function allowedtoviewbankaccount()
{
 
  

$comp ='minibankaccountcomponent';
$userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;


 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
    
  
}
public function allowedtoviewcollectionsccount()
{
  
  

  
$comp = "minicollectionaccountcomponent";
$userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;


 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
    
  
}














































































































///////////////////////////////////////////////////////
public function allowedtodeletecollection()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "deletecollectioncomponent";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}
public function allowedtodeletecredit()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "deletecreditcomponent";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}
public function getaddnewincome()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "incomecomponent";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}











// //////////////////////////////////////////////////////////////////////////////////
public function getaddnewexpensecategory()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "expensecategoriescomponent";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}


public function geteditexpensecategory()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "expensecategoriescomponent";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
 
  
}

public function getdeleteexpensecategory()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "expensecategoriescomponent";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}























































////////////////////////////////////////////////////////////////////////////////////////////////////
public function getAddnewuser()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "branchdetailscomponent";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}


public function getviewuser()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "userdetailscomponent";
$actonaddnew = 'viewdetails';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;

  
}


public function getedituser()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "userdetailscomponent";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
 
  
}

public function getdeleteuser()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "userdetailscomponent";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
/////////////////////////////////////////////////////////////////////////////////


public function Branchnametobalancefunction()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    ///getting the branch in question
    //$branchto  = \DB::table('branchtobalances') 
   //// ->where('ucret', '=', 68)
   //  ->get();
     //$branchto = \DB::table('branchtobalances')->select('branchnametobalance')->get();
     $branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
     $bnames  = Branch::where('id', $branchto)->value('branchname');
   
  //   $branchto = \DB::table('branchtobalances')->where('ucret', '=', 68)->get();
    // $bxn = $branchto['branchnametobalance'];
   // $bnames = \DB::table('branches')
   
  //  ->where('id', '=', $bnames)
    //->orderByDesc('id')
    //->limit(1)
  //  ->sum('clcash');
    return $bnames;
}



}

///// branch trandggdjh


////////////////////////////////////////////////////////////////////////////////////

public function getAddnewmainmenu()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "mainmenucomponentsvue";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}


public function getAddnewbranch()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "branchdetailscomponent";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}



public function getviewBranch()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "branchdetailscomponent";
$actonaddnew = 'viewdetails';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;

  
}




public function geteditBrabcg()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "branchdetailscomponent";
$actonaddnew = 'editrecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
 
  
}

public function getdeletebranch()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "branchdetailscomponent";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}








////////////////////////////////////////////////
public function getRevokesubmenuaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "submenusettingscomponent";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}
public function getGrantsubmenuaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "submenucomponentsettoings";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}
////////////////////////////////////////////////
public function getRevokecomponentaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "actualcoponentsaccesscontrol";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}

public function allowedtoviewshopBalancingRecord()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "shopbalancingcomponent";
$actonaddnew = 'viewdetails';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}
public function allowedtodeleteshopBalancingRecord()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "shopbalancingcomponent";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}
public function allowedtoaddshopBalancingRecord()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "shopbalancingcomponent";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}
public function getGrantcomponentaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "mycomponentsaccess";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}
///////////////////////////////////////////////////////////////////























public function formfeaturesaccessComponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

$comp ='componentfeaturesdetails';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}




public function vuedetailsaccessComponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

$comp ='vuecomponentdetails';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}


public function submenuaccessComponent()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

$comp ='submenudetailscomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}






public function fishmachinestotal()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;


$branchto = \DB::table('branchtobalances')->where('ucret', '=', $userid)->value('branchnametobalance');
 $wordCount = \DB::table('branchesandmachines')
   ->where('branchname', '=', $branchto)
  //  ->where('formcomponent', '=', $actonaddnew)
 //   ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}


public function virtualgameproduct()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
// $component = "mainmenusettingscomponent";
$branchto = \DB::table('branchtobalances')->where('ucret', '=', $userid)->value('branchnametobalance');
$actonaddnew = 'virtual';

 $wordCount = \DB::table('branchandproducts')
 ->where('branch', '=', $branchto)
 ->where('sysname', '=', $actonaddnew)
//   ->where('rolein', '=', $udefinedrole)
 
    ->count();

    return $wordCount;
    
  
}

public function soccergameproduct()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

  $branchto = \DB::table('branchtobalances')->where('ucret', '=', $userid)->value('branchnametobalance');
  //$data = DB::table('users')->count();
  // $component = "mainmenusettingscomponent";
 
$actonaddnew = 'soccer';

 $wordCount = \DB::table('branchandproducts')
 ->where('branch', '=', $branchto)
 ->where('sysname', '=', $actonaddnew)
//   ->where('rolein', '=', $udefinedrole)
 
    ->count();

    return $wordCount;
    
  
}


public function fishgameproduct()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

  $branchto = \DB::table('branchtobalances')->where('ucret', '=', $userid)->value('branchnametobalance');
//$data = DB::table('users')->count();
// $component = "mainmenusettingscomponent";
$actonaddnew = 'fish';

 $wordCount = \DB::table('branchandproducts')
 ->where('branch', '=', $branchto)
 ->where('sysname', '=', $actonaddnew)
//   ->where('rolein', '=', $udefinedrole)
 
    ->count();

    return $wordCount;
    
  
}





public function getGrantmainmenuaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "mainmenusettingscomponent";
$actonaddnew = 'addnew';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
    
  
}


public function getRevokemainmenuaccess()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $udefinedrole =  auth('api')->user()->mmaderole;

//$data = DB::table('users')->count();
$component = "mainmenusettingscomponent";
$actonaddnew = 'deleterecord';

 $wordCount = \DB::table('mycomponentfeatures')
   ->where('component', '=', $component)
    ->where('formcomponent', '=', $actonaddnew)
    ->where('rolein', '=', $udefinedrole)
    ->count();

    return $wordCount;
  
}
///////////////////////////////////////////////////////////////l


public function machineoneopenningcode()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;
  
//////////// geting the shop to balance
//$branchto  = Currentmachinecode::latest('id')->where('branch', $userbranch)->where('machineno', '101')->orderBy('id', 'Desc')->limit(1)->value('machinecode');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
// $comp ='nebranchdetailscomponent';
$branchto  = Branchtobalance::latest('id')
->where('ucret', $userid)
//->orderBy('id', 'Desc')
//->limit(1)
->value('branchnametobalance');





  $mcode = \DB::table('currentmachinecodes')

    ->where('branch', $branchto)
   // ->where('machineno', '101')
    ->orderBy('id', 'Desc')
    ->limit(1)
    ->value('machinecode');

   return $mcode;
   ;
   
}

public function branchesaccessSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='nebranchdetailscomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

///


public function Currencysymbol()
{
    //getSinglebranchpayoutdaily
    $ed = '0';

 /// Getting the Logged in User details
 $userid =  auth('api')->user()->id;
 $userbranch =  auth('api')->user()->branch;
 $userrole =  auth('api')->user()->type;
 $compny =  auth('api')->user()->companyname;
////getting the role system name
//$rolename = DB::table('roles')->select('userrole');
//if($rolename = 'admin')
{

    //   $branchto  = Branchtocollect::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
  
    $currentdate = date('Y-m-d');
   $companycu = \DB::table('companydetails')
   
    ->where('id', '=', $compny)
  //  ->where('transferdate', '=', $currentdate)
 //   ->where('status', '=', 1)
    //->orderByDesc('id')
    //->limit(1)
    ->value('currencysymbol');
    return $companycu;
}

}
public function branchcashInSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='shopcashinComp';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function makeofficeexpenseaccessSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='makeexpenseofficecomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

public function allcompanyexpensesaccessSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='allcompanyexpenses';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function expensetypesaccessSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='expensetypescomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function capitalaccountSetting()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='capitalaccountcomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function incomeaccessSetting()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='incomecomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function bankaccountSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='bankaccountcomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function petycashaccountSetting()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='pettycashcomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

public function collectionsaccountSetting()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='collectionaccountcomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

public function cashtransferSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='cashtransfercomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}



































public function expensecategoriesaccessSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='expensecategoriescomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function branchcashOutSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='shopcashoutcomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function branchraccountbalancesSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='branchaccountscomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function useraccountbalancesSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='useraccountscomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}



public function branchesccessSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='branchdetailscomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}





public function usersccessSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='userdetailscomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

// public function branchcashInSettings()
// {
//   $userid =  auth('api')->user()->id;
//   $userbranch =  auth('api')->user()->branch;
//   $userrole =  auth('api')->user()->type;
//   $assignedrole =  auth('api')->user()->mmaderole;

// $comp ='shopcashinComp';
//  $roleisallowedtoaccess = \DB::table('componentsaccesses')

//     ->where('componentto', '=', $comp)
//     ->where('mmaderole', '=', $assignedrole)
//     ->count();

//     return $roleisallowedtoaccess;
   
// }





public function rolesaccessSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

$comp ='rolesdecompnet';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}



// public function cashcollectionofficeaccessSetting()
// {
//   $userid =  auth('api')->user()->id;
//   $userbranch =  auth('api')->user()->branch;
//   $userrole =  auth('api')->user()->type;
//   $assignedrole =  auth('api')->user()->mmaderole;

// //////////// geting the shop to balance
// //$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
// //$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
// $comp ='branchexpenserecords-branch';
//  $roleisallowedtoaccess = \DB::table('componentsaccesses')

//     ->where('componentto', '=', $comp)
//     ->where('mmaderole', '=', $assignedrole)
//     ->count();

//     return $roleisallowedtoaccess;
   
// }




public function branchexpensesaccessSetting()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='branchexpenserecords-branch';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}



public function branchpayoutaccessSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='payoutcomponent-branch';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}


public function shopbalancingaccessSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='shopbalancingcomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

// public function submenuaccessSettings()
// {
//   $userid =  auth('api')->user()->id;
//   $userbranch =  auth('api')->user()->branch;
//   $userrole =  auth('api')->user()->type;
//   $assignedrole =  auth('api')->user()->mmaderole;

// //////////// geting the shop to balance
// //$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
// //$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
// $comp ='submenusettingscomponent';
//  $roleisallowedtoaccess = \DB::table('componentsaccesses')

//     ->where('componentto', '=', $comp)
//     ->where('mmaderole', '=', $assignedrole)
//     ->count();

//     return $roleisallowedtoaccess;
   
// }



public function mainmenuaccessSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='mainmenusettingscomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}

public function submenuaccessSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='submenusettingscomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}


public function fishcreditaccessSetting()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='fishcreditcomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}


public function fishdebitaccessSetting()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='fishdebitcomponent';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function cashcreditaccessSetting()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='cashcreditcomponent-admin';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function cashcollectionaccessSetting()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='cashcollectioncomponent-admin';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}
public function featuresaccessSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='componentfeatureaccess';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}




public function componentaccessSettings()
{
  $userid =  auth('api')->user()->id;
  $userbranch =  auth('api')->user()->branch;
  $userrole =  auth('api')->user()->type;
  $assignedrole =  auth('api')->user()->mmaderole;

//////////// geting the shop to balance
//$branchto  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('branchnametobalance');
//$dateinquestion  = Branchtobalance::latest('id')->where('ucret', $userid)->orderBy('id', 'Desc')->limit(1)->value('datedone');
$comp ='mycomponentsaccess';
 $roleisallowedtoaccess = \DB::table('componentsaccesses')

    ->where('componentto', '=', $comp)
    ->where('mmaderole', '=', $assignedrole)
    ->count();

    return $roleisallowedtoaccess;
   
}










































}