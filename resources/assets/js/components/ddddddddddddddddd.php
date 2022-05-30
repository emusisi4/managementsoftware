<div class="row clearfix">
             
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons"></i>
                               
                        </div>
                        <div class="content">
                            <div class="text">Collections</div>
                            <div class="number count-to" data-from="0" 
                            data-to="257" data-speed="1000" data-fresh-interval="20"> 
                            {{currencydetails}}: {{formatPrice(collectionsaccountcurrentbalance) }}</div>
                        </div>
                    </div>
                </div>


   <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons"></i>
                          
                        </div>
                        <div class="content">
                            <div class="text">Petty Cash</div>
                            <div class="number count-to" data-from="0" data-to="257" 
                            data-speed="1000" data-fresh-interval="20">  {{currencydetails}}: {{formatPrice(pettycashaccountcurrentbalance) }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons"></i>
                              
                        </div>
                        <div class="content">
                            <div class="text">Admin</div>
                            <div class="number count-to" data-from="0" data-to="257" 
                            data-speed="1000" data-fresh-interval="20">  {{currencydetails}}: {{formatPrice(admincashaccountcurrentbalance) }}</div>
                        </div>
                    </div>
                </div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons"></i>
                          
                        </div>
                        <div class="content">
                            <div class="text">Bank</div>
                            <div class="number count-to" data-from="0" data-speed="1000" data-fresh-interval="20">  {{currencydetails}}: {{formatPrice(bankaccountcurrentbalance) }}</div>
                        </div>
                    </div>
                </div>

                
            </div>