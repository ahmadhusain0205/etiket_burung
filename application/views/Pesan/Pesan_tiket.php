<form method="POST" id="form_pesan">
     <div class="row">
          <div class="col-4">
               <div class="row">
                    <div class="col">
                         <div class="card mb-3">
                              <div class="card-body">
                                   <div class="h4">DATA DIRI</div>
                                   <hr>
                                   <div class="row g-3 align-items-center mb-3">
                                        <div class="col-4">
                                             <label for="nama" class="col-form-label">NAMA</label>
                                        </div>
                                        <div class="col-8">
                                             <input type="text" id="nama" name="nama" class="form-control" value="<?= strtoupper($user['nama']) ?>" readonly>
                                        </div>
                                   </div>
                                   <div class="row g-3 align-items-center mb-3">
                                        <div class="col-4">
                                             <label for="no_hp" class="col-form-label">NOMOR HP</label>
                                        </div>
                                        <div class="col-8">
                                             <input type="number" id="no_hp" name="no_hp" class="form-control" value="<?= strtoupper($user['no_hp']) ?>" readonly>
                                        </div>
                                   </div>
                                   <div class="row g-3 align-items-center mb-3">
                                        <div class="col-4">
                                             <label for="alamat" class="col-form-label">ALAMAT</label>
                                        </div>
                                        <div class="col-8">
                                             <textarea name="alamat" id="alamat" class="form-control" readonly><?= $user['alamat']; ?></textarea>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="row">
                    <div class="col">
                         <div class="card mb-3">
                              <div class="card-body">
                                   <div class="h4">PEMESANAN</div>
                                   <hr>
                                   <div class="row g-3 align-items-center mb-3">
                                        <div class="col-4">
                                             <label for="panitia" class="col-form-label">PANITIA</label>
                                        </div>
                                        <div class="col-8">
                                             <select name="panitia" id="panitia" class="form-control select2_panitia" onchange="getrekening()"></select>
                                        </div>
                                   </div>
                                   <div class="row g-3 align-items-center mb-3">
                                        <div class="col-4">
                                             <label for="rekening" class="col-form-label">REKENING</label>
                                        </div>
                                        <div class="col-8">
                                             <input type="number" id="rekening" name="rekening" class="form-control" readonly>
                                        </div>
                                   </div>
                                   <hr>
                                   <div class="row g-3 align-items-center mb-3">
                                        <div class="col-4">
                                             <label for="kelas" class="col-form-label">KELAS</label>
                                        </div>
                                        <div class="col-8">
                                             <select name="kelas" id="kelas" class="form-control select2_kelas" onchange="getkelas()"></select>
                                        </div>
                                   </div>
                                   <div class="row g-3 align-items-center mb-3">
                                        <div class="col-4">
                                             <label for="harga" class="col-form-label">HARGA</label>
                                        </div>
                                        <div class="col-8">
                                             <input type="text" id="harga" name="harga" class="form-control" readonly>
                                        </div>
                                   </div>
                                   <div class="row g-3 align-items-center mb-3">
                                        <div class="col-4">
                                             <label for="burung" class="col-form-label">BURUNG</label>
                                        </div>
                                        <div class="col-8">
                                             <select name="burung" id="burung" class="form-control select2_burung">
                                                  <option value="">Pilih Kelas Terlebih Dahulu</option>
                                             </select>
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
                                                                      <input class="form-check-input" type="hidden">
                                                                 <?php else : ?>
                                                                      <input class="form-check-input" type="radio" value="<?= $k->no_kursi; ?>" name="nomor_kursi" id="nomor_kursi">
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
                                                                                <input class="form-check-input" type="hidden">
                                                                           <?php else : ?>
                                                                                <input class="form-check-input" type="radio" value="<?= $k->no_kursi; ?>" name="nomor_kursi" id="nomor_kursi">
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
                                                                                          <input class="form-check-input" type="hidden">
                                                                                     <?php else : ?>
                                                                                          <input class="form-check-input" type="radio" value="<?= $k->no_kursi; ?>" name="nomor_kursi" id="nomor_kursi">
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
                    <hr>
                    <div class="row mb-5">
                         <div class="col">
                              <button class="btn btn-primary float-end" onclick="save()" type="button"><i class="fas fa-paper-plane"></i> Pesan Sekarang</button>
                         </div>
                    </div>
</form>

<script>
     function separateComma(val) {
          var sign = 1;
          if (val < 0) {
               sign = -1;
               val = -val;
          }
          let num = val.toString().includes('.') ? val.toString().split('.')[0] : val.toString();
          let len = num.toString().length;
          let result = '';
          let count = 1;

          for (let i = len - 1; i >= 0; i--) {
               result = num.toString()[i] + result;
               if (count % 3 === 0 && count !== 0 && i !== 0) {
                    result = ',' + result;
               }
               count++;
          }
          if (val.toString().includes('.')) {
               result = result + '.' + val.toString().split('.')[1];
          }
          return sign < 0 ? '-' + result : result;
     }
</script>

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

     $('.select2_burung').select2();

     initailizeSelect2_panitia();
     initailizeSelect2_kelas();

     function initailizeSelect2_panitia() {
          $('.select2_panitia').select2({
               allowClear: true,
               multiple: false,
               placeholder: '--- Pilih Panitia ---',
               // minimumInputLength: 2,
               dropdownAutoWidth: true,
               language: {
                    inputTooShort: function() {
                         return 'Ketikan Nomor minimal 2 huruf';
                    }
               },
               ajax: {
                    url: "<?php echo base_url(); ?>Pesan/panitia",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                         return {
                              searchTerm: params.term // search term
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
                              searchTerm: params.term // search term
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

     function getrekening() {
          var panitia = document.getElementById('panitia').value;
          $.ajax({
               url: "<?= site_url('Pesan/getrekening/') ?>?id=" + panitia,
               type: "GET",
               dataType: "JSON",
               success: function(data) {
                    $('#rekening').val(data.no_rekening);
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
                    var harga = data.harga;
                    $('#harga').val('Rp. ' + separateComma(harga));
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
          $.ajax({
               url: "<?= site_url('Pesan/getburung/') ?>?id=" + kelas,
               type: "GET",
               dataType: "JSON",
               success: function(data) {
                    if (data != '') {
                         var opt = data;
                         var burung = $("#burung");
                         burung.empty();
                         $(opt).each(function() {
                              var option = $("<option/>");
                              option.html(this.nama);
                              option.val(this.nama);
                              burung.append(option);
                         });
                    } else {
                         $('#burung').empty();
                    }
               }
          });
     }

     function save() {
          var panitia = $('#panitia').val();
          var rekening = $('#rekening').val();
          var kelas = $('#kelas').val();
          var burung = $('#burung').val();
          var nomor_kursi = $('[name="nomor_kursi"]').val();
          console.log(panitia)
          if (panitia == '' || panitia == null) {
               Swal.fire({
                    icon: 'error',
                    title: 'PANITIA',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (kelas == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'KELAS',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (burung == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'BURUNG',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (nomor_kursi == '' || nomor_kursi == 0 || nomor_kursi == null) {
               Swal.fire({
                    icon: 'error',
                    title: 'GANTANGAN',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (panitia != '' && kelas != '' && burung != '' && nomor_kursi != '' && nomor_kursi != 0 && nomor_kursi != null) {
               // console.log($('#form_pesan').serialize())
               $.ajax({
                    // url: "<?= site_url('Pesan/pesan_sekarang/?panitia=') ?>" + panitia + '&kelas=' + kelas + '&burung=' + burung + '&nomor_kursi=' + nomor_kursi,
                    url: "<?= site_url('Pesan/pesan_sekarang') ?>",
                    type: "POST",
                    data: ($('#form_pesan').serialize()),
                    dataType: "JSON",
                    success: function(data) {
                         if (data.status == 1) {
                              Swal.fire({
                                   icon: 'success',
                                   title: 'PEMESANAN',
                                   html: 'Berhasil dilakukan, silahkan upload bukti transaksi !<br>' + 'Total pembayaran adalah Rp. ' + separateComma(Number(data.harga)) + '<br>Dengan nomor gantangan : ' + data.nomor,
                              }).then((value) => {
                                   Swal.fire({
                                        icon: 'info',
                                        title: 'BATAS WAKTU',
                                        html: 'Pembayaran harus dilakukan maksimal 1 x 24 jam<br>Bila mana melewati batas yg ditentukan<br>Maka pemesanan tiket akan dihapus secara otomatis',
                                   }).then((value) => {
                                        location.href = "<?php echo base_url() ?>Bayar";
                                   });
                              });
                         } else {
                              Swal.fire({
                                   icon: 'error',
                                   title: 'PEMESANAN',
                                   text: 'Gagal dilakukan !',
                              });
                         }
                    }
               });
          } else {
               Swal.fire({
                    icon: 'error',
                    title: 'PEMESANAN',
                    text: 'Gagal Dilakukan !',
               }).then((value) => {
                    location.href = "<?php echo base_url() ?>Pesan";
               });
          }
     }
</script>


<?php
$nama_kelas = "<script>document.writeln(nama_kelas)</script>";
?>