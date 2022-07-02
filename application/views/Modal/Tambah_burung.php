<div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form id="burung_tambah" method="POST">
                    <div class="modal-body">
                         <div class="row">
                              <div class="col">
                                   <div class="mb-3">
                                        <label for="nama" class="form-label">
                                             Nama Burung *
                                        </label>
                                        <input type="text" class="form-control" name="lupnama" id="lupnama" placeholder="masukan nama anda...">
                                   </div>
                                   <div class="mb-3">
                                        <label for="kelas" class="form-label">
                                             Kelas *
                                        </label>
                                        <select name="lupkelas" id="lupkelas" class="form-control" onchange="get_harga()">
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
                                        <input type="text" class="form-control" name="lupharga" id="lupharga" readonly>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                         <button type="button" onclick="tambah_b()" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Tambah</button>
                    </div>
               </form>
          </div>
     </div>
</div>

<script>
     $('#lupharga').val('Rp. 0');

     function get_harga() {
          var kelas = $('#lupkelas').val();
          if (kelas != '') {
               $.ajax({
                    url: "<?= site_url('Burung/data/?id=') ?>" + kelas,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                         $('#lupharga').val('Rp. ' + separateComma(data.harga));
                    }
               });
          } else {
               $('#lupharga').val('Rp. 0');
          }
     }

     function tambah_b() {
          var nama = $('[name="lupnama"]').val();
          var id_kelas = $('[name="lupkelas"]').val();
          if (nama == '') {
               $('#modal-tambah').modal('hide');
               Swal.fire({
                    icon: 'error',
                    title: 'NAMA BURUNG',
                    text: 'Tidak boleh kosong !',
               }).then((value) => {
                    $('#modal-tambah').modal('show');
               });
          }
          if (id_kelas == '') {
               $('#modal-tambah').modal('hide');
               Swal.fire({
                    icon: 'error',
                    title: 'KELAS',
                    text: 'Tidak boleh kosong !',
               }).then((value) => {
                    $('#modal-tambah').modal('show');
               });
          }
          if (nama != '' || id_kelas != '') {
               $.ajax({
                    url: "<?= site_url('burung/tambah/?nama=') ?>" + nama + "&id_kelas=" + id_kelas,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                         if (data.status == 1) {
                              $('#modal-tambah').modal('hide');
                              Swal.fire({
                                   icon: 'success',
                                   title: 'TAMBAH BURUNG',
                                   html: 'Berhasil dilakukan !',
                              }).then((value) => {
                                   location.href = "<?php echo base_url() ?>Burung";
                              });
                         } else {
                              $('#modal-tambah').modal('hide');
                              Swal.fire({
                                   icon: 'error',
                                   title: 'TAMBAH BURUNG',
                                   text: 'Gagal dilakukan !',
                              }).then((value) => {
                                   $('#modal-tambah').modal('show');
                              });
                         }
                    }
               });
          }
     }
</script>