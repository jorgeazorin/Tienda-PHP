<?php
if (!defined('BASEPATH'))
 exit('No direct script access allowed');
 
class Producto_m extends CI_Model {
  
 function getAllProductos() {
  $ambil = $this->db->get('productos');
  if ($ambil->num_rows() > 0) {
   foreach ($ambil->result() as $data) {
    $hasil[] = $data;
   }
   return $hasil;
  }
 }
 function getProductosTienda($tiendaid) {
  $ambil = $this->db->get_where('producto', array('tiendaid' => $tiendaid));
  if ($ambil->num_rows() > 0) {
   foreach ($ambil->result() as $data) {
    $hasil[] = $data;
   }
   return $hasil;
  }
 }
}