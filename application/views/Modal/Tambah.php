<div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form id="anggota_tambah" method="POST">
                    <div class="modal-body">
                         <div class="row">
                              <div class="col">
                                   <div class="mb-3">
                                        <label for="username" class="form-label">
                                             Username *
                                        </label>
                                        <input type="text" class="form-control" name="lupusername" id="lupusername" placeholder="masukan username anda...">
                                   </div>
                                   <div class="mb-3">
                                        <label for="password" class="form-label">
                                             Password *
                                        </label>
                                        <input type="password" class="form-control" name="luppassword" id="luppassword" placeholder="masukan password anda...">
                                   </div>
                              </div>
                              <div class="col">
                                   <div class="mb-3">
                                        <label for="nama" class="form-label">
                                             Nama Lengkap *
                                        </label>
                                        <input type="text" class="form-control" name="lupnama" id="lupnama" placeholder="masukan nama lengkap anda...">
                                   </div>
                                   <div class="mb-3">
                                        <label for="no_hp" class="form-label">
                                             Nomor Hp *
                                        </label>
                                        <input type="text" class="form-control" name="lupno_hp" id="lupno_hp" placeholder="masukan nomor hp anda...">
                                   </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col">
                                   <div class="mb-3">
                                        <label for="role" class="form-label">Tingkatan</label>
                                        <select name="lupid_role" class="form-control" id="lupid_role" onchange="cek_role()">
                                             <option value="">-- Pilih --</option>
                                             <?php foreach ($role as $r) : ?>
                                                  <option value="<?= $r->id; ?>"><?= $r->role; ?></option>
                                             <?php endforeach; ?>
                                        </select>
                                   </div>
                              </div>
                         </div>
                         <div class="row" id="rekening">
                              <div class="col">
                                   <div class="mb-3">
                                        <label for="no_hp" class="form-label">
                                             Nomor Rekening *
                                        </label>
                                        <input type="number" class="form-control" name="lupno_rekening" id="lupno_rekening" placeholder="masukan nomor rekening anda...">
                                   </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col">
                                   <div class="mb-3">
                                        <label for="alamat" class="form-label">
                                             Alamat *
                                        </label>
                                        <textarea name="lupalamat" class="form-control" id="lupalamat" placeholder="masukan alamat anda..."></textarea>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                         <button type="button" onclick="tambah()" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Tambah</button>
                    </div>
               </form>
          </div>
     </div>
</div>

<script>
     function cek_role() {
          var id_role = $('[name="lupid_role"]').val();
          if (id_role == 1) {
               $('#rekening').show('200');
          } else {
               $('#rekening').hide('200');
          }
     }

     function tambah() {
          var username = $('[name="lupusername"]').val();
          var password = $('[name="luppassword"]').val();
          var nama = $('[name="lupnama"]').val();
          var no_hp = $('[name="lupno_hp"]').val();
          var id_role = $('[name="lupid_role"]').val();
          var alamat = $('[name="lupalamat"]').val();
          var no_rekening = $('[name="lupno_rekening"]').val();
          if (username == '') {
               $('#tambah').modal('hide');
               Swal.fire({
                    icon: 'error',
                    title: 'USERNAME',
                    text: 'Tidak boleh kosong !',
               }).then((value) => {
                    $('#tambah').modal('show');
               });
          }
          if (password == '') {
               $('#tambah').modal('hide');
               Swal.fire({
                    icon: 'error',
                    title: 'PASSWORD',
                    text: 'Tidak boleh kosong !',
               }).then((value) => {
                    $('#tambah').modal('show');
               });
          }
          if (nama == '') {
               $('#tambah').modal('hide');
               Swal.fire({
                    icon: 'error',
                    title: 'NAMA',
                    text: 'Tidak boleh kosong !',
               }).then((value) => {
                    $('#tambah').modal('show');
               });
          }
          if (no_hp == '') {
               $('#tambah').modal('hide');
               Swal.fire({
                    icon: 'error',
                    title: 'NOMOR HP',
                    text: 'Tidak boleh kosong !',
               }).then((value) => {
                    $('#tambah').modal('show');
               });
          }
          if (alamat == '') {
               $('#tambah').modal('hide');
               Swal.fire({
                    icon: 'error',
                    title: 'ALAMAT',
                    text: 'Tidak boleh kosong !',
               }).then((value) => {
                    $('#tambah').modal('show');
               });
          }
          if (id_role == '') {
               $('#tambah').modal('hide');
               Swal.fire({
                    icon: 'error',
                    title: 'TINGKATAN',
                    text: 'Tidak boleh kosong !',
               }).then((value) => {
                    $('#tambah').modal('show');
               });
          }
          if (id_role == 1) {
               if (no_rekening != '') {
                    if (username != '' || password != '' || nama != '' || no_hp != '' || id_role != '' || alamat != '') {
                         $.ajax({
                              url: "<?= site_url('Anggota/tambah') ?>",
                              type: "POST",
                              data: ($('#anggota_tambah').serialize()),
                              dataType: "JSON",
                              success: function(data) {
                                   if (data.status == 1) {
                                        $('#tambah').modal('hide');
                                        Swal.fire({
                                             icon: 'success',
                                             title: 'TAMBAH ANGGOTA',
                                             html: 'Akun ' + username + ' berhasil dilakukan !',
                                        }).then((value) => {
                                             location.href = "<?php echo base_url() ?>Anggota";
                                        });
                                   } else if (data.status == 2) {
                                        $('#tambah').modal('hide');
                                        Swal.fire({
                                             icon: 'error',
                                             title: 'TAMBAH ANGGOTA',
                                             html: 'Akun ' + username + ' sudah terdaftar !',
                                        }).then((value) => {
                                             $('#tambah').modal('show');
                                        });
                                   } else {
                                        $('#tambah').modal('hide');
                                        Swal.fire({
                                             icon: 'error',
                                             title: 'TAMBAH ANGGOTA',
                                             text: 'Gagal dilakukan !',
                                        }).then((value) => {
                                             $('#tambah').modal('show');
                                        });
                                   }
                              }
                         });
                    }
               } else {
                    $('#tambah').modal('hide');
                    Swal.fire({
                         icon: 'error',
                         title: 'REKENING',
                         text: 'Tidak boleh kosong !',
                    }).then((value) => {
                         $('#tambah').modal('show');
                    });
               }
          } else if (id_role == 2) {
               if (username != '' || password != '' || nama != '' || no_hp != '' || id_role != '' || alamat != '') {
                    $.ajax({
                         url: "<?= site_url('Anggota/tambah') ?>",
                         type: "POST",
                         data: ($('#anggota_tambah').serialize()),
                         dataType: "JSON",
                         success: function(data) {
                              if (data.status == 1) {
                                   $('#tambah').modal('hide');
                                   Swal.fire({
                                        icon: 'success',
                                        title: 'TAMBAH ANGGOTA',
                                        html: 'Akun ' + username + ' berhasil dilakukan !',
                                   }).then((value) => {
                                        location.href = "<?php echo base_url() ?>Anggota";
                                   });
                              } else if (data.status == 2) {
                                   $('#tambah').modal('hide');
                                   Swal.fire({
                                        icon: 'error',
                                        title: 'TAMBAH ANGGOTA',
                                        html: 'Akun ' + username + ' sudah terdaftar !',
                                   }).then((value) => {
                                        $('#tambah').modal('show');
                                   });
                              } else {
                                   $('#tambah').modal('hide');
                                   Swal.fire({
                                        icon: 'error',
                                        title: 'TAMBAH ANGGOTA',
                                        text: 'Gagal dilakukan !',
                                   }).then((value) => {
                                        $('#tambah').modal('show');
                                   });
                              }
                         }
                    });
               }
          }
     }
</script>