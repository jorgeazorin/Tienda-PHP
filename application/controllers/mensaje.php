<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mensaje extends CI_Controller {

  function __construc(){
    parent::__construc();
    $this->load->database();
  }

  public function enviaratienda($idTienda, $productoId){
      $this->load->library('session');
      $mensaje = $_POST['mensaje'];
      $mensaje= 'Id producto: '.$productoId.'; Mensaje: '.$mensaje;
      $session_id=$this->session->userdata('id');
      if($session_id){
          
          $this->load->model("mensaje_m",'', TRUE);
          $this->mensaje_m->enviaratienda($idTienda, $session_id, $mensaje);
              header("Location: /iw/index.php/cliente/");

      }
  }
   public function eliminar($id){

          $this->load->model("mensaje_m",'', TRUE);
          $this->mensaje_m->eliminar($id);
              header("Location: /iw/index.php/cliente/");

  } 


}