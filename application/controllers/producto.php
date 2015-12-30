<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto extends CI_Controller {

  function __construc(){
    parent::__construc();
    $this->load->database();
  }

  public function index($tiendaid)
	{

   // $this->load->model("Categoria_m",'', TRUE);
    $data['titulo']="Listado de de productos de la tienda ";
    $data['tiendaid']=$tiendaid;

    $this->load->model("Producto_m",'', TRUE);
    $data['lista']=$this->Producto_m->getProductosTienda($tiendaid);

		$this->load->view('portal-bo/productos/index', $data);

	}

/*
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
*/
}
