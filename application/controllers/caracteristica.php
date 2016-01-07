<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caracteristica extends MY_Controller {

  function __construc(){
    parent::__construc();
    $this->load->database();
  }

  public function index($idprod,$idtienda)
	{

    $this->load->model("Caracteristica_m",'', TRUE);
    $data['idprod']=$idprod;
    $data['idtienda']=$idtienda;

    $this->load->model("Producto_m",'', TRUE);
    $data['nombreprod'] = $this->Producto_m->getProducto($idprod)->nombre;
    $data['titulo']="Características del producto ";


    $data['lista']=$this->Caracteristica_m->getCaracteristicas($idprod);
		$this->load->view('portal-bo/caracteristicas/index', $data);

	}


  public function nuevo($idprod)
  {
    $this->load->model("Caracteristica_m",'', TRUE);
    $nombre = $_POST['nombre'];
    $stock = $_POST['stock'];
    $this->Caracteristica_m->crear($nombre,$stock,$idprod);
  }

  public function borrar($idcaracteristica)
  {
    $this->load->model("Caracteristica_m",'', TRUE);
    $this->Caracteristica_m->borrar($idcaracteristica);
  }

  public function editar($idcaracteristica,$nombre,$stock)
  {
    $this->load->model("Caracteristica_m",'', TRUE);
    $nombre = $_POST['nombre'];
    $stock = $_POST['stock'];
    $this->Caracteristica_m->actualizar($idcaracteristica,$nombre,$stock);
  }

}
