<div class="row">
     <div class="col">
          <div class="card mb-3 border-primary">
               <div class="card-body">
                    <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                              <div class="text-xs fw-bold text-primary text-uppercase mb-1">
                                   Jumlah Member</div>
                              <div class="h5 mb-0 fw-bold text-primary">
                                   <?= number_format($member); ?>
                              </div>
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-users fa-2x text-primary"></i>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="col">
          <div class="card mb-3 border-dark">
               <div class="card-body">
                    <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                              <div class="text-xs fw-bold text-dark text-uppercase mb-1">
                                   Jumlah Kelas</div>
                              <div class="h5 mb-0 fw-bold text-dark">
                                   <?= $kelas; ?>
                              </div>
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-layer-group fa-2x text-dark"></i>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="col">
          <div class="card mb-3 border-danger">
               <div class="card-body">
                    <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                              <div class="text-xs fw-bold text-danger text-uppercase mb-1">
                                   Jumlah Burung</div>
                              <div class="h5 mb-0 fw-bold text-danger">
                                   <?= $burung; ?>
                              </div>
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-crow fa-2x text-danger"></i>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="col">
          <div class="card mb-3 border-success">
               <div class="card-body">
                    <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                              <div class="text-xs fw-bold text-success text-uppercase mb-1">
                                   Jumlah Pemesanan Pribadi</div>
                              <div class="h5 mb-0 fw-bold text-success">
                                   <?= $pemesanan; ?>
                              </div>
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-hand-holding-usd fa-2x text-success"></i>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>