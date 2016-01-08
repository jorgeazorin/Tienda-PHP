<?php
if (!defined('BASEPATH'))
 exit('No direct script access allowed');
 
class Direnvio_m extends CI_Model {

  function getDirecciones($idcliente) {
    $ambil = $this->db->get_where('direnvio',array('clienteId' => $idcliente));
    if ($ambil->num_rows() > 0) {
      foreach ($ambil->result() as $data) {
        $hasil[] = $data;
      }
      return $hasil;
    }
  }

   function borrar($idenvio) {
  $this->db->delete('direnvio', array('id' => $idenvio));
  return;
 }

 function crear($datos,$idusuario) {
    $data = array(
     'direccion' => $datos[0],
     'poblacion' => $datos[1],
     'provincia' => $datos[2],
     'codpostal' => $datos[3],
      'pais' => $datos[4],
      'telefono' => $datos[5],
     'clienteId' => $idusuario
    );
    $this->db->insert('direnvio', $data);
  }

  function actualizar($id,$direccion,$poblacion,$provincia,$codpostal,$pais,$telefono,$clienteId) {
    $data = array(
     'direccion' => $direccion,
     'poblacion' => $poblacion,
     'provincia' => $provincia,
     'codpostal' => $codpostal,
     'pais' => $pais,
     'telefono' => $telefono,
     'clienteId' => $clienteId
    );
    $this->db->where('id', $id);
    $this->db->update('direnvio', $data);
 }


}