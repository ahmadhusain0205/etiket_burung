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
     <div class="row justify-content-center p-3">
          <div class="col">
               <div class="card shadow mb-3 text-center">
                    <div class="card-body">
                         <div class="h5 fw-bold text-primary">----- JIMJOG INDEPENDEN -----</div>
                         <div class="h6 fw-bold">----------------------------------------------</div>
                         <?php foreach ($unduh as $u) : ?>
                              <div class="h5 fw-bold">PESERTA ATAS USERNAME</div>
                              <div class="h5 mb-4 fw-bold text-primary">"<?= strtoupper($u->username); ?>"</div>
                              <div class="h6 mb-4 fw-bold"><?= date('d-m-Y', strtotime($u->tgl_pesan)); ?></div>
                              <div class="h5">Nomor Gatangan</div>
                              <div class="row justify-content-center mb-4">
                                   <div class="col-4">
                                        <div class="card bg-primary text-white">
                                             <div class="card-body">
                                                  <div class="h1"><?= $u->nomor_kursi; ?></div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="h5">Jenis Burung : <?= $u->nama_burung; ?></div>
                              <div class="h5">Kelas : <?= $u->nama_kelas; ?></div>
                              <div class="h5">Harga : Rp. <?= number_format($u->harga_kelas); ?></div>
                              <div class="h6 fw-bold">----------------------------------------------</div>
                              <div class="h5 fw-bold">Sudah teridentifikasi oleh</div>
                              <div class="h5 fw-bold"><span class="text-primary"><?= strtoupper($u->nama_panitia); ?></span></div>
                         <?php endforeach; ?>
                    </div>
               </div>
          </div>
     </div>
     <script>
          window.print();
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