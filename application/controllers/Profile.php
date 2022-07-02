<?php
class Profile extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
     }
     function index()
     {
          $data = [
               'judul' => 'Data Diri',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
          ];
          $this->template->load('Template/Content', 'Profile/Data', $data);
     }
     public function ubah()
     {
          $this->form_validation->set_rules('no_hp', 'nomor hp', 'required|trim|min_length[3]');
          $this->form_validation->set_rules('alamat', 'alamat', 'required|trim|min_length[3]');
          $this->form_validation->set_message('required', '%s tidak boleh kosong');
          $this->form_validation->set_message('min_length', '%s minimal 3 huruf/angka');
          if ($this->form_validation->run() == false) {
               redirect('Profile');
          } else {
               $username = $this->input->post('username');
               $nama = $this->input->post('nama');
               $alamat = $this->input->post('alamat');
               $no_hp = $this->input->post('no_hp');
               $upload_image = $_FILES['gambar']['name'];
               if ($upload_image) {
                    $config['upload_path'] = './assets/img/user/';
                    $config['allowed_types'] = 'jpg|png';
                    $config['max_size'] = '2048';
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('gambar')) {
                         $new = $this->upload->data('file_name');
                         if (!isset($new)) {
                              $gambar_default = 'default.png';
                         } else {
                              $gambar_default = $new;
                         }
                    } else {
                         $gambar_default = 'default.png';
                    }
               } else {
                    $gambar_default = 'default.png';
               }
               $this->db->set('nama', $nama);
               $this->db->set('alamat', $alamat);
               $this->db->set('no_hp', $no_hp);
               $this->db->set('gambar', $gambar_default);
               $this->db->where('username', $username);
               $this->db->update('user');
               redirect('Profile');
          }
     }
}
