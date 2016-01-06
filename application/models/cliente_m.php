<?php
class Cliente_m extends CI_Model{
    function getClienteUserName($username){
      $query = $this->db->query("SELECT `id`, `userName`, `password`, `email` FROM `cliente` WHERE `username`='".$username."'");
      return $query->result();
    }
    
    function registrarCliente($username, $password, $email){
      $query = $this->db->query("INSERT INTO `cliente` (`id`, `userName`, `password`, `email`) VALUES (NULL, '".$username."', '".$password."', '".$email."');");
      //$query->result();
      $query2 = $this->db->query("SELECT `id`, `userName`, `password`, `email` FROM `cliente` WHERE `username`='".$username."'");
      return $query2->result();
    }
  }

?>
