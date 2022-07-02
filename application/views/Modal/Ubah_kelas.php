<div class="modal fade" id="modal-ubah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form id="kelas_ubah" method="POST">
                    <div class="modal-body">
                         <div class="row">
                              <div class="col">
                                   <div class="mb-3">
                                        <label for="nama" class="form-label">
                                             Nama Kelas *
                                        </label>
                                        <input type="hidden" name="lupuid" id="lupuid">
                                        <input type="text" class="form-control" name="lupunama" id="lupunama" placeholder="masukan nama anda...">
                                   </div>
                                   <div class="mb-3">
                                        <label for="harga" class="form-label">
                                             Harga Kelas *
                                        </label>
                                        <input type="text" class="form-control" name="lupuharga" id="lupuharga" placeholder="masukan harga anda..." onchange="ubah_hargau()">
                                   </div>
                                   <div class="mb-3">
                                        <label for="jum_gantangan" class="form-label">
                                             Kelas *
                                        </label>
                                        <select name="lupujum_gantangan" id="lupujum_gantangan" class="form-control">
                                             <option value="">-- Pilih --</option>
                                             <option value="60">60 Nomor Kursi</option>
                                             <option value="32">32 Nomor Kursi</option>
                                             <option value="24">24 Nomor Kursi</option>
                                        </select>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                         <button type="button" onclick="ubah_k()" class="btn btn-primary btn-sm"><i class="fas fa-sync"></i> Perbarui</button>
                    </div>
               </form>
          </div>
     </div>
</div>

<script>
     function ubah_hargau() {
          var harga = $('[name="lupuharga"]').val();
          $('#lupuharga').val(separateComma(harga));
     }

     function ubah_k() {
          var id = $('[name="lupuid"]').val();
          var nama = $('[name="lupunama"]').val();
          var hargax = $('[name="lupuharga"]').val();
          var harga = parseInt(hargax.replaceAll(',', ''));
          var jum_gantangan = $('[name="lupujum_gantangan"]').val();
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
          if (hargax == '') {
               $('#modal-ubah').modal('hide');
               Swal.fire({
                    icon: 'error',
                    title: 'HARGA',
                    text: 'Tidak boleh kosong !',
               }).then((value) => {
                    $('#modal-ubah').modal('show');
               });
          }
          if (jum_gantangan == '') {
               $('#modal-ubah').modal('hide');
               Swal.fire({
                    icon: 'error',
                    title: 'KELAS',
                    text: 'Tidak boleh kosong !',
               }).then((value) => {
                    $('#modal-ubah').modal('show');
               });
          }
          if (id != '' || nama != '' || hargax != '' || jum_gantangan != '') {
               $.ajax({
                    url: "<?= site_url('Kelas/ubah/?id=') ?>" + id + '&nama=' + nama + "&harga=" + harga + "&jum_gantangan=" + jum_gantangan,
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
                                   location.href = "<?php echo base_url() ?>Kelas";
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