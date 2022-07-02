<div class="row justify-content-center">
     <div class="col">
          <div class="h4">
               Daftar Anggota
               <button class="btn btn-primary float-end tambah"><i class="fa-solid fa-user-plus"></i> Tambah</button>
          </div>
          <hr>
          <div class="row">
               <div class="col">
                    <div class="table-responsive">
                         <table class="table table-striped table-bordered table-hover" id="table_member">
                              <thead>
                                   <tr class="text-center">
                                        <th width="1%">#</th>
                                        <th width="14%">Profile</th>
                                        <th>Tingkatan</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th width="15%">Nomor Hp</th>
                                        <th>Alamat</th>
                                        <th width="20%">Aksi</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php $no = 1;
                                   foreach ($anggota as $a) : ?>
                                        <tr>
                                             <td><?= $no++; ?></td>
                                             <td class="text-center">
                                                  <?php if ($a->on_off == 1) { ?>
                                                       <img src="<?= base_url('assets/img/user/') . $a->gambar; ?>" alt="gambar" style="width: 40px; border-radius:50%;border: 3px solid green">
                                                  <?php } else { ?>
                                                       <img src="<?= base_url('assets/img/user/') . $a->gambar; ?>" alt="gambar" style="width: 40px; border-radius:50%;border: 3px solid grey">
                                                  <?php } ?>
                                                  <?php if ($a->on_off == 1) { ?>
                                                       <button class="btn btn-sm"><i class="fas fa-toggle-on text-success"></i> Online</button>
                                                  <?php } else { ?>
                                                       <button class="btn btn-sm"><i class="fas fa-toggle-off text-secondary"></i> Offline</button>
                                                  <?php } ?>
                                             </td>
                                             <td class="text-center">
                                                  <?php if ($a->id_role == 1) { ?>
                                                       <button class="btn btn-sm text-danger fw-bold">ADMIN</button>
                                                  <?php } else { ?>
                                                       <button class="btn btn-sm text-success fw-bold">PESERTA</button>
                                                  <?php } ?>
                                             </td>
                                             <td>
                                                  <button class="btn btn-sm"><?= ucfirst($a->username); ?></button>
                                             </td>
                                             <td>
                                                  <button class="btn btn-sm"><?= ucfirst($a->nama); ?></button>
                                             </td>
                                             <td class="text-center">
                                                  <a href="https://wa.me/<?= $a->no_hp; ?>" type="button" class="btn btn-success btn-sm" target="popup" onclick="window.open('https://wa.me/<?= $a->no_hp; ?>','name','width=400,height=800')"><i class="fab fa-whatsapp"></i> Hubungi</a>
                                             </td>
                                             <td>
                                                  <button class="btn btn-sm"><?= $a->alamat; ?></button>
                                             </td>
                                             <td class="text-center">
                                                  <?php if ($a->on_off == 1) { ?>
                                                       <button class="btn btn-warning btn-sm" disabled><i class="fa-solid fa-user-pen"></i> Ubah</button>
                                                       <button class="btn btn-danger btn-sm" disabled><i class="fa-solid fa-user-xmark"></i> Hapus</button>
                                                  <?php } else { ?>
                                                       <button class="btn btn-warning btn-sm" onclick="ubah(<?= $a->id; ?>)"><i class="fa-solid fa-user-pen"></i> Ubah</button>
                                                       <button class="btn btn-danger btn-sm" onclick="hapus(<?= $a->id; ?>)"><i class="fa-solid fa-user-xmark"></i> Hapus</button>
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

<script>
     $(document).ready(function() {
          $('.tambah').on("click", function() {
               $('#modal-tambah').modal('show');
               $('.modal-title').text('TAMBAH DATA');
          });
          $('#rekening').hide();
          $('#tambah_a').modal('hide');
          var table = $('#table_member').DataTable({
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
               url: "<?php echo base_url(); ?>Anggota/data/?id=" + id,
               type: "GET",
               dataType: "JSON",
               success: function(data) {
                    $('#lupuusername').val(data.username);
                    $('#lupuusername').attr('readonly', true);
                    $('#lupunama').val(data.nama);
                    $('#lupupassword').attr('readonly', true);
                    $('#lupuno_hp').val(data.no_hp);
                    $('#lupuid_role').val(data.id_role);
                    $('#lupualamat').val(data.alamat);
                    if (data.id_role != 1) {
                         $('#urekening').hide();
                    } else {
                         $('#urekening').show();
                         $('#lupuno_rekening').val(data.no_rekening);
                    }
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
                         url: "<?= site_url('Anggota/hapus/') ?>" + id,
                         type: "GET",
                         dataType: "JSON",
                         success: function(data) {
                              if (data.status == 1) {
                                   Swal.fire({
                                        icon: 'success',
                                        title: 'HAPUS DATA',
                                        html: 'Berhasil dilakukan',
                                   }).then((value) => {
                                        location.href = "<?php echo base_url() ?>Anggota";
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