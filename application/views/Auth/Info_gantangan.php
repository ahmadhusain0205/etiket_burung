<div class="row">
     <div class="col-4">
          <div class="row">
               <div class="col">
                    <div class="card mb-3">
                         <div class="card-body">
                              <div class="h4">FILTER CARI</div>
                              <hr>
                              <div class="row g-3 align-items-center mb-3">
                                   <div class="col-4">
                                        <label for="kelas" class="col-form-label">KELAS</label>
                                   </div>
                                   <div class="col-8">
                                        <select name="kelas" id="kelas" class="form-control select2_kelas" onchange="getkelas()"></select>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="col-8">
          <div class="card mb-3" id="gantangan">
               <div class="card-body">
                    <div class="h4">Nomor Gantangan
                         <button class="btn btn-danger float-end btn-sm" disabled style="font-size: 12px;"><i class="fa-solid fa-circle-exclamation"></i> Ceklis untuk memilih</button>
                    </div>
                    <hr>
                    <?php
                    for ($i = 0; $i < count($nomor_kursi_60); $i++) {
                         $nama_kelas = array_keys($nomor_kursi_60)[$i];
                    ?>
                         <div class="row justify-content-center" id="gantangan_60_<?php echo $nama_kelas; ?>">
                              <?php foreach ($nomor_kursi_60[$nama_kelas] as $k) : ?>
                                   <div class="col-2 p-1">
                                        <?php if ($k->keterangan == 'disabled') : ?>
                                             <div class="card bg-dark text-white">
                                             <?php else : ?>
                                                  <div class="card">
                                                  <?php endif; ?>
                                                  <div class="card-body text-center">
                                                       <div class="form-check">
                                                            <?php if ($k->keterangan == 'disabled') : ?>
                                                                 <input class="form-check-input" type="hidden" name="nomor_kursi" id="nomor_kursi">
                                                            <?php else : ?>
                                                                 <input class="form-check-input" type="hidden" name="nomor_kursi" id="nomor_kursi">
                                                            <?php endif; ?>
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                 <?= $k->no_kursi; ?>
                                                            </label>
                                                       </div>
                                                  </div>
                                                  </div>
                                             </div>
                                        <?php endforeach; ?>
                                   </div>
                              <?php } ?>

                              <?php
                              for ($i = 0; $i < count($nomor_kursi_32); $i++) {
                                   $nama_kelas = array_keys($nomor_kursi_32)[$i];
                              ?>
                                   <div class="row justify-content-center" id="gantangan_32_<?php echo $nama_kelas; ?>">
                                        <?php foreach ($nomor_kursi_32[$nama_kelas] as $k) : ?>
                                             <div class="col-3 p-1">
                                                  <?php if ($k->keterangan == 'disabled') : ?>
                                                       <div class="card bg-dark text-white">
                                                       <?php else : ?>
                                                            <div class="card">
                                                            <?php endif; ?>
                                                            <div class="card-body text-center">
                                                                 <div class="form-check">
                                                                      <?php if ($k->keterangan == 'disabled') : ?>
                                                                           <input class="form-check-input" type="hidden" name="nomor_kursi" id="nomor_kursi">
                                                                      <?php else : ?>
                                                                           <input class="form-check-input" type="hidden" name="nomor_kursi" id="nomor_kursi">
                                                                      <?php endif; ?>
                                                                      <label class="form-check-label" for="flexCheckDefault">
                                                                           <?= $k->no_kursi; ?>
                                                                      </label>
                                                                 </div>
                                                            </div>
                                                            </div>
                                                       </div>
                                                  <?php endforeach; ?>
                                             </div>
                                        <?php } ?>

                                        <?php
                                        for ($i = 0; $i < count($nomor_kursi_24); $i++) {
                                             $nama_kelas = array_keys($nomor_kursi_24)[$i];
                                        ?>
                                             <div class="row justify-content-center" id="gantangan_24_<?php echo $nama_kelas; ?>">
                                                  <?php foreach ($nomor_kursi_24[$nama_kelas] as $k) : ?>
                                                       <div class="col-3 p-1">
                                                            <?php if ($k->keterangan == 'disabled') : ?>
                                                                 <div class="card bg-dark text-white">
                                                                 <?php else : ?>
                                                                      <div class="card">
                                                                      <?php endif; ?>
                                                                      <div class="card-body text-center">
                                                                           <div class="form-check">
                                                                                <?php if ($k->keterangan == 'disabled') : ?>
                                                                                     <input class="form-check-input" type="hidden" name="nomor_kursi" id="nomor_kursi">
                                                                                <?php else : ?>
                                                                                     <input class="form-check-input" type="hidden" name="nomor_kursi" id="nomor_kursi">
                                                                                <?php endif; ?>
                                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                                     <?= $k->no_kursi; ?>
                                                                                </label>
                                                                           </div>
                                                                      </div>
                                                                      </div>
                                                                 </div>
                                                            <?php endforeach; ?>
                                                       </div>
                                                  <?php } ?>
                                             </div>

                                   </div>
                         </div>

               </div>

               <script>
                    <?php for ($i = 0; $i < count(array_keys($nomor_kursi_60)); $i++) { ?>
                         $('#gantangan_60_<?php echo array_keys($nomor_kursi_60)[$i]; ?>').hide();
                    <?php } ?>

                    <?php for ($i = 0; $i < count(array_keys($nomor_kursi_32)); $i++) { ?>
                         $('#gantangan_32_<?php echo array_keys($nomor_kursi_32)[$i]; ?>').hide();
                    <?php } ?>

                    <?php for ($i = 0; $i < count(array_keys($nomor_kursi_24)); $i++) { ?>
                         $('#gantangan_24_<?php echo array_keys($nomor_kursi_24)[$i]; ?>').hide();
                    <?php } ?>
                    initailizeSelect2_kelas();

                    function initailizeSelect2_kelas() {
                         $('.select2_kelas').select2({
                              allowClear: true,
                              multiple: false,
                              placeholder: '--- Pilih Kelas ---',
                              // minimumInputLength: 2,
                              dropdownAutoWidth: true,
                              language: {
                                   inputTooShort: function() {
                                        return 'Ketikan Nomor minimal 2 huruf';
                                   }
                              },
                              ajax: {
                                   url: "<?php echo base_url(); ?>Pesan/kelas",
                                   type: "post",
                                   dataType: 'json',
                                   delay: 250,
                                   data: function(params) {
                                        return {
                                             searchTerm: params.term
                                        };
                                   },

                                   processResults: function(response) {
                                        return {
                                             results: response
                                        };
                                   },
                                   cache: true
                              }
                         });
                    }

                    function getkelas() {
                         var kelas = document.getElementById('kelas').value;
                         $.ajax({
                              url: "<?= site_url('Pesan/getkelas/') ?>?id=" + kelas,
                              type: "GET",
                              dataType: "JSON",
                              success: function(data) {
                                   if (data.jum_gantangan == 60) {
                                        <?php for ($i = 0; $i < count(array_keys($nomor_kursi_60)); $i++) { ?>
                                             var name = '<?php echo array_keys($nomor_kursi_60)[$i]; ?>';
                                             if (name === data.nama) {
                                                  $('#gantangan_60_<?php echo array_keys($nomor_kursi_60)[$i]; ?>').show();
                                             } else {
                                                  $('#gantangan_60_<?php echo array_keys($nomor_kursi_60)[$i]; ?>').hide();
                                             }
                                        <?php } ?>

                                        <?php for ($i = 0; $i < count(array_keys($nomor_kursi_32)); $i++) { ?>
                                             $('#gantangan_32_<?php echo array_keys($nomor_kursi_32)[$i]; ?>').hide();
                                        <?php } ?>

                                        <?php for ($i = 0; $i < count(array_keys($nomor_kursi_24)); $i++) { ?>
                                             $('#gantangan_24_<?php echo array_keys($nomor_kursi_24)[$i]; ?>').hide();
                                        <?php } ?>
                                   } else if (data.jum_gantangan == 32) {
                                        <?php for ($i = 0; $i < count(array_keys($nomor_kursi_32)); $i++) { ?>
                                             var name = '<?php echo array_keys($nomor_kursi_32)[$i]; ?>';
                                             if (name === data.nama) {
                                                  $('#gantangan_32_<?php echo array_keys($nomor_kursi_32)[$i]; ?>').show();
                                             } else {
                                                  $('#gantangan_32_<?php echo array_keys($nomor_kursi_32)[$i]; ?>').hide();
                                             }
                                        <?php } ?>

                                        <?php for ($i = 0; $i < count(array_keys($nomor_kursi_60)); $i++) { ?>
                                             $('#gantangan_60_<?php echo array_keys($nomor_kursi_60)[$i]; ?>').hide();
                                        <?php } ?>

                                        <?php for ($i = 0; $i < count(array_keys($nomor_kursi_24)); $i++) { ?>
                                             $('#gantangan_24_<?php echo array_keys($nomor_kursi_24)[$i]; ?>').hide();
                                        <?php } ?>
                                   } else if (data.jum_gantangan == 24) {
                                        <?php for ($i = 0; $i < count(array_keys($nomor_kursi_24)); $i++) { ?>
                                             var name = '<?php echo array_keys($nomor_kursi_24)[$i]; ?>';
                                             if (name === data.nama) {
                                                  $('#gantangan_24_<?php echo array_keys($nomor_kursi_24)[$i]; ?>').show();
                                             } else {
                                                  $('#gantangan_24_<?php echo array_keys($nomor_kursi_24)[$i]; ?>').hide();
                                             }
                                        <?php } ?>

                                        <?php for ($i = 0; $i < count(array_keys($nomor_kursi_60)); $i++) { ?>
                                             $('#gantangan_60_<?php echo array_keys($nomor_kursi_60)[$i]; ?>').hide();
                                        <?php } ?>

                                        <?php for ($i = 0; $i < count(array_keys($nomor_kursi_32)); $i++) { ?>
                                             $('#gantangan_32_<?php echo array_keys($nomor_kursi_32)[$i]; ?>').hide();
                                        <?php } ?>
                                   }
                              }
                         });
                    }
               </script>