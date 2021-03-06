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

 function getTienda($idtienda) {
  return $this->db->get_where('tienda',array('id' => $idtienda))->row();
 }

  function crear($nombre,$localizacion,$fechaapertura,$infocontacto) {
    $data = array(
     'nombre' => $nombre,
     'localizacion' => $localizacion,
     'fechaapertura' => $fechaapertura,
     'infocontacto' => $infocontacto
    );
    $this->db->insert('tienda', $data);
  }

  function actualizar($id,$nombre,$localizacion,$fechaapertura,$infocontacto) {
  $data = array(
   'nombre' => $nombre,
   'localizacion' => $localizacion,
   'fechaapertura' => $fechaapertura,
   'infocontacto' => $infocontacto
  );
  $this->db->where('id', $id);
  $this->db->update('tienda', $data);
 }

 function borrar($a) {
  $this->db->delete('tienda', array('id' => $a));
  return;
 }

}