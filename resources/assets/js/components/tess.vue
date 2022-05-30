
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                        FINANCIAL TRANSACTIONS
                            </h2>
                            
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">



                       


                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">


                             

                     





                                <div role="tabpanel" class="tab-pane fade" id="home_with_icon_title">
                                      <div class="bethapa-table-header">
                      Cash Collection details 
                      <button type="button" class="add-newm" @click="makeBranchcollection" >Make collection </button> 
                     </div>




  <table class="table">
                  <thead>
                    <tr>
                       <th>#</th>
                      
                      <th>DATE</th>
                      <th>COUNTRY</th>
                        <th>COMPANY</th>
                           <th>BRANCH</th>
                      <th>FROM </th>
                      
                      <th>AMOUNT  ({{currencydetails }})</th>
                        <th>COMMENT </th>
                    
                        <th>APPROVED</th>
                      
                         <th>STATUS</th>
                         <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                   <tr v-for="fishcoll in fishcollectionrecords.data" :key="fishcoll.id">
                       <td>{{fishcoll.id}}</td>
                       <td>{{(fishcoll.transferdate)}}</td>
                       <td> <template v-if="fishcoll.country_cintransfers">	{{fishcoll.country_cintransfers.countryname}}</template></td>
                        <td> <template v-if="fishcoll.company_cintransfers">	{{fishcoll.company_cintransfers.companyname}}</template></td>




                       <td>   <template v-if="fishcoll.branch_name">	{{fishcoll.branch_name.branchname}}</template></td>
                       <td> <template v-if="fishcoll.cerated_userdetails">	{{fishcoll.cerated_userdetails.name}}</template> - <template v-if="fishcoll.branch_namefrom">	{{fishcoll.branch_namefrom.branchname}}</template> </td>
                       <td> {{formatPrice(fishcoll.amount)}}</td>
                        <td>{{(fishcoll.description)}}</td>
                    
                       <td><template v-if="fishcoll.approved_userdetails">	{{fishcoll.approved_userdetails.name}}</template> <i>{{(fishcoll.comptime)}} </i></td>
                      
                       <td> <template v-if="fishcoll.status_name">	{{fishcoll.status_name.name}}</template></td>
                     <td>
                       <button v-show="fishcoll.status < 1" type="button"   class="btn  bg-gradient-secondary btn-xs"  @click="confirmFishcashin(fishcoll.id)"> Confirm Collection </button>
                       <!-- <button v-show="fishcoll.status === 1" type="button"   class="btn  bg-gradient-success btn-xs"  > Confirmed  </button> -->
                       <div v-if="allowedtodeletecollection > 0">
                           <button type="button"  class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="deletecashcollection(fishcoll.id)"> Delete Collection </button>
                       </div>
                       <!-- <button type="button"  v-show="fishcoll.status < 1"   class="btn  bg-gradient-secondary btn-xs fas fa-edit"  @click="editfishcollection(fishcollectionrecords)">Edit</button>
                             <button type="button"  v-show="fishcoll.status < 1" class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="deletecashcollection(fishcollectionrecords.id)"> DEl </button> -->



                       </td>
                  
                     
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>
    <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="fishcollectionrecords" @pagination-change-page="paginationResultsBranches"></pagination>
                </ul>
              </div>
 











                                </div>












                                <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                            
 

<div class="modal fade" id="addnewsupplierModal">
         <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3  v-show="!editmode"    class="modal-title"><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">ADD NEW SUPPLIER</h3> 
                <h4  v-show="editmode" class="modal-title" ><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">Update SUPPLIER</h3> </h4> 
                        </div>
                  <form class="form-horizontal" @submit.prevent="editmode ? updateSupplier():createSupplier()"> 

                
<!-- <div class ="bethapa-table-sectionheader">Company Details</div> -->
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Date : </label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.company" type="text" name="company"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('company') }">
                    <has-error :form="form" field="company"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Location</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input v-model="form.location" type="text" name="location"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('location') }">
                    <has-error :form="form" field="location"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Contact</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input v-model="form.contact" type="text" name="contact"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('contact') }">
                    <has-error :form="form" field="contact"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Email</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input v-model="form.companyemailaddress" type="text" name="companyemailaddress"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('companyemailaddress') }">
                    <has-error :form="form" field="companyemailaddress"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<div class ="bethapa-table-sectionheader">Contact Person Details</div>
                                           <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input v-model="form.companycontactperson" type="text" name="companycontactperson"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('companycontactperson') }">
                    <has-error :form="form" field="companycontactperson"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

    <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Contact</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input v-model="form.contactofcontact" type="text" name="contactofcontact"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('contactofcontact') }">
                    <has-error :form="form" field="contactofcontact"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>


   

                                 <!-- <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">fgh</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <select class="form-control show-tick" data-live-search="true">
                                        <option></option>
                                        <option>Burger, Shake and a Smile</option>
                                        <option>Sugar, Spice and all things nice</option>
                                    </select>
                    <has-error :form="form" field="openningbalance"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->


                  <div  class="modal-footer">
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Update</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>
                       </div>
                          </div>
                </div>
                
                                </div>








<!-- main menu access settings start -->


                                <div role="tabpanel" class="tab-pane fade" id="messages_with_icon_title">

 <div class="bethapa-table-header">
<!-- 
 <form @submit.prevent="SaveRoletoaddmainmenu()">
                  
                  
                    <div class="form-group">
                  <label>Select the Role</label>
                    <select name ="mainmemurolerrtrrr" data-live-search="true" v-model="form.mainmemurolerrtrrr" id ="mainmemurolerrtrrr" v-on:change="myClickEventformainmenuas"  :class="{'is-invalid': form.errors.has('mainmemurolerrtrrr')}">
                    <option value=" ">  </option>
                    <option v-for='data in roleslist' v-bind:value='data.id'>{{ data.rolename }}</option>

                    </select>
                       <input type="hidden" name="inone" value="forsubmenuazccess" class="form-control">

                                <has-error :form="form" field="mainmemurolerrtrrr"></has-error>

                             
                             

                                
                                </div>
                                  <button style="display:none" type="hidden" id="submit" hidden="" name= "submit" ref="myBtnmainmen" class="btn btn-primary btn-sm">uuj</button>
                                </form> -->
                                </div>

            
   



                                   
                                </div>


<!-- Main menu access Setting End -->








<!-- Sub Menu Access settings Start -->

                                <div role="tabpanel" class="tab-pane fade" id="settings_with_icon_title">
        <form @submit.prevent="saveexpensesreporttoviewbranches()">
                 
                      <div class="form-group">
              

     
<!-- 
 <label for="exampleInputEmail1">Month :</label>
                 
                 

         <select name ="monthname" v-model="form.monthname" v-on:change="myClickEventtosavesalesreportbydate2" id ="monthname"  :class="{'is-invalid': form.errors.has('monthname')}">
<option value="">  </option>
<option v-for='data in montheslist' v-bind:value='data.monthno'> {{ data.monthname }}</option>

</select>
           
 <label for="exampleInputEmail1">Year  :</label>
                 
                 

         <select name ="yearname" v-model="form.yearname"  v-on:change="myClickEventtosavesalesreportbydate2" id ="yearname"  :class="{'is-invalid': form.errors.has('yearname')}">
<option value="">  </option>
<option v-for='data in yearslist' v-bind:value='data.id'> {{ data.yearname }}</option>

</select> -->
          
          

           <label for="exampleInputEmail1">Country :</label>
                 
                 

       <select name ="type" v-model="form.countryname" v-on:change="myClickEventtosavesalesreportbydate2" id ="countryname" :class="{'is-invalid': form.errors.has('countryname')}"
                                       data-live-search="true">
                                        <option></option>
                                        <option v-for='data in countrieslist' :value='data.id'>{{ data.countryname }}</option>
                                    </select>


           
                                   

                                        <label for="password_2">Company</label>
                                  
                                               <select name ="companyname" v-model="form.companyname"  
                                             v-on:change="myClickEventtosavesalesreportbydate2" id ="companyname" :class="{'is-invalid': form.errors.has('companyname')}"
                                       data-live-search="true">
                                        <option></option>
                                        <option v-for='data in companieslist' :value='data.id'>{{ data.companyname }}</option>
                                    </select>
                   
               

            
                                       

  <label for="exampleInputEmail1">Branch :</label>
                 
                 

         <select name ="branchname" v-model="form.branchname" id ="branchname" v-on:change="myClickEventtosavesalesreportbydate2" :class="{'is-invalid': form.errors.has('sortby')}">
<option value="900"> All </option>
<option v-for='data in brancheslist' v-bind:value='data.id'> {{ data.branchname }}</option>

</select>
            <has-error :form="form" field="branchname"></has-error>
<!--       
    <label for="exampleInputEmail1">Sort by</label>
              
                 <select name ="sortreportby" v-model="form.sortreportby" id ="sortreportby" v-on:change="myClickEventtosavemonthlyreportallbranches" :class="{'is-invalid': form.errors.has('sortreportby')}">
<option value="">  </option>
<option v-for='data in monthreportslist2' v-bind:value='data.sysname'> {{ data.sortname }}</option>

</select>
            <has-error :form="form" field="sortreportby"></has-error> -->

                              
             <button type="submit" style="display:none" id="submit" hidden="hidden" name= "submit" ref="mybtnforgrneralsalesreport2" class="btn btn-primary btn-sm">Saveit</button>         

                                
                     
       
       
                   
          </div>


        

                </form>                               
                                     


  <div class="bethapa-table-header">
                      Monthly Expenses <button  type="button" class="add-newm" @click="newmonthlyexpenseadd" >Add new Monthly Expense </button>
                      <!-- v-if="allowedtoaddsubmenuaccess > 0" -->
                     </div>
              <table  class="table" border="1"> 
   
                  <thead>
                    <tr>
                      <th>#</th>
                    
                         <th>COUNTRY</th>
                      <th>COMPANY</th>
                      <th>BRANCH</th>
                      <th>EXPENSE</th>
                       <th>DESCRIPTION</th>
                      <th>AMOUNT</th>
                     
                  
                       <th> STARTED </th>
                  
                   
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
                           
                           
                             
  <td > {{formatPrice((offcmadeexp.ucret))}}</td>

                        

                               
                        <td> 
                             
   
       

      <button type="button"  class="btn bg-deep-orange btn-xs waves-effect" @click="deletemadeexpense(offcmadeexp.id)"> Delete Expense </button>
       

                      </td>    <!---->
                    </tr>
              
                    
                  </tbody>
                                   </table>

     <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="allowedrolecomponentsObject" @pagination-change-page="paginationroleAuthorisedsubmenues"></pagination>
                </ul>
              </div>


<!-- Modal for adding Main Menu -->
<div class="modal fade" id="addnewaccesstosubmenu">
         <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3  v-show="!editmode"    class="modal-title"><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">Allow Sub Menu Access</h3> 
                <h4  v-show="editmode" class="modal-title" ><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">Update Record</h4> 
                        </div>
                  <form class="form-horizontal" @submit.prevent="editmode ? updateUser():createSubmenuaccess()"> 
                            
                            <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Select Role</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <select  name ="roleforsubmenuaccess" v-model="form.roleforsubmenuaccess" 
                            id ="roleforsubmenuaccess"  :class="{'is-invalid': form.errors.has('roleforsubmenuaccess')}" class="form-control show-tick" data-live-search="true">
                                       <option value=" ">  </option>
                    <option v-for='data in roleslist' v-bind:value='data.id'>{{ data.rolename }}</option>
                                    </select>
                    <has-error :form="form" field="roleforsubmenuaccess"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Main Menddu</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <select  name ="submenus" v-model="form.submenus" 
                            id ="submenus"  :class="{'is-invalid': form.errors.has('submenus')}" class="form-control show-tick" data-live-search="true">
                                       <option value=" ">  </option>
                  <option v-for='data in submenulist' v-bind:value='data.id'>{{ data.submenuname }}</option>
                                    </select>
                    <has-error :form="form" field="submenus"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                

                             
                             
                  <div  class="modal-footer">
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Update</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>
                       </div>
                          </div>
                </div>
                
                <!-- End of modal for adding main Menu -->


<!-- Modal for adding Main Menu -->
<div class="modal fade" id="addnewaccesstomainmenu">
         <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3  v-show="!editmode"    class="modal-title"><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">Allow Main Menu Access</h3> 
                <h4  v-show="editmode" class="modal-title" ><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">Update Record</h3> </h4> 
                        </div>
                  <form class="form-horizontal" @submit.prevent="editmode ? updateUser():createMainuaccess()"> 
                            
                            <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Select Role</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <select  name ="roleformainmenuaccess" v-model="form.roleformainmenuaccess" 
                            id ="roleformainmenuaccess"  :class="{'is-invalid': form.errors.has('roleformainmenuaccess')}" class="form-control show-tick" data-live-search="true">
                                       <option value=" ">  </option>
                    <option v-for='data in roleslist' v-bind:value='data.id'>{{ data.rolename }}</option>
                                    </select>
                    <has-error :form="form" field="roleformainmenuaccess"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Main Menu</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <select  name ="mainmenus" v-model="form.mainmenus" 
                            id ="mainmenus"  :class="{'is-invalid': form.errors.has('mainmenus')}" class="form-control show-tick" data-live-search="true">
                                       <option value=" ">  </option>
                    <option v-for='data in mainmenulist' v-bind:value='data.id'> {{ data.mainmenuname }}</option>
                                    </select>
                    <has-error :form="form" field="mainmenus"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                

                             
                             
                  <div  class="modal-footer">
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Update</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>
                       </div>
                          </div>
                </div>
                
                <!-- End of modal for adding main Menu -->










                                </div>


<!-- Sub Menu access Settings End -->

<!-- Start of Componets -->
                                  <div role="tabpanel" class="tab-pane fade" id="one_with_icon_title">
                                         <form @submit.prevent="SaveRoletoaddcomponent()">
                  
                  
                    <div class="form-group">
                  <label>Select the Role</label>
                    <select name ="mycpmponentto" v-model="form.mycpmponentto"  class="show-tick" data-live-search="true" id ="mycpmponentto" v-on:change="myClickEventroletoaddcomponent"  :class="{'is-invalid': form.errors.has('mycpmponentto')}">
                    <option value=" ">  </option>
                    <option v-for='data in roleslist' v-bind:value='data.id'> {{ data.rolename }}</option>

                    </select>
                       <input  style="display:none" type="text" name="inone" value="roletoaddcomponent" hidden
                    class="form-control">

                                <has-error :form="form" field="mycpmponentto"></has-error>

                             
                             

                                
                                </div>
                                  <button  style="display:none" type="submit" id="submit" hidden="hidden" name= "submit" ref="myBtnroledd" class="btn btn-primary btn-sm">Saveit</button>
                                </form>

              <div class="bethapa-table-header">
                   
       
                      AUTHORISED COMPONENTS  <button type="button" class="add-newm" @click="newcomponentadd" >Add New </button>
                     </div>
<!--  v-if="allowedtogivecomponentaccess > 0" -->

            <table class="table">
                  <thead>
                    <tr>
                   
                      <th > # </th>
                     
                       <th > COMPONENT </th>
                      <th > AUTHORISED </th>
                     <th >  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                                       <tr v-for="allcomponentsdata in allowedrolecomponentsObject.data" :key="allcomponentsdata.id">
                      
                 
                  
                
                      
                         
                                <td>{{allcomponentsdata.id}}</td>
                              
 
                             
                                  <td>{{allcomponentsdata.componentto}}</td>

                                
                               
                                 <td>{{allcomponentsdata.created_at | myDate }}</td>  
                                 <td> 
                                  
                           

                            <button type="button" v-if="allowedtorevokecomponentaccess > 0" class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="revokeroleComponent(allcomponentsdata.id)"> Revoke </button>




                             
                              </td>


               
                              
                               
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>
   
   
                      <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="allowedrolecomponentsObject" @pagination-change-page="paginationroleAuthorisedcomponents"></pagination>
                </ul>
              </div>
              
               
<!-- Modal for adding Main Menu -->










<div class="modal fade" id="addnewComponenttotheRole">
         <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3  v-show="!editmode"    class="modal-title"><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">Add Component Access</h3> 
                <h4  v-show="editmode" class="modal-title" ><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">Update </h3> </h4> 
                        </div>
                  <form class="form-horizontal" @submit.prevent="editmode ? updateUser():createAuthorisedrole()"> 
                            
                            <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Select Role</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <select  name ="roleyouareaddingtocomponent" v-model="form.roleyouareaddingtocomponent" 
                            id ="roleyouareaddingtocomponent"  :class="{'is-invalid': form.errors.has('roleyouareaddingtocomponent')}" class="form-control show-tick" data-live-search="true">
                                       <option value=" ">  </option>
                    <option v-for='data in roleslist' v-bind:value='data.id'>{{ data.rolename }}</option>
                                    </select>
                    <has-error :form="form" field="roleyouareaddingtocomponent"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Main Menu</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <select  name ="components" v-model="form.components" 
                            id ="components"  :class="{'is-invalid': form.errors.has('components')}" class="form-control show-tick" data-live-search="true">
                                       <option value=" ">  </option>
                      <option v-for='data in componentslist' v-bind:value='data.sysname'>{{ data.sysname }} - {{ data.componentname }}</option>
                                    </select>
                    <has-error :form="form" field="components"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                

                             
                             
                  <div  class="modal-footer">
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Update</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>
                       </div>
                          </div>
                </div>
                
                <!-- End of modal for adding main Menu -->                    
                                </div>

          <!-- End of component access -->

          <!-- Start of component features access -->
                                  <div role="tabpanel" class="tab-pane fade" id="two_with_icon_title">
                                     <form @submit.prevent="SaveRoletoaddformcomponent()">
                  
                  
                    <div class="form-group">
                  <label>Role</label>
                    <select name ="roletoallow"  class="show-tick" data-live-search="true" v-model="form.roletoallow" id ="roletoallow"   :class="{'is-invalid': form.errors.has('roletoallow')}">
                    <option value=" ">  </option>
                    <option v-for='data in roleslist' v-bind:value='data.id'> {{ data.rolename }}</option>

                    </select>
                    

                                <has-error :form="form" field="roletoallow"></has-error>


                     <label>Component</label>
                    <select name ="componentto" v-model="form.componentto" id ="componentto"   :class="{'is-invalid': form.errors.has('componentto')}"  class="show-tick" data-live-search="true">
                    <option value=" ">  </option>
                    <option v-for='data in componentslist' v-bind:value='data.sysname'> ({{ data.sysname }}) - {{ data.componentname }}</option>

                    </select>
                    


                    

                                <has-error :form="form" field="componentto"></has-error>
                       <button type="submit" id="submit" name= "submit" ref="myBtn" class="btn btn-info btn-sm">Proceed</button>
                                    </div>
                                </form>
                  
                       <div class="bethapa-table-header">
                      AUTHORISED COMPONENTS FEATURES <button type="button" class="add-newm" @click="newcomponentfeatureadd" >Add New </button>
                     </div>


                   <table class="table">
                  <thead>
                    <tr>
                   
                      <th > # </th>
                      <th > COMPONENT </th>
                      <th > FEATURE </th>
                      
                      <th > ACTIVATED </th>
                     <th >  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                              <tr v-for="allcompfetures in allowedrolecomponentfeaturesObject.data" :key="allcompfetures.id">
                      
                 
                  
                
                      
                         
                                <td>{{allcompfetures.id}}</td>
                               
                                <td>{{allcompfetures.component}}</td>
                             
                                <td>{{allcompfetures.formcomponent}}</td>

                                
                               
                                 <td>{{allcompfetures.created_at | myDate }}</td>  
                                 <td> 
                                  
                           

                            <button type="button" class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="revokeroleComponentfeature(allcompfetures.id)"> Revoke Feature</button>




                             
                              </td>


               
                              
                               
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>
   
   
                      <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="allowedrolecomponentfeaturesObject" @pagination-change-page="paginationroleAuthorisedcomponentsfeature"></pagination>
                </ul>
              </div>
                             <!-- Modal for adding Main Menu -->
<div class="modal fade" id="addnewcomponentfeature">
         <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3  v-show="!editmode"    class="modal-title"><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">Add Component Feature</h3> 
                <h4  v-show="editmode" class="modal-title" ><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">Update Record</h3> </h4> 
                        </div>
                  <form class="form-horizontal" @submit.prevent="editmode ? updateUser():createAuthorisecomponentfeature()"> 
                            
                            <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Select Role</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <select  name ="roleyouareaddingtocomponent" v-model="form.roleyouareaddingtocomponent" 
                            id ="roleyouareaddingtocomponent"  :class="{'is-invalid': form.errors.has('roleyouareaddingtocomponent')}" class="form-control show-tick" data-live-search="true">
                                       <option value=" ">  </option>
                    <option v-for='data in roleslist' v-bind:value='data.id'>{{ data.rolename }}</option>
                                    </select>
                    <has-error :form="form" field="roleyouareaddingtocomponent"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Component</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <select  name ="componentname" v-model="form.componentname" 
                            id ="componentname"  :class="{'is-invalid': form.errors.has('componentname')}" class="form-control show-tick" data-live-search="true">
                                       <option value=" ">  </option>
                      <option v-for='data in componentslist' :value='data.sysname'>{{ data.componentname }}</option>
                                    </select>
                    <has-error :form="form" field="componentname"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                

                             <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Feature</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <select  name ="formfeatures" v-model="form.formfeatures" 
                            id ="formfeatures"  :class="{'is-invalid': form.errors.has('formfeatures')}" class="form-control show-tick" data-live-search="true">
                                       <option value=" ">  </option>
                        <option v-for='data in formfeatures' v-bind:value='data.sysname'>{{ data.featurename }}</option>
               </select>
                    <has-error :form="form" field="formfeatures"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                  <div  class="modal-footer">
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Update</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>
                       </div>
                          </div>
                </div>
                
                <!-- End of modal for adding main Menu -->         
                                </div>

                                <!-- End of component axccess features -->



<!-- fish machines  start-->
                                  <div role="tabpanel" class="tab-pane fade" id="three_with_icon_title">
                                 


                                 
                                 
                                </div>


                                <!-- fish machines end -->
                                  <div role="tabpanel" class="tab-pane fade" id="four_with_icon_title">
                                    <b>Settings Content</b>
                                    <p>
                                    four
                                    </p>
                                </div>

  <div role="tabpanel" class="tab-pane fade" id="five_with_icon_title">
                                    <b>Settings Content</b>
                                    <p>
                                       five
                                    </p>
                                </div>



 <div role="tabpanel" class="tab-pane fade" id="six_with_icon_title">
                                    <b>Settings Content</b>
                                    <p>
                                       Six
                                    </p>
                                </div>





 <div role="tabpanel" class="tab-pane fade" id="seven_with_icon_title">
                                    <b>Settings Content</b>
                                    <p>
                                       seven
                                    </p>
                                </div>




                            </div>
                        </div>
                    </div>
                </div>