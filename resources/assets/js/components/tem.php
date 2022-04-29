<div class="modal fade" id="addnewcashcollection" data-backdrop="static">
         <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3  v-show="!editmode"    class="modal-title"><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">ADD NEW RECORD</h3> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                        </div>
                  <form class="form-horizontal" @submit.prevent="editmode ? updateCompanydetails():CreateNewcashcollection()"> 

                

<br>




                        <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <!-- <label for="password_2">Currency Name</label> -->
                                    </div>
                                                  
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                   <label><b>BRANCH&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;: 
                                                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></label>:  
                                                      <span style="font-size:1.0em;" right > <b> {{ (shopbalancngname) }}  </b></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


  <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <!-- <label for="password_2">Currency Name</label> -->
                                    </div>
                                                  
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                   <label><b>SHOP BALANCE &nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></label>:   <span style="font-size:1.0em;" right > <b> {{ (currencydetails) }} {{formatPrice(shopopenningbalance)}}   </b></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>





<div class ="bethapa-table-sectionheader">Collection</div>



  <form @submit.prevent="savecountryinAction()">

 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Country</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <has-error :form="form" field="countryname"></has-error>
                                               <select name ="countryname" v-model="form.countryname" v-on:change="myClicktoaddcompanyinaction"  id ="countryname" :class="{'is-invalid': form.errors.has('countryname')}"
                                      class="form-control show-tick" data-live-search="true">
                                        <option></option>
                                        <option v-for='data in countrieslist' :value='data.id'>{{ data.countryname }}</option>
                                    </select>
                   
               
                                            </div>
                                        </div>
                                    </div>
                                </div>      

                                <button type="submit" id="submit" style="display:none" name= "submit" ref="myButtontosavecompanyinaction" class="btn btn-primary btn-sm">Saveit</button>

  </form>
                                
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
                                  <form @submit.prevent="SavetheCollectionbranch()">           

   <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Branch</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <has-error :form="form" field="branchnametobalance"></has-error>
                                               <select name ="branchnametobalance" v-model="form.branchnametobalance" v-on:change="myClicktoaddBranchcollection"  id ="branchnametobalance" :class="{'is-invalid': form.errors.has('branchnametobalance')}"
                                      class="form-control show-tick" data-live-search="true">
                                        <option></option>
                                        <option v-for='data in brancheslist' :value='data.id'>{{ data.branchname }}</option>
                                    </select>
                   
               
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Wallet in action</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <has-error :form="form" field="walletinaction"></has-error>
                                               <select name ="walletinaction" v-model="form.walletinaction" v-on:change="myClicktoaddBranchcollection"  id ="walletinaction" :class="{'is-invalid': form.errors.has('branchnametobalance')}"
                                      class="form-control show-tick" data-live-search="true">
                                        <option></option>
                                        <option v-for='data in walletlist' :value='data.id'>{{ data.name }}</option>
                                    </select>
                   
               
                                            </div>
                                        </div>
                                    </div>
                                </div>

   <button type="submit" id="submit" style="display:none" name= "submit" ref="myButtontosavecollectionbrunch" class="btn btn-primary btn-sm">Saveit</button>
                            
              
                </form>
                                      <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Date</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <has-error :form="form" field="transferdate"></has-error>
                                                  <input v-model="form.transferdate" type="date" name="transferdate"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('transferdate') }">
                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
      <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Amount</label>
                                    </div>
                                                       

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <has-error :form="form" field="amount"></has-error>
                                                <input v-model="form.amount" type="text" name="amount"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                       
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                    <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Comment</label>
                                    </div>
                                                     

                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                 <has-error :form="form" field="text"></has-error>
                                                <input v-model="form.description" type="text" name="description"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('description') }">
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



                <!--  -->
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