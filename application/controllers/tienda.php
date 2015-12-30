<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tienda extends CI_Controller {

  function __construc(){
    parent::__construc();
    $this->load->database();
  }


  public function admin() {
    $data['titulo']="Panel de control de Aliexpress ";

    $this->load->model("Tienda_m",'', TRUE);
    $data['lista_tiendas']=$this->Tienda_m->getTiendas();


    $this->load->view('portal-bo/index', $data);
  }


public function nuevo()
{
    $this->load->model("Tienda_m",'', TRUE);
    $nombre = $_POST['nombre'];
    $localizacion = $_POST['localizacion'];
    $fechaapertura = $_POST['fechaapertura'];
    $infocontacto = $_POST['infocontacto'];

     $this->Tienda_m->crear($nombre,$localizacion,$fechaapertura,$infocontacto);
}

  public function editar() {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $localizacion = $_POST['localizacion'];
    $fechaapertura = $_POST['fechaapertura'];
    $infocontacto = $_POST['infocontacto'];
    $this->load->model("Tienda_m",'', TRUE);
    $this->Tienda_m->actualizar($id,$nombre,$localizacion,$fechaapertura,$infocontacto);
  }

  public function borrar($id) {
    $this->load->model("Tienda_m",'', TRUE);
    $this->Tienda_m->borrar($id);
  }
}
