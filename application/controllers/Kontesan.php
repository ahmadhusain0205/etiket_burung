<?php
class Kontesan extends CI_Controller
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
          $data = [
               'judul' => 'Selamat Datang',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'member' => $this->db->get_where('user', ['id_role' => 2])->num_rows(),
               'kelas' => $this->db->get('kelas')->num_rows(),
               'burung' => $this->db->get('burung')->num_rows(),
               'pemesanan' => $this->db->get_where('pemesanan', ['status' => 2, 'username' => $this->session->userdata('username')])->num_rows(),
          ];
          $this->template->load('Template/Content', 'Kontesan/Beranda', $data);
     }
}
