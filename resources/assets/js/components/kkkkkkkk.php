<div class="modal fade" id="makeofficeexpensemodal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="bs-example-modal-lg"
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
