<?php
class Info extends CI_Controller
{
     function __construct()
     {
          parent::__construct();
     }
     function index()
     {
          $data = [
               'judul' => 'Informasi',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
          ];
          $this->template->load('Template/Auth', 'Info/Lomba', $data);
     }
}
