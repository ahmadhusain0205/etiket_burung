<div class="modal fade" id="modal-ubah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form id="anggota_ubah" method="POST">
                    <div class="modal-body">
                         <div class="row">
                              <div class="col">
                                   <div class="mb-3">
                                        <label for="username" class="form-label">
                                             Username *
                                        </label>
                                        <input type="text" class="form-control" name="lupuusername" id="lupuusername" placeholder="masukan username anda...">
                                   </div>
                                   <div class="mb-3">
                                        <label for="password" class="form-label">
                                             Password *
                                        </label>
                                        <input type="password" class="form-control" name="lupupassword" id="lupupassword" placeholder="masukan password anda...">
                                   </div>
                              </div>
                              <div class="col">
                                   <div class="mb-3">
                                        <label for="nama" class="form-label">
                                             Nama Lengkap *
                                        </label>
                                        <input type="text" class="form-control" name="lupunama" id="lupunama" placeholder="masukan nama lengkap anda...">
                                   </div>
                                   <div class="mb-3">
                                        <label for="no_hp" class="form-label">
                                             Nomor Hp *
                                        </label>
                                        <input type="text" class="form-control" name="lupuno_hp" id="lupuno_hp" placeholder="masukan nomor hp anda...">
                                   </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col">
                                   <div class="mb-3">
                                        <label for="role" class="form-label">Tingkatan</label>
                                        <select name="lupuid_role" class="form-control" id="lupuid_role" onchange="cek_roleu()">
                                             <option value="">-- Pilih --</option>
                                             <?php foreach ($role as $r) : ?>
                                                  <option value="<?= $r->id; ?>"><?= $r->role; ?></option>
                                             <?php endforeach; ?>
                                        </select>
                                   </div>
                              </div>
                         </div>
                         <div class="row" id="urekening">
                              <div class="col">
                                   <div class="mb-3">
                                        <label for="no_hp" class="form-label">
                                             Nomor Rekening *
                                        </label>
                                        <input type="number" class="form-control" name="lupuno_rekening" id="lupuno_rekening" placeholder="masukan nomor rekening anda...">
                                   </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col">
                                   <div class="mb-3">
                                        <label for="alamat" class="form-label">
                                             Alamat *
                                        </label>
                                        <textarea name="lupualamat" class="form-control" id="lupualamat" placeholder="masukan alamat anda..."></textarea>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                         <button type="button" onclick="ubah_data()" class="btn btn-primary btn-sm"><i class="fas fa-sync"></i> Perbarui</button>
                    </div>
               </form>
          </div>
     </div>
</div>

<script>
     function cek_roleu() {
          var id_role = $('[name="lupuid_role"]').val();
          if (id_role == 1) {
               $('#urekening').show('200');
          } else {
               $('#urekening').hide('200');
          }
     }

     function ubah_data() {
          var username = $('#lupuusername').val();
          var nama = $('#lupunama').val();
          var no_hp = $('#lupuno_hp').val();
          var id_role = $('#lupuid_role').val();
          var no_rekening = $('#lupuno_rekening').val();
          var alamat = $('#lupualamat').val();
          if (username == '') {
               $('#modal-ubah').modal('hide');
               Swal.fire({
                    icon: 'error',
                    title: 'USERNAME',
                    text: 'Tidak boleh kosong !',
               }).then((value) => {
                    $('#modal-ubah').modal('show');
               });
          }
          if (nama == '') {
               $('#modal-ubah').modal('hide');
               Swal.fire({
                    icon: 'error',
                    title: 'NAMA',
                    text: 'Tidak boleh kosong !',
               }).then((value) => {
                    $('#modal-ubah').modal('show');
               });
          }
          if (no_hp == '') {
               $('#modal-ubah').modal('hide');
               Swal.fire({
                    icon: 'error',
                    title: 'NOMOR HP',
                    text: 'Tidak boleh kosong !',
               }).then((value) => {
                    $('#modal-ubah').modal('show');
               });
          }
          if (id_role == '') {
               $('#modal-ubah').modal('hide');
               Swal.fire({
                    icon: 'error',
                    title: 'TINGKATAN',
                    text: 'Tidak boleh kosong !',
               }).then((value) => {
                    $('#modal-ubah').modal('show');
               });
          }
          if (alamat == '') {
               $('#modal-ubah').modal('hide');
               Swal.fire({
                    icon: 'error',
                    title: 'ALAMAT',
                    text: 'Tidak boleh kosong !',
               }).then((value) => {
                    $('#modal-ubah').modal('show');
               });
          }
          if (id_role == 1) {
               if (no_rekening != '') {
                    if (username != '' || nama != '' || no_hp != '' || id_role != '' || alamat != '') {
                         $.ajax({
                              url: "<?= site_url('Anggota/ubah') ?>",
                              type: "POST",
                              data: ($('#anggota_ubah').serialize()),
                              dataType: "JSON",
                              success: function(data) {
                                   if (data.status == 1) {
                                        $('#modal-ubah').modal('hide');
                                        Swal.fire({
                                             icon: 'success',
                                             title: 'UBAH ANGGOTA',
                                             html: 'Akun ' + username + ' berhasil dilakukan !',
                                        }).then((value) => {
                                             location.href = "<?php echo base_url() ?>Anggota";
                                        });
                                   } else {
                                        $('#modal-ubah').modal('hide');
                                        Swal.fire({
                                             icon: 'error',
                                             title: 'UBAH ANGGOTA',
                                             text: 'Gagal dilakukan !',
                                        }).then((value) => {
                                             $('#modal-ubah').modal('show');
                                        });
                                   }
                              }
                         });
                    }
               } else {
                    $('#modal-ubah').modal('hide');
                    Swal.fire({
                         icon: 'error',
                         title: 'REKENING',
                         text: 'Tidak boleh kosong !',
                    }).then((value) => {
                         $('#modal-ubah').modal('show');
                    });
               }
          } else if (id_role == 2) {
               if (username != '' || nama != '' || no_hp != '' || id_role != '' || alamat != '') {
                    $.ajax({
                         url: "<?= site_url('Anggota/ubah') ?>",
                         type: "POST",
                         data: ($('#anggota_ubah').serialize()),
                         dataType: "JSON",
                         success: function(data) {
                              if (data.status == 1) {
                                   $('#modal-ubah').modal('hide');
                                   Swal.fire({
                                        icon: 'success',
                                        title: 'UBAH ANGGOTA',
                                        html: 'Akun ' + username + ' berhasil dilakukan !',
                                   }).then((value) => {
                                        location.href = "<?php echo base_url() ?>Anggota";
                                   });
                              } else {
                                   $('#modal-ubah').modal('hide');
                                   Swal.fire({
                                        icon: 'error',
                                        title: 'UBAH ANGGOTA',
                                        text: 'Gagal dilakukan !',
                                   }).then((value) => {
                                        $('#modal-ubah').modal('show');
                                   });
                              }
                         }
                    });
               }
          }
     }
</script>