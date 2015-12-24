<?php
if (!defined('BASEPATH'))
 exit('No direct script access allowed');
 
class Categoria_m extends CI_Model {
  
 function add($nombre) {
  //$nombre = $this->input->post('nombre');
  $data = array(
   'nombre' => $nombre
  );
  $this->db->insert('categoria', $data);
 }
 function view() {
  $ambil = $this->db->get('categoria');
  if ($ambil->num_rows() > 0) {
   foreach ($ambil->result() as $data) {
    $hasil[] = $data;
   }
   return $hasil;
  }
 }
 function edit($a) {
  $d = $this->db->get_where('categoria', array('id' => $a))->row();
  return $d;
 }
 function delete($a) {
  $this->db->delete('categoria', array('id' => $a));
  return;
 }
 function update($id) {
  $nombre = $this->input->post('nombre');

  $data = array(
   'nombre' => $nombre
  );
  $this->db->where('id', $id);
  $this->db->update('categoria', $data);
 }
}