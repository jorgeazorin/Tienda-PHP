<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carro extends CI_Controller {

  function __construc(){
    parent::__construc();
    $this->load->database();
  }

  public function index(){
      $this->load->library('session');
      $this->load->library('Carrito');
      $carrito = new Carrito();
      $data['carro'] = $carrito->get_content();
      $this->load->view('carro/verCarro.php', $data);
  }
    
    
  public function add($id,$cantidad){
      $this->load->library('session');
    $this->load->model("catalogo_m",'', TRUE);
    $producto=$this->catalogo_m->get_producto($id);
    $this->load->library('Carrito');
    $carrito = new Carrito();
    $articulo = array(
            "id"			=>		$id,
            "cantidad"		=>		$cantidad,
            "precio"		=>		 $producto[0]->precio,
            "nombre"		=>		 $producto[0]->nombre
        );
    $carrito->add($articulo);
    header("Location: /iw/index.php/carro/");

  }
    
  public function delete($unique_id){
      $this->load->library('session');
      $this->load->library('Carrito');
      $carrito = new Carrito();
      $carrito->remove_producto($unique_id);
      header("Location: /iw/index.php/carro/");
  }

  public function limpiarCarrlo(){
      $this->load->library('session');
    $this->load->library('Carrito');
    $carrito->destroy();
      header("Location: /iw/index.php/carro/");
  }

}