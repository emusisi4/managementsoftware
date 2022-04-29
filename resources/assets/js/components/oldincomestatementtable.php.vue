

<table  class="musisireporttable" width="100%" border="1">
       <tr>
             <th colspan="1"  style="font-size: 18px;   
               border-bottom: 4px solid rgb(124 102 102);     background-color: rgb(29 31 34 / 37%); color: #131378;"> #</th>
             <th colspan="1"  style="font-size: 18px;
                 border-bottom: 4px solid rgb(124 102 102);     background-color: rgb(29 31 34 / 37%); color: #131378;">DATE</th>
           
          

              <th colspan="1"  style="font-size: 18px; text-align:center;    
               border-bottom: 4px solid rgb(124 102 102);     background-color: rgb(29 31 34 / 37%); color: #131378;"> TOTAL SALES ({{currencydetails}})</th>
              
            <th colspan="1"  style="font-size: 18px; text-align:center;    
               border-bottom: 4px solid rgb(124 102 102);     background-color: rgb(29 31 34 / 37%); color: #131378;"> TOTAL COST ({{currencydetails}})</th>
              
             <th colspan="1"  style="font-size: 18px; text-align:center;    
               border-bottom: 4px solid rgb(124 102 102);     background-color: rgb(29 31 34 / 37%); color: #131378;"> GROSS PROFIT ({{currencydetails}})</th>

                  <th colspan="1"  style="font-size: 18px; text-align:center;    
               border-bottom: 4px solid rgb(124 102 102);     background-color: rgb(29 31 34 / 37%); color: #131378;"> TOTAL OTHER INCOMES ({{currencydetails}})</th>

  <th colspan="1"  style="font-size: 18px; text-align:center;    
               border-bottom: 4px solid rgb(124 102 102);     background-color: rgb(29 31 34 / 37%); color: #131378;"> TOTAL EXPENSES ({{currencydetails}})</th>

       <th colspan="1"  style="font-size: 18px; text-align:center;    
               border-bottom: 4px solid rgb(124 102 102);     background-color: rgb(29 31 34 / 37%); color: #131378;"> NET PROFIT BEFORE OTHER TAXES ({{currencydetails}})</th>
          
        </tr>

   
          <tr v-for="prodcates in incomestatementreportrecords.data" :key="prodcates.id">
             <td>{{prodcates.id  }}</td>
 
                                 <td>{{prodcates.statementdate | myDate2 }}</td>
 
                                 <td><div class="musisialignright">  {{formatPrice(prodcates.totalsales)}} </div></td>
                                  <td><div class="musisialignright">  {{formatPrice(prodcates.totalcost)}} </div></td>
                               <td><div class="musisialignright">  {{formatPrice(prodcates.grossprofitonsales)}} </div></td>

                               



                                  <td><div class="musisialignright"> {{formatPrice(prodcates.otherincomes)}} </div></td> 
                                  <td><div class="musisialignright">  {{formatPrice(prodcates.expenses)}} </div></td>
                                    <td><div class="musisialignright">  {{formatPrice(prodcates.netprofitbeforetaxes)}} </div></td>
                            
                            

                                
                                
                                
                               
                            
                                 <!-- <td style="background-color:#eeeeee "><div class="musisialign"> {{formatPrice(prodcates.netinvoiceincome)}} </div></td>
                                 -->
     
</tr>
<tr>


<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright">  </div>
</th>
<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright">  </div>
</th>
<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright"> {{currencydetails}} {{formatPrice(totalsalesforincomestatement)}} </div>
</th>



<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright"> {{currencydetails}} {{formatPrice(totalcostforincomestatement)}} </div>
</th>

<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright"> {{currencydetails}} {{formatPrice(totalgrossprofitincomestatement)}} </div>
</th>




<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright"> {{currencydetails}} {{formatPrice(totalotherincomesforincomestatement)}} </div>
</th>





<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright"> {{currencydetails}} {{formatPrice(totalexpensesforincomestatement)}} </div>
</th>



<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright"> {{currencydetails}} {{formatPrice(totalnetprofitbeforothertaxesforincomestatements)}} </div>
</th>
    </tr>
</table>
