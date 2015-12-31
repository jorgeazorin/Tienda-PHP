<?php
if (!defined('BASEPATH'))
 exit('No direct script access allowed');
 
class Login_m extends CI_Model {
  
 
 function getUsuarioLogin($login,$password) {
  $usuario = null;
  $usuario = $this->db->get_where('cliente', array('userName' => $login))->row();
  if(is_object($usuario)==FALSE) //si no existe nadie con ese username
  {
    $usuario = $this->db->get_where('cliente', array('email' => $login))->row();
    if(is_object($usuario)==FALSE) //si no existe nadie con ese email
    {
      return FALSE;
    }
  }
  //si llega hasta aqui, es que existe ese login
  if($usuario->password==$password) //si coincide la password
    return $usuario;
  else
    return FALSE;

 }

}