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
          <div class="container">
               <a class="navbar-brand" href="<?= site_url('Auth') ?>"><i class="fab fa-earlybirds fa-2x"></i> SISTEM PEMJUALAN TIKET</a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                         <li class="nav-item">
                              <?php if ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'Auth' && $this->uri->segment(2) == '') : ?>
                                   <a class="nav-link active" href="<?= site_url('Auth') ?>">BERANDA</a>
                              <?php else : ?>
                                   <a class="nav-link" href="<?= site_url('Auth') ?>">BERANDA</a>
                              <?php endif; ?>
                         </li>
                         <li class="nav-item">
                              <?php if ($this->uri->segment(1) == 'Auth' && $this->uri->segment(2) == 'lomba') : ?>
                                   <a class="nav-link active" href="<?= site_url('Auth/lomba') ?>">INFORMASI LOMBA</a>
                              <?php else : ?>
                                   <a class="nav-link" href="<?= site_url('Auth/lomba') ?>">INFORMASI LOMBA</a>
                              <?php endif; ?>
                         </li>
                         <li class="nav-item">
                              <?php if ($this->uri->segment(1) == 'Auth' && $this->uri->segment(2) == 'gantangan') : ?>
                                   <a class="nav-link active" href="<?= site_url('Auth/gantangan') ?>">INFORMASI GANTANGAN</a>
                              <?php else : ?>
                                   <a class="nav-link" href="<?= site_url('Auth/gantangan') ?>">INFORMASI GANTANGAN</a>
                              <?php endif; ?>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>
     <div class="container mt-3">
          <?= $content; ?>
     </div>
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