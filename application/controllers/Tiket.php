<?php
class Tiket extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
          if ($this->session->userdata('id_role') == 2) {
               redirect('Kontesan');
          }
     }
     function index()
     {
          $data = [
               'judul' => 'Cek Tiket',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'pemesanan' => $this->db->query('select p.* from pemesanan p where panitia = "' . $this->session->userdata('username') . '" order by p.tgl_pesan desc')->result(),
          ];
          $this->template->load('Template/Content', 'Tiket/Data', $data);
     }
     public function data($id)
     {
          $data = $this->db->get_where('pemesanan', ['id' => $id])->row_array();
          echo json_encode($data);
     }
     public function konfirmasi($id)
     {
          $id = $id;
          $pesanan = $this->db->query('select * from pemesanan where id = ' . $id)->row_array();
          $pesan = 'Peserta dengan username ' . $pesanan['username'] . ' sudah mendapatkan ijin dari penanggung jawab atas nama ' . $pesanan['nama_panitia'] . '';
          if ($id != '') {
               $this->db->set('status', 2);
               $this->db->set('pesan', $pesan);
               $this->db->where('id', $id);
               $this->db->update('pemesanan');
               echo json_encode(['status' => 1]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }
}
