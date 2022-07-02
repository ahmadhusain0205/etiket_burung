<?php
class Event extends CI_Controller
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
               'judul' => 'Event',
               'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
          ];
          $data['slider'] = $this->db->get('slider')->result();
          $data['info'] = $this->db->get('info')->result();
          $this->template->load('Template/Content', 'Event/Data', $data);
     }
     public function hapus_slider($id)
     {
          if ($id != '') {
               $this->db->where('id', $id);
               $this->db->delete('slider');
               echo json_encode(['status' => 1]);
          } else {
               echo json_encode(['status' => 2]);
          }
     }
     public function tambah()
     {
          $image_name = $_FILES["gambar"]['name'];
          $config['upload_path']     = 'assets/img/slider/';
          $config['allowed_types']   = 'jpg|png|jpeg';
          $config['max_size'] = '2048';
          $config['file_name']     = $image_name;
          $this->load->library('upload', $config);
          $this->upload->do_upload('gambar');
          $gambar = $this->upload->data('file_name');
          $data = [
               'gambar' => $gambar,
          ];
          $this->db->insert('slider', $data);
          redirect('Event');
     }

     public function ubah()
     {
          $image_name = $_FILES["gambar"]['name'];
          $config['upload_path']     = 'assets/img/slider/';
          $config['allowed_types']   = 'jpg|png|jpeg';
          $config['max_size'] = '2048';
          $config['file_name']     = $image_name;
          $this->load->library('upload', $config);
          $this->upload->do_upload('gambar');
          $bukti = $this->upload->data('file_name');
          $id = $this->input->post('id');
          $this->db->set('gambar', $bukti);
          $this->db->where('id', $id);
          $this->db->update('slider');
          redirect('Event');
     }

     public function ubah_info()
     {
          $image_name = $_FILES["gambar"]['name'];
          $config['upload_path']     = 'assets/img/kontes/';
          $config['allowed_types']   = 'jpg|png|jpeg';
          $config['max_size'] = '2048';
          $config['file_name']     = $image_name;
          $this->load->library('upload', $config);
          $this->upload->do_upload('gambar');
          $bukti = $this->upload->data('file_name');
          $id = $this->input->post('id');
          $kolom_1 = $this->input->post('kolom_1');
          $kolom_2 = $this->input->post('kolom_2');
          $this->db->set('gambar', $bukti);
          $this->db->set('kolom_1', $kolom_1);
          $this->db->set('kolom_2', $kolom_2);
          $this->db->where('id', $id);
          $this->db->update('info');
          redirect('Event');
     }
}
