<?php
class Mensaje_m extends CI_Model{
    function enviaratienda($idTienda, $session_id, $mensaje){
      $query = $this->db->query("INSERT INTO `mensaje` (`id`, `texto`, `clienteId`, `tiendaId`) VALUES (NULL,'".$mensaje."', ".$session_id.", ".$idTienda.")");
    }
    function getmensajesCliente($id){
      $query = $this->db->query("SELECT `mensaje`.`id`, `mensaje`.`texto`, `mensaje`.`clienteId`, `mensaje`.`tiendaId`, `tienda`.`nombre` FROM `mensaje` , `tienda` WHERE  `mensaje`.`tiendaId`=`tienda`.`id` and `mensaje`.`clienteId`= ".$id);
      return $query->result();
    }
    function eliminar($id){
      $query = $this->db->query("DELETE FROM `mensaje` WHERE `id` =".$id);
    }
    
  }

?>
