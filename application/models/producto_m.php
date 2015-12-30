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

 function crear($datos,$idtienda) {
    print_r($datos);
    $data = array(
     'nombre' => $datos[0],
     'especificaciones' => $datos[1],
     'descripcion' => $datos[2],
     'precio' => $datos[3],
     'tiendaId' => $idtienda,
     'subcategoriaId' => $datos[5]
    );
    $this->db->insert('producto', $data);
  }
}