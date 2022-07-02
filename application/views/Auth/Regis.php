<div class="row">
     <div class="col-8 offset-2">
          <div class="card shadow mb-3">
               <div class="card-body">
                    <form method="POST" id="form_daftar">
                         <div class="h4 text-center"><?= $judul; ?> Di</div>
                         <div class="h4 text-center text-primary fw-bold">JIMJOG INDEPENDEN</div>
                         <hr>
                         <span style="font-size: 10px;" class="text-danger">
                              Tanda bintang (*) diartikan wajib diisi
                         </span>
                         <div class="row mt-2">
                              <div class="col">
                                   <div class="mb-3">
                                        <label for="username" class="form-label">
                                             Username *
                                        </label>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="masukan username anda...">
                                   </div>
                                   <div class="mb-3">
                                        <label for="password" class="form-label">
                                             Password *
                                        </label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="masukan password anda...">
                                   </div>
                              </div>
                              <div class="col">
                                   <div class="mb-3">
                                        <label for="nama" class="form-label">
                                             Nama Lengkap *
                                        </label>
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="masukan nama lengkap anda...">
                                   </div>
                                   <div class="mb-3">
                                        <label for="no_hp" class="form-label">
                                             Nomor Hp *
                                        </label>
                                        <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="masukan nomor hp anda...">
                                   </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col">
                                   <div class="mb-3">
                                        <label for="alamat" class="form-label">
                                             Alamat *
                                        </label>
                                        <textarea name="alamat" class="form-control" id="alamat" placeholder="masukan alamat anda..."></textarea>
                                   </div>
                              </div>
                         </div>
                         <hr>
                         <a type="button" href="<?= site_url('Auth'); ?>" class="btn btn-warning" style="width: 100px;"><i class="fa-solid fa-circle-chevron-left"></i> Kembali</a>
                         <button type="button" class="btn btn-primary float-end" style="width: 100px;" onclick="daftar()"><i class="fa-solid fa-circle-plus"></i> Daftar</button>
                    </form>
               </div>
          </div>
     </div>
</div>

<script>
     function daftar() {
          var username = $('#username').val();
          var password = $('#password').val();
          var nama = $('#nama').val();
          var no_hp = $('#no_hp').val();
          var alamat = $('#alamat').val();
          if (username == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'USERNAME',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (password == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'PASSWORD',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (nama == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'NAMA',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (no_hp == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'NOMOR HP',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (alamat == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'ALAMAT',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (username != '' && password != '' && nama != '' && no_hp != '' && alamat != '') {
               $.ajax({
                    url: "<?= site_url('Auth/daftar_sekarang') ?>",
                    type: "POST",
                    data: ($('#form_daftar').serialize()),
                    dataType: "JSON",
                    success: function(data) {
                         if (data.status == 1) {
                              Swal.fire({
                                   icon: 'success',
                                   title: 'DAFTAR MEMBER',
                                   text: 'Berhasil dilakukan !',
                              }).then((value) => {
                                   location.href = "<?php echo base_url() ?>Auth";
                              });
                         } else {
                              Swal.fire({
                                   icon: 'info',
                                   title: 'DAFTAR MEMBER',
                                   text: 'Gagal dilakukan !',
                              });
                         }
                    }
               });
          }
     }
</script>