<div class="modal fade" id="modal-ubah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form id="burung_ubah" method="POST">
                    <div class="modal-body">
                         <div class="row">
                              <div class="col">
                                   <div class="mb-3">
                                        <label for="nama" class="form-label">
                                             Nama Burung *
                                        </label>
                                        <input type="hidden" class="form-control" name="lupuid" id="lupuid">
                                        <input type="text" class="form-control" name="lupunama" id="lupunama" placeholder="masukan nama anda...">
                                   </div>
                                   <div class="mb-3">
                                        <label for="kelas" class="form-label">
                                             Kelas *
                                        </label>
                                        <select name="lupukelas" id="lupukelas" class="form-control" onchange="get_hargau()">
                                             <option value="">-- Pilih --</option>
                                             <?php foreach ($kelas as $k) : ?>
                                                  <option value="<?= $k->id ?>"><?= $k->nama; ?></option>
                                             <?php endforeach; ?>
                                        </select>
                                   </div>
                                   <div class="mb-3">
                                        <label for="harga" class="form-label">
                                             Harga Kelas *
                                        </label>
                                        <input type="text" class="form-control" name="lupuharga" id="lupuharga" readonly>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                         <button type="button" onclick="ubah_b()" class="btn btn-primary btn-sm"><i class="fas fa-sync"></i> Perbarui</button>
                    </div>
               </form>
          </div>
     </div>
</div>

<script>
     $('#lupuharga').val('Rp. 0');

     function get_hargau() {
          var kelas = $('#lupukelas').val();
          if (kelas != '') {
               $.ajax({
                    url: "<?= site_url('Burung/data/?id=') ?>" + kelas,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                         $('#lupuharga').val('Rp. ' + separateComma(data.harga));
                    }
               });
          } else {
               $('#lupuharga').val('Rp. 0');
          }
     }

     function ubah_b() {
          var id = $('[name="lupuid"]').val();
          var nama = $('[name="lupunama"]').val();
          var id_kelas = $('[name="lupukelas"]').val();
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
          if (id_kelas == '') {
               $('#modal-ubah').modal('hide');
               Swal.fire({
                    icon: 'error',
                    title: 'KELAS',
                    text: 'Tidak boleh kosong !',
               }).then((value) => {
                    $('#modal-ubah').modal('show');
               });
          }
          if (id != '' || nama != '' || id_kelas != '') {
               $.ajax({
                    url: "<?= site_url('Burung/ubah/?id=') ?>" + id + '&nama=' + nama + "&id_kelas=" + id_kelas,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                         if (data.status == 1) {
                              $('#modal-ubah').modal('hide');
                              Swal.fire({
                                   icon: 'success',
                                   title: 'UBAH KELAS',
                                   html: 'Berhasil dilakukan !',
                              }).then((value) => {
                                   location.href = "<?php echo base_url() ?>Burung";
                              });
                         } else {
                              $('#modal-ubah').modal('hide');
                              Swal.fire({
                                   icon: 'error',
                                   title: 'UBAH KELAS',
                                   text: 'Gagal dilakukan !',
                              }).then((value) => {
                                   $('#modal-ubah').modal('show');
                              });
                         }
                    }
               });
          }
     }
</script>