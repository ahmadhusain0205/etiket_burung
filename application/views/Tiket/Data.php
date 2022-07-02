<div class="row">
     <div class="col">
          <div class="h4">
               Daftar Pesanan
          </div>
          <hr>
          <div class="row">
               <div class="col">
                    <div class="table-responsive">
                         <table class="table table-striped table-bordered table-hover" id="table_tiket">
                              <thead>
                                   <tr class="text-center">
                                        <th width="1%">#</th>
                                        <th>Tanggal Pemesan</th>
                                        <th>Pemesan</th>
                                        <th>Kontak</th>
                                        <th>No Gantangan</th>
                                        <th>Kelas</th>
                                        <th>Burung</th>
                                        <th>Harga</th>
                                        <th>Bukti</th>
                                        <th>Status</th>
                                        <th width="20%">Aksi</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php $no = 1;
                                   foreach ($pemesanan as $p) : ?>
                                        <tr>
                                             <td><?= $no++; ?></td>
                                             <td class="text-center"><?= date('d-m-Y', strtotime($p->tgl_pesan)); ?></td>
                                             <td>
                                                  <?= $p->nama_pemesan; ?>
                                                  <input type="hidden" name="pemesan" id="pemesan" value="<?= $p->nama_pemesan; ?>">
                                             </td>
                                             <td>
                                                  <span class="float-end"><?= $p->no_hp_pemesan; ?></span>
                                             </td>
                                             <td>
                                                  <span class="float-end"><?= $p->nomor_kursi; ?></span>
                                             </td>
                                             <td><?= $p->nama_kelas; ?></td>
                                             <td><?= $p->nama_burung; ?></td>
                                             <td>
                                                  Rp. <span class="float-end"><?= number_format($p->harga_kelas); ?></span>
                                             </td>
                                             <td class="text-center">
                                                  <?php if ($p->bukti != null) : ?>
                                                       <button type="button" style="border: none;" data-bs-toggle="modal" data-bs-target="#zoom<?= $p->id; ?>">
                                                            <img src="<?= base_url('assets/img/bukti/') . $p->bukti; ?>" class="img-thumbnail rounded" style="width: 50px; height: 50px; background-size:cover">
                                                       </button>
                                                  <?php else : ?>
                                                       <button class="btn btn-dark btn-sm" disabled>Belum ada bukti</button>
                                                  <?php endif ?>
                                             </td>
                                             <td class="text-center">
                                                  <?php if ($p->status == 0) { ?>
                                                       <button class="btn btn-danger btn-sm" style="width: 100%;" disabled>Belum bayar</button>
                                                  <?php } else if ($p->status == 1) { ?>
                                                       <button class="btn btn-warning btn-sm" style="width: 100%;" disabled>Menunggu Konfirmasi</button>
                                                  <?php } else { ?>
                                                       <button class="btn btn-success btn-sm" style="width: 100%;" disabled>Selesai</button>
                                                  <?php } ?>
                                             </td>
                                             <td class="text-center">
                                                  <a href="https://wa.me/<?= $p->no_hp_pemesan; ?>" style="width: 49%;" type="button" class="btn btn-success btn-sm" target="popup" onclick="window.open('https://wa.me/<?= $p->no_hp_pemesan; ?>','name','width=400,height=800')"><i class="fab fa-whatsapp"></i> Hubungi</a>
                                                  <?php if ($p->status == 2) { ?>
                                                       <button class="btn btn-success btn-sm" style="width: 49%;" disabled><i class="fas fa-dollar-sign"></i> Selesai</button>
                                                  <?php } else if ($p->status == 1) { ?>
                                                       <button class="btn btn-info btn-sm" style="width: 49%;" onclick="konfirmasi(<?= $p->id ?>)"><i class="fas fa-hammer"></i> Konfirmasi</button>
                                                  <?php } else { ?>
                                                       <button class="btn btn-secondary btn-sm" style="width: 49%;" disabled><i class="fab fa-creative-commons-nc"></i> Belum Bayar</button>
                                                  <?php } ?>
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

<?php foreach ($pemesanan as $p) : ?>
     <div class="modal fade" id="zoom<?= $p->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-fullscreen-xl-down">
               <div class="modal-content">
                    <div class="modal-body">
                         <h4><?= strtoupper($p->username); ?>
                              <button type="button" class="btn-close float-end mb-2" data-bs-dismiss="modal" aria-label="Close"></button>
                         </h4>
                         <img src="<?= base_url('assets/img/bukti/') . $p->bukti; ?>" style="width: 100%;">
                    </div>
               </div>
          </div>
     </div>
<?php endforeach; ?>

<script>
     $(document).ready(function() {
          var table = $('#table_tiket').DataTable({
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
     function konfirmasi(id) {
          $.ajax({
               url: "<?= site_url('Tiket/data/') ?>" + id,
               type: "GET",
               dataType: "JSON",
               success: function(data) {
                    var pemesan = data.nama_pemesan;
                    Swal.fire({
                         title: 'KONFIRMASI TIKET',
                         html: "Konfirmasi tiket milik " + pemesan.toUpperCase().bold() + " ?",
                         icon: 'warning',
                         showCancelButton: true,
                         confirmButtonColor: '#3085d6',
                         cancelButtonColor: '#d33',
                         confirmButtonText: 'Konfirmasi',
                         CancelButtonText: 'Tidak'
                    }).then((result) => {
                         if (result.isConfirmed) {
                              $.ajax({
                                   url: "<?= site_url('Tiket/konfirmasi/') ?>" + id,
                                   type: "GET",
                                   dataType: "JSON",
                                   success: function(data) {
                                        if (data.status == 1) {
                                             Swal.fire({
                                                  icon: 'success',
                                                  title: 'KONFIRMASI TIKET',
                                                  html: 'Berhasil dilakukan',
                                             }).then((value) => {
                                                  location.href = "<?php echo base_url() ?>Tiket";
                                             });
                                        } else {
                                             Swal.fire({
                                                  icon: 'success',
                                                  title: 'KONFIRMASI TIKET',
                                                  html: 'Berhasil dilakukan',
                                             });
                                        }
                                   }
                              });
                         }
                    });
               }
          });
     }
</script>