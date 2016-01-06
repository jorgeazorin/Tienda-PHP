<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends CI_Controller {

    function __construc(){
        parent::__construc();
        $this->load->database();
    }

    public function index(){
        $this->load->library('session'); 
        $this->load->model("pedido_m",'', TRUE);      
        $session_id = $this->session->userdata('id');
        $session_username = $this->session->userdata('userName');
        $session_email = $this->session->userdata('email');
        $pedidos=$this->pedido_m->getPedidosCliente($session_id);
        $data['pedidos']=$pedidos;
        $data['username']=$session_username;
        if(!$session_username){
            header("Location: /iw/index.php/cliente/login/");
        }
        $data['email']= $session_email;
        $this->load->view('cliente/cliente.php', $data);
    }

    public function doRegistro(){
        $this->load->library('session');
        $userName=$_POST['login'];
        $password=$_POST['password'];
        $email=$_POST['email'];

        $this->load->model("cliente_m",'', TRUE);
        $cliente=$this->cliente_m->registrarCliente($userName, $password, $email);

        if($cliente){
            $this->session->set_userdata($cliente[0]);                
            echo("Registro correcto");
             header("Location: /iw/index.php/cliente/");
        }
    }
    public function login(){
        $this->load->library('session'); 
        $session_username = $this->session->userdata('userName'); 
        $this->load->view('login/login.php');
    }
    public function doLogin(){
        $this->load->library('session');
        $userName=$_POST['login'];
        $password=$_POST['password'];
        $this->load->model("cliente_m",'', TRUE);
        $cliente=$this->cliente_m->getClienteUserName($userName);
        if($cliente){
            if($password==$cliente[0]->password){
                $this->session->set_userdata($cliente[0]);                
                echo("Login correcto");
                 header("Location: /iw/index.php/cliente/");
            }
            else
                echo("login incorrecto");
            header("Location: /iw/index.php/cliente/login/kjh");
        }else{
            echo("usuario no existe");
            header("Location: /iw/index.php/cliente/login/kjhj");
        }
    }
    public function salir(){
        unset($_SESSION['usuario']);
        header("Location: /iw/index.php/catalogo/");
    }
}