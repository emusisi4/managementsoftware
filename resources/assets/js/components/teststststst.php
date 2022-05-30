<div class="modal fade" id="attachmorewallets">
         <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3  v-show="!editmode"    class="modal-title"><img src="images/logo.png"
                             class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">Attach Wallet</h3> 
                <h4  v-show="editmode" class="modal-title" ><img src="images/logo.png" class="profile-user-img img-fluid img-circle"
                 style="height: 80px; width: 80px;">Update Record</h3> </h4> 
                        </div>
                  <form class="form-horizontal" @submit.prevent="editmode ? updatddeUser():attachWallettocompany()"> 
                      <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Country</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <has-error :form="form" field="countryname"></has-error>
                                               <select name ="countryname" v-model="form.countryname"  id ="countryname"
                                                :class="{'is-invalid': form.errors.has('countryname')}"
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
                                               <select name ="companyname" v-model="form.companyname" v-on:click="getcompanies()" id ="companyname" :class="{'is-invalid': form.errors.has('companyname')}"
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
                                        <label for="password_2">Wallet</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <has-error :form="form" field="walletname"></has-error>
                                               <select name ="walletname" v-model="form.walletname" id ="walletname" :class="{'is-invalid': form.errors.has('companyname')}"
                                      class="form-control show-tick" data-live-search="true">
                                        <option></option>
                                        <option v-for='data in generalwalletlist' :value='data.id'>{{ data.name }}</option>
                                    </select>
                   
               
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                    <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Cash Recievable</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <has-error :form="form" field="recievableincome"></has-error>
                                               <select name ="recievableincome" v-model="form.recievableincome" id ="recievableincome" :class="{'is-invalid': form.errors.has('recievableincome')}"
                                      class="form-control show-tick" data-live-search="true">
                                        <option >Select Option</option>
                                           <option value="0">No - Doest Recieve cash</option>
                                              <option value="1">Yes - Recieves Cash</option>
                                    
                                    </select>
                   
               
                                            </div>
                                        </div>
                                    </div>
                                </div>  
  <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Cash Spendable</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <has-error :form="form" field="spendable"></has-error>
                                               <select name ="spendable" v-model="form.spendable" id ="spendable" :class="{'is-invalid': form.errors.has('spendable')}"
                                      class="form-control show-tick" data-live-search="true">
                                        <option >Select Option</option>
                                           <option value="0">No - Doest make Expenses</option>
                                              <option value="1">Yes - Makes Expenses</option>
                                    
                                    </select>
                   
               
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
                                                 <has-error :form="form" field="bal"></has-error>
                                                <input v-model="form.bal" type="number" name="bal"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('bal') }">
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