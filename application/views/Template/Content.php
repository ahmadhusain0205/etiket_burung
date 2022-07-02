<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">
     <title><?= $judul; ?></title>
     <link href="<?= base_url('assets/'); ?>css/bootstrap.min.css" rel="stylesheet">
     <link href="<?= base_url('assets/'); ?>fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
     <link rel="stylesheet" href="<?= base_url('assets'); ?>/tables/DataTables-1.11.5/css/jquery.dataTables.min.css" type="text/css">
     <link rel="stylesheet" href="<?= base_url('assets'); ?>/tables/DataTables-1.11.5/css/dataTables.bootstrap4.min.css" type="text/css">
     <link rel="stylesheet" href="<?= base_url('assets'); ?>/tables/Buttons-2.2.2/css/buttons.bootstrap4.min.css" type="text/css">
     <script src="<?= base_url('assets'); ?>/sweetalert/dist/sweetalert2.min.js"></script>
     <link rel="stylesheet" href="<?= base_url('assets'); ?>/sweetalert/dist/sweetalert2.min.css">
     <!-- jquery -->
     <script src="<?= base_url('assets'); ?>/js/jquery.min.js"></script>
     <!-- chart js -->
     <script type="text/javascript" src="<?= base_url('assets'); ?>/js/Chart.js"></script>
     <script src="<?= base_url('assets'); ?>/js/jquery-3.5.1.js"></script>
     <link rel="stylesheet" type="text/css" href="<?= base_url('assets'); ?>/select2/dist/css/select2.min.css">
     <script src="<?= base_url('assets'); ?>/select2/dist/js/select2.min.js" type="text/javascript"></script>
</head>

<body>
     <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
          <?php
          if ($user == null) {
               header('location:' . base_url());
          }
          ?>
          <div class="container">
               <?php if ($user['id_role'] == 1) {
                    $link = site_url('Beranda');
               } else {
                    $link = site_url('Kontesan');
               } ?>
               <a class="navbar-brand" href="<?= $link ?>"><i class="fab fa-earlybirds fa-2x"></i> SISTEM PEMESANAN TIKET</a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                         <?php if ($user['id_role'] == 1) { ?>
                              <li class="nav-item">
                                   <?php if ($this->uri->segment(1) == 'Beranda') : ?>
                                        <a class="nav-link active" href="<?= site_url('Beranda') ?>">BERANDA</a>
                                   <?php else : ?>
                                        <a class="nav-link" href="<?= site_url('Beranda') ?>">BERANDA</a>
                                   <?php endif; ?>
                              </li>
                              <li class="nav-item">
                                   <?php if ($this->uri->segment(1) == 'Event') : ?>
                                        <a class="nav-link active" href="<?= site_url('Event') ?>">EVENTS</a>
                                   <?php else : ?>
                                        <a class="nav-link" href="<?= site_url('Event') ?>">EVENTS</a>
                                   <?php endif; ?>
                              </li>
                              <li class="nav-item">
                                   <?php if ($this->uri->segment(1) == 'Anggota') : ?>
                                        <a class="nav-link active" href="<?= site_url('Anggota') ?>">MEMBER</a>
                                   <?php else : ?>
                                        <a class="nav-link" href="<?= site_url('Anggota') ?>">MEMBER</a>
                                   <?php endif; ?>
                              </li>
                              <li class="nav-item">
                                   <?php if ($this->uri->segment(1) == 'Kelas') : ?>
                                        <a class="nav-link active" href="<?= site_url('Kelas') ?>">KELAS</a>
                                   <?php else : ?>
                                        <a class="nav-link" href="<?= site_url('Kelas') ?>">KELAS</a>
                                   <?php endif; ?>
                              </li>
                              <li class="nav-item">
                                   <?php if ($this->uri->segment(1) == 'Burung') : ?>
                                        <a class="nav-link active" href="<?= site_url('Burung') ?>">BURUNG</a>
                                   <?php else : ?>
                                        <a class="nav-link" href="<?= site_url('Burung') ?>">BURUNG</a>
                                   <?php endif; ?>
                              </li>
                              <?php $cek_tiket = $this->db->query('select * from pemesanan where status = 1 and panitia = "' . $user['username'] . '"')->num_rows(); ?>
                              <li class="nav-item">
                                   <?php if ($this->uri->segment(1) == 'Tiket') : ?>
                                        <a class="nav-link active" href="<?= site_url('Tiket') ?>">CEK TIKET
                                             <?php if ($cek_tiket > 0) : ?>
                                                  <sup>+ <?= $cek_tiket; ?></sup>
                                             <?php endif; ?>
                                        </a>
                                   <?php else : ?>
                                        <a class="nav-link" href="<?= site_url('Tiket') ?>">CEK TIKET
                                             <?php if ($cek_tiket > 0) : ?>
                                                  <sup>+ <?= $cek_tiket; ?></sup>
                                             <?php endif; ?>
                                        </a>
                                   <?php endif; ?>
                              </li>
                         <?php } else { ?>
                              <li class="nav-item">
                                   <?php if ($this->uri->segment(1) == 'Kontesan') : ?>
                                        <a class="nav-link active" href="<?= site_url('Kontesan') ?>">BERANDA</a>
                                   <?php else : ?>
                                        <a class="nav-link" href="<?= site_url('Kontesan') ?>">BERANDA</a>
                                   <?php endif; ?>
                              </li>
                              <li class="nav-item">
                                   <?php if ($this->uri->segment(1) == 'Pesan') : ?>
                                        <a class="nav-link active" href="<?= site_url('Pesan') ?>">PESAN TIKET</a>
                                   <?php else : ?>
                                        <a class="nav-link" href="<?= site_url('Pesan') ?>">PESAN TIKET</a>
                                   <?php endif; ?>
                              </li>
                              <li class="nav-item">
                                   <?php if ($this->uri->segment(1) == 'Bayar') : ?>
                                        <a class="nav-link active" href="<?= site_url('Bayar') ?>">BAYAR TIKET</a>
                                   <?php else : ?>
                                        <a class="nav-link" href="<?= site_url('Bayar') ?>">BAYAR TIKET</a>
                                   <?php endif; ?>
                              </li>
                              <?php $alert_bukti = $this->db->query('select * from pemesanan where username = "' . $this->session->userdata('username') . '" and status = 2')->num_rows(); ?>
                              <li class="nav-item">
                                   <?php if ($this->uri->segment(1) == 'Status') : ?>
                                        <a class="nav-link active" href="<?= site_url('Status') ?>">BUKTI TIKET
                                             <?php if ($alert_bukti > 0) : ?>
                                                  <sup>+ <?= $alert_bukti; ?></sup>
                                             <?php endif; ?>
                                        </a>
                                   <?php else : ?>
                                        <a class="nav-link" href="<?= site_url('Status') ?>">BUKTI TIKET
                                             <?php if ($alert_bukti > 0) : ?>
                                                  <sup>+ <?= $alert_bukti; ?></sup>
                                             <?php endif; ?>
                                        </a>
                                   <?php endif; ?>
                              </li>
                         <?php } ?>
                         <li class="nav-item dropdown">
                              <a class="nav-link" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                   <img src="<?= base_url('assets/img/user/') . $user['gambar']; ?>" alt="gambar" style="border-radius: 50%; width:25px; border:1px solid white; margin-left:10px">
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                   <li><a class="dropdown-item" type="button" href="<?= site_url('Profile') ?>">Profile</a></li>
                                   <li><a class="dropdown-item" type="button" href="<?= site_url('Password') ?>">Password</a></li>
                                   <li><a class="dropdown-item" type="button" onclick="keluar()">Keluar</a></li>
                              </ul>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>
     <div class="container mt-3">
          <?= $content; ?>
     </div>
     <script>
          function separateComma(val) {
               var sign = 1;
               if (val < 0) {
                    sign = -1;
                    val = -val;
               }
               let num = val.toString().includes('.') ? val.toString().split('.')[0] : val.toString();
               let len = num.toString().length;
               let result = '';
               let count = 1;
               for (let i = len - 1; i >= 0; i--) {
                    result = num.toString()[i] + result;
                    if (count % 3 === 0 && count !== 0 && i !== 0) {
                         result = ',' + result;
                    }
                    count++;
               }
               if (val.toString().includes('.')) {
                    result = result + '.' + val.toString().split('.')[1];
               }
               return sign < 0 ? '-' + result : result;
          }

          function keluar() {
               Swal.fire({
                    title: 'KELUAR',
                    text: "Anda yakin ingin keluar ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Keluar',
                    cancelButtonText: 'Tidak',
               }).then((result) => {
                    if (result.isConfirmed) {
                         location.href = "<?php echo base_url() ?>Auth/keluar";
                    }
               });
          }
     </script>
     <script src="<?= base_url('assets'); ?>/tables/DataTables-1.11.5/js/jquery.dataTables.min.js"></script>
     <script src="<?= base_url('assets'); ?>/tables/DataTables-1.11.5/js/dataTables.bootstrap4.min.js"></script>
     <script src="<?= base_url('assets'); ?>/tables/Buttons-2.2.2/js/dataTables.buttons.min.js"></script>
     <script src="<?= base_url('assets'); ?>/tables/Buttons-2.2.2/js/buttons.bootstrap4.min.js"></script>
     <script src="<?= base_url('assets'); ?>/tables/JSZip-2.5.0/jszip.min.js"></script>
     <!-- <script src="<?= base_url('assets'); ?>/tables/pdfmake-0.1.36/pdfmake.min.js"></script>
     <script src="<?= base_url('assets'); ?>/tables/pdfmake-0.1.36/vfs_fonts.js"></script> -->
     <script src="<?= base_url('assets'); ?>/tables/Buttons-2.2.2/js/buttons.html5.min.js"></script>
     <script src="<?= base_url('assets'); ?>/tables/Buttons-2.2.2/js/buttons.print.min.js"></script>
     <script src="<?= base_url('assets'); ?>/tables/Buttons-2.2.2/js/buttons.colVis.min.js"></script>
     <script src="<?= base_url('assets'); ?>/js/bootstrap.bundle.min.js"></script>
     <!-- <script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script> -->
     <script src="<?= base_url('assets'); ?>/sweetalert/dist/sweetalert2.all.min.js"></script>

</body>

</html>