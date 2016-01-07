<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedido extends CI_Controller {

  function __construc(){
    parent::__construc();
    $this->load->database();
  }


    public function verpedido($pedidoId){
        $this->load->library('session'); 
        $this->load->model("pedido_m",'', TRUE);      
        $session_id = $this->session->userdata('id');
        $session_username = $this->session->userdata('userName');
        $session_email = $this->session->userdata('email');
        $pedidos=$this->pedido_m->getPedidosCliente($session_id);
        $linped=$this->pedido_m->getlinped($pedidoId);
        $data['pedidoId']=$pedidoId;
        $data['pedido']=$pedidoId;
        $data['username']=$session_username;
        $data['email']= $session_email;
        $data['linped']= $linped;
        $this->load->view('pedidos/pedido.php', $data);
  }
  
    public function realizarpedido(){
        $this->load->library('session');
        $this->load->model("pedido_m",'', TRUE);
        $session_id = $this->session->userdata('id');
        $this->load->library('Carrito');
        $carrito = new Carrito();
        $cesta = $carrito->get_content();
        $this->pedido_m->realizarPedidoCliente($cesta, $session_id);
        $carrito->destroy();
        header("Location: /iw/index.php/cliente/");
    }
}