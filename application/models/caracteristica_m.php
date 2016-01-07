<?php
if (!defined('BASEPATH'))
 exit('No direct script access allowed');
 
class Caracteristica_m extends CI_Model {

  function getCaracteristicas($idprod) {
    $ambil = $this->db->get_where('caracteristicasprod',array('productoId' => $idprod));
    if ($ambil->num_rows() > 0) {
      foreach ($ambil->result() as $data) {
        $hasil[] = $data;
      }
      return $hasil;
    }
  }


  function crear($nombre,$stock,$idprod) {
    $data = array(
     'nombre' => $nombre,
     'stock' => $stock,
     'productoId' => $idprod
    );
    $this->db->insert('caracteristicasprod', $data);
  }

  function borrar($idcaracteristica) {
  $this->db->delete('caracteristicasprod', array('id' => $idcaracteristica));
  return;
 }

 function actualizar($id,$nombre,$stock) {
  $data = array(
   'nombre' => $nombre,
   'stock' => $stock
  );
  $this->db->where('id', $id);
  $this->db->update('caracteristicasprod', $data);
 }

}