<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategoria extends MY_Controller {

  function __construc(){
    parent::__construc();
    $this->load->database();
  }

  public function nuevo($idcat)
  {
    $this->load->model("Subcategoria_m",'', TRUE);
    $nombre = $_POST['nombre'];
    $this->Subcategoria_m->crear($nombre,$idcat);
  }

  public function borrar($idsubcat)
  {
    $this->load->model("Subcategoria_m",'', TRUE);
    $this->Subcategoria_m->borrar($idsubcat);
  }

  public function editar($idsubcat)
  {
    $this->load->model("Subcategoria_m",'', TRUE);
    $nombre = $_POST['nuevonombre'];
    $categoriaId = $_POST['nuevacategoria'];
    $this->Subcategoria_m->actualizar($idsubcat,$nombre,$categoriaId);
  }

}
