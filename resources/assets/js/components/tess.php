<div class="modal fade" id="addnewmonthlyexpense">
        <div class="modal-dialog modal-dialog-top modal-lg">
        <div  class="modal-content">
           
            <div class="modal-header">
            <h3  v-show="!editmode"    class="modal-title">
                <img src="images/logo.png" class="profile-user-img img-fluid img-circle"
                 style="height: 80px; width: 80px;">Monthly Expense registration Form</h3> 
                <h4  v-show="editmode" class="modal-title" >
                    <img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">Update Expense Request </h4> 
                        </div>
 



                 <form class="form-horizontal" @submit.prevent="editmode ? updadeexpenseforofficeuse():createNewmonthlyexpense()"> 

                    <div  class="modal-body">
              
                              <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Country : </label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <has-error :form="form" field="countryname"></has-error>
                                               <select name ="type" v-model="form.countryname"  id ="countryname" :class="{'is-invalid': form.errors.has('countryname')}"
                                      class="form-control show-tick" data-live-search="true">
                                        <option></option>
                                        <option v-for='data in countrieslist' :value='data.id'>{{ data.countryname }}</option>
                                    </select>
                   
               
                                            </div>
                                        </div>
                                    </div>
                                </div>
<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Company</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <has-error :form="form" field="companyname"></has-error>
                                               <select name ="companyname" v-model="form.companyname"  v-on:focus ="getcompanies()" v-on:click="getcompanies()" id ="companyname" :class="{'is-invalid': form.errors.has('companyname')}"
                                      class="form-control show-tick" data-live-search="true">
                                        <option></option>
                                        <option v-for='data in companieslist' :value='data.id'>{{ data.companyname }}</option>
                                    </select>
                   
               
                                            </div>
                                        </div>
                                    </div>
                                </div>  
  <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Branch Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <has-error :form="form" field="branch"></has-error>
                                                 <select style="min-width:300px;" name ="branch" v-model="form.branch" id ="branch"  data-live-search="true"  v-on:change="tosubmitProductdetailfilter"  :class="{'is-invalid': form.errors.has('branch')}">
                
                  <option v-for='data in brancheslist' v-bind:value='data.id'>{{ data.branchname }}</option>

                    </select>
                  
                                            </div>
                                        </div>
                                    </div>
                                </div>    
               



         <div class ="bethapa-table-sectionheader">Expense details</div>
      
                
                 
                    

                       <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Expense Name :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                 <select style="min-width:300px;" name ="expense" v-model="form.expense" id ="expense"  data-live-search="true"    :class="{'is-invalid': form.errors.has('expense')}">
                
                 <option v-for='data in expenseslist' v-bind:value='data.id'>{{ data.expensename }}</option>


                    </select>
                    <has-error :form="form" field="expense"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
          

                          
                  <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Amount</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <input v-model="form.amount" type="number" name="amount"
       class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('amount') }">
      <has-error :form="form" field="amount"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                      
               
  
                
                      
                        <!--  -->



                 
                 


                                
                  <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Description</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                 <textarea v-model="form.description" name="description" rows="5" cols="30" class="form-control" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                 
                <has-error :form="form" field="description"></has-error>
                                            </div>
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
                
                    
       <div class="modal fade" id="addnewBranchmodal">
         <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3  v-show="!editmode"    class="modal-title"><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">ADD NEW RECORD</h3> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                        </div>
                  <form class="form-horizontal" @submit.prevent="editmode ? updateBranch():createBranch()"> 

                
<div class ="bethapa-table-sectionheader">User Details</div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Full Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.branchname" type="text" name="branchname"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('branchname') }">
                    <has-error :form="form" field="branchname"></has-error>
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
                                        <label for="password_2">Openning Balance</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input v-model="form.openningbalance" type="number" name="openningbalance"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('openningbalance') }">
                    <has-error :form="form" field="openningbalance"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="row clearfix">
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
                             
                    
              
              
              
                  </div>
