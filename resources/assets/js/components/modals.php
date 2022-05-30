
<div class="modal fade" id="addnewusermodal" data-backdrop="static">
         <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3  v-show="!editmode"    class="modal-title">
                              <!-- <img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;"> -->
                              
                              ADD NEW RECORD</h3> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                        </div>
                  <form class="form-horizontal" @submit.prevent="editmode ? updateCompanydetails():createSystemuser()"> 

                
<div class ="bethapa-table-sectionheader">User Information</div>

  <form @submit.prevent="savenewRecordtoview()">    
        
 <div class="card-body">
     
                <div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Country : </label>
                      <div class="col-sm-9">
                        <has-error :form="form" field="countryname"></has-error>
                        <select name ="type" v-model="form.countryname"  
                         v-on:change="myClickEventtosavesalesreportbydate2" id ="countryname" class="form-select" 
                        :class="{ 'is-invalid': form.errors.has('countryname') }">
                          <option value=""></option>
                           <option v-for='data in countrieslist' :value='data.id'>{{ data.countryname }}</option>
                        </select>
                      </div>
                    </div>

                   <div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Company</label>
                      <div class="col-sm-9">
                         <has-error :form="form" field="companyname"></has-error>
                                               <select name ="companyname" v-model="form.companyname"
                                                v-on:change="myClickEventtosavesalesreportbydate2"
                                               
                                                id ="companyname" :class="{'is-invalid': form.errors.has('companyname')}"
                                     class="form-select">
                                        <option></option>
                                        <option v-for='data in companiesss' :value='data.id'>{{ data.companyname }}</option>
                                    </select>
                      </div>
                    </div>


 </div>

     <button type="submit" id="submit" hidden="hidden" name= "submit" ref="theButtontosabemonthlyreportvie2" class="btn btn-primary btn-sm">Saveit</button>         

        </form>   
    <div class="row clearfix">



                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Company</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <has-error :form="form" field="companyname"></has-error>
                                                   <select name ="type" v-model="form.companyname"   id ="companyname" :class="{'is-invalid': form.errors.has('companyname')}"
                                      class="form-control" data-live-search="true">
                                        <option></option>
                                        <option v-for='data in companieslist' :value='data.id'>{{ data.companyname }}</option>
                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                   <button type="submit" style="display:none" id="submit" hidden="hidden" name= "submit" ref="buttonsubmitcompanyinaction" class="btn btn-primary btn-sm">Saveit</button>         

              
                </form>

  
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Full Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <has-error :form="form" field="name"></has-error>
                                                  <input v-model="form.name" type="text" name="name"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                    
                                            </div>
                                        </div>
                                    </div>
                                </div>

                              <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Role</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <has-error :form="form" field="rolename"></has-error>
                                               <select name ="type" v-model="form.rolename"  id ="rolename" :class="{'is-invalid': form.errors.has('rolename')}"
                                      class="form-control show-tick" data-live-search="true">
                                        <option></option>
                                        <option v-for='data in roleslist' :value='data.id'>{{ data.rolename }}</option>
                                    </select>
                   
               
                                            </div>
                                        </div>
                                    </div>
                                </div>

                
                               <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Branch</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <has-error :form="form" field="branchname"></has-error>
                                               <select name ="type" v-model="form.branchname"  id ="branchname" :class="{'is-invalid': form.errors.has('branchname')}"
                                      class="form-control show-tick" data-live-search="true">
                                        <option></option>
                                        <option v-for='data in brancheslist' :value='data.id'>{{ data.branchname }}</option>
                                    </select>
                   
               
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                  
                            


<br>
<div class ="bethapa-table-sectionheader">Login Details</div>



                                    <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Username</label>
                                    </div>
                                                       

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <has-error :form="form" field="email"></has-error>
                                                <input v-model="form.email" type="text" name="email"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                       
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Password</label>
                                    </div>
                                                     

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                 <has-error :form="form" field="password"></has-error>
                                                <input v-model="form.password" type="text" name="password"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        
                                


                           <br>
                  <div  class="modal-footer">
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Update</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>
                       </div>
                          </div>
                </div>