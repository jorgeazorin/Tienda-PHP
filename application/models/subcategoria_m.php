<?php
if (!defined('BASEPATH'))
 exit('No direct script access allowed');
 
class Subcategoria_m extends CI_Model {

  function getSubcategorias($idcat) {
     //$d = $this->db->get_where('categoria', array('id' => $a))->row();
    $ambil = $this->db->get_where('subcategoria',array('categoriaId' => $idcat));
    if ($ambil->num_rows() > 0) {
      foreach ($ambil->result() as $data) {
        $hasil[] = $data;
      }
      return $hasil;
    }
  }

  function crear($nombre,$idcat) {
    $data = array(
     'nombre' => $nombre,
     'categoriaId' => $idcat
    );
    $this->db->insert('subcategoria', $data);
  }

  function borrar($idsubcat) {
  $this->db->delete('subcategoria', array('id' => $idsubcat));
  return;
 }

}