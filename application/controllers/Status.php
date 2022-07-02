<?php
class Status extends CI_Controller
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
               'judul' => 'Unduh Bukti',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'pemesanan' => $this->db->query('select * from pemesanan where username = "' . $this->session->userdata('username') . '" and status = 2 order by tgl_pesan desc')->result(),
          ];
          $this->template->load('Template/Content', 'Status/Data', $data);
     }
     public function unduh($id)
     {
          $id = $id;
          $data['judul'] = 'Bukti Keikutsertaan';
          $data['unduh'] = $this->db->get_where('pemesanan', ['id' => $id])->result();
          $this->load->view('Status/Bukti', $data);
     }
}
