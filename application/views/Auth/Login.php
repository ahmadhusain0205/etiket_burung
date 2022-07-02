<div class="row">
     <div class="col-8">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
               <div class="carousel-inner">
                    <?php foreach ($slider as $s) : ?>
                         <?php if ($s->id == 1) { ?>
                              <div class="carousel-item active">
                                   <img src="<?= base_url('assets/img/slider/') . $s->gambar; ?>" class="d-block w-100 rounded" style="width: 100%; height:400px; background-size:cover;">
                              </div>
                         <?php } else { ?>
                              <div class="carousel-item">
                                   <img src="<?= base_url('assets/img/slider/') . $s->gambar; ?>" class="d-block w-100 rounded" style="width: 100%; height:400px; background-size:cover;">
                              </div>
                         <?php } ?>
                    <?php endforeach; ?>
               </div>
               <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
               </button>
               <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
               </button>
          </div>
     </div>
     <div class="col my-auto">
          <form id="masuk" method="POST">
               <div class="h4 text-center">Selamat Datang Di</div>
               <div class="h4 text-center text-primary fw-bold">JIMJOG INDEPENDEN</div>
               <hr>
               <div class="mb-3">
                    <label for="username" class="form-label">Username *</label>
                    <input type="text" class="form-control" name="username" id="username" autofocus>
               </div>
               <div class="mb-3">
                    <label for="password" class="form-label">Password *</label>
                    <input type="password" class="form-control" name="password" id="password">
               </div>
               <hr>
               <a type="button" href="<?= site_url('Auth/daftar'); ?>" class="btn btn-warning" style="width: 100px;"><i class="fa-solid fa-circle-exclamation"></i> Daftar</a>
               <button type="button" onclick="masuk()" class="btn btn-primary float-end" style="width: 100px;"><i class="fa-solid fa-right-to-bracket"></i> Masuk</button>
          </form>
     </div>
</div>

<script>
     function masuk() {
          var username = document.getElementById('username').value;
          var password = document.getElementById('password').value;
          if (username == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'USERNAME',
                    text: 'Tidak boleh kosong !',
               });
          }
          if (password == '') {
               Swal.fire({
                    icon: 'danger',
                    title: 'PASSWORD',
                    text: 'Tidak boleh kosong !',
               });
          }

          if (username != '' && password != '') {
               $.ajax({
                    url: "<?php echo base_url(); ?>Auth/masuk/?username=" + username + '&password=' + password,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                         if (data.status == 1) {
                              Swal.fire({
                                   icon: 'success',
                                   title: 'LOGIN',
                                   text: 'Berhasil dilakukan !',
                              }).then((value) => {
                                   location.href = "<?php echo base_url() ?>Beranda";
                              });
                         } else if (data.status == 2) {
                              Swal.fire({
                                   icon: 'success',
                                   title: 'LOGIN',
                                   text: 'Berhasil dilakukan !',
                              }).then((value) => {
                                   location.href = "<?php echo base_url() ?>Kontesan";
                              });
                         } else if (data.status == 3) {
                              Swal.fire({
                                   icon: 'info',
                                   title: 'LOGIN',
                                   text: 'Password salah !',
                              });
                         } else {
                              Swal.fire({
                                   icon: 'danger',
                                   title: 'LOGIN',
                                   text: 'Username belum terdaftar !',
                              });
                         }
                    }
               });
          }
     }
</script>