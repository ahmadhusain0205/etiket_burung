<?php
class M_security extends CI_Model
{
     private function _Security()
     {
          $user = $this->db->get('user')->result();
          foreach ($user as $u) {
               if ($u->on_off == 0) {
                    redirect('Auth');
               }
          }
     }
}
