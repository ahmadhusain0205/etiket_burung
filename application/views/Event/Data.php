<div class="row">
     <div class="col-6">
          <div class="h4">
               SLIDER HOME
               <button class="btn btn-primary float-end" type="button" onclick="tambah_slider()"><i class="fa-solid fa-folder-plus"></i> Tambah</button>
          </div>
          <hr>
          <div class="table-responsive">
               <table class="table table-striped table-bordered table-hover" id="table_slider">
                    <thead>
                         <tr class="text-center">
                              <th width="1%">No</th>
                              <th width="24%">Gambar</th>
                              <th width="20%">Nama File</th>
                              <th width="50%">Aksi</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php $no = 1;
                         foreach ($slider as $s) : ?>
                              <tr>
                                   <td><?= $no++; ?></td>
                                   <td>
                                        <img src="<?= base_url('assets/img/slider/') . $s->gambar; ?>" width="100%">
                                   </td>
                                   <td><?= $s->gambar; ?></td>
                                   <td class="text-center">
                                        <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#ubah<?= $s->id; ?>"><i class="fas fa-exchange-alt"></i> Ubah</button>
                                        <button class="btn btn-danger" type="button" onclick="hapus_slider(<?= $s->id ?>)"><i class="fas fa-minus-circle"></i> Hapus</button>
                                   </td>
                              </tr>
                         <?php endforeach; ?>
                    </tbody>
               </table>
          </div>
     </div>
     <div class="col-6">
          <div class="h4">
               INFORMASI LOMBA
          </div>
          <hr>
          <div class="table-responsive">
               <table class="table table-striped table-bordered table-hover" id="table_lomba">
                    <thead>
                         <tr class="text-center">
                              <th width="1%">No</th>
                              <th width="25%">Kolom Kiri</th>
                              <th width="30%">Gambar</th>
                              <th width="25%">Kolom Kanan</th>
                              <th width="19%">Aksi</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php $no = 1;
                         foreach ($info as $i) : ?>
                              <tr>
                                   <td><?= $no++; ?></td>
                                   <td><?= $i->kolom_1; ?></td>
                                   <td>
                                        <img src="<?= base_url('assets/img/kontes/') . $i->gambar; ?>" width="100%">
                                   </td>
                                   <td><?= $i->kolom_2; ?></td>
                                   <td class="text-center">
                                        <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#ubah_info<?= $i->id; ?>"><i class="fas fa-exchange-alt"></i> Ubah</button>
                                   </td>
                              </tr>
                         <?php endforeach; ?>
                    </tbody>
               </table>
          </div>
     </div>
</div>

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-folder-plus"></i> Tambah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <?= form_open_multipart('Event/tambah'); ?>
               <div class="modal-body">
                    <div class="form-group">
                         <label for="gambar">Cari File</label>
                         <input type="file" name="gambar" class="form-control" required>
                    </div>
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-cloud-arrow-up"></i> Upload</button>
               </div>
               <?= form_close(); ?>
          </div>
     </div>
</div>

<?php foreach ($slider as $s) : ?>
     <div class="modal fade" id="ubah<?= $s->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-sm">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-pen-to-square"></i> Ubah</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?= form_open_multipart('Event/ubah'); ?>
                    <div class="modal-body">
                         <div class="form-group">
                              <label for="gambar">Cari File</label>
                              <input type="hidden" value="<?= $s->id; ?>" name="id">
                              <input type="file" name="gambar" class="form-control" required>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> Batal</button>
                         <button type="submit" class="btn btn-warning btn-sm"><i class="fa-solid fa-save"></i> Ubah</button>
                    </div>
                    <?= form_close(); ?>
               </div>
          </div>
     </div>
<?php endforeach; ?>

<?php foreach ($info as $i) : ?>
     <div class="modal fade" id="ubah_info<?= $i->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Ubah Info</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?= form_open_multipart('Event/ubah_info'); ?>
                    <div class="modal-body">
                         <div class="form-group">
                              <label for="gambar">Cari File</label>
                              <input type="hidden" value="<?= $i->id; ?>" name="id">
                              <input type="file" name="gambar" class="form-control" required>
                         </div>
                         <div class="form-group">
                              <label for="kolom_1">Kolom Kanan</label>
                              <textarea name="kolom_1" class="form-control" placeholder="Kolom Kanan" required><?= $i->kolom_1; ?></textarea>
                         </div>
                         <div class="form-group">
                              <label for="kolom_2">Kolom Kiri</label>
                              <textarea name="kolom_2" class="form-control" placeholder="Kolom Kanan" required><?= $i->kolom_2; ?></textarea>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> Batal</button>
                         <button type="submit" class="btn btn-warning btn-sm"><i class="fa-solid fa-save"></i> Ubah</button>
                    </div>
                    <?= form_close(); ?>
               </div>
          </div>
     </div>
<?php endforeach; ?>

<script>
     function tambah_slider() {
          $('#tambah').modal('show');
     }

     function hapus_slider(id) {
          Swal.fire({
               title: 'HAPUS DATA',
               text: "Yakin ingin menghapus data ini ?",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Hapus',
               CancelButtonText: 'Tidak'
          }).then((result) => {
               if (result.isConfirmed) {
                    $.ajax({
                         url: "<?= site_url('Event/hapus_slider/') ?>" + id,
                         type: "GET",
                         dataType: "JSON",
                         success: function(data) {
                              if (data.status == 1) {
                                   Swal.fire({
                                        icon: 'success',
                                        title: 'HAPUS DATA',
                                        html: 'Berhasil dilakukan',
                                   }).then((value) => {
                                        location.href = "<?php echo base_url() ?>Event";
                                   });
                              } else {
                                   Swal.fire(
                                        'HAPUS DATA',
                                        'Gagal dilakukan !',
                                        'danger'
                                   );
                              }
                         }
                    });
               }
          })
     }
     $(document).ready(function() {
          var table = $('#table_slider').DataTable({
               "columnDefs": [{
                    "targets": [-1],
                    "orderable": false,
               }],
               "lengthMenu": [
                    [5, 20, 50, -1],
                    [5, 20, 50, 'semua']
               ],
               "oLanguage": {
                    "sEmptyTable": "<div class='text-center'>Data Kosong</div>",
                    "sInfoEmpty": "",
                    "sInfoFiltered": " - Dipilih dari _MAX_ data",
                    "sSearch": "Pencarian Data:",
                    "sInfo": " Jumlah _TOTAL_ Data (_START_ - _END_)",
                    "sLengthMenu": "_MENU_ Baris",
                    "sZeroRecords": "<div class='text-center'>Tida ada data</div>",
                    "oPaginate": {
                         "sPrevious": "Sebelumnya",
                         "sNext": "Berikutnya"
                    }
               },
               "scrollCollapse": false,
               "paging": true,
               "responsive": true,
          });
          var table1 = $('#table_lomba').DataTable({
               "columnDefs": [{
                    "targets": [-1],
                    "orderable": false,
               }],
               "lengthMenu": [
                    [5, 20, 50, -1],
                    [5, 20, 50, 'semua']
               ],
               "oLanguage": {
                    "sEmptyTable": "<div class='text-center'>Data Kosong</div>",
                    "sInfoEmpty": "",
                    "sInfoFiltered": " - Dipilih dari _MAX_ data",
                    "sSearch": "Pencarian Data:",
                    "sInfo": " Jumlah _TOTAL_ Data (_START_ - _END_)",
                    "sLengthMenu": "_MENU_ Baris",
                    "sZeroRecords": "<div class='text-center'>Tida ada data</div>",
                    "oPaginate": {
                         "sPrevious": "Sebelumnya",
                         "sNext": "Berikutnya"
                    }
               },
               "scrollCollapse": false,
               "paging": true,
               "responsive": true,
          });
     });
</script>