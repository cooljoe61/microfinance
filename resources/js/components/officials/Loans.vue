<template>
    <div>
        <div class="col-md-12">
            <div class="card bg-transparent mt-3">
            <div class="card-content">
                <div class="row row-group m-0">
                    <div class="col-12 col-lg-6 col-xl-3 border-light">
                        <div class="card-body">
                        <h5 class="text-white mb-0">12 <span class="float-right"><i class="zmdi zmdi-accounts-list"></i></span></h5>
                            <div class="progress my-3" style="height:3px;">
                            <div class="progress-bar" style="width:55%"></div>
                            </div>
                        <p class="mb-0 text-white small-font">Members with Loans <span class="float-right"> <i class="zmdi zmdi-long-arrow-right"></i></span></p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-light">
                        <div class="card-body">
                        <h5 class="text-white mb-0">Ksh. 256,000 <span class="float-right"><i class="fa fa-usd"></i></span></h5>
                            <div class="progress my-3" style="height:3px;">
                            <div class="progress-bar" style="width:55%"></div>
                            </div>
                        <p class="mb-0 text-white small-font">Total Loan amount <span class="float-right"> <i class="zmdi zmdi-long-arrow-right"></i></span></p>
                        </div>
                    
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-light">
                    
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 border-light">
                        <div class="card-body d-flex align-items-center justify-content-center ">
                        <router-link to="/Dashboard/Loans/Application" class="btn btn-md custom-btn mt-3">Loan Application</router-link>
                        </div>
                    
                    </div>
                </div>
            </div>

        </div>    
        </div>  
        
        <div class="col-md-12">
          <div class="card bg-transparent">
            <div class="card-body">
              <h5 class="card-title">ALL LOANS</h5>
			  <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>
	  
</div>
</template>