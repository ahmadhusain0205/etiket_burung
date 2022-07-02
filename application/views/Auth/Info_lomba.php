<div class="row">
     <div class="col">
          <h3 class="text-center">SURYA ALAM FEAT JIMJOG</h3>
     </div>
</div>
<br>
<div class="row">
     <?php foreach ($info as $i) : ?>
          <div class="col-4">
               <div class="card shadow mb-4">
                    <div class="card-body">
                         <p>
                              <?= $i->kolom_1; ?>
                         </p>
                    </div>
               </div>
          </div>
          <div class="col-4">
               <div class="card shadow mb-4">
                    <div class="card-body p-0">
                         <img src="<?= base_url('assets/img/kontes/') . $i->gambar; ?>" alt="kontes" style="width:100%;">
                    </div>
               </div>
          </div>
          <div class="col-4">
               <div class="card shadow mb-4">
                    <div class="card-body">
                         <p>
                              <?= $i->kolom_2; ?>
                         </p>
                    </div>
               </div>
          </div>
     <?php endforeach; ?>
</div>