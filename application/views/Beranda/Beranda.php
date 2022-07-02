<div class="row">
     <div class="col">
          <div class="card mb-3 border-primary">
               <div class="card-body">
                    <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                              <div class="text-xs fw-bold text-primary text-uppercase mb-1">
                                   Jumlah Member</div>
                              <div class="h5 mb-0 fw-bold text-primary">
                                   <?= number_format($member); ?>
                              </div>
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-users fa-2x text-primary"></i>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="col">
          <div class="card mb-3 border-dark">
               <div class="card-body">
                    <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                              <div class="text-xs fw-bold text-dark text-uppercase mb-1">
                                   Jumlah Kelas</div>
                              <div class="h5 mb-0 fw-bold text-dark">
                                   <?= $kelas; ?>
                              </div>
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-layer-group fa-2x text-dark"></i>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="col">
          <div class="card mb-3 border-danger">
               <div class="card-body">
                    <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                              <div class="text-xs fw-bold text-danger text-uppercase mb-1">
                                   Jumlah Burung</div>
                              <div class="h5 mb-0 fw-bold text-danger">
                                   <?= $burung; ?>
                              </div>
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-crow fa-2x text-danger"></i>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="col">
          <div class="card mb-3 border-success">
               <div class="card-body">
                    <div class="row no-gutters align-items-center">
                         <div class="col mr-2">
                              <div class="text-xs fw-bold text-success text-uppercase mb-1">
                                   Jumlah Pemesanan</div>
                              <div class="h5 mb-0 fw-bold text-success">
                                   <?= $pemesanan; ?>
                              </div>
                         </div>
                         <div class="col-auto">
                              <i class="fas fa-hand-holding-usd fa-2x text-success"></i>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

<?php
// query
$pesan_selesai = $this->db->query('select id, nama_pemesan as nama, sum(harga_kelas) as qty from pemesanan where status = 2 and tgl_pesan between "' . date('Y-m-d', time() - (60 * 60 * 24 * 7)) . '" and "' . date('Y-m-d') . '"')->result();
$pesan_tertunda = $this->db->query('select id, nama_pemesan as nama, sum(harga_kelas) as qty from pemesanan where status != 2 and tgl_pesan  between "' . date('Y-m-d', time() - (60 * 60 * 24 * 7)) . '" and "' . date('Y-m-d') . '" order by id desc limit 3')->result();
// $pesan_selesai = $this->db->query('select id, nama_sparepart as nama, sum(qty_sparepart) as qty from transaksi group by nama_sparepart')->result();
foreach ($pesan_selesai as $m) {
     // mengambil nama menu
     $nama = $m->nama;
     $nama_pemesan = $nama;
     // mengambil qty
     $qty = $m->qty;
     $qty_pemesan = $qty;
}
?>

<div class="row mb-4">
     <div class="col-xl-8">
          <div class="card h-100 shadow mb-4">
               <div class="card-body">
                    <h6 class="m-0 font-weight-bold text-primary">Keuntungan Seminggu Terakhir</h6>
                    <hr>
                    <div class="chart-area">
                         <canvas id="myLine"></canvas>
                    </div>
               </div>
          </div>
     </div>
     <div class="col-xl-4">
          <div class="card h-100 shadow mb-4">
               <div class="card-body">
                    <h6 class="m-0 font-weight-bold text-primary">Keuntungan Tertunda Seminggu Terakhir</h6>
                    <hr>
                    <div class="chart-pie pt-4 pb-2">
                         <canvas id="myPie"></canvas>
                    </div>
               </div>
          </div>
     </div>
</div>


<script>
     var ctx = document.getElementById("myLine").getContext('2d');
     var myLineChart = new Chart(ctx, {
          type: 'line',
          data: {
               labels: [
                    <?php
                    foreach ($pesan_selesai as $me) {
                         echo json_encode($me->nama) . ',';
                    }
                    ?>
               ],
               datasets: [{
                    label: "Pembelian Selesai",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: [
                         <?php
                         foreach ($pesan_selesai as $me) {
                              echo json_encode($me->qty) . ',';
                         }
                         ?>
                    ],
               }],
          }
     });


     // Pie Chart Example
     var ctx = document.getElementById("myPie");
     var myPieChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
               labels: [
                    <?php
                    foreach ($pesan_tertunda as $me) {
                         echo json_encode($me->nama) . ',';
                    }
                    ?>
               ],
               datasets: [{
                    data: [
                         <?php
                         foreach ($pesan_tertunda as $me) {
                              echo json_encode($me->qty) . ',';
                         }
                         ?>
                    ],
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
               }],
          },
          options: {
               maintainAspectRatio: false,
               tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
               },
               legend: {
                    display: false
               },
               cutoutPercentage: 80,
          },
     });
</script>