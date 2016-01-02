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

  function getProducto($idproducto) {
    return $this->db->get_where('producto',array('id' => $idproducto))->row();
 }

 function crear($datos,$idtienda) {
    print_r($datos);
    $data = array(
     'nombre' => $datos[0],
     'especificaciones' => $datos[1],
     'descripcion' => $datos[2],
     'precio' => $datos[3],
      'subcategoriaId' => $datos[4],
     'tiendaId' => $idtienda
    );
    $this->db->insert('producto', $data);
  }

  function borrar($idprod) {
    $this->db->delete('producto', array('id' => $idprod));
    return;
  }

  function actualizar($idprod,$nombre,$especificaciones,$descripcion,$precio,$subcategoriaId,$tiendaId) {
    $data = array(
     'nombre' => $nombre,
     'especificaciones' => $especificaciones,
     'descripcion' => $descripcion,
     'precio' => $precio,
     'subcategoriaId' => $subcategoriaId,
     'tiendaId' => $tiendaId
    );
    $this->db->where('id', $idprod);
    $this->db->update('producto', $data);
 }


}