<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoria extends CI_Controller {

  function __construc(){
    parent::__construc();
    $this->load->database();
  }

  public function index($idtienda)
	{

    $this->load->model("Categoria_m",'', TRUE);
    $data['titulo']="Listado de categorías";
    $data['idtienda']=$idtienda;
    //$data['cuantos']=$this->Agenda_m->count_all();
    $data['lista']=$this->Categoria_m->getCategorias();

		$this->load->view('categorias/index', $data);

	}

  public function nuevo()
  {
    $this->load->model("Categoria_m",'', TRUE);
    $nombre = $_POST['nuevacat'];
    $this->Categoria_m->crear($nombre);
  }

  public function borrar($idcat)
  {
    $this->load->model("Categoria_m",'', TRUE);
    $this->Categoria_m->borrar($idcat);
  }

  public function editar($idcat)
  {
    $this->load->model("Categoria_m",'', TRUE);
    $nombre = $_POST['nuevonombre'];
    $this->Categoria_m->actualizar($idcat,$nombre);
  }

}
