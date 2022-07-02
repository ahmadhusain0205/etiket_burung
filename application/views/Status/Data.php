<div class="row">
     <div class="col-3 text-danger">
          <h1>* PENTING *</h1>
          <br>
          <h6>Unduh bukti untuk diperlihatkan kepada panitia,</h6>
          <h6>untuk di sinkronisasi kebenarannya</h6>
     </div>
     <div class="col-9 mt-auto">
          <?php
          $status = $this->db->query('select * from pemesanan where username = "' . $user['username'] . '" and status = 2')->row_array();
          if ($status) :
          ?>
               <div class="alert alert-success" role="alert">
                    Selamat, Pembayaran telah berhasil dilakukan
               </div>
          <?php endif; ?>
     </div>
</div>
<br>
<div class="row">
     <div class="col">
          <div class="h4">Unduh Bukti</div>
          <hr>
          <div class="table-responsive">
               <table id="table_status" class="table table-striped table-bordered table-hover">
                    <thead>
                         <tr class="text-center">
                              <th width="1%">No</th>
                              <th>Kelas</th>
                              <th>Total Pembayaran</th>
                              <th>Jenis Burung</th>
                              <th>Nomor Gantangan</th>
                              <th>Rekening Tujuan</th>
                              <th>Penerima</th>
                              <th width="20%">Aksi</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php $no = 1;
                         foreach ($pemesanan as $p) : ?>
                              <tr>
                                   <td><?= $no++; ?></td>
                                   <td><?= $p->nama_kelas; ?></td>
                                   <td>
                                        Rp. <span class="float-end"><?= number_format($p->harga_kelas); ?></span>
                                   </td>
                                   <td><?= $p->nama_burung; ?></td>
                                   <td>
                                        <span class="float-end"><?= $p->nomor_kursi; ?></span>
                                   </td>
                                   <td>
                                        <span class="float-end"><?= $p->rekening_tujuan; ?></span>
                                   </td>
                                   <td><?= $p->nama_panitia; ?></td>
                                   <td class="text-center">
                                        <button class="btn btn-primary btn-sm" type="button" onclick="unduh(<?= $p->id ?>)"><i class="fas fa-download"></i> Uduh Bukti</button>
                                   </td>
                              </tr>
                         <?php endforeach; ?>
                    </tbody>
               </table>
          </div>
     </div>
</div>

<?php foreach ($pemesanan as $p) : ?>
     <div class="modal fade" id="download<?= $p->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-sm">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Download Bukti</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                         <?= $p->pesan; ?>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
                         <a href="<?= site_url('Status/unduh/') . $p->id; ?>" target="_blank" type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-circle-down"></i> Download bukti</a>
                    </div>
               </div>
          </div>
     </div>
<?php endforeach; ?>

<script>
     $(document).ready(function() {
          var table = $('#table_status').DataTable({
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
     function unduh(id) {
          Swal.fire({
               title: 'UBDUH',
               text: "Unduh bukti pemesanan !",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Unduh',
               CancelButtonText: 'Tidak'
          }).then((result) => {
               if (result.isConfirmed) {
                    window.open("http://localhost/etiket/Status/unduh/" + id, "_blank");
               }
          })
     }
</script>