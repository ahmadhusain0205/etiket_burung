<?php
class Auth extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
     }
     function index()
     {
          $cek = $this->db->query("select * from pemesanan where DATEDIFF(CURDATE(), tgl_pesan) >= 1")->num_rows();
          if ($cek > 0) {
               $this->db->where('bukti', null);
               $this->db->where('status', 0);
               $this->db->where('DATEDIFF(CURDATE(), tgl_pesan) >=', 1);
               $this->db->delete('pemesanan');
          }
          $data = [
               'judul' => 'Selamat Datang',
               'slider' => $this->db->get('slider')->result(),
          ];
          $this->template->load('Template/Auth', 'Auth/Login', $data);
     }
     function daftar()
     {
          $data = [
               'judul' => 'Gabung Sekarang',
          ];
          $this->template->load('Template/Auth', 'Auth/Regis', $data);
     }
     public function daftar_sekarang()
     {
          $username = $this->input->post('username');
          $password = md5($this->input->post('password'));
          $nama = $this->input->post('nama');
          $no_hp = $this->input->post('no_hp');
          $alamat = $this->input->post('alamat');
          $data = [
               'username' => $username,
               'password' => $password,
               'nama' => $nama,
               'no_hp' => $no_hp,
               'alamat' => $alamat,
               'id_role' => 2,
               'on_off' => 0,
               'gambar' => 'default.png',
          ];
          $cek = $this->db->insert('user', $data);
          if ($cek) {
               echo json_encode(['status' => 1]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }
     public function masuk()
     {
          $data = [
               'judul' => 'Selamat Datang',
               'slider' => $this->db->get('slider')->result(),
          ];
          $username = $this->input->get('username');
          $password = md5($this->input->get('password'));
          if ($username == '' && $password == '') {
               $this->template->load('Template/Auth', 'Auth/Login', $data);
          } else {
               $cek_user = $this->db->get_where('user', ['username' => $username])->row_array();
               if ($cek_user) {
                    if ($password == $cek_user['password']) {
                         $this->session->set_userdata($cek_user);
                         $this->db->set('on_off', 1);
                         $this->db->where('username', $username);
                         $this->db->update('user');
                         if ($cek_user['id_role'] == 1) {
                              echo json_encode(['status' => 1]);
                         } else {
                              echo json_encode(['status' => 2]);
                         }
                    } else {
                         echo json_encode(['status' => 3]);
                    }
               } else {
                    echo json_encode(['status' => 4]);
               }
          }
     }
     public function keluar()
     {
          $this->db->set('on_off', 0);
          $this->db->where('username', $this->session->userdata('username'));
          $this->db->update('user');
          $this->session->sess_destroy();
          redirect('Auth');
     }
     public function lomba()
     {
          $cek = $this->db->query("select * from pemesanan where DATEDIFF(CURDATE(), tgl_pesan) > 1")->num_rows();
          if ($cek > 0) {
               $this->db->where('bukti', null);
               $this->db->where('status', 0);
               $this->db->where('DATEDIFF(CURDATE(), tgl_pesan) >=', 1);
               $this->db->delete('pemesanan');
          }
          $data = [
               'judul' => 'Informasi Lomba',
               'info' => $this->db->get('info')->result(),
          ];
          $this->template->load('Template/Auth', 'Auth/Info_lomba', $data);
     }
     public function gantangan()
     {
          $cek = $this->db->query("select * from pemesanan where DATEDIFF(CURDATE(), tgl_pesan) > 1")->num_rows();
          if ($cek > 0) {
               $this->db->where('bukti', null);
               $this->db->where('status', 0);
               $this->db->where('DATEDIFF(CURDATE(), tgl_pesan) >=', 1);
               $this->db->delete('pemesanan');
          }
          $data = [
               'judul' => 'Informasi Gantangan',
          ];
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
          $this->template->load('Template/Auth', 'Auth/Info_gantangan', $data);
     }
}
