<?php
class Pesan extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
          if ($this->session->userdata('id_role') == 1) {
               redirect('Beranda');
          }
     }
     function index()
     {
          $kondisi_gantangan = $this->db->get('kelas')->result();
          foreach ($kondisi_gantangan as $kg) {
               if ($kg->jum_gantangan == '60' && $kg->nama == $kg->nama) {
                    $nomor_kursi_60 = $this->db->query("
                    SELECT c.* 
                    from 
                    (
                    SELECT a.no_kursi,
                         if(a.no_kursi = q.nomor_kursi, 'disabled', 'sukses') as keterangan
                    FROM gantangan_60 a
                    LEFT JOIN pemesanan b on b.nomor_kursi=a.no_kursi LEFT JOIN 
                    (SELECT w.nomor_kursi FROM pemesanan w JOIN kelas b on w.nama_kelas=b.nama WHERE w.nama_kelas = '$kg->nama') q
                        on a.no_kursi=q.nomor_kursi
                    ) as c GROUP BY c.no_kursi order by c.no_kursi;
                    ")->result();
                    $data['nomor_kursi_60'][$kg->nama] = $nomor_kursi_60;
               } else if ($kg->jum_gantangan == '32') {
                    $nomor_kursi_32 = $this->db->query("
                    SELECT c.* 
                    from 
                    (
                    SELECT a.no_kursi,
                         if(a.no_kursi = q.nomor_kursi, 'disabled', 'sukses') as keterangan
                    FROM gantangan_32 a
                    LEFT JOIN pemesanan b on b.nomor_kursi=a.no_kursi LEFT JOIN 
                    (SELECT w.nomor_kursi FROM pemesanan w JOIN kelas b on w.nama_kelas=b.nama WHERE w.nama_kelas = '$kg->nama') q
                        on a.no_kursi=q.nomor_kursi
                    ) as c GROUP BY c.no_kursi order by c.no_kursi;
                    ")->result();
                    $data['nomor_kursi_32'][$kg->nama] = $nomor_kursi_32;
               } else {
                    $nomor_kursi_24 = $this->db->query("
                    SELECT c.* 
                    from 
                    (
                    SELECT a.no_kursi,
                         if(a.no_kursi = q.nomor_kursi, 'disabled', 'sukses') as keterangan
                    FROM gantangan_24 a
                    LEFT JOIN pemesanan b on b.nomor_kursi=a.no_kursi LEFT JOIN 
                    (SELECT w.nomor_kursi FROM pemesanan w JOIN kelas b on w.nama_kelas=b.nama WHERE w.nama_kelas = '$kg->nama') q
                        on a.no_kursi=q.nomor_kursi
                    ) as c GROUP BY c.no_kursi order by c.no_kursi;
                    ")->result();
                    $data['nomor_kursi_24'][$kg->nama] = $nomor_kursi_24;
               }
          }
          $data['judul'] = 'Pesan Tiket';
          $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
          $this->template->load('Template/Content', 'Pesan/Pesan_tiket', $data);
     }
     public function panitia()
     {
          $key = $this->input->post('searchTerm');
          $data = $this->db->query("SELECT id AS id, CONCAT('[ ',nama,' ]','-','[ ',no_hp,' ]','-','[ ',alamat,' ] ') AS text FROM user WHERE id_role = 1 and (id LIKE '%" . $key . "%' OR nama LIKE '%" . $key . "%' OR no_hp LIKE '%" . $key . "%' OR alamat LIKE '%" . $key . "%' OR username LIKE '%" . $key . "%') ORDER BY id DESC")->result();
          echo json_encode($data);
     }
     public function kelas()
     {
          $key = $this->input->post('searchTerm');
          $data = $this->db->query("SELECT id AS id, CONCAT('[ ',nama,' ]','-','[ Rp. ',harga,' ]','-','[ Gantangan : ',jum_gantangan,' ] ') AS text FROM kelas WHERE id LIKE '%" . $key . "%' OR nama LIKE '%" . $key . "%' OR harga LIKE '%" . $key . "%' OR jum_gantangan LIKE '%" . $key . "%' ORDER BY id DESC")->result();
          echo json_encode($data);
     }
     public function getkelas()
     {
          $id = $this->input->get('id');
          $cek = $this->db->query('select * from kelas where id = "' . $id . '"')->row_array();
          echo json_encode($cek);
     }
     public function getburung()
     {
          $id = $this->input->get('id');
          $data = $this->db->get_where('burung', ['id_kelas' => $id])->result();
          echo json_encode($data);
     }
     public function getrekening()
     {
          $id = $this->input->get('id');
          $rekening = $this->db->query('select no_rekening from user where id = "' . $id . '"')->row_array();
          echo json_encode($rekening);
     }
     public function pesan_sekarang()
     {
          $data_diri = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
          $dd_username = $data_diri['username'];
          $dd_nama = $data_diri['nama'];
          $dd_no_hp = $data_diri['no_hp'];
          $dd_alamat = $data_diri['alamat'];
          $data_panitia = $this->db->get_where('user', ['id' => $this->input->post('panitia')])->row_array();
          $panitia = $data_panitia['username'];
          $nama_panitia = $data_panitia['nama'];
          $no_hp_panitia = $data_panitia['no_hp'];
          $alamat_panitia = $data_panitia['alamat'];
          $rekening = $this->input->post('rekening');
          $kelas = $this->db->get_where('kelas', ['id' => $this->input->post('kelas')])->row_array();
          $nama_kelas = $kelas['nama'];
          $harga_kelas = $kelas['harga'];
          $burung = $this->input->post('burung');
          $nomor_kursi = $this->input->post('nomor_kursi');
          $data = [
               'username' => $dd_username,
               'nama_pemesan' => $dd_nama,
               'no_hp_pemesan' => $dd_no_hp,
               'alamat_pemesan' => $dd_alamat,
               'panitia' => $panitia,
               'nama_panitia' => $nama_panitia,
               'no_hp_panitia' => $no_hp_panitia,
               'alamat_panitia' => $alamat_panitia,
               'rekening_tujuan' => $rekening,
               'nama_kelas' => $nama_kelas,
               'harga_kelas' => $harga_kelas,
               'nama_burung' => $burung,
               'nomor_kursi' => $nomor_kursi,
               'status' => 0,
          ];
          $cek = $this->db->insert('pemesanan', $data);
          if ($cek) {
               echo json_encode(['status' => 1, 'harga' => $harga_kelas, 'nomor' => $nomor_kursi]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }
}
