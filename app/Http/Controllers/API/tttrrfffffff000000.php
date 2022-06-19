<?php 

$machineresetstatus = \DB::table('machineresets')->where('branch', $inpbranch)->where('machine', '101')->orderBy('id', 'Desc')->limit(1)->value('resetdate');
     if( $machineresetstatus  != $dateinq)
{

     
     
      
     
  

  

  
      







   
    
    
     
    
     

   

     $latestfloatcode = \DB::table('dailyreportcodes')
     ->where('branch', $inpbranch)
     ->where('machineno', '101')
     ->where('countryname', '=', $countryname)
     ->where('companyname', '=', $companyname)
     ->orderBy('id', 'Desc')
     ->limit(1)
     ->value('floatcode');



$currentfcode = $request['machineonefloat'];

     if($latestfloatcode >= $currentfcode)
     {
       $timeworkedinminutes = $latestfloatcode - $currentfcode;
       $timeworkedinhours = (($latestfloatcode - $currentfcode)/60);
       $remainingtimeinhours =  ($currentfcode/60);
       $remainningtimeidays = ($currentfcode/60/24);
     }
    //  if($latestfloatcode < $currentfcode)
    //  {
    //    $timeworkedinminutes = $latestfloatcode - $currentfcode;
    //    $timeworkedinhours = (($latestfloatcode - $currentfcode)/60);
    //    $remainingtimeinhours =  ($currentfcode/60);
    //    $remainningtimeidays = ($currentfcode/60/24);
    //  }


     
 






 


/////////////////////////////////////////////////////////////























    //ooooooooooooooooooooooooooooooooooooooooooooooooooooooo
/// working and Updating the daily Codes
    /////////////////////////////////////////// checking if there is a sale or payout
  
// $curen = \DB::table('shopbalancingrecords')->where('id', '=', $id)->value('datedone');
    
}// closing if the machine was not reset 
      }///////////////////////////////////////////////////////////////////// end of super admin 





