<?php
class Agenda_m extends CI_Model{
  function get_all(){
    $this->db->select('id, nombre, telf, email');
    $this->db->order_by('nombre');
    return $this->db->get("agenda")->result();
  }
  function count_all(){
  /*  $this->db->count_all("agenda");
    return $this->db->get("agenda")->result();*/
  }
}
?>
