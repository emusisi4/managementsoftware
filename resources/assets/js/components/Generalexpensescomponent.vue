

<template>

    <div>




<!-- general component access -->
<div  v-if="generalExpensesmainpageAccess > 0 "> 






        <!-- Start of the -->




 <div class="row">
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row">
                    <div
                      class="
                        round round-lg
                        text-white
                        d-flex
                        align-items-center
                        justify-content-center
                        rounded-circle
                        bg-info
                      "
                    >
                      <i
                        data-feather="credit-card"
                        class="fill-white feather-lg"
                      ></i>
                    </div>
                    <div class="ms-2 align-self-center">
                      <h3 class="mb-0">{{currencydetails}}: {{formatPrice(collectionsaccountcurrentbalance) }}</h3>
                      <h6 class="text-muted mb-0">Collections Account</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row">
                    <div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-warning" >
                      <i data-feather="monitor" class="fill-white feather-lg"></i>
                    </div>
                    <div class="ms-2 align-self-center">
                      <h3 class="mb-0"> {{currencydetails}}: {{formatPrice(pettycashaccountcurrentbalance) }}</h3>
                      <h6 class="text-muted mb-0">Petty Cash</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row">
                    <div
                      class="
                        round round-lg
                        text-white
                        d-flex
                        align-items-center
                        justify-content-center
                        rounded-circle
                        bg-primary
                      "
                    >
                      <i
                        data-feather="shopping-bag"
                        class="fill-white feather-lg"
                      ></i>
                    </div>
                    <div class="ms-2 align-self-center">
                      <h3 class="mb-0">{{currencydetails}}: {{formatPrice(admincashaccountcurrentbalance) }}</h3>
                      <h6 class="text-muted mb-0">Admin Account</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row">
                    <div
                      class="
                        round round-lg
                        text-white
                        d-flex
                        justify-content-center
                        align-items-center
                        rounded-circle
                        bg-danger
                      "
                    >
                      <i
                        data-feather="shield"
                        class="fill-white feather-lg"
                      ></i>
                    </div>
                    <div class="ms-2 align-self-center">
                      <h3 class="mb-0">{{currencydetails}}: {{formatPrice(bankaccountcurrentbalance) }}</h3>
                      <h6 class="text-muted mb-0">Bank Account</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
   </div>




<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="col-md-12">
              <div class="card">
                <div class="d-flex  border-bottom title-part-padding align-items-center ">
                  <div>
                    <h2 class="card-title mb-0"> EXPENSES DETAILS</h2>
                  </div>
               
                </div>
                <div class="card-body">
                 
                 
                  <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" v-if="allowedexpensecategories > 0 "   @click="loadExpensecategories()" href="#home" role="tab">
                          <span>Expense Categories</span>
                        </a>
                      </li>

                        <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab"  v-if="allowedcompanyexpenses > 0 " @click="loadGeneralExpenses()" href="#clientloans" role="tab">
                          <span>Expennses</span>
                        </a>
                      </li>


                      <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab"  v-if="allowedrequestexpenses > 0 "  @click="loadExpensesmadebyoffice()" href="#messages1" role="tab">
                          <span>Expense Requests</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab"  v-if="allowedmonthlyexpenses > 0 " @click="laadCompanyfixedexpenses()" href="#messages" role="tab">
                          <span>Fixed Expenses</span>
                        </a>
                      </li>


                      



                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div class="tab-pane active" id="home"  v-if="allowedexpensecategories > 0 " role="tabpanel">
                        <div class="p-3">
                              <form @submit.prevent="savemonthlyexpesedetailstosee()">
                 
                      <div class="form-group">
              

    
    

  <label for="exampleInputEmail1">Country :</label>
                 
                 

       <select name ="type" v-model="form.countryname" @change='getcompanies()' v-on:change="myClickEventtosavemonthlyreportallbranches" id ="countryname" :class="{'is-invalid': form.errors.has('countryname')}"
                                     >
                                        <option></option>
                                        <option v-for='data in countrieslist' :value='data.id'>{{ data.countryname }}</option>
                                    </select>


           
                                   

                                        <label for="password_2">Company</label>
                                  
                                               <select name ="companyname" v-model="form.companyname"  
                                             v-on:change="myClickEventtosavemonthlyreportallbranches" id ="companyname" :class="{'is-invalid': form.errors.has('companyname')}"
                                       data-live-search="true">
                                        <option></option>
                                        <option v-for='data in companieslist' :value='data.id'>{{ data.companyname }}</option>
                                    </select>
                   


  <!-- <label for="exampleInputEmail1">Branch :</label>
                 
                 

         <select name ="branchname" v-model="form.branchname" id ="branchname" v-on:change="myClickEventtosavemonthlyreportallbranches"
          :class="{'is-invalid': form.errors.has('branchname')}">
<option value="900"> All </option>
<option v-for='data in brancheslist' v-bind:value='data.id'> {{ data.branchname }}</option>

</select>
            <has-error :form="form" field="branchname"></has-error>


                              
             <button type="submit" id="submit" style="display:none;" hidden="hidden" 
             name= "submit" ref="theButtontotosalesreportmonthly" class="btn btn-primary btn-sm">Saveit</button>         

                                
                     
       
        -->
                   
          </div>


        

                </form>
          <hr>
                                     <div class="bethapa-table-header">
                    Expense categories
                   <button type="button" class="add-newm" @click="newcompanydetailsModal" >Add New </button> 
                     </div>
    
<div class="card">
          
            <div class="table-responsive">
           
            <table class="table">
                  <thead>
                    <tr>
                        <th>#</th>
                          <th>COUNTRY</th>
                            <th>COMPANY</th>
                      <th>CATEGORY NAME</th>
                      <th>DESCRIPTION</th>
                      <th>CREATED</th>
                       
                     
                     
                        <th ></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                    <tr v-for="expcat in expensecategorydetails.data" :key="expcat.id">
                      
                    <td>{{expcat.id}}</td>
                   <td>    <template v-if="expcat.expense_categorycountry">	{{expcat.expense_categorycountry.countryname}}</template></td>
                   
                     <td>    <template v-if="expcat.expense_categorycompany">	{{expcat.expense_categorycompany.companyname}}</template></td>
                       <td>{{(expcat.expcatcatname)}}</td>
                      <td>{{(expcat.description)}}</td>
                      <td>{{(expcat.created_at)}}</td>
                       <td>
                      <!-- allowedtoaddexpensecategory

 -->
  
                             
  <button type="button" v-if="allowedtoeditexpensecategory > 0 "  @click="editexpensecategory(expcat)" class="btn waves-effect waves-light btn-xs btn-info">
                      View
                    </button>
<button type="button" v-if="allowedtoeditexpensecategory > 0 "  @click="editexpensecategory(expcat)" class="btn waves-effect waves-light btn-xs btn-secondary">
                      Edit
                    </button>
<button type="button" v-if="allowedtoeditexpensecategory > 0 " 
  @click="deleteexpensecategory(expcat.id)" class="btn waves-effect waves-light btn-xs btn-danger">
                      Delete
                    </button>




                       </td>
                  
                
                      
                         
                                


               
                              
                               
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>

        
    <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="branchesrecords" @pagination-change-page="paginationResultsBranches"></pagination>
                </ul>
    </div>
            </div>
          </div>


                 
          
                        
                     
                      
                        </div>
                        </div>


                      <div class="tab-pane p-3" id="clientloans" v-if="allowedcompanyexpenses > 0 " role="tabpanel">
                         <form @submit.prevent="savemonthlyexpesedetailstosee()">
                 
                      <div class="form-group">
              

    
    

  <label for="exampleInputEmail1">Country :</label>
                 
                 

       <select name ="type" v-model="form.countryname" @change='getcompanies()' v-on:change="myClickEventtosavemonthlyreportallbranches" id ="countryname" :class="{'is-invalid': form.errors.has('countryname')}"
                                     >
                                        <option></option>
                                        <option v-for='data in countrieslist' :value='data.id'>{{ data.countryname }}</option>
                                    </select>


           
                                   

                                        <label for="password_2">Company</label>
                                  
                                               <select name ="companyname" v-model="form.companyname"  
                                             v-on:change="myClickEventtosavemonthlyreportallbranches" id ="companyname" :class="{'is-invalid': form.errors.has('companyname')}"
                                       data-live-search="true">
                                        <option></option>
                                        <option v-for='data in companieslist' :value='data.id'>{{ data.companyname }}</option>
                                    </select>
                   


  <!-- <label for="exampleInputEmail1">Branch :</label>
                 
                 

         <select name ="branchname" v-model="form.branchname" id ="branchname" v-on:change="myClickEventtosavemonthlyreportallbranches"
          :class="{'is-invalid': form.errors.has('branchname')}">
<option value="900"> All </option>
<option v-for='data in brancheslist' v-bind:value='data.id'> {{ data.branchname }}</option>

</select>
            <has-error :form="form" field="branchname"></has-error>


                              
             <button type="submit" id="submit" style="display:none;" hidden="hidden" 
             name= "submit" ref="theButtontotosalesreportmonthly" class="btn btn-primary btn-sm">Saveit</button>         

                                
                     
       
        -->
                   
          </div>


        

                </form>
          <hr>
                     
                                                        <div class="bethapa-table-header">
                      COMPANY EXPENSES
                    <button type="button" class="add-newm" @click="newCompanyexpense" >Add New Expense </button> 
                     </div>
     <div class="table-responsive">
      
       <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                         <th>COUNTRY</th>
                      <th>COMPANY </th>
                      <th>EXPENSE NAME</th>
                      <th>CATEGORY</th>
                      <th>TYPE</th>
                      <th>DESCRIPTION</th>
                        <th>Approval</th>
                      <th>CREATED</th>
                        <th>COLLECTION</th>
                       <th></th>
                    </tr>
                  </thead>
                  <tbody>
           
                    <tr>

                    <tr v-for="compexps in datarecordscompanyexpenses.data" :key="compexps.id">
                    
                    <td>{{compexps.id}}</td>
                <td>    <template v-if="compexps.expense_country">	{{compexps.expense_country.countryname}}</template></td>
                        <td>    <template v-if="compexps.expense_company">	{{compexps.expense_company.companyname}}</template></td>
                    <td>{{compexps.expensename}}</td>
                
                           <td>    <template v-if="compexps.expense_category">	{{compexps.expense_category.expcatcatname}}</template></td>
                           <td>    <template v-if="compexps.expense_typeconnect">	{{compexps.expense_typeconnect.typename}}</template></td>
                       
                               <td>{{compexps.description}}</td>
                               <td>
                                    <div style="color: green" v-if="compexps.approvaltype == '1' "> Auto Approved </div>
                       <div style="color: maroon" v-if="compexps.approvaltype == '2' "> Approval Required </div>
                               </td>
                               <td>{{compexps.created_at}}</td>
                             
                          <td>     
                              <!-- v-if="allowedtoedituser > 0 "  -->
                            <button type="button"    class="btn  bg-gradient-secondary btn-xs fas fa-edit"  @click="editCompanyexp(compexps)">Edit</button>
                             <!--  -->


                            <button type="button"   class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="deleteCompanyexp(compexps.id)"> DEl </button>






                      </td>
               
                              
                               
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>


        
    <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="branchesrecords" @pagination-change-page="paginationResultsBranches"></pagination>
                </ul>
    </div>
            </div>


    <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="submenurecords" @pagination-change-page="paginationResultsSubmenus"></pagination>
                </ul>
              </div>
                        
                        
                   
                      </div>

                       <div class="tab-pane p-3" id="messages1"  v-if="allowedrequestexpenses > 0 "  role="tabpanel">
                      <form @submit.prevent="savemonthlyexpesedetailstosee()">
                 
                      <div class="form-group">
              

    
    

  <label for="exampleInputEmail1">Country :</label>
                 
                 

       <select name ="type" v-model="form.countryname" @change='getcompanies()' v-on:change="myClickEventtosavemonthlyreportallbranches" id ="countryname" :class="{'is-invalid': form.errors.has('countryname')}"
                                     >
                                        <option></option>
                                        <option v-for='data in countrieslist' :value='data.id'>{{ data.countryname }}</option>
                                    </select>


           
                                   

                                        <label for="password_2">Company</label>
                                  
                                               <select name ="companyname" v-model="form.companyname"  
                                             v-on:change="myClickEventtosavemonthlyreportallbranches" id ="companyname" :class="{'is-invalid': form.errors.has('companyname')}"
                                       data-live-search="true">
                                        <option></option>
                                        <option v-for='data in companieslist' :value='data.id'>{{ data.companyname }}</option>
                                    </select>
                   


  <label for="exampleInputEmail1">Branch :</label>
                 
                 

         <select name ="branchname" v-model="form.branchname" id ="branchname" v-on:change="myClickEventtosavemonthlyreportallbranches"
          :class="{'is-invalid': form.errors.has('branchname')}">
<option value="900"> All </option>
<option v-for='data in brancheslist' v-bind:value='data.id'> {{ data.branchname }}</option>

</select>
            <has-error :form="form" field="branchname"></has-error>


                              
             <button type="submit" id="submit" style="display:none;" hidden="hidden" 
             name= "submit" ref="theButtontotosalesreportmonthly" class="btn btn-primary btn-sm">Saveit</button>         

                                
                     
       
       
                   
          </div>


        

                </form>
          <hr>
                                                        <div class="bethapa-table-header">


                    Expenditures   <button type="button"  class="add-newm" @click="newofficeexpenditure" >Make Expense</button>
                     </div>
     <div class="table-responsive">
<table  class="table" border="1"> 
   
                  <thead>
                    <tr>
                      <th>#</th>
                      <th> DATE</th>
                         <th>COUNTRY</th>
                      <th>COMPANY</th>
                      <th>BRANCH</th>
                      <th>EXPENSE</th>
                       <th>DESCRIPTION</th>
                      <th>AMOUNT</th>
                     
                    <!-- <th> STATION </th> -->
                       <th> EXPENSE WALLET </th>
                        <th> STATUS </th>
                   
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                       <tr v-for="offcmadeexp in officemadeexpensesrecords.data" :key="offcmadeexp.id">
                    <td>{{offcmadeexp.id}}</td>
                      <td>{{offcmadeexp.datemade}}</td>
                    
                    
                      <td>    <template v-if="offcmadeexp.madeexpense_country">	{{offcmadeexp.madeexpense_country.countryname}}</template></td>
                      <td>    <template v-if="offcmadeexp.madeexpense_company">	{{offcmadeexp.madeexpense_company.companyname}}</template></td>

                  
                          <td>    <template v-if="offcmadeexp.branch_name">	{{offcmadeexp.branch_name.branchname}}</template></td>
                            <td>    <template v-if="offcmadeexp.expense_name">	{{offcmadeexp.expense_name.expensename}}</template></td>
                      <td>{{offcmadeexp.description}}</td>
                       
                               <td class="musisialignright"> {{formatPrice((offcmadeexp.amount))}}</td>
                           
                           
                             
 <td>    <template v-if="offcmadeexp.expense_wallet">	{{offcmadeexp.expense_wallet.walletname}}</template></td>
  <!--   -->



                          <td> <div v-if="((offcmadeexp.approvalstate))== 0">
                                <span class="cell" style="color:maroon ;">  
   
                    <span style="font-size:1.0em;" center >  Pending </span></span>
                              </div>
                              <div v-if="((offcmadeexp.approvalstate))== 1">
                                <span class="cell" style="color:green ;">  
   
                    <span style="font-size:1.0em;" center >  Approved </span></span>
                              </div>
                              
                              </td>       <!-- -->

                               
                        <td> 
                             
        <div >                         
       <button v-show="offcmadeexp.approvalstate < 1 && ((loggedinuserrole =='900') ||  (loggedinuserrole =='100'))" type="button"  class="btn bg-green btn-xs waves-effect" 
        @click="confirmexpense(offcmadeexp.id)"> Confirm  </button>


      <button type="button" v-if=" (offcmadeexp.approvalstate < 1) && (offcmadeexp.ucret == loggedinuserid ) && (loggedinuserrole == '900' || loggedinuserrole == '100'  )"  
      class="btn bg-brown btn-xs waves-effect" 
       @click="editOfficemadeexpense(offcmadeexp)">Edit</button>

         <button type="button" v-if=" (offcmadeexp.approvalstate < 1) && (offcmadeexp.ucret != loggedinuserid )" 
      class="btn bg-brown btn-xs waves-effect" 
       @click="editOfficemadeexpense(offcmadeexp)">Edit</button>
      
         <button type="button" v-if=" (offcmadeexp.approvalstate < 1) && (offcmadeexp.ucret == loggedinuserid )"  class="btn bg-deep-orange btn-xs waves-effect" @click="deletemadeexpense(offcmadeexp.id)"> Cancel </button>

          <button type="button" v-if=" (offcmadeexp.approvalstate < 1) && (offcmadeexp.ucret != loggedinuserid ) && (loggedinuserrole == '900' || loggedinuserrole == '100'  )"  class="btn bg-deep-orange btn-xs waves-effect" @click="deletemadeexpense(offcmadeexp.id)"> Cancel </button>
       </div>
       

      <button type="button" v-if="offcmadeexp.approvalstate > 0 && ((loggedinuserrole =='900') ||  (loggedinuserrole =='100'))"  class="btn bg-deep-orange btn-xs waves-effect" @click="deletemadeexpense(offcmadeexp.id)"> Delete Expense </button>
       

                      </td>    <!---->
                    </tr>
              
                    
                  </tbody>
                                   </table>




    <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="componentfeaturesrecords" @pagination-change-page="paginationResultscomponentfeatures"></pagination>
                </ul>
              </div>
     </div>     
                        
                   
                      </div>

                      
                      <div class="tab-pane p-3" id="messages" role="tabpanel">
 <form @submit.prevent="savemonthlyexpesedetailstosee()">
                 
                      <div class="form-group">
              

    
    

  <label for="exampleInputEmail1">Country :</label>
                 
                 

       <select name ="type" v-model="form.countryname" @change='getcompanies()' v-on:change="myClickEventtosavemonthlyreportallbranches" id ="countryname" :class="{'is-invalid': form.errors.has('countryname')}"
                                     >
                                        <option></option>
                                        <option v-for='data in countrieslist' :value='data.id'>{{ data.countryname }}</option>
                                    </select>


           
                                   

                                        <label for="password_2">Company</label>
                                  
                                               <select name ="companyname" v-model="form.companyname"  
                                             v-on:change="myClickEventtosavemonthlyreportallbranches" id ="companyname" :class="{'is-invalid': form.errors.has('companyname')}"
                                       data-live-search="true">
                                        <option></option>
                                        <option v-for='data in companieslist' :value='data.id'>{{ data.companyname }}</option>
                                    </select>
                   


  <label for="exampleInputEmail1">Branch :</label>
                 
                 

         <select name ="branchname" v-model="form.branchname" id ="branchname" v-on:change="myClickEventtosavemonthlyreportallbranches"
          :class="{'is-invalid': form.errors.has('branchname')}">
<option value="900"> All </option>
<option v-for='data in brancheslist' v-bind:value='data.id'> {{ data.branchname }}</option>

</select>
            <has-error :form="form" field="branchname"></has-error>


                              
             <button type="submit" id="submit" style="display:none;" hidden="hidden" 
             name= "submit" ref="theButtontotosalesreportmonthly" class="btn btn-primary btn-sm">Saveit</button>         

                                
                     
       
       
                   
          </div>


        

                </form>
          <hr>
 <div class="bethapa-table-header">
                               Monthly Expenses <button  type="button" class="add-newm" @click="newmonthlyexpenseadd" >Add new Monthly Expense </button>
                     </div>

      <div class="table-responsive">      
            
               <table class="table">
                     <thead>
                    <tr>
                      <th>#</th>
                    
                         <th>COUNTRY</th>
                      <th>COMPANY</th>
                      <th>BRANCH</th>
                      <th>EXPENSE</th>
                       <th>DESCRIPTION</th>
                      <th>AMOUNT</th>
                     
                  
                     
                  
                   
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                       <tr v-for="offcmadeexp in companymonthlyexpensesrecords.data" :key="offcmadeexp.id">
                       <td>{{offcmadeexp.id}}</td>
                       <td>    <template v-if="offcmadeexp.country_monthlyexpense">	{{offcmadeexp.country_monthlyexpense.countryname}}</template></td>
                       <td>    <template v-if="offcmadeexp.company_monthlyexpense">	{{offcmadeexp.company_monthlyexpense.companyname}}</template></td>
                  
                   


                   
                          <td>    <template v-if="offcmadeexp.branch_monthlyexpense">	{{offcmadeexp.branch_monthlyexpense.branchname}}</template></td>
                            <td>    <template v-if="offcmadeexp.expense_monthlyexpense">	{{offcmadeexp.expense_monthlyexpense.expensename}}</template></td>
                      <td>{{offcmadeexp.description}}</td>
                       
                               <td style="text-align:right;"> {{formatPrice((offcmadeexp.amount))}}</td>
                           
                           
                             

                             
   <td>
       

    
       <button type="button" @click="deletemadeexpense(offcmadeexp.id)" class="btn waves-effect waves-light btn-xs btn-danger">
                      Remove Expense
                    </button>

                      </td>    <!---->
                    </tr>
              
                    
                  </tbody>
                                   </table>




    <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="vuecomponentsrecords" @pagination-change-page="paginationResultvuecomponents1"></pagination>
                </ul>
              </div>

      </div>

                      
                      </div>
                    </div>


                    


                  </div>
                </div>
              </div>
            </div>








<!-- ////////////////////////////////////////////////////////////////////////////////// -->
<!-- mmmm models -->



<!-- /////////////////////////////////////////////////////// -->
<div
                        class="modal fade"
                        id="addnewcompanyexpensemodal"
                           data-bs-backdrop="static"
                      data-bs-keyboard="false"
                        tabindex="-1"
                        aria-labelledby="bs-example-modal-lg"
                        aria-hidden="true"
                      >
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                              <h4 class="modal-title" id="myLargeModalLabel"
                             v-show="!editmode">  
                              <!-- <img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;"> -->
                          Add New Expense
                              </h4>
                                  <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- <div class="modal-body"> -->
                              
                <form class="form-control-line mt-4" @submit.prevent="editmode ? updateexpenserecord():createNewcompanyexpense()"> 
                  <div class="card-body">
               <div class ="bethapa-table-sectionheader">Expense details</div>
               <form @submit.prevent="mmmtion()">

                   
                    <div class="mb-3 row">
                      <label for="fname" class="col-sm-3 text-end control-label col-form-label">Country</label>
                      <div class="col-sm-9">
                 
                                               <select name ="countryname" v-model="form.countryname"  
                                                v-on:change="myClickEventtosavesalesreportbydate" id ="countryname"
                                                 @change='getCountrycompanies()'
                                                :class="{'is-invalid': form.errors.has('countryname')}"
                                     class="form-control form-control-line" >
                                        <option></option>
                                        <option v-for='data in countrieslist' :value='data.id'>{{ data.countryname }}</option>
                                    </select>
                       <has-error :form="form" field="countryname"></has-error>
                      </div>
                    </div>


                   <div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Company</label>
                      <div class="col-sm-9">
                    
                                               <select name ="companyname" v-model="form.companyname"
                                                v-on:change="myClickEventtosavesalesreportbydate" @change='getCompanywallets(); getcompanybranches();'
                                               
                                                id ="companyname" :class="{'is-invalid': form.errors.has('companyname')}"
                                     class="form-control form-control-line">
                                        <option></option>
                                        <option v-for='data in companiesss' :value='data.id'>{{ data.companyname }}</option>
                                    </select>
                                         <has-error :form="form" field="companyname"></has-error>
                      </div>
                    </div>













      <button type="submit" id="submit" hidden="hidden" name= "submit" ref="theButtontosabemonthlyreportvie" class="btn btn-primary btn-sm">Saveit</button>      

                 </form>
                 <hr>   
        <form @submit.prevent="SaveRoletoaddmainmenu()">    
                   
                    <div class="mb-3 row">
                      <label for="expensename" class="col-sm-3 text-end control-label col-form-label">Expense Name:</label>
                      <div class="col-sm-9">
                    
                                                  <input v-model="form.expensename" type="text" name="expensename"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('expensename') }">
                    <has-error :form="form" field="expensename"></has-error>
                      </div>
                    </div>


                   <div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Expense Category</label>
                      <div class="col-sm-9">
                     
             <select name ="expensecategory" 
                                                 v-model="form.expensecategory"  id ="expensecategory"
                                                  :class="{'is-invalid': form.errors.has('expensecategory')}"
                                      class="form-control show-tick" data-live-search="true">
                                        <option></option>
                                        <option v-for='data in expensecategorieslist' :value='data.id'>{{ data.expcatcatname }}</option>
                                    </select>
                                        <has-error :form="form" field="expensecategory"></has-error>
                      </div>
                    </div>

  
     <div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Expense type</label>
                      <div class="col-sm-9">
                     
               <select name ="expensetype" 
                                                 v-model="form.expensetype"  id ="expensetype"
                                                  :class="{'is-invalid': form.errors.has('expensetype')}"
                                      class="form-control show-tick" data-live-search="true">
                                        <option></option>
                                        <option v-for='data in expensetypeslist' :value='data.id'>{{ data.typename }}</option>
                                    </select>
                                        <has-error :form="form" field="expensetype"></has-error>
                      </div>
                    </div>

   <div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Approval</label>
                      <div class="col-sm-9">
                     
                  <select name ="approvaltype" v-model="form.approvaltype" id ="approvaltype"
                                                      class="form-control" 
                                                      :class="{'is-invalid': form.errors.has('approvaltype')}">
                    <option value="">   </option>
                   <option value="1"> Auto Approved  </option>
                      <option value="2">  Pre-Approval Required </option>

                    </select>
                                        <has-error :form="form" field="approvaltype"></has-error>
                      </div>
                    </div>

                      <div class="mb-3 row">
                      <label for="fname" class="col-sm-3 text-end control-label col-form-label">Expense group : </label>
                      <div class="col-sm-9">
                 
                                               <select name ="expensegroup" v-model="form.expensegroup"  
                                                v-on:change="myClickEventtosavesalesreportbydate" id ="expensegroup"
                                               
                                                :class="{'is-invalid': form.errors.has('expensegroup')}"
                                     class="form-control form-control-line" >
                                       <option value="">   </option>
                   <option value="0"> Timely expense  </option>
                      <option value="1">  Monthly Expense </option>
                                    </select>
                       <has-error :form="form" field="expensegroup"></has-error>
                      </div>
                    </div>


                       <div class="mb-3 row">
                      <label for="fname" class="col-sm-3 text-end control-label col-form-label">Comment: </label>
                      <div class="col-sm-9">
                 
                                                <textarea v-model="form.description" name="description" rows="5" cols="30"
                                             class="form-control" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                       <has-error :form="form" field="description"></has-error>
                      </div>
                    </div>
                   
             <button type="submit" id="submit" hidden="hidden" name= "submit" ref="theButtontosabemonthlyreportvie" class="btn btn-primary btn-sm">Saveit</button>         

        </form>

                   

                 </div>
            
                  <div class="p-3 border-top">
                    <div class="text-end">
                     
                     
                    </div>
                  </div>
              
                            <!-- </div> -->
                            
                            <div class="modal-footer">
                               <button type="submit" class="
                          btn btn-info
                          rounded-pill
                          px-4
                          waves-effect waves-light
                        ">
                        Create
                      </button>
                              <button
                                type="button"
                                class="
                                  btn btn-light-danger
                                  text-danger
                                    rounded-pill
                          px-4
                          waves-effect waves-light
                                "
                                data-bs-dismiss="modal"
                              >
                                Close
                              </button>
                            </div>
                             </form>
                          </div>
                          
                          <!-- /.modal-content -->
                        </div>
                        
                        <!-- /.modal-dialog -->
                      </div>



























































<!-- ////////////////////////////////////////////////////////////////////////// -->
<div
                        class="modal fade"
                        id="addnewExpensecategorymodal"
                           data-bs-backdrop="static"
                      data-bs-keyboard="false"
                        tabindex="-1"
                        aria-labelledby="bs-example-modal-lg"
                        aria-hidden="true"
                      >
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                              <h4 class="modal-title" id="myLargeModalLabel"
                             v-show="!editmode">  
                              <!-- <img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;"> -->
                           Add New Expense Category
                              </h4>
                                  <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- <div class="modal-body"> form-control-line mt-4"-->
                   <form class="form-control-line mt-4"  @submit.prevent="editmode ? updateexpensecategory():createNewcategory()"> 
                  <div class="card-body">
                    <div class="bethapa-table-sectionheader">Details</div>
                 <form @submit.prevent="savenewRecordtoview()">    
                     <div class="mb-3 row">
                      <label for="fname" class="col-sm-3 text-end control-label col-form-label">Country</label>
                      <div class="col-sm-9">
                 
                                               <select name ="countryname" v-model="form.countryname"  
                                                v-on:change="myClickEventtosavesalesreportbydatehhhhhhhhhh" id ="countryname"
                                                 @change='getCountrycompanies()'
                                                :class="{'is-invalid': form.errors.has('countryname')}"
                                     class="form-control form-control-line" >
                                        <option></option>
                                        <option v-for='data in countrieslist' :value='data.id'>{{ data.countryname }}</option>
                                    </select>
                       <has-error :form="form" field="countryname"></has-error>
                      </div>
                    </div>


                   <div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Company</label>
                      <div class="col-sm-9">
                    
                                               <select name ="companyname" v-model="form.companyname"
                                                v-on:change="myClickEventtosavesalesreportbydatehhhhhhhhhh" @change='getcompanywallets(); getcompanyexpenses(); getcompanybranches();'
                                               
                                                id ="companyname" :class="{'is-invalid': form.errors.has('companyname')}"
                                     class="form-control form-control-line">
                                        <option></option>
                                        <option v-for='data in companiesss' :value='data.id'>{{ data.companyname }}</option>
                                    </select>
                                         <has-error :form="form" field="companyname"></has-error>
                      </div>
                    </div>




                                 
                

          

                      <div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Category Name </label>
                      <div class="col-sm-9">
                    
                                            <input v-model="form.expcatcatname" type="text" name="expcatcatname"
       class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('expcatcatname') }">
      <has-error :form="form" field="expcatcatname"></has-error>
                      </div>
                    </div>



                         <div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Category Name </label>
                      <div class="col-sm-9">
                    
                                            <textarea v-model="form.description" name="description" rows="5" cols="30" class="form-control" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                 
                <has-error :form="form" field="description"></has-error>

                      </div>
                    </div>

      <button type="submit" id="submit" hidden="hidden" name= "submit" ref="theButtontosabemonthlyreportvie" class="btn btn-primary btn-sm">Saveit</button>      

                 </form>
             

                   

                 </div>
            
                  <div class="p-3 border-top">
                    <div class="text-end">
                     
                     
                    </div>
                  </div>
              
                            <!-- </div> -->
                            
                            <div class="modal-footer">
                               <button type="submit" class="
                          btn btn-info
                          rounded-pill
                          px-4
                          waves-effect waves-light
                        ">
                        Create
                      </button>
                              <button
                                type="button"
                                class="
                                  btn btn-light-danger
                                  text-danger
                                    rounded-pill
                          px-4
                          waves-effect waves-light
                                "
                                data-bs-dismiss="modal"
                              >
                                Close
                              </button>
                            </div>
                             </form>
                          </div>
                          
                          <!-- /.modal-content -->
                        </div>
                        
                        <!-- /.modal-dialog -->
                      </div>




                <!--  expense request modal -->
<div
                        class="modal fade"
                        id="makeofficeexpensemodal"
                           data-bs-backdrop="static"
                      data-bs-keyboard="false"
                        tabindex="-1"
                        aria-labelledby="bs-example-modal-lg"
                        aria-hidden="true"
                      >
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                              <h4 class="modal-title" id="myLargeModalLabel"
                             v-show="!editmode">  
                              <!-- <img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;"> -->
                        Expense Request
                              </h4>
                                  <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- <div class="modal-body"> -->
                              
              <form class="form-control-line mt-4" @submit.prevent="editmode ? updadeexpenseforofficeuse():createNewofficeexpense()"> 
                  <div class="card-body">
               <div class ="bethapa-table-sectionheader">Expense details</div>
             <form @submit.prevent="savenewRecordtoview()">  

                   
                    <div class="mb-3 row">
                      <label for="fname" class="col-sm-3 text-end control-label col-form-label">Country</label>
                      <div class="col-sm-9">
                 
                                               <select name ="countryname" v-model="form.countryname"  
                                                v-on:change="myClickEventtosavesalesreportbydatehhhhhhhhhh" id ="countryname"
                                                 @change='getCountrycompanies()'
                                                :class="{'is-invalid': form.errors.has('countryname')}"
                                     class="form-control form-control-line" >
                                        <option></option>
                                        <option v-for='data in countrieslist' :value='data.id'>{{ data.countryname }}</option>
                                    </select>
                       <has-error :form="form" field="countryname"></has-error>
                      </div>
                    </div>


                   <div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Company</label>
                      <div class="col-sm-9">
                    
                                               <select name ="companyname" v-model="form.companyname"
                                                v-on:change="myClickEventtosavesalesreportbydatehhhhhhhhhh" @change='getcompanywallets(); getcompanyexpenses(); getcompanybranches();'
                                               
                                                id ="companyname" :class="{'is-invalid': form.errors.has('companyname')}"
                                     class="form-control form-control-line">
                                        <option></option>
                                        <option v-for='data in companiesss' :value='data.id'>{{ data.companyname }}</option>
                                    </select>
                                         <has-error :form="form" field="companyname"></has-error>
                      </div>
                    </div>





                   <div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Branch</label>
                      <div class="col-sm-9">
                    
                                              <select name ="branchname" v-model="form.branchname"
                                                id ="branchname"
                                               
                                                :class="{'is-invalid': form.errors.has('branchname')}"
                                     class="form-control form-control-line" >
                                        <option></option>
                                        <option v-for='data in companybrancheslist' :value='data.id'>{{ data.branchname }}</option>
                                    </select>

                                         <has-error :form="form" field="branchname"></has-error>
                      </div>
                    </div>


 <div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Expense</label>
                      <div class="col-sm-9">
                    
               <select name ="expense"  class="form-control form-control-line" v-model="form.expense" id ="expense"  data-live-search="true"    :class="{'is-invalid': form.errors.has('expense')}">
                
                 <option v-for='data in companyexpenseslist' v-bind:value='data.id'>{{ data.expensename }}</option>


                    </select>
                    <has-error :form="form" field="expense"></has-error>
                   
                                      
                      </div>
                    </div>

<div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Amount</label>
                      <div class="col-sm-9">
                    
               <input v-model="form.amount" type="number" name="amount"
       class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('amount') }">
      <has-error :form="form" field="amount"></has-error>
                   
                                      
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Expense Date</label>
                      <div class="col-sm-9">
                    
                <input v-model="form.datemade" type="date" name="datemade"
       class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('datemade') }">
      <has-error :form="form" field="datemade"></has-error>
                   
                                      
                      </div>
                    </div>
    <div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Wallet of expense</label>
                      <div class="col-sm-9">
                    
              <select name ="walletexpense" v-model="form.walletexpense" id ="walletexpense"  class="form-control form-control-line"    :class="{'is-invalid': form.errors.has('walletexpense')}">
                
              <option value=" ">  </option>
                  <option v-for='data in companywalletslist' v-bind:value='data.walletno'>{{ data.id }} - {{ data.name }}</option>


     
                    </select>
                    <has-error :form="form" field="walletexpense"></has-error>
                                      
                      </div>
                    </div>

<div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Description</label>
                      <div class="col-sm-9">
                    
                  <textarea v-model="form.description" name="description" rows="5" cols="30" class="form-control" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                 
                <has-error :form="form" field="description"></has-error>
                                      
                      </div>
                    </div>




      <button type="submit" id="submit" hidden="hidden" name= "submit" ref="theButtontosabemonthlyreportviePOOOJJJ" class="btn btn-primary btn-sm">Saveit</button>      

                 </form>
                 
     

                   

                 </div>
            
                  <div class="p-3 border-top">
                    <div class="text-end">
                     
                     
                    </div>
                  </div>
              
                            <!-- </div> -->
                            
                            <div class="modal-footer">
                               <button type="submit" class="
                          btn btn-info
                          rounded-pill
                          px-4
                          waves-effect waves-light
                        ">
                        Create
                      </button>
                              <button
                                type="button"
                                class="
                                  btn btn-light-danger
                                  text-danger
                                    rounded-pill
                          px-4
                          waves-effect waves-light
                                "
                                data-bs-dismiss="modal"
                              >
                                Close
                              </button>
                            </div>
                             </form>
                          </div>
                          
                          <!-- /.modal-content -->
                        </div>
                        
                        <!-- /.modal-dialog -->
                      </div>




                <!--  collection modal -->


<div class="modal fade" id="addnewmonthlyexpense" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1"  aria-labelledby="bs-example-modal-lg"
                        aria-hidden="true"
                      >
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                              <h4 class="modal-title" id="myLargeModalLabel"
                             v-show="!editmode">  
                              <!-- <img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;"> -->
                        Monthly Expense Registration
                              </h4>
                                  <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- <div class="modal-body"> -->
                              
              <form class="form-control-line mt-4"  @submit.prevent="editmode ? updadeexpenseforofficeuse():createNewmonthlyexpense()"> 
                  <div class="card-body">
               <div class ="bethapa-table-sectionheader">Expense details</div>
             <form @submit.prevent="savenewRecordtoview()">  

                   
                    <div class="mb-3 row">
                      <label for="fname" class="col-sm-3 text-end control-label col-form-label">Country</label>
                      <div class="col-sm-9">
                 
                                               <select name ="countryname" v-model="form.countryname"  
                                                v-on:change="myClickEventtosavesalesreportbydatehhhhhhhhhh" id ="countryname"
                                                 @change='getCountrycompanies()'
                                                :class="{'is-invalid': form.errors.has('countryname')}"
                                     class="form-control form-control-line" >
                                        <option></option>
                                        <option v-for='data in countrieslist' :value='data.id'>{{ data.countryname }}</option>
                                    </select>
                       <has-error :form="form" field="countryname"></has-error>
                      </div>
                    </div>


                   <div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Company</label>
                      <div class="col-sm-9">
                    
                                               <select name ="companyname" v-model="form.companyname"
                                                v-on:change="myClickEventtosavesalesreportbydatehhhhhhhhhh" @change='getcompanywallets(); getcompanyexpenses(); getcompanybranches();'
                                               
                                                id ="companyname" :class="{'is-invalid': form.errors.has('companyname')}"
                                     class="form-control form-control-line">
                                        <option></option>
                                        <option v-for='data in companiesss' :value='data.id'>{{ data.companyname }}</option>
                                    </select>
                                         <has-error :form="form" field="companyname"></has-error>
                      </div>
                    </div>





                   <div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Branch</label>
                      <div class="col-sm-9">
                    
                                              <select name ="branchname" v-model="form.branchname"
                                                id ="branchname"
                                               
                                                :class="{'is-invalid': form.errors.has('branchname')}"
                                     class="form-control form-control-line" >
                                        <option></option>
                                        <option v-for='data in companybrancheslist' :value='data.id'>{{ data.branchname }}</option>
                                    </select>

                                         <has-error :form="form" field="branchname"></has-error>
                      </div>
                    </div>


 <div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Expense</label>
                      <div class="col-sm-9">
                    
               <select name ="expense"  class="form-control form-control-line" v-model="form.expense" id ="expense"  data-live-search="true"    :class="{'is-invalid': form.errors.has('expense')}">
                
                 <option v-for='data in companyexpenseslist' v-bind:value='data.id'>{{ data.expensename }}</option>


                    </select>
                    <has-error :form="form" field="expense"></has-error>
                   
                                      
                      </div>
                    </div>

<div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Amount</label>
                      <div class="col-sm-9">
                    
               <input v-model="form.amount" type="number" name="amount"
       class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('amount') }">
      <has-error :form="form" field="amount"></has-error>
                   
                                      
                      </div>
                    </div>
                   
                   

<div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Description</label>
                      <div class="col-sm-9">
                    
                  <textarea v-model="form.description" name="description" rows="5" cols="30" class="form-control" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                 
                <has-error :form="form" field="description"></has-error>
                                      
                      </div>
                    </div>




      <button type="submit" id="submit" hidden="hidden" name= "submit" ref="theButtontosabemonthlyreportviePOOOJJJ" class="btn btn-primary btn-sm">Saveit</button>      

                 </form>
                 
     

                   

                 </div>
            
                  <div class="p-3 border-top">
                    <div class="text-end">
                     
                     
                    </div>
                  </div>
              
                            <!-- </div> -->
                            
                            <div class="modal-footer">
                               <button type="submit" class="
                          btn btn-info
                          rounded-pill
                          px-4
                          waves-effect waves-light
                        ">
                        Create
                      </button>
                              <button
                                type="button"
                                class="
                                  btn btn-light-danger
                                  text-danger
                                    rounded-pill
                          px-4
                          waves-effect waves-light
                                "
                                data-bs-dismiss="modal"
                              >
                                Close
                              </button>
                            </div>
                             </form>
                          </div>
                          
                          <!-- /.modal-content -->
                        </div>
                        
                        <!-- /.modal-dialog -->
                      </div>








<!-- expense request -->





          <!-- end of the body -->
 </div>

<!-- closure of allowed -->
<!--   if not authorised -->

<div  v-if="generalExpensesmainpageAccess < 1 "> 

   <div class="main-wrapper">
      <!-- -------------------------------------------------------------- -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- -------------------------------------------------------------- -->
      <div class="preloader">
        <svg
          class="tea lds-ripple"
          width="37"
          height="48"
          viewbox="0 0 37 48"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z"
            stroke="#1e88e5"
            stroke-width="2"
          ></path>
          <path
            d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34"
            stroke="#1e88e5"
            stroke-width="2"
          ></path>
          <path
            id="teabag"
            fill="#1e88e5"
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z"
          ></path>
          <path
            id="steamL"
            d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke="#1e88e5"
          ></path>
          <path
            id="steamR"
            d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13"
            stroke="#1e88e5"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          ></path>
        </svg>
      </div>
      <!-- -------------------------------------------------------------- -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- -------------------------------------------------------------- -->
      <!-- -------------------------------------------------------------- -->
      <!-- Login box.scss -->
      <!-- -------------------------------------------------------------- -->
      <div class="error-box">
        <div class="error-body text-center">
          <h1 class="error-title">403</h1>
          <h3 class="text-uppercase error-subtitle">FORBIDDON ERROR!</h3>
          <p class="text-muted mt-4 mb-4">
            YOU DON'T HAVE PERMISSION TO ACCESS ON THIS SERVER.
          </p>
        
        
        </div>
      </div>
     
     
    </div>

</div>
<!----   End of not Authorised --->








          

    </div>
</template>
<script src="plugins/select2/js/select2.full.min.js"></script>
<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

  

  })
</script>
<script>
    export default {
      
         data(){
           
        return {
             country: 0,

                countries: [],
              
                roleslist: [],
                typeslist:[],
                mainmenulist:[],
                countrieslist:[],
                  companieslist:[],
                  expenseslist:[],
                  expensablewallets:[],
                  companiesss:[],
                  companybrancheslist:[],
companyexpenseslist:[],
        companywalletslist:[],


            ///////////////////////////////////
          brancheslist: [],
          walletlist:[],
          walletsofeapenselist:[],
          expensecategorieslist:[],
          expensetypeslist:[],
           currencydetails:null,
            shopopenningbalance:null,
                collectionsaccountcurrentbalance: null,
                pettycashaccountcurrentbalance:null,
                admincashaccountcurrentbalance:null,
                bankaccountcurrentbalance:null,
         // accessusercoponent : null,
         ///// Access authorities
         generalExpensesmainpageAccess:'',
         branchesccessSettings:'',
           machineonesales: 0,
        machineonepayout: 0,
        machineonecurrentcode: 0,
         rolesaccessSettings:'',
         mainmenuaccessSettings:'',
         submenuaccessSettings:'',
         componentaccessSettings:'',
         featuresaccessSettings:'',
           expensecategory : '',
   expensetypes : '',
shopbalancngname: null,
       
       ////////////////////////////////////////////////////////////////////////////////////
          myValue: '',
          myOptions: [], // or [{id: key, text: value}, {id: key, text: value}]
           admincashindatarecords:{},
           expensecategorydetails:{},
           datarecordscompanyexpenses:{},
           officemadeexpensesrecords:{},
           companymonthlyexpensesrecords:{},
           loggedinuserrole:{},
          admincashoutrecords:{},
          branchpayoutrecords:{},
          editmode: false,
          userrecords : {},
          rolesrecords : {},
          shopbalancingdatarecords :{},
          fishcollectionrecords:{},
          fishcashcreditrecords:{},
           branchesrecords : {},
          companyrecords : {},
          mainmenulist:{},
          suppliers:{},
          datarecordsSubmenusauthorised:{},
          allowedrolecomponentsObject :{},
          datarecordsMainmenuauthorised:{},
          allowedrolecomponentfeaturesObject : {},
          allowedtoaddmainmenuaccess:{},
             allowedtodeleteshopBalancingRecord:{},
          allowedtoaddsubmenuaccess:{},
          allowedtorevokesubmenuaccess:{},
          allowedtorevokecomponentaccess:{},
          allowedtogivecomponentaccess:{},

          allowedtodeletebranch:{},
          allowedtoeditbranch:{},


         // brancheslist:{},
          componentslist:{},
          submenulist:{},
          
          formfeatures:{},
          form: new Form({
                /// Users Form

                id: '',
                name:'',
                email:'',
                rolename:'',
                type:'',
mainmenus:'',


///////////////////////////////////



  companyname :'',
  currency: '',
  currencysymbol : '',
  logo:'',
  countryname: '',
  emailaddress: '',
  location: '',
  contactperson: '',
  contactnumber: '',



















////////////////////////////////////////////////////////Branches
branchname: '',
openningbalance:'',
contact:'', 
location:'',
/////id, suppname, description, created_at, updated_at, ucret, contact, location, company, contactofcontact, companycontactperson, del

         suppname: '',
description:'',
contact:'', 
location:'',     
company:'',
contactofcontact:'', 
companycontactperson:'',       


            })
            }
         },

methods:{

  myClickEventtosavemonthlyreportallbranches($event) { const elem = this.$refs.theButtontotosalesreportmonthly
            elem.click()
        },

   savemonthlyexpesedetailstosee(){

                                this.loading = true;
                                this.form.post('api/balancingrecordstoview')
                                .then(()=>{
this.laadCompanyfixedexpenses();
this.loadCompanymadeexpenses();
this.loadCompanyGeneralregisteredexpenses();
this.loadExpensecategorydetails();
                                // Toast.fire({
                                // icon: 'success',
                                // title: 'Record Added Successfully'
                                // });

                                                              this.loading = false;

                                  this.form.clear();
      //  this.form.reset();
                                })
                                .catch(()=>{

                                })

}, 











     savenewRecordtoview(){
this.loading = true;
                           //     this.$Progress.start();
                                this.form.post('api/countrycompanies')
                                .then(()=>{

                                })
                                .catch(()=>{

                                })

}, 
 getcompanybranches: function() {
                axios.get('/api/getcompanybranches',{params: {companybranches: this.companybranches       }
              }).then(function(response){
                    this.companybrancheslist = response.data;
                }.bind(this));
            countryname.hide
        },

        getcompanywallets: function() {
                axios.get('/api/getcompanywallets',{params: {companywallets: this.companywallets       }
              }).then(function(response){
                    this.companywalletslist = response.data;
                }.bind(this));
            countryname.hide
        },
        
          getcompanyexpenses: function() {
                axios.get('/api/getcompanyexpenses',{params: {companyexpenses: this.companyexpenses       }
              }).then(function(response){
                    this.companyexpenseslist = response.data;
                }.bind(this));
            countryname.hide
        },

myClickEventtosavesalesreportbydatehhhhhhhhhh($event) { const elem = this.$refs.theButtontosabemonthlyreportviePOOOJJJ
            elem.click()
        },

getCountrycompanies: function() {
                axios.get('/api/getcountriescompanies',{params: {companyname: this.companyname       }
              }).then(function(response){
                    this.companiesss = response.data;
                }.bind(this));
            countryname.hide
        },
        myClickEventtosavesalesreportbydate($event) { const elem = this.$refs.theButtontosabemonthlyreportvie
            elem.click()
        },
    myClickEventtosavesalesreportbydate2($event) { const elem = this.$refs.mybtnforgrneralsalesreport2
            elem.click()
        },

 saveexpensesreporttoviewbranches (){

                                this.loading = true;
                                this.form.post('api/expensesreportstoviewnows')
                                .then(()=>{
axios.get("api/totalmonthlycollectionsselectedreport").then(({ data }) => (this.totalmonthlycollectionsselectedreport = data));
axios.get("api/allbranchesmreports").then(({ data }) => (this.allbranchesmreports = data));
  axios.get("api/selectedreporttype").then(({ data }) => (this.selectedreporttype = data));
   axios.get("api/mothlyreportmonth").then(({ data }) => (this.mothlyreportmonth = data));
       axios.get("api/mothlyreportyear").then(({ data }) => (this.mothlyreportyear = data));
        axios.get("api/branchandmonthreport").then(({ data }) => (this.branchandmonthreport = data));
       axios.get("api/branchandyearreport").then(({ data }) => (this.branchandyearreport = data));
          axios.get("api/totalmonthlysalesselectedreport").then(({ data }) => (this.totalmonthlysalesselectedreport = data));
        axios.get("api/totalmonthlypayoutselectedreport").then(({ data }) => (this.totalmonthlypayoutselectedreport = data));
         axios.get("api/totalmonthlyprofitselectedreport").then(({ data }) => (this.totalmonthlyprofitselectedreport = data));
//  axios.get("api/dailycodesreportdata").then(({ data }) => (this.dailycodesreportdata = data));

                              //  Fire.$emit('AfterAction');

                               // $('#addNew').modal('hide');

                                Toast.fire({
                                icon: 'success',
                                title: 'Record Added Successfully'
                                });

                                                              this.loading = false;

                                  this.form.clear();
        this.form.reset();
                                })
                                .catch(()=>{

                                })

}, 



  savethemonthlyreportforallBranches (){

                                this.loading = true;
                                this.form.post('api/saleareportsview')
                                .then(()=>{
axios.get("api/totalmonthlycollectionsselectedreport").then(({ data }) => (this.totalmonthlycollectionsselectedreport = data));
axios.get("api/allbranchesmreports").then(({ data }) => (this.allbranchesmreports = data));
  axios.get("api/selectedreporttype").then(({ data }) => (this.selectedreporttype = data));
   axios.get("api/mothlyreportmonth").then(({ data }) => (this.mothlyreportmonth = data));
       axios.get("api/mothlyreportyear").then(({ data }) => (this.mothlyreportyear = data));
        axios.get("api/branchandmonthreport").then(({ data }) => (this.branchandmonthreport = data));
       axios.get("api/branchandyearreport").then(({ data }) => (this.branchandyearreport = data));
          axios.get("api/totalmonthlysalesselectedreport").then(({ data }) => (this.totalmonthlysalesselectedreport = data));
        axios.get("api/totalmonthlypayoutselectedreport").then(({ data }) => (this.totalmonthlypayoutselectedreport = data));
         axios.get("api/totalmonthlyprofitselectedreport").then(({ data }) => (this.totalmonthlyprofitselectedreport = data));
//  axios.get("api/dailycodesreportdata").then(({ data }) => (this.dailycodesreportdata = data));

                              //  Fire.$emit('AfterAction');

                               // $('#addNew').modal('hide');

                                Toast.fire({
                                icon: 'success',
                                title: 'Record Added Successfully'
                                });

                                                              this.loading = false;

                                  this.form.clear();
        this.form.reset();
                                })
                                .catch(()=>{

                                })

}, 
 confirmexpense(id){
   Swal.fire({
  title: 'Approve Expense',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
  this.form.delete('api/makeexpenseofficeuser/'+id).then(()=>{
  
                        Swal.fire(
                          'Approved!',
                          'Your Record has been Confirmed.',
                          'success'
                        )
  axios.get("api/makeexpenseofficeuser").then(({ data }) => (this.officemadeexpensesrecords = data));

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },


createNewmonthlyexpense(){

                                this.$Progress.start();
                                this.form.post('api/addmonthlyexpensetothecompany')
                                .then(()=>{

   axios.get("api/companymonthlyexpensesrecords").then(({ data }) => (this.companymonthlyexpensesrecords = data));
//    axios.get('/api/bankaccountbalance').then(function (response) { this.bankaccountbalance = response.data;}.bind(this));
//   axios.get('/api/administratoraccountbalance').then(function (response) { this.administratoraccountbalance = response.data;}.bind(this));


//   axios.get('/api/shopcashbalance').then(function (response) { this.shopcashbalance = response.data;}.bind(this));
//   axios.get('/api/inputvatamount').then(function (response) { this.inputvatamount = response.data;}.bind(this));

//  axios.get('/api/outputvatamount').then(function (response) { this.outputvatamount = response.data;}.bind(this));
//  axios.get('/api/todaystotalsales').then(function (response) { this.todaystotalsales = response.data;}.bind(this));

// axios.get('/api/inputvatcomponentaccess').then(function (response) { this.inputvatcomponentaccess = response.data;}.bind(this));
// axios.get('/api/outputcomponentaccess').then(function (response) { this.outputcomponentaccess = response.data;}.bind(this));
// axios.get('/api/bankwalletcomponentaccess').then(function (response) { this.bankwalletcomponentaccess = response.data;}.bind(this));
// axios.get('/api/netvatvatcomponentcomponentaccess').then(function (response) { this.netvatvatcomponentcomponentaccess = response.data;}.bind(this));
// axios.get('/api/administratorcomponentaccess').then(function (response) { this.administratorcomponentaccess = response.data;}.bind(this));
// axios.get('/api/branchwalletcomponentaccess').then(function (response) { this.branchwalletcomponentaccess = response.data;}.bind(this));


                                // Fire.$emit('AfterAction');

                               // $('#addNew').modal('hide');

                                Toast.fire({
                                icon: 'success',
                                title: 'Record Added Successfully'
                                });

                                this.$Progress.finish();
                                  this.form.clear();
        this.form.reset();
                                })
                                .catch(()=>{

                                })


       },
  createNewofficeexpense(){

                                this.$Progress.start();
                                this.form.post('api/makeexpenseofficeuser')
                                .then(()=>{

   axios.get("api/makeexpenseofficeuser").then(({ data }) => (this.officemadeexpensesrecords = data));
   axios.get('/api/bankaccountbalance').then(function (response) { this.bankaccountbalance = response.data;}.bind(this));
  axios.get('/api/administratoraccountbalance').then(function (response) { this.administratoraccountbalance = response.data;}.bind(this));


  axios.get('/api/shopcashbalance').then(function (response) { this.shopcashbalance = response.data;}.bind(this));
  axios.get('/api/inputvatamount').then(function (response) { this.inputvatamount = response.data;}.bind(this));

 axios.get('/api/outputvatamount').then(function (response) { this.outputvatamount = response.data;}.bind(this));
 axios.get('/api/todaystotalsales').then(function (response) { this.todaystotalsales = response.data;}.bind(this));

axios.get('/api/inputvatcomponentaccess').then(function (response) { this.inputvatcomponentaccess = response.data;}.bind(this));
axios.get('/api/outputcomponentaccess').then(function (response) { this.outputcomponentaccess = response.data;}.bind(this));
axios.get('/api/bankwalletcomponentaccess').then(function (response) { this.bankwalletcomponentaccess = response.data;}.bind(this));
axios.get('/api/netvatvatcomponentcomponentaccess').then(function (response) { this.netvatvatcomponentcomponentaccess = response.data;}.bind(this));
axios.get('/api/administratorcomponentaccess').then(function (response) { this.administratorcomponentaccess = response.data;}.bind(this));
axios.get('/api/branchwalletcomponentaccess').then(function (response) { this.branchwalletcomponentaccess = response.data;}.bind(this));


                                // Fire.$emit('AfterAction');

                               // $('#addNew').modal('hide');

                                Toast.fire({
                                icon: 'success',
                                title: 'Record Added Successfully'
                                });

                                this.$Progress.finish();
                                  this.form.clear();
        this.form.reset();
                                })
                                .catch(()=>{

                                })


       }, 

  newofficeexpenditure(){
                      this.editmode = false;
                 this.form.clear();
        this.form.reset();
$('#makeofficeexpensemodal').modal('show');
            },
         

createNewcompanyexpense(){
      this.$Progress.start();
        this.form.post('api/expenses')
        .then(()=>{

         
    $('#addnewcompanyexpensemodal').modal('show');
    this.form.reset();
       axios.get("api/expenses").then(({ data }) => (this.datarecordscompanyexpenses = data));
     

  Toast.fire({
  icon: 'success',
  title: 'Expense Successfully Added'
});
        this.$Progress.finish();
this.loadGeneralExpenses();
})
        .catch(()=>{
          
        })
         
    },
newCompanyexpense(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewcompanyexpensemodal').modal('show');
            },


        
loadGeneralExpenses(){
        axios.get("api/expenses").then(({ data }) => (this.datarecordscompanyexpenses = data));
       /// axios.get("api/getExpensecategories").then(({ data }) => (this.expensecategory = data));
        axios.get("api/getExpensetypes").then(({ data }) => (this.expensetypes = data));
        //  axios.get("api/getExpensestomake").then(({ data }) => (this.expenseslist = data));
         
       
              axios.get("api/geteditCompanyexpense").then(({ data }) => (this.allowedtoeditCompanyexpense = data));
              axios.get("api/deleteCompanyexpense").then(({ data }) => (this.allowedtodeleteCompanyexpense = data));
              axios.get("api/getaddCompanyexpense").then(({ data }) => (this.allowedtoaddnewexpensereccord = data));
      axios.get("api/expensecategoriesaccessSettings").then(({ data }) => (this.expensecategoriesaccessSettings = data));    
      axios.get("api/expensetypesaccessSettings").then(({ data }) => (this.expensetypesaccessSettings = data));    
    axios.get("api/gencomponentaccessExpenses").then(({ data }) => (this.gencomponentaccessExpenses = data));
        axios.get("api/branchcashOutSettings").then(({ data }) => (this.branchcashOutSettings = data));
        axios.get("api/branchcashInSettings").then(({ data }) => (this.branchcashInSettings = data));
        axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
       
        axios.get("api/branchpayoutaccessSettings").then(({ data }) => (this.branchpayoutaccessSettings = data));
        axios.get("api/cashcollectionaccessSetting").then(({ data }) => (this.cashcollectionaccessSetting = data));
   axios.get("api/allcompanyexpensesaccessSettings").then(({ data }) => (this.allcompanyexpensesaccessSettings = data));
        axios.get("api/makeofficeexpenseaccessSettings").then(({ data }) => (this.makeofficeexpenseaccessSettings = data));
this.checkSubmenuaccessfeatures();
  },
  
    loadExpensecategorydetails(){
     axios.get("api/expensecategories").then(({ data }) => (this.expensecategorydetails = data));
            },
  loadCompanyGeneralregisteredexpenses(){
     axios.get("api/expenses").then(({ data }) => (this.datarecordscompanyexpenses = data));
            },
 loadCompanymadeexpenses(){
      axios.get("api/makeexpenseofficeuser").then(({ data }) => (this.officemadeexpensesrecords = data));
            },
laadCompanyfixedexpenses(){
       axios.get("api/companymonthlyexpensesrecords").then(({ data }) => (this.companymonthlyexpensesrecords = data));
            },

loadExpensesmadebyoffice(){
  //   this.checkMainmenuaccessfeatures();
       axios.get("api/makeexpenseofficeuser").then(({ data }) => (this.officemadeexpensesrecords = data));
          
    
 axios.get("api/allcompanyexpensesaccessSettings").then(({ data }) => (this.allcompanyexpensesaccessSettings = data));
        axios.get("api/makeofficeexpenseaccessSettings").then(({ data }) => (this.makeofficeexpenseaccessSettings = data));
      axios.get("api/gencomponentaccessExpenses").then(({ data }) => (this.gencomponentaccessExpenses = data));
        axios.get("api/branchcashOutSettings").then(({ data }) => (this.branchcashOutSettings = data));
        axios.get("api/expensetypesaccessSettings").then(({ data }) => (this.expensetypesaccessSettings = data));
        axios.get("api/expensecategoriesaccessSettings").then(({ data }) => (this.expensecategoriesaccessSettings = data));
        axios.get("api/branchcashInSettings").then(({ data }) => (this.branchcashInSettings = data));
        axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
        axios.get('/api/getWalletlist').then(function (response) { this.walletlist = response.data;}.bind(this));
       
       axios.get('/api/walletsofeapenselist').then(function (response) { this.walletsofeapenselist = response.data;}.bind(this));
       
        axios.get("api/branchpayoutaccessSettings").then(({ data }) => (this.branchpayoutaccessSettings = data));
        axios.get("api/cashcollectionaccessSetting").then(({ data }) => (this.cashcollectionaccessSetting = data));
///
     axios.get("api/getExpensestomake").then(({ data }) => (this.expenseslist = data));
   axios.get("api/getaddnewofficeexpense").then(({ data }) => (this.allowedtomakeofficeexpense = data));
      axios.get("api/geteditofficeexpense").then(({ data }) => (this.allowedtoeditofficeexpense = data));
       axios.get("api/getdeleteofficeexpense").then(({ data }) => (this.allowedtodeleteofficeexpense = data));


  },
  createNewcategory(){
      this.$Progress.start();
        this.form.post('api/expensecategories')
        .then(()=>{

         
    $('#addnewExpensecategorymodal').modal('hide');
    Fire.$emit('AfterAction');
  Toast.fire({
  icon: 'success',
  title: 'Record added successfully'
});
 this.loadExpensecategories();
        this.$Progress.finish();

        })
        .catch(()=>{
          
        })
         
    }, // end of create
loadExpensecategories(){
      
       axios.get("api/expensecategories").then(({ data }) => (this.expensecategorydetails = data));
     //  this.getRoles();
     //  this.getUsertypes();
        this.checkBranchescomponentfeatures();
        axios.get("api/gencomponentaccessExpenses").then(({ data }) => (this.gencomponentaccessExpenses = data));
        axios.get("api/expensecategoriesaccessSettings").then(({ data }) => (this.expensecategoriesaccessSettings = data));
        axios.get("api/expensetypesaccessSettings").then(({ data }) => (this.expensetypesaccessSettings = data));
         axios.get("api/allcompanyexpensesaccessSettings").then(({ data }) => (this.allcompanyexpensesaccessSettings = data));
        axios.get("api/makeofficeexpenseaccessSettings").then(({ data }) => (this.makeofficeexpenseaccessSettings = data));
        axios.get("api/branchcashOutSettings").then(({ data }) => (this.branchcashOutSettings = data));
        axios.get("api/branchcashInSettings").then(({ data }) => (this.branchcashInSettings = data));
        axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
       
        axios.get("api/branchpayoutaccessSettings").then(({ data }) => (this.branchpayoutaccessSettings = data));
        axios.get("api/cashcollectionaccessSetting").then(({ data }) => (this.cashcollectionaccessSetting = data));
        axios.get("api/getcurrencydetails").then(({ data }) => (this.currencydetails = data));
        axios.get('/api/branchDetails').then(function (response) { this.brancheslist = response.data;}.bind(this));
        axios.get('/api/mybranch').then(function (response) { this.mybrancheslist = response.data;}.bind(this));
        axios.get("api/shopopenningpalance").then(({ data }) => (this.shopopenningpalance = data));
        ///////////////
     axios.get("api/shopopenningpalance").then(({ data }) => (this.shopopenningpalance = data));
     axios.get("api/todayscashintotal").then(({ data }) => (this.todayscashintotal = data));
     axios.get("api/todayscashouttotal").then(({ data }) => (this.todayscashouttotal = data));
     axios.get("api/todaysexpensestotal").then(({ data }) => (this.todaysexpensestotal = data));
     axios.get("api/todayspayouttotal").then(({ data }) => (this.todayspayouttotal = data));

///



  


 axios.get("api/allowedexpensecategories").then(({ data }) => (this.allowedexpensecategories = data));

 axios.get("api/allowedcompanyexpenses").then(({ data }) => (this.allowedcompanyexpenses = data));
  axios.get("api/allowedexpensecategories").then(({ data }) => (this.allowedexpensecategories = data));
   axios.get("api/allowedrequestexpenses").then(({ data }) => (this.allowedrequestexpenses = data));
  axios.get("api/allowedmonthlyexpenses").then(({ data }) => (this.allowedmonthlyexpenses = data));


               axios.get("api/getaddnewexpensecategory").then(({ data }) => (this.allowedtoaddexpensecategory = data));
                        
              axios.get("api/geteditexpensecategory").then(({ data }) => (this.allowedtoeditexpensecategory = data));
              axios.get("api/getdeleteexpensecategory").then(({ data }) => (this.allowedtodeleteexpensecategory = data));

  },

confirmCashouttransfer(id){
   Swal.fire({
  title: 'CASH-IN CONFIRMATION',
  text: "You won't be able to revert this",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
  this.form.delete('api/approvecashout/'+id).then(()=>{
  
                        Swal.fire(
                          'Transfer Confirmed!',
                          'Transfer Done.',
                          'success'
                        )
                   
   axios.get("api/cashindetails").then(({ data }) => (this.shopcintransferrecords = data));
axios.get("api/cashoutfromofficeforfish").then(({ data }) => (this.fishcashcreditrecords = data));
  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },

   CreateNewcashcredit(){
      this.$Progress.start();
        this.form.post('api/makecashcredit')
        .then(()=>{

         
    $('#addnewcashcredit').modal('hide');
  //  Fire.$emit('AfterAction');
 axios.get("api/cashindetails").then(({ data }) => (this.admincashindatarecords = data));
  axios.get("api/fishcollections").then(({ data }) => (this.fishcollectionrecords = data));
  axios.get("api/cashoutfromofficeforfish").then(({ data }) => (this.fishcashcreditrecords = data));
  Toast.fire({
  icon: 'success',
  title: 'Component Feature Authorised'
});
        this.$Progress.finish();

        })
        .catch(()=>{
          
        })
         
    },

 updatemachineoneSales(event) {
        this.form.machineonesales = event.target.value
        this.form.machineonecurrentcode = this.form.machineonesales - this.form.machineonepayout
      },
      updatemachineonePayout(event) {
        this.form.machineonepayout = event.target.value
        this.form.machineonecurrentcode = this.form.machineonesales - this.form.machineonepayout
      },


myClickEventsavennn($event) { const elem = this.$refs.btnForshopbalancing
            elem.click()
        },

  SaveRecordbranch (){

  
this.form.post('api/branchtobalance');
          axios.get("api/branchtobalance").then(({ data }) => (this.clcash = data));
          axios.get("api/branchalreadybalanced").then(({ data }) => (this.branchbalancedforthisdate = data));
         // axios.get("api/pendingcashin").then(({ data }) => (this.pendingtransfer = data));
          axios.get("api/getbranchopenningb").then(({ data }) => (this.shopopenningbalance = data));
          axios.get("api/getbranchnamebalancing").then(({ data }) => (this.shopbalancngname = data));
         
          axios.get("api/getdaycashoutbranch").then(({ data }) => (this.totalcashout = data));
          axios.get("api/getdayexpensesbranch").then(({ data }) => (this.totalexpenses = data));
          axios.get("api/getdaypayoutbranch").then(({ data }) => (this.totalpayout = data));
          axios.get("api/getdaycashinbranch").then(({ data }) => (this.totaldayscashin = data));
axios.get("api/machineoneopenningcode").then(({ data }) => (this.machineoneopenningcode = data));
axios.get("api/fishgameproduct").then(({ data }) => (this.fishgameproduct = data));
 axios.get("api/fishmachinestotal").then(({ data }) => (this.fishmachinestotal = data));
axios.get("api/virtualgameproduct").then(({ data }) => (this.virtualgameproduct = data));
        axios.get("api/soccergameproduct").then(({ data }) => (this.soccergameproduct = data));

            },
  confirmFishcashin(id){
   Swal.fire({
  title: 'Cash-In Confirmation',
  text: "You won't be able to revert this",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
  this.form.delete('api/approvefishcashin/'+id).then(()=>{
   this.balancescheck();
                        Swal.fire(
                          'Shop Cashout Confirmed!',
                          'Your file has been deleted.',
                          'success'
                        )
                   
    axios.get("api/fishcollections").then(({ data }) => (this.fishcollectionrecords = data));

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },

    CreateNewcashcollection(){
      this.$Progress.start();
        this.form.post('api/makecashcollection')
        .then(()=>{

         
    $('#addnewcashcollection').modal('hide');
  //  Fire.$emit('AfterAction');
 axios.get("api/cashindetails").then(({ data }) => (this.admincashindatarecords = data));
  axios.get("api/fishcollections").then(({ data }) => (this.fishcollectionrecords = data));
 
  Toast.fire({
  icon: 'success',
  title: 'Transaction Successfull'
});
        this.$Progress.finish();

        })
        .catch(()=>{
          
        })
         
    },

myClicktoaddBranchcollection($event) { const elem = this.$refs.myButtontosavecollectionbrunch
            elem.click()
        },

myClicktoaddcompanyinaction($event) { const elem = this.$refs.myButtontosavecompanyinaction
            elem.click()
        },


        
savecountryinAction (){
this.form.post('api/contryinaction');
//axios.get('/api/getcompaniesdetails').then(function (response) { this.companieslist = response.data;}.bind(this));
  axios.get("api/getcompaniesdetails").then(({ data }) => (this.companieslist = data));
//   axios.get("api/getbranchopenningb").then(({ data }) => (this.shopopenningbalance = data));

//    axios.get("api/getbranchnametocollectfrom").then(({ data }) => (this.shopbalancngname = data));
// /////////
//        axios.get("api/getdaycashoutbranch").then(({ data }) => (this.totalcashout = data));
     
//       axios.get("api/getdayexpensesbranch").then(({ data }) => (this.totalexpenses = data));
//      axios.get("api/gettodayscashout").then(({ data }) => (this.totalcashout = data));   
//      axios.get("api/gettodayexpenses").then(({ data }) => (this.totalexpenses = data)); 
//      axios.get("api/gettodayspayout").then(({ data }) => (this.totalpayout = data));
//      axios.get("api/gettodaycashin").then(({ data }) => (this.cashinforcollectiontotal = data));
//      axios.get("api/getbranchopenningbalancefortoday").then(({ data }) => (this.shopopenningbalancecacollectpoint = data));
            



        },



SavetheCollectionbranch (){
this.form.post('api/brachtocollectorcredit');
   axios.get("api/cashindetails").then(({ data }) => (this.admincashindatarecords = data));
  axios.get("api/getbranchopenningb").then(({ data }) => (this.shopopenningbalance = data));

   axios.get("api/getbranchnametocollectfrom").then(({ data }) => (this.shopbalancngname = data));
/////////
       axios.get("api/getdaycashoutbranch").then(({ data }) => (this.totalcashout = data));
     
      axios.get("api/getdayexpensesbranch").then(({ data }) => (this.totalexpenses = data));
     axios.get("api/gettodayscashout").then(({ data }) => (this.totalcashout = data));   
     axios.get("api/gettodayexpenses").then(({ data }) => (this.totalexpenses = data)); 
     axios.get("api/gettodayspayout").then(({ data }) => (this.totalpayout = data));
     axios.get("api/gettodaycashin").then(({ data }) => (this.cashinforcollectiontotal = data));
     axios.get("api/getbranchopenningbalancefortoday").then(({ data }) => (this.shopopenningbalancecacollectpoint = data));
            



        }, 
        SavetheCreditbranch (){

  axios.get("api/cashoutfromoffice").then(({ data }) => (this.admincashoutrecords = data));
  this.form.post('api/brachtocollectorcredit');
 //axios.get("api/branchtobalance").then(({ data }) => (this.clcash = data));
 // axios.get("api/branchalreadybalanced").then(({ data }) => (this.branchbalancedforthisdate = data));
  //axios.get("api/pendingcashin").then(({ data }) => (this.pendingtransfer = data));
  // axios.get("api/getbranchopenningb").then(({ data }) => (this.shopopenningbalance = data));
 // axios.get("api/getbranchnamebalancing").then(({ data }) => (this.shopbalancngname = data));
   axios.get("api/getbranchnametocollectfrom").then(({ data }) => (this.shopbalancngname = data));
// axios.get("api/getbranchopenningb").then(({ data }) => (this.shopopenningbalance = data));
   
     //    axios.get("api/getdaypayoutbranch").then(({ data }) => (this.totalpayout = data));
         

/////////
       axios.get("api/getdaycashoutbranch").then(({ data }) => (this.totalcashout = data));
     
      axios.get("api/getdayexpensesbranch").then(({ data }) => (this.totalexpenses = data));
     axios.get("api/gettodayscashout").then(({ data }) => (this.totalcashout = data));   
     axios.get("api/gettodayexpenses").then(({ data }) => (this.totalexpenses = data)); 
     axios.get("api/gettodayspayout").then(({ data }) => (this.totalpayout = data));
     axios.get("api/gettodaycashin").then(({ data }) => (this.cashinforcollectiontotal = data));
     axios.get("api/getbranchopenningbalancefortoday").then(({ data }) => (this.shopopenningbalancecacollectpoint = data));
            



        }, 
     getExpensecategirieslist(){
 axios.get("api/getexpensecategorieslist").then(({ data }) => (this.expensecategorieslist = data)); 
 axios.get("api/getexpensetypeslist").then(({ data }) => (this.expensetypeslist = data)); 
 


},  

 loadfishcollectionrecords(){

 axios.get('/api/fishcollections').then(function (response) { this.fishcollectionrecords = response.data;}.bind(this));
     //  this.getRoles();
     //  this.getUsertypes();
    //  axios.get("api/shopopenningpalance").then(({ data }) => (this.shopopenningpalance = data));
    //  axios.get("api/todayscashintotal").then(({ data }) => (this.todayscashintotal = data));
    //  axios.get("api/todayscashouttotal").then(({ data }) => (this.todayscashouttotal = data));
    //  axios.get("api/todaysexpensestotal").then(({ data }) => (this.todaysexpensestotal = data));
    //  axios.get("api/todayspayouttotal").then(({ data }) => (this.todayspayouttotal = data));
 },
 loadfishcreditsrecords: function(){ axios.get('/api/cashoutfromofficeforfish').then(function (response) { this.fishcashcreditrecords = response.data;}.bind(this));},

getCurrencydetals: function(){ axios.get("api/getcurrencydetails").then(({ data }) => (this.currencydetails = data));},
allwedetodeleteBalancingrecord: function(){axios.get("api/allowedtodeleteshopBalancingRecord").then(({ data }) => (this.allowedtodeleteshopBalancingRecord = data));},
    


 getCollectionsBalance: function(){ axios.get("api/collectionsaccountcurrentbalance").then(({ data }) => (this.collectionsaccountcurrentbalance = data));},



 getShopbalancingrecords: function(){ axios.get('/api/currentbalancingrecords').then(function (response) { this.shopbalancingdatarecords = response.data;}.bind(this));},
getcompanies: function(){ axios.get('/api/getcompaniesdetails').then(function (response) { this.companieslist = response.data;}.bind(this));},
getcountries: function(){ axios.get('/api/getCountries').then(function (response) { this.countrieslist = response.data;}.bind(this));},
getRoles: function(){ axios.get('/api/getRoles').then(function (response) { this.roleslist = response.data;}.bind(this));},
getBranches: function(){  axios.get('/api/branchDetails').then(function (response) { this.brancheslist = response.data;}.bind(this));},

getWalletlist: function(){  axios.get('/api/getWalletlist').then(function (response) { this.walletlist = response.data;}.bind(this));},

getUsertypes: function(){ axios.get('/api/getUsertypes').then(function (response) { this.typeslist = response.data;}.bind(this));},


    formatPrice(value) {
        let val = (value/1).toFixed(0).replace('.', ',')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    },
    /// submiting the balancing record date and branch
myClickEventroletoaddcomponent($event) { const elem = this.$refs.myBtnroledd
            elem.click()
        },

myClickEventforsubmenus($event) { const elem = this.$refs.myBtnsubmenus
            elem.click()
        },

myClickEventformainmenuas($event) { const elem = this.$refs.myBtnmainmen
            elem.click()
        },

  myClickEvent($event) { const elem = this.$refs.myBtn
            elem.click()
        },
         myClickEvent2($event) { const elem = this.$refs.myBtn2
            elem.click()
        },

SaveRoletoaddmainmenu (){ 
    this.form.post('api/roletoaddmainmenu');
     axios.get("api/authorisedmainmenus").then(({ data }) => (this.datarecordsMainmenuauthorised = data));
            },

SaveRoletoaddsubment (){ 
    this.form.post('api/roletoaddsumenu');
     axios.get("api/authorisedsubmenus").then(({ data }) => (this.datarecordsSubmenusauthorised = data));
            },

  SaveRoletoaddcomponent (){ 
    this.form.post('api/roletobalance');
     axios.get("api/authorisedcomponents").then(({ data }) => (this.allowedrolecomponentsObject = data));
 
            },

              SaveRoletoaddformcomponent (){ 
    this.form.post('api/saveroleformcomponent');
     axios.get("api/authorisedformcomponents").then(({ data }) => (this.allowedrolecomponentfeaturesObject = data));
 
            },




paginationroleAuthorisedsubmenues(page = 1) {
                        axios.get('api/authorisedsubmenus?page=' + page)
                          .then(response => {
                            this.datarecordsSubmenusauthorised = response.data;
                          });
                      },

                      paginationroleAuthorisedmainmenus(page = 1) {
                        axios.get('api/authorisedmainmenus?page=' + page)
                          .then(response => {
                            this.datarecordsMainmenuauthorised = response.data;
                          });
                      },



paginationroleAuthorisedcomponents(page = 1) {
                        axios.get('api/authorisedcomponents?page=' + page)
                          .then(response => {
                            this.allowedrolecomponentsObject = response.data;
                          });
                      },


paginationroleAuthorisedcomponentsfeature(page = 1) {
                        axios.get('api/authorisedformcomponents?page=' + page)
                          .then(response => {
                            this.allowedrolecomponentfeaturesObject = response.data;
                          });
                      },



   paginationResultsBranches(page = 1) {
                        axios.get('api/branches?page=' + page)
                          .then(response => {
                            this.branchesrecords = response.data;
                          });
                      },
  /// users
  
  loadUsers(){
     
      axios.get("api/userrecords").then(({ data }) => (this.userrecords = data));
        axios.get("api/generalExpensesmainpageAccess").then(({ data }) => (this.generalExpensesmainpageAccess = data));
        axios.get("api/branchesccessSettings").then(({ data }) => (this.branchesccessSettings = data));
        axios.get("api/rolesaccessSettings").then(({ data }) => (this.rolesaccessSettings = data));
        axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
        axios.get("api/componentaccessSettings").then(({ data }) => (this.componentaccessSettings = data));
        axios.get("api/mainmenuaccessSettings").then(({ data }) => (this.mainmenuaccessSettings = data));
        axios.get("api/featuresaccessSettings").then(({ data }) => (this.featuresaccessSettings = data));

      
  },
  loadRoles(){
     
      axios.get("api/rolesrecords").then(({ data }) => (this.rolesrecords = data));
        // axios.get("api/generalExpensesmainpageAccess").then(({ data }) => (this.generalExpensesmainpageAccess = data));
        // axios.get("api/branchesccessSettings").then(({ data }) => (this.branchesccessSettings = data));
        // axios.get("api/rolesaccessSettings").then(({ data }) => (this.rolesaccessSettings = data));
        // axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
        // axios.get("api/componentaccessSettings").then(({ data }) => (this.componentaccessSettings = data));
        // axios.get("api/mainmenuaccessSettings").then(({ data }) => (this.mainmenuaccessSettings = data));
        // axios.get("api/featuresaccessSettings").then(({ data }) => (this.featuresaccessSettings = data));

      
  },
  
   
   loadCompanies(){
     axios.get("api/companyrecords").then(({ data }) => (this.companyrecords = data));
        // this.checkBranchescomponentfeatures();
        // axios.get("api/generalExpensesmainpageAccess").then(({ data }) => (this.generalExpensesmainpageAccess = data));
        // axios.get("api/branchesccessSettings").then(({ data }) => (this.branchesccessSettings = data));
        // axios.get("api/rolesaccessSettings").then(({ data }) => (this.rolesaccessSettings = data));
        // axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
        // axios.get("api/componentaccessSettings").then(({ data }) => (this.componentaccessSettings = data));
        // axios.get("api/mainmenuaccessSettings").then(({ data }) => (this.mainmenuaccessSettings = data));
        // axios.get("api/featuresaccessSettings").then(({ data }) => (this.featuresaccessSettings = data));

        //  axios.get('/api/branchDetails').then(function (response) { this.brancheslist = response.data;}.bind(this));

  },
 
  loadBranches(){
       axios.get("api/branches").then(({ data }) => (this.branchesrecords = data));
     //  this.getRoles();
          //  this.getUsertypes();
        this.checkBranchescomponentfeatures();
        axios.get("api/generalExpensesmainpageAccess").then(({ data }) => (this.generalExpensesmainpageAccess = data));
        axios.get("api/branchesccessSettings").then(({ data }) => (this.branchesccessSettings = data));
        axios.get("api/rolesaccessSettings").then(({ data }) => (this.rolesaccessSettings = data));
        axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
        axios.get("api/componentaccessSettings").then(({ data }) => (this.componentaccessSettings = data));
        axios.get("api/mainmenuaccessSettings").then(({ data }) => (this.mainmenuaccessSettings = data));
        axios.get("api/featuresaccessSettings").then(({ data }) => (this.featuresaccessSettings = data));

         axios.get('/api/branchDetails').then(function (response) { this.brancheslist = response.data;}.bind(this));

  },

loadSubmenaccess(){
        axios.get("api/authorisedsubmenus").then(({ data }) => (this.datarecordsSubmenusauthorised = data));
          
        axios.get("api/getSubmenues").then(({ data }) => (this.submenulist = data));
      //  this.getRoles();
      //  this.getUsertypes();
     
    axios.get("api/generalExpensesmainpageAccess").then(({ data }) => (this.generalExpensesmainpageAccess = data));
        axios.get("api/branchesccessSettings").then(({ data }) => (this.branchesccessSettings = data));
        axios.get("api/rolesaccessSettings").then(({ data }) => (this.rolesaccessSettings = data));
        axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
        axios.get("api/componentaccessSettings").then(({ data }) => (this.componentaccessSettings = data));
        axios.get("api/mainmenuaccessSettings").then(({ data }) => (this.mainmenuaccessSettings = data));
        axios.get("api/featuresaccessSettings").then(({ data }) => (this.featuresaccessSettings = data));
  
this.checkSubmenuaccessfeatures();
  },

loadMainmenuaccess(){
  this.getRoles();
     this.checkMainmenuaccessfeatures();
axios.get("api/authorisedmainmenus").then(({ data }) => (this.datarecordsMainmenuauthorised = data));
          
         axios.get("api/mainmenulist").then(({ data }) => (this.mainmenulist = data));

      axios.get("api/generalExpensesmainpageAccess").then(({ data }) => (this.generalExpensesmainpageAccess = data));
        axios.get("api/branchesccessSettings").then(({ data }) => (this.branchesccessSettings = data));
        
        axios.get("api/rolesaccessSettings").then(({ data }) => (this.rolesaccessSettings = data));
        axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
        axios.get("api/componentaccessSettings").then(({ data }) => (this.componentaccessSettings = data));
        axios.get("api/mainmenuaccessSettings").then(({ data }) => (this.mainmenuaccessSettings = data));
        axios.get("api/featuresaccessSettings").then(({ data }) => (this.featuresaccessSettings = data));


  },
  loadcomponentsAllowedfortherole(){
        axios.get("api/authorisedcomponents").then(({ data }) => (this.allowedrolecomponentsObject = data));
        
        axios.get("api/getlistofcomponents").then(({ data }) => (this.componentslist = data));
      //  this.getRoles();
      //  this.getUsertypes();
    axios.get("api/generalExpensesmainpageAccess").then(({ data }) => (this.generalExpensesmainpageAccess = data));
        axios.get("api/branchesccessSettings").then(({ data }) => (this.branchesccessSettings = data));
        axios.get("api/rolesaccessSettings").then(({ data }) => (this.rolesaccessSettings = data));
        axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
        axios.get("api/componentaccessSettings").then(({ data }) => (this.componentaccessSettings = data));
        axios.get("api/mainmenuaccessSettings").then(({ data }) => (this.mainmenuaccessSettings = data));
        axios.get("api/featuresaccessSettings").then(({ data }) => (this.featuresaccessSettings = data));
     this.checkComponentaccessfeatures();
  

  },



   loadcomponentsAllowedcomponentfeatures(){
      axios.get("api/authorisedformcomponents").then(({ data }) => (this.allowedrolecomponentfeaturesObject = data));
        axios.get("api/getformfeatures").then(({ data }) => (this.formfeatures = data));

        axios.get("api/getlistofcomponents").then(({ data }) => (this.componentslist = data));
       this.getRoles();
       
     
  

  },

newmainmenuaccess(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewaccesstomainmenu').modal('show');
            },
            
            newmonthlyexpenseadd(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewmonthlyexpense').modal('show');
            },
                 
newsubmenuaccess(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewaccesstosubmenu').modal('show');
            },
                    


 makeBranchcredit(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewcashcredit').modal('show');
            },

 makeBranchcollection(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewcashcollection').modal('show');
            },
 newcomponentadd(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewComponenttotheRole').modal('show');
            },

newcomponentfeatureadd(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewcomponentfeature').modal('show');
            },
        
 newsupplierModal(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewsupplierModal').modal('show');
            },


  editSupplier(suppliers){
                this.editmode = true;
                 this.form.clear();
        this.form.reset();
        this.form.fill(suppliers);
$('#addnewsupplierModal').modal('show');
            },


   newcompanydetailsModal(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewExpensecategorymodal').modal('show');
            },


  createBalancingrecord(){
      this.$Progress.start();
        this.form.post('api/currentbalancingrecords')
        .then(()=>{

         
    $('#addnewExpensecategorymodal').modal('hide');
 //   Fire.$emit('AfterAction');
  Toast.fire({
  icon: 'success',
  title: 'Record Successfully Added'
});
        this.$Progress.finish();
axios.get("api/currentbalancingrecords").then(({ data }) => (this.shopbalancingdatarecords = data));
        })
        .catch(()=>{
          
        })
         
    },


 editCompanyRecords(companyrecords){
                this.editmode = true;
                 this.form.clear();
        this.form.reset();
        this.form.fill(companyrecords);
$('#addnewCompanyreg').modal('show');
            },







     newBranchmodal(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewBranchmodal').modal('show');
            },
   editUser(branchesrecords){
                this.editmode = true;
                 this.form.clear();
        this.form.reset();
        this.form.fill(branchesrecords);
$('#addnewBranchmodal').modal('show');
            },
          
       createSupplier(){
      this.$Progress.start();
        this.form.post('api/suppliers')
        .then(()=>{

         
    $('#addnewsupplierModal').modal('show');
     this.form.clear();
        this.form.reset();
    axios.get("api/suppliers").then(({ data }) => (this.suppliers = data));
  Toast.fire({
  icon: 'success',
  title: 'Record added successfully'
});
        this.$Progress.finish();

        })
        .catch(()=>{
          
        })
         
    }, // end of create
   updateSupplier(){
    this.$Progress.start();
          
this.form.put('api/suppliers/'+this.form.id)
  .then(()=> {
    // on success
   $('#addnewsupplierModal').modal('hide');
    Swal.fire(
        'Update!',
        'Record has been updated.',
        'success'
      )
      this.$Progress.finish();
    // Fire.$emit('AfterAction');
    axios.get("api/suppliers").then(({ data }) => (this.suppliers = data));

  })


  .catch(()=>{
 this.$Progress.fail();
   Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});
  
  
  });
   },// end of update

deleteUser(id){
   Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
  this.form.delete('api/userrecords/'+id).then(()=>{
  
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                   
 axios.get("api/userrecords").then(({ data }) => (this.userrecords = data));

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },// End of delrte function
deleteBranch(id){
   Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
  this.form.delete('api/branches/'+id).then(()=>{
  
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                   
 axios.get("api/branches").then(({ data }) => (this.branchesrecords = data));

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },// End of delrte function
      




  savecompanyinaction(){

                                this.loading = true;
                                this.form.post('api/savecompanyinaction')
                                .then(()=>{



                                  this.form.clear();
        this.form.reset();
                                })
                                .catch(()=>{

                                })

}, 
      /////////////////////////////////////////////////////////

                              
submitcompanyinaction($event) { const elem = this.$refs.buttonsubmitcompanyinaction
            elem.click()
        },




createSystemuser(){
      this.$Progress.start();
        this.form.post('api/userrecords')
        .then(()=>{

            this.form.reset();
    $('#addnewcashcollection').modal('hide');
    Fire.$emit('AfterAction');
       axios.get("api/userrecords").then(({ data }) => (this.userrecords = data));
  Toast.fire({
  icon: 'success',
  title: 'Record added successfully'
});
        this.$Progress.finish();

        })
        .catch(()=>{
          
        })
         
    }, // end of create
 updateSystemuser(){
    this.$Progress.start();
          
this.form.put('api/userrecords/'+this.form.id)
  .then(()=> {
    // on success
   $('#addnewcashcollection').modal('hide');
    Swal.fire(
        'Update!',
        'Record has been updated.',
        'success'
      )
      this.$Progress.finish();
    // Fire.$emit('AfterAction');
  
    axios.get("api/userrecords").then(({ data }) => (this.userrecords = data));
    

  })


  .catch(()=>{
 this.$Progress.fail();
   Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});
  
  
  });
   },// end of update































createCompany(){
      this.$Progress.start();
        this.form.post('api/companyrecords')
        .then(()=>{

         
    $('#addnewCompanyreg').modal('hide');
    Fire.$emit('AfterAction');
       axios.get("api/companyrecords").then(({ data }) => (this.companyrecords = data));
  Toast.fire({
  icon: 'success',
  title: 'Record added successfully'
});
        this.$Progress.finish();

        })
        .catch(()=>{
          
        })
         
    }, // end of create
 updateCompanydetails(){
    this.$Progress.start();
          
this.form.put('api/companyrecords/'+this.form.id)
  .then(()=> {
    // on success
   $('#addnewCompanyreg').modal('hide');
    Swal.fire(
        'Update!',
        'Record has been updated.',
        'success'
      )
      this.$Progress.finish();
    // Fire.$emit('AfterAction');
  
    axios.get("api/companyrecords").then(({ data }) => (this.companyrecords = data));
    

  })


  .catch(()=>{
 this.$Progress.fail();
   Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});
  
  
  });
   },// end of update



























    // ///////////////////////
    createBranch(){
      this.$Progress.start();
        this.form.post('api/branches')
        .then(()=>{

         
    $('#addnewBranchmodal').modal('hide');
    Fire.$emit('AfterAction');
  Toast.fire({
  icon: 'success',
  title: 'Record added successfully'
});
        this.$Progress.finish();

        })
        .catch(()=>{
          
        })
         
    }, // end of create


    
   updateBranch(){
    this.$Progress.start();
          
this.form.put('api/branches/'+this.form.id)
  .then(()=> {
    // on success
   $('#addnewBranchmodal').modal('hide');
    Swal.fire(
        'Update!',
        'Record has been updated.',
        'success'
      )
      this.$Progress.finish();
    // Fire.$emit('AfterAction');
    axios.get("api/branches").then(({ data }) => (this.branchesrecords = data));
    axios.get("api/companyrecords").then(({ data }) => (this.companyrecords = data));
    

  })


  .catch(()=>{
 this.$Progress.fail();
   Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});
  
  
  });
   },// end of update

deleteBranch(id){
   Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
  this.form.delete('api/branches/'+id).then(()=>{
  
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                   
 axios.get("api/branches").then(({ data }) => (this.branchesrecords = data));
 axios.get("api/companyrecords").then(({ data }) => (this.companyrecords = data));
  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },// End of delrte function
////////////////////////////////////////////////////////
         
             createAuthorisecomponentfeature(){
      this.$Progress.start();
        this.form.post('api/saveformcomponentaccess')
        .then(()=>{

         
    $('#addnewBranchmodal').modal('hide');
  //  Fire.$emit('AfterAction');
  axios.get("api/authorisedformcomponents").then(({ data }) => (this.allowedrolecomponentfeaturesObject = data));
  Toast.fire({
  icon: 'success',
  title: 'Component Feature Authorised'
});
        this.$Progress.finish();
 axios.get("api/authorisedformcomponents").then(({ data }) => (this.allowedrolecomponentfeaturesObject = data));
        })
        .catch(()=>{
          
        })
         
    },

    

createMainuaccess(){
      this.$Progress.start();
        this.form.post('api/savemainmenuaccess')
        .then(()=>{

         
    $('#addnewaccesstomainmenu').modal('hide');
   axios.get("api/authorisedmainmenus").then(({ data }) => (this.datarecordsMainmenuauthorised = data));

  Toast.fire({
  icon: 'success',
  title: 'Component Authorised'
});
        this.$Progress.finish();
//axios.get("api/authorisedcomponents").then(({ data }) => (this.allowedrolecomponentsObject = data));
        })
        .catch(()=>{
          
        })
         
    },






createSubmenuaccess(){
      this.$Progress.start();
        this.form.post('api/savesubmenuaccess')
        .then(()=>{

         
    $('#addnewaccesstosubmenu').modal('show');
   axios.get("api/authorisedsubmenus").then(({ data }) => (this.datarecordsSubmenusauthorised = data));
  Toast.fire({
  icon: 'success',
  title: 'Component Authorised'
});
        this.$Progress.finish();
axios.get("api/authorisedcomponents").then(({ data }) => (this.allowedrolecomponentsObject = data));
        })
        .catch(()=>{
          
        })
         
    },
    createAuthorisedrole(){
      this.$Progress.start();
        this.form.post('api/saveaccesstovuecomponent')
        .then(()=>{

         
    $('#addnewBranchmodal').modal('hide');
    Fire.$emit('AfterAction');
  Toast.fire({
  icon: 'success',
  title: 'Component Authorised'
});
        this.$Progress.finish();
axios.get("api/authorisedcomponents").then(({ data }) => (this.allowedrolecomponentsObject = data));
        })
        .catch(()=>{
          
        })
         
    },
            // Revoke COmponent access


revokeroleComponentfeature(id){
   Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
   this.form.delete('api/authorisedformcomponents/'+id).then(()=>{
  
                        Swal.fire(
                          'Right Revoked!',
                          'Transaction Done.',
                          'success'
                        )
         axios.get("api/authorisedformcomponents").then(({ data }) => (this.allowedrolecomponentfeaturesObject = data));
           
  

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },





revokeMainmenuuaccess(id){
   Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
   this.form.delete('api/savemainmenuaccess/'+id).then(()=>{
  
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                   
    axios.get("api/authorisedmainmenus").then(({ data }) => (this.datarecordsMainmenuauthorised = data));
  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },


revokeSubmenuaccess(id){
   Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
   this.form.delete('api/savesubmenuaccess/'+id).then(()=>{
  
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                   
     axios.get("api/authorisedsubmenus").then(({ data }) => (this.datarecordsSubmenusauthorised = data));
  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },
  ////////////////////






revokeroleComponent(id){
   Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
   this.form.delete('api/saveaccesstovuecomponent/'+id).then(()=>{
  
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                   
      axios.get("api/authorisedcomponents").then(({ data }) => (this.allowedrolecomponentsObject = data));

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },
            /// end of revoke component






 checkBranchescomponentfeatures: function(){
              axios.get("api/getAddnewbranch").then(({ data }) => (this.allowedtoaddbranch = data));
              axios.get("api/getviewbranch").then(({ data }) => (this.allowedtoviewbranch = data));
              axios.get("api/geteditBrabcg").then(({ data }) => (this.allowedtoeditbranch = data));
              axios.get("api/getdeletebranch").then(({ data }) => (this.allowedtodeletebranch = data));
           },


 checkMainmenuaccessfeatures: function(){
             
             axios.get("api/getRevokemainmenuaccess").then(({ data }) => (this.allowedtorevokemainmenuaccess = data));
              axios.get("api/getGrantmainmenuaccess").then(({ data }) => (this.allowedtoaddmainmenuaccess = data));
           },


 checkSubmenuaccessfeatures: function(){
             
             axios.get("api/getRevokesubmenuaccess").then(({ data }) => (this.allowedtorevokesubmenuaccess = data));
              axios.get("api/getGrantsubmenuaccess").then(({ data }) => (this.allowedtoaddsubmenuaccess = data));
           },

           checkComponentaccessfeatures: function(){
             
             axios.get("api/getRevokecomponentaccess").then(({ data }) => (this.allowedtorevokecomponentaccess = data));
              axios.get("api/getGrantcomponentaccess").then(({ data }) => (this.allowedtogivecomponentaccess = data));
           },

balancescheck(){
       axios.get("api/getWalletlist").then(({ data }) => (this.walletlist = data));
       axios.get("api/capitalaccountcurrentbalance").then(({ data }) => (this.capitalaccountcurrentbalance = data));
    axios.get("api/pettycashaccountcurrentbalance").then(({ data }) => (this.pettycashaccountcurrentbalance = data));
    axios.get("api/bankaccountcurrentbalance").then(({ data }) => (this.bankaccountcurrentbalance = data));
    axios.get("api/collectionsaccountcurrentbalance").then(({ data }) => (this.collectionsaccountcurrentbalance = data));
    ////
     axios.get("api/allowedtoviewcapitalaccount").then(({ data }) => (this.allowedtoviewcapitalaccount = data));
       axios.get("api/allowedtoviewpettycashaccount").then(({ data }) => (this.allowedtoviewpettycashaccount = data));
        axios.get("api/allowedtoviewbankaccount").then(({ data }) => (this.allowedtoviewbankaccount = data));
         axios.get("api/allowedtoviewcollectionsccount").then(({ data }) => (this.allowedtoviewcollectionsccount = data));
         axios.get("api/allowedtodeletecredit").then(({ data }) => (this.allowedtodeletecredit = data));   
               axios.get("api/allowedtodeletecollection").then(({ data }) => (this.allowedtodeletecollection = data));       

  },

            

},// end of methods


///////////////////////////////////////////////////
        created() {
            axios.get("api/getExpensestomake").then(({ data }) => (this.expenseslist = data));
            axios.get("api/loggedinuserrole").then(({ data }) => (this.loggedinuserrole = data));
            axios.get("api/expensablewallets").then(({ data }) => (this.expensablewallets = data));
            this.loadExpensesmadebyoffice();
            this.getExpensecategirieslist();
          this.getCollectionsBalance();
     //    this.getShopbalancingrecords();
     this.loadExpensecategories();
         this.allwedetodeleteBalancingrecord();
         this.getCurrencydetals();
         this.loadCompanies();
         this.getcountries();
         this.getcompanies();
         this.getRoles();
           this.getBranches();
           this.loadUsers();
            this.loadRoles();
            this.loadBranches();
          this.getWalletlist();
               axios.get("api/getAddnewbranch").then(({ data }) => (this.allowedtoaddbranch = data));
                 axios.get("api/mainmenulist").then(({ data }) => (this.mainmenulist = data));
                axios.get("api/getSubmenues").then(({ data }) => (this.submenulist = data));
                 axios.get("api/getlistofcomponents").then(({ data }) => (this.componentslist = data));
                   axios.get("api/getlistofcomponents").then(({ data }) => (this.componentslist = data));
                   axios.get("api/getformfeatures").then(({ data }) => (this.formfeatures = data));

     
           //this.checkBranchescomponentfeatures();
            Fire.$on('AfterAction', () =>{
this.loadBranches();
      });
//   setInterval(() =>this.balancescheck(),1000);
        }
    }
</script>
