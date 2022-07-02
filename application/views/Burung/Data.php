<div class="row">
     <div class="col-8 offset-2">
          <div class="h4">
               Daftar Burung
               <button class="btn btn-primary float-end tambah"><i class="fas fa-plus-circle"></i> Tambah Burung</button>
          </div>
          <hr>
          <div class="row">
               <div class="col">
                    <div class="table-responsive">
                         <table class="table table-striped table-bordered table-hover" id="table_burung">
                              <thead>
                                   <tr class="text-center">
                                        <th width="1%">#</th>
                                        <th width="14%">Nama Burung</th>
                                        <th width="30%">Kelas</th>
                                        <th width="35%">Harga Kelas</th>
                                        <th width="20%">Aksi</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php $no = 1;
                                   foreach ($burung as $b) : ?>
                                        <tr>
                                             <td><?= $no++; ?></td>
                                             <td><?= $b->nama; ?></td>
                                             <td><?= $b->nama_kelas; ?></td>
                                             <td>
                                                  Rp. <span class="float-end"><?= number_format($b->harga_kelas); ?></span>
                                             </td>
                                             <td class="text-center">
                                                  <button class="btn btn-warning btn-sm" onclick="ubah(<?= $b->id; ?>)"><i class="fas fa-sync"></i> Ubah</button>
                                                  <button class="btn btn-danger btn-sm" onclick="hapus(<?= $b->id; ?>)"><i class="fas fa-times-circle"></i> Hapus</button>
                                             </td>
                                        </tr>
                                   <?php endforeach; ?>
                              </tbody>
                         </table>
                    </div>
               </div>
          </div>
     </div>
</div>

<script>
     $(document).ready(function() {
          $('.tambah').on("click", function() {
               $('#modal-tambah').modal('show');
               $('.modal-title').text('TAMBAH DATA');
          });
          var table = $('#table_burung').DataTable({
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

<script>
     function ubah(id) {
          $('#modal-ubah').modal('show');
          $('.modal-title').text('UBAH DATA');
          $.ajax({
               url: "<?php echo base_url(); ?>Burung/data_b/?id=" + id,
               type: "GET",
               dataType: "JSON",
               success: function(data) {
                    $('#lupuid').val(data.id);
                    $('#lupunama').val(data.nama);
                    $('#lupukelas').val(data.id_kelas).change();
                    $('#lupuharga').val('Rp. ' + separateComma(data.harga_kelas));
               }
          });
     }
</script>

<script>
     function hapus(id) {
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
                         url: "<?= site_url('Burung/hapus/') ?>" + id,
                         type: "GET",
                         dataType: "JSON",
                         success: function(data) {
                              if (data.status == 1) {
                                   Swal.fire({
                                        icon: 'success',
                                        title: 'HAPUS DATA',
                                        html: 'Berhasil dilakukan',
                                   }).then((value) => {
                                        location.href = "<?php echo base_url() ?>Burung";
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
</script>