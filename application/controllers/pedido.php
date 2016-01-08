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
        $pedido=$this->pedido_m->getPedido($pedidoId);
        $linped=$this->pedido_m->getlinped($pedidoId);
        $data['direnvio']=$this->pedido_m->obtenerDirEnvio($pedido[0]->direnvioId);
        
        
        $data['pedidoId']=$pedidoId;
        $data['pedido']=$pedido;
        $data['username']=$session_username;
        $data['email']= $session_email;
        $data['linped']= $linped;
        $this->load->view('pedidos/pedido.php', $data);
  }
  
    public function realizarpedido(){
        $direnvio=$_POST['direccion'];
        if($direnvio){
            $this->load->library('session');
            $this->load->model("pedido_m",'', TRUE);
            $session_id = $this->session->userdata('id');
            $this->load->library('Carrito');
            $carrito = new Carrito();
            $cesta = $carrito->get_content();
            $this->pedido_m->realizarPedidoCliente($cesta, $session_id, $direnvio);
            $carrito->destroy();
            header("Location: /iw/cliente/");
        }else{
            header("Location: /iw/carro/errorenvio");
        }
        
    }
    public function comentarlinped($pedidoId,$id){
        $this->load->model("pedido_m",'', TRUE);
        $comentario = $_POST['comentario'];
        $this->pedido_m->comentarlinped($id,$comentario);
                header("Location: /iw/pedido/verpedido/".$pedidoId);

    }
}