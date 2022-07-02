<div class="row">
     <div class="col-6 offset-3">
          <div class="h4">
               Profile
               <button class="btn btn-warning float-end" data-bs-toggle="modal" data-bs-target="#ubah"><i class="fa-solid fa-user-pen"></i> Ubah Profile</button>
          </div>
          <hr>
          <div class="row justify-content-center">
               <div class="col-4 my-auto text-center">
                    <img src="<?= base_url('assets/img/user/') . $user['gambar']; ?>" class="img-thumbnail rounded" style="width:200px;">
               </div>
               <div class="col-8 my-auto">
                    <div class="row">
                         <div class="col-4">
                              <div class="h5 fw-bold">Username</div>
                         </div>
                         <div class="col-8">
                              <div class="h5">: <?= $user['username']; ?></div>
                         </div>
                    </div>
                    <hr>
                    <div class="row">
                         <div class="col-4">
                              <div class="h5 fw-bold">Nama</div>
                         </div>
                         <div class="col-8">
                              <div class="h5">: <?= $user['nama']; ?></div>
                         </div>
                    </div>
                    <hr>
                    <div class="row">
                         <div class="col-4">
                              <div class="h5 fw-bold">Alamat</div>
                         </div>
                         <div class="col-8">
                              <div class="h5">: <?= $user['alamat']; ?></div>
                         </div>
                    </div>
                    <hr>
                    <div class="row">
                         <div class="col-4">
                              <div class="h5 fw-bold">Nomor hp</div>
                         </div>
                         <div class="col-8">
                              <div class="h5">: <?= $user['no_hp']; ?></div>
                         </div>
                    </div>
                    <hr>
                    <div class="row">
                         <div class="col-4">
                              <div class="h5 fw-bold">Status</div>
                         </div>
                         <div class="col-8">
                              <div class="h5">:
                                   <?php if ($user['id_role'] == 1) {
                                        echo 'Administrator';
                                   } else {
                                        echo 'Peserta';
                                   } ?>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

<!-- modal ubah -->
<div class="modal fade" id="ubah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <?= form_open_multipart('Profile/ubah'); ?>
               <div class="modal-body">
                    <div class="row mt-2">
                         <div class="col">
                              <div class="mb-3">
                                   <label for="username" class="form-label">
                                        Username *
                                        <?php echo form_error('username', '<small class="text-danger float-end">', '</small>'); ?>
                                   </label>
                                   <input type="text" class="form-control" name="username" value="<?= $user['username']; ?>" placeholder="masukan username anda..." readonly>
                              </div>
                         </div>
                         <div class="col">
                              <div class="mb-3">
                                   <label for="gambar" class="form-label">
                                        Profile
                                        <?php echo form_error('gambar', '<small class="text-danger float-end">', '</small>'); ?>
                                   </label>
                                   <input type="file" class="form-control" name="gambar" value="<?= $user['gambar']; ?>" placeholder="masukan profile anda...">
                              </div>
                         </div>
                    </div>
                    <div class="row">
                         <div class="col">
                              <div class="mb-3">
                                   <label for="nama" class="form-label">
                                        Nama Lengkap *
                                        <?php echo form_error('nama', '<small class="text-danger float-end">', '</small>'); ?>
                                   </label>
                                   <input type="text" class="form-control" name="nama" value="<?= $user['nama']; ?>" placeholder="masukan nama lengkap anda...">
                              </div>
                         </div>
                         <div class="col">
                              <div class="mb-3">
                                   <label for="no_hp" class="form-label">
                                        Nomor Hp *
                                        <?php echo form_error('no_hp', '<small class="text-danger float-end">', '</small>'); ?>
                                   </label>
                                   <input type="text" class="form-control" name="no_hp" value="<?= $user['no_hp']; ?>" placeholder="masukan nomor hp anda...">
                              </div>
                         </div>
                    </div>
                    <div class="row">
                         <div class="col">
                              <div class="mb-3">
                                   <label for="alamat" class="form-label">
                                        Alamat *
                                        <?php echo form_error('alamat', '<small class="text-danger float-end">', '</small>'); ?>
                                   </label>
                                   <textarea name="alamat" class="form-control" placeholder="masukan alamat anda..."><?= $user['alamat']; ?></textarea>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> Tidak</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-sync"></i> Perbarui</button>
               </div>
               <?= form_close(); ?>
          </div>
     </div>
</div>