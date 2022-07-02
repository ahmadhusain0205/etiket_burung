<div class="row justify-content-center">
     <div class="col-4">
          <div class="h4">Ubah Password</div>
          <hr>
          <form id="form_ubahpass" method="POST">
               <div class="row">
                    <div class="col">
                         <div class="form-group mb-3">
                              <label for="password">
                                   Password Baru *
                                   <?php echo form_error('password', '<small class="text-danger float-end">', '</small>'); ?>
                              </label>
                              <input type="hidden" name="username" id="username" value="<?= $user['username']; ?>">
                              <input type="password" name="password" id="password" class="form-control" placeholder="masukan password baru...">
                         </div>
                         <div class="form-group mb-3">
                              <label for="konfirmasi">
                                   Ulangi Password Baru *
                              </label>
                              <input type="password" name="konfirmasi" id="konfirmasi" class="form-control" placeholder="ulangi password baru...">
                         </div>
                    </div>
               </div>
               <div class="row">
                    <div class="col">
                         <button type="button" onclick="ubah_pass()" class="btn btn-primary btn-sm float-end"><i class="fas fa-sync"></i> Perbarui</button>
                    </div>
               </div>
          </form>
     </div>
</div>

<script>
     function ubah_pass() {
          var username = $('#username').val();
          var password = $('#password').val();
          var konfirmasi = $('#konfirmasi').val();
          if (password == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'PASSWORD',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (konfirmasi == '') {
               Swal.fire({
                    icon: 'error',
                    title: 'ULANG PASSWORD',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (password != '' || konfirmasi != '') {
               if (password != konfirmasi) {
                    Swal.fire({
                         icon: 'error',
                         title: 'PASSWORD',
                         text: 'Tidak sama !',
                    });
               } else {
                    $.ajax({
                         url: "<?= site_url('Password/ubah') ?>",
                         type: "POST",
                         data: ($('#form_ubahpass').serialize()),
                         dataType: "JSON",
                         success: function(data) {
                              if (data.status == 1) {
                                   Swal.fire({
                                        icon: 'success',
                                        title: 'UBAH PASSWORD',
                                        text: 'Berhasil dilakukan !',
                                   }).then((value) => {
                                        location.href = "<?php echo base_url() ?>Password";
                                   });
                              } else {
                                   Swal.fire({
                                        icon: 'info',
                                        title: 'UBAH PASSWORD',
                                        text: 'Gagal dilakukan !',
                                   });
                              }
                         }
                    });
               }
          }
     }
</script>