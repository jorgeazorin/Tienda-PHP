<?php
if (!defined('BASEPATH'))
 exit('No direct script access allowed');
 
class Tienda_m extends CI_Model {

 function getTiendas() {
  $ambil = $this->db->get('tienda');
  if ($ambil->num_rows() > 0) {
   foreach ($ambil->result() as $data) {
    $hasil[] = $data;
   }
   return $hasil;
  }
 }

}