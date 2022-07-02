<?php
class Password extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
     }
     function index()
     {
          $data = [
               'judul' => 'Password',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
          ];
          $this->template->load('Template/Content', 'Profile/Password', $data);
     }
     public function ubah()
     {
          $password = md5($this->input->post('password'));
          $username = $this->input->post('username');
          $this->db->set('password', $password);
          $this->db->where('username', $username);
          $this->db->update('user');
          echo json_encode(['status' => 1]);
     }
}
