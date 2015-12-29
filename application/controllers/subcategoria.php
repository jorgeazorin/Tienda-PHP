<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategoria extends CI_Controller {

  function __construc(){
    parent::__construc();
    $this->load->database();
  }

  public function index($idtienda,$idcat)
	{

    $this->load->model("Subcategoria_m",'', TRUE);
    $data['titulo']="Listado de subcategorías";
    $data['idtienda']=$idtienda;
    $data['idcat']=$idcat;

    $data['lista']=$this->Subcategoria_m->getSubcategorias($idcat);
		$this->load->view('subcategorias/index', $data);

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
/*
  public function editar($idcat)
  {
    $this->load->model("Categoria_m",'', TRUE);
    $nombre = $_POST['nuevonombre'];
    $this->Categoria_m->actualizar($idcat,$nombre);
  }
  */

}
