<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tienda extends CI_Controller {

  function __construc(){
    parent::__construc();
    $this->load->database();
  }


  public function admin() {
    $data['titulo']="Panel de control de Aliexpress ";
    $this->load->view('portal-bo/index', $data);
  }
/*
  public function index()
	{

    $this->load->model("Categoria_m",'', TRUE);
    $data['titulo']="Listado de categorías";
    //$data['cuantos']=$this->Agenda_m->count_all();
    $data['lista']=$this->Categoria_m->view();

		$this->load->view('categorias/index', $data);

	}

  public function nuevo()
  {
    $this->load->model("Categoria_m",'', TRUE);
    $nombre = $_POST['nuevacat'];
    $this->Categoria_m->add($nombre);
  }
*/
}
