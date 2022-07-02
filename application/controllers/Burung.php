<?php
class Burung extends CI_Controller
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
               'judul' => 'Daftar Burung',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
               'burung' => $this->db->query('select b.*, (select nama from kelas where id=b.id_kelas) as nama_kelas, (select harga from kelas where id=b.id_kelas) as harga_kelas from burung b')->result(),
               'kelas' => $this->db->get('kelas')->result(),
          ];
          $this->template->load('Template/Content', 'Burung/Data', $data);
          $this->load->view('Modal/Tambah_burung');
          $this->load->view('Modal/Ubah_burung');
     }
     public function data()
     {
          $id = $this->input->get('id');
          $data = $this->db->get_where('kelas', ['id' => $id])->row_array();
          echo json_encode($data);
     }
     public function tambah()
     {
          $nama = $this->input->get('nama');
          $id_kelas = $this->input->get('id_kelas');
          $data = [
               'nama' => $nama,
               'id_kelas' => $id_kelas,
          ];
          if ($id_kelas != '' || $nama != '') {
               $this->db->insert('burung', $data);
               echo json_encode(['status' => 1]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }
     public function hapus($id)
     {
          if ($id != '') {
               $this->db->where('id', $id);
               $this->db->delete('burung');
               echo json_encode(['status' => 1]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }
     public function data_b()
     {
          $id = $this->input->get('id');
          $data = $this->db->query('select b.*, (select nama from kelas where id=b.id_kelas) as nama_kelas, (select harga from kelas where id=b.id_kelas) as harga_kelas from burung b where b.id = "' . $id . '"')->row_array();
          echo json_encode($data);
     }
     public function ubah()
     {
          $id = $this->input->get('id');
          $nama = $this->input->get('nama');
          $id_kelas = $this->input->get('id_kelas');
          $this->db->set('nama', $nama);
          $this->db->set('id_kelas', $id_kelas);
          $this->db->where('id', $id);
          $this->db->update('burung');
          echo json_encode(['status' => 1]);
     }
}
