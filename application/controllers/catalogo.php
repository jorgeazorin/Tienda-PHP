<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalogo extends CI_Controller {

  function __construc(){
    parent::__construc();
    $this->load->database();
  }

  public function index(){
      $this->load->library('session');
        $this->load->model("catalogo_m",'', TRUE);
        $data['TodoElCatalogo']=$this->catalogo_m->get_all();
        $this->load->view('catalogo/todo_catalogo.php', $data);
  }
  public function tienda($id){
      $this->load->library('session');
        $this->load->model("catalogo_m",'', TRUE);
        $data['TodoElCatalogo']=$this->catalogo_m->get_catalogo_tienda($id);
      
      
       $this->load->model("tienda_m",'', TRUE);
        $data['tienda']=$this->tienda_m-> getTienda($id);
        $this->load->view('catalogo/catalogo_tienda.php', $data);
  }
    
    
    public function producto( $id){
        $this->load->library('session');
        $this->load->model("catalogo_m",'', TRUE);
        $producto=$this->catalogo_m->get_producto($id);
        $data['producto']=$producto;
        
        $this->load->model("tienda_m",'', TRUE);
        $data['tienda']=$this->tienda_m-> getTienda($producto[0]->tiendaId);
        $this->load->view('catalogo/producto.php', $data);
    }
}