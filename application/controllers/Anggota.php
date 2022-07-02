<?php
class Anggota extends CI_Controller
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
               'judul' => 'Member',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
          ];
          $data['anggota'] = $this->db->get('user')->result();
          $data['role'] = $this->db->get('role')->result();
          $this->template->load('Template/Content', 'Member/Data', $data);
          $this->load->view('Modal/Tambah');
          $this->load->view('Modal/Ubah');
     }
     public function tambah()
     {
          $username = $this->input->post('lupusername');
          $password = md5($this->input->post('luppassword'));
          $nama = $this->input->post('lupnama');
          $no_hp = $this->input->post('lupno_hp');
          $id_role = $this->input->post('lupid_role');
          $alamat = $this->input->post('lupalamat');
          if ($id_role == 1) {
               $no_rekening = $this->input->post('lupno_rekening');
          } else {
               $no_rekening = null;
          }
          $data = [
               'username' => $username,
               'password' => $password,
               'nama' => $nama,
               'id_role' => $id_role,
               'no_hp' => $no_hp,
               'alamat' => $alamat,
               'no_rekening' => $no_rekening,
               'gambar' => 'default.png',
          ];
          $cek_user = $this->db->get_where('user', ['username' => $username])->row_array();
          if ($cek_user) {
               echo json_encode(['status' => 2]);
          } else {
               $this->db->insert('user', $data);
               echo json_encode(['status' => 1]);
          }
     }
     public function ubah()
     {
          $username = $this->input->post('lupuusername');
          $nama = $this->input->post('lupunama');
          $no_hp = $this->input->post('lupuno_hp');
          $id_role = $this->input->post('lupuid_role');
          $alamat = $this->input->post('lupualamat');
          if ($id_role == 1) {
               $no_rekening = $this->input->post('lupuno_rekening');
          } else {
               $no_rekening = null;
          }
          $this->db->set('nama', $nama);
          $this->db->set('no_hp', $no_hp);
          $this->db->set('id_role', $id_role);
          $this->db->set('alamat', $alamat);
          $this->db->set('no_rekening', $no_rekening);
          $this->db->where('username', $username);
          $this->db->update('user');
          echo json_encode(['status' => 1]);
     }
     public function hapus($id)
     {
          if ($id != '') {
               $this->db->where('id', $id);
               $this->db->delete('user');
               echo json_encode(['status' => 1]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }

     public function data()
     {
          $id = $this->input->get('id');
          $data = $this->db->get_where('user', ['id' => $id])->row_array();
          echo json_encode($data);
     }
}
