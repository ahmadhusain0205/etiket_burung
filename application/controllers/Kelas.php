<?php
class Kelas extends CI_Controller
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
               'judul' => 'Kelas',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'kelas' => $this->db->get('kelas')->result(),
          ];
          $this->template->load('Template/Content', 'Kelas/Data', $data);
          $this->load->view('Modal/Tambah_kelas');
          $this->load->view('Modal/Ubah_kelas');
     }
     public function tambah()
     {
          $nama = $this->input->get('nama');
          $harga = $this->input->get('harga');
          $jum_gantangan = $this->input->get('jum_gantangan');
          $data = [
               'nama' => $nama,
               'harga' => $harga,
               'jum_gantangan' => $jum_gantangan,
          ];
          if ($harga != '') {
               $this->db->insert('kelas', $data);
               echo json_encode(['status' => 1]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }
     public function hapus($id)
     {
          if ($id != '') {
               $this->db->where('id', $id);
               $this->db->delete('kelas');
               echo json_encode(['status' => 1]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }
     public function data()
     {
          $id = $this->input->get('id');
          $data = $this->db->get_where('kelas', ['id' => $id])->row_array();
          echo json_encode($data);
     }
     public function ubah()
     {
          $id = $this->input->get('id');
          $nama = $this->input->get('nama');
          $harga = $this->input->get('harga');
          $jum_gantangan = $this->input->get('jum_gantangan');
          $this->db->set('nama', $nama);
          $this->db->set('harga', $harga);
          $this->db->set('jum_gantangan', $jum_gantangan);
          $this->db->where('id', $id);
          $this->db->update('kelas');
          echo json_encode(['status' => 1]);
     }
}
