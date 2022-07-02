<?php
class Bayar extends CI_Controller
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
               'judul' => 'Bayar Pemesanan',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'pesanan' => $this->db->query('select * from pemesanan where username = "' . $this->session->userdata('username') . '" and status != 2')->result(),
          ];
          $this->template->load('Template/Content', 'Kontesan/Bayar', $data);
     }
     public function upload()
     {
          $image_name = $_FILES["bukti_transaksi"]['name'];
          $config['upload_path'] = 'assets/img/bukti/';
          $config['allowed_types'] = 'jpg|png|jpeg';
          $config['max_size'] = '2048';
          $config['file_name'] = $image_name;
          $this->load->library('upload', $config);
          $this->upload->do_upload('bukti_transaksi');
          $bukti = $this->upload->data('file_name');
          $id = $this->input->post('id');
          $this->db->set('bukti', $bukti);
          $this->db->set('status', 1);
          $this->db->where('id', $id);
          $this->db->update('pemesanan');
          redirect('Bayar');
     }
}
