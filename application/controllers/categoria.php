<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoria extends MY_Controller {

  function __construc(){
    parent::__construc();
    $this->load->database();
  }

  public function index()
	{

    $this->load->model("Categoria_m",'', TRUE);
    $this->load->model("Subcategoria_m",'', TRUE);

    $data['titulo']="Listado de categorías";
    $lista = $this->Categoria_m->getCategorias();
    $data['lista']=$lista;

    $i = 0;
    $subcategorias = array(array());
    foreach ($lista as $categoria)
    {
      $subcategorias[$i]=$this->Subcategoria_m->getSubCategorias($categoria->id);
      ++$i;
    }

    $data['subcategorias'] = $subcategorias;

		$this->load->view('portal-bo/categorias/index', $data);

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
