<div class="row">
     <div class="col">
          <div class="h6 fw-bold text-danger">Pembayaran Maksimal 1 x 24 Jam Setelah Pemesanan</div>
          <div class="h6 fw-bold">Bila mana melewati batas yang ditentukan, maka pemesanan tiket akan terhapus secara otomatis</div>
          <br>
          <div class="table-responsive">
               <table class="table table-striped table-bordered table-hover" id="table_bayar">
                    <thead>
                         <tr class="text-center">
                              <th width="1%">No</th>
                              <th>Penanggung jawab</th>
                              <th>Nomor Kursi</th>
                              <th>Nama Burung</th>
                              <th>Rekening Tujuan</th>
                              <th>Nominal</th>
                              <th>Status</th>
                              <th>Aksi</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php $no = 1;
                         foreach ($pesanan as $p) : ?>
                              <tr>
                                   <td><?= $no++; ?></td>
                                   <td><?= $p->nama_panitia; ?></td>
                                   <td>
                                        <span class="float-end"><?= $p->nomor_kursi; ?></span>
                                   </td>
                                   <td><?= $p->nama_burung; ?></td>
                                   <td>
                                        <span class="float-end"><?= $p->rekening_tujuan; ?></span>
                                   </td>
                                   <td>
                                        Rp. <span class="float-end"><?= number_format($p->harga_kelas); ?></span>
                                   </td>
                                   <td class="text-center">
                                        <?php if ($p->status == 0) { ?>
                                             <button class="btn btn-danger btn-sm" disabled>Mohon lakukan pembayaran</button>
                                        <?php } else if ($p->status == 1) { ?>
                                             <button class="btn btn-success btn-sm" disabled>Menunggu untuk dikonfirmasi</button>
                                        <?php } else { ?>
                                             <button class="btn btn-success btn-sm" disabled>Pembayaran telah dikonfirmasi</button>
                                        <?php } ?>
                                   </td>
                                   <td class="text-center">
                                        <?php if ($p->status == 0) { ?>
                                             <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#upload<?= $p->id; ?>"><i class="fa-solid fa-circle-chevron-up"></i> Unggah Bukti</button>
                                        <?php } else if ($p->status == 1) { ?>
                                             <button class="btn btn-info btn-sm" disabled><i class="fas fa-spinner"></i> Menunggu</button>
                                        <?php } else { ?>
                                             <button class="btn btn-success btn-sm" disabled><i class="fas fa-check-circle"></i> Sukses</button>
                                        <?php } ?>
                                   </td>
                              </tr>
                         <?php endforeach ?>
                    </tbody>
               </table>
          </div>
     </div>
</div>

<?php foreach ($pesanan as $p) : ?>
     <div class="modal fade" id="upload<?= $p->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-sm">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Unggah Bukti</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?= form_open_multipart('Bayar/upload'); ?>
                    <div class="modal-body">
                         <div class="form-group">
                              <label for="bukti_transaksi">Pilih File</label>
                              <input type="hidden" value="<?= $p->id; ?>" name="id">
                              <input type="file" name="bukti_transaksi" class="form-control" required>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> Batal</button>
                         <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-cloud-arrow-up"></i> Kirim</button>
                    </div>
                    <?= form_close(); ?>
               </div>
          </div>
     </div>
<?php endforeach; ?>

<script>
     $(document).ready(function() {
          var table = $('#table_bayar').DataTable({
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