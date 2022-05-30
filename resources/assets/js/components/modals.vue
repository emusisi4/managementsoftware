 <div
                        class="modal fade"
                        id="addnewCompanyreg"
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
                            ADD NEW RECORD
                              </h4>
                                  <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- <div class="modal-body"> -->
                        <form class="form-horizontal" @submit.prevent="editmode ? updateCompanydetails():createCompany()">
                  <div class="card-body">
                    <div class="bethapa-table-sectionheader">Company Information</div>
                   
                   
                    <div class="mb-3 row">
                      <label for="fname" class="col-sm-3 text-end control-label col-form-label">Company Name</label>
                      <div class="col-sm-9">
                      <input v-model="form.companyname" type="text" name="companyname"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('companyname') }">
                      <small id="name" class="form-text text-muted">   <has-error :form="form" field="companyname"></has-error></small>
                      </div>
                    </div>


                   <div class="mb-3 row">
                      <label class="col-sm-3 text-end control-label col-form-label">Country</label>
                      <div class="col-sm-9">
                        <has-error :form="form" field="countryname"></has-error>
                        <select name ="type" v-model="form.countryname"  id ="countryname" class="form-select" 
                        :class="{ 'is-invalid': form.errors.has('countryname') }">
                          <option value=""></option>
                           <option v-for='data in countrieslist' :value='data.id'>{{ data.countryname }}</option>
                        </select>
                      </div>
                    </div>




                 
                 

                    <div class="mb-3 row">
                      <label for="email1" class="col-sm-3 text-end control-label col-form-label">Location</label>
                      <div class="col-sm-9">
                         <input v-model="form.location" type="text" name="location"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('location') }">
                      <small id="location" class="form-text text-muted">   <has-error :form="form" field="location"></has-error></small>
                      </div>
                    </div>


                    <div class="mb-3 row">
                      <label for="cono1" class="col-sm-3 text-end control-label col-form-label">Trade Name</label>
                      <div class="col-sm-9">
                         <input v-model="form.tradename" type="text" name="tradename"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('tradename') }">
                      <small id="tradename" class="form-text text-muted">   <has-error :form="form" field="tradename"></has-error></small>
                      </div>
                    </div>

 <div class="mb-3 row">
                      <label for="cono1" class="col-sm-3 text-end control-label col-form-label">Description</label>
                      <div class="col-sm-9">
                        <textarea class="form-control"  v-model="form.description"  id="exampleTextarea10" rows="3" placeholder=""
                       :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                      <small id="description" class="form-text text-muted">   <has-error :form="form" field="description"></has-error></small>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="cono1" class="col-sm-3 text-end control-label col-form-label">Logo</label>
                      <div class="col-sm-9">
                         <input v-model="form.logo" type="text" name="logo"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('logo') }">
                      <small id="logo" class="form-text text-muted">   <has-error :form="form" field="logo"></has-error></small>
                      </div>
                    </div>


                 </div>
                  <hr>
                  <div class="card-body">
                     <div class="bethapa-table-sectionheader">Contact Details</div>
                   <div class="mb-3 row">
                    <label for="cono1" class="col-sm-3 text-end control-label col-form-label">Contact Person </label>
                      <div class="col-sm-9">
                         <input v-model="form.contactperson" type="text" name="contactperson"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('contactperson') }">
                      <small id="contactperson" class="form-text text-muted">   <has-error :form="form" field="contactperson"></has-error></small>
                      </div>
                    </div>
                 

                    <div class="mb-3 row">
                    <label for="cono1" class="col-sm-3 text-end control-label col-form-label">Contact Number : </label>
                      <div class="col-sm-9">
                         <input v-model="form.contactnumber" type="text" name="contactnumber"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('contactnumber') }">
                      <small id="contactnumber" class="form-text text-muted">   <has-error :form="form" field="logo"></has-error></small>
                      </div>
                    </div>

                       <div class="mb-3 row">
                    <label for="cono1" class="col-sm-3 text-end control-label col-form-label">Email: </label>
                      <div class="col-sm-9">
                         <input v-model="form.emailaddress" type="email" name="emailaddress"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('emailaddress') }">
                      <small id="emailaddress" class="form-text text-muted">   <has-error :form="form" field="emailaddress"></has-error></small>
                      </div>
                    </div>


    <div class="bethapa-table-sectionheader">Currency Details</div>

  <div class="mb-3 row">
                    <label for="cono1" class="col-sm-3 text-end control-label col-form-label">Currency Name : </label>
                      <div class="col-sm-9">
                         <input v-model="form.currency" type="text" name="currency"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('currency') }">
                      <small id="currency" class="form-text text-muted">   <has-error :form="form" field="currency"></has-error></small>
                      </div>
                    </div>

                       <div class="mb-3 row">
                    <label for="cono1" class="col-sm-3 text-end control-label col-form-label">Currency Symbol: </label>
                      <div class="col-sm-9">
                         <input v-model="form.currencysymbol" type="text" name="currencysymbol"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('currencysymbol') }">
                      <small id="currencysymbol" class="form-text text-muted">   <has-error :form="form" field="currencysymbol"></has-error></small>
                      </div>
                    </div>





                   
                  
                                    </div>
                  <div class="p-3 border-top">
                    <div class="text-end">
                     
                      <!-- <button type="submit" class="
                          btn btn-dark
                          rounded-pill
                          px-4
                          waves-effect waves-light
                        ">
                        Cancel
                      </button> -->
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
                      