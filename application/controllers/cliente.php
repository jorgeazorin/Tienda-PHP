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
            header("Location: /iw/cliente/login/");
        }
        $data['email']= $session_email;

        $data['idusuario']=$session_id;

        $this->load->model("direnvio_m",'', TRUE);

        $direcciones = $this->direnvio_m->getDirecciones($session_id);
        $data['direcciones']=$direcciones;
        
        $this->load->model("mensaje_m",'', TRUE);
         $mensajes = $this->mensaje_m->getmensajesCliente($session_id);
        $data['mensajes']=$mensajes;

        $this->load->view('cliente/cliente.php', $data);
    }


    public function borrarDireccion($idenvio)
  {
    $this->load->model("direnvio_m",'', TRUE);
    $this->direnvio_m->borrar($idenvio);
  }

  public function crearDireccion($idusuario)
  {
    $this->load->model("direnvio_m",'', TRUE);
    $datos = $_POST['datos'];

    $this->direnvio_m->crear($datos,$idusuario);
  }

  public function modificarDireccion($idenvio,$idusuario)
  {
    $this->load->model("direnvio_m",'', TRUE);
    $datos = $_POST['datos'];

    $id = $idenvio;
    $direccion = $datos[0];
    $poblacion = $datos[1];
    $provincia = $datos[2];
    $codpostal = $datos[3];
    $pais = $datos[4];
    $telefono = $datos[5];
    $clienteId = $idusuario;

    $this->direnvio_m->actualizar($id,$direccion,$poblacion,$provincia,$codpostal,$pais,$telefono,$clienteId);

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
             header("Location: /iw/cliente");
        }
    }
    public function login($error=""){
        $this->load->library('session'); 
        $session_username = $this->session->userdata('userName'); 
        $data['error']=$error;
        $this->load->view('login/login.php',$data);
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
                 header("Location: /iw/cliente");
            }
            else
            header("Location: /iw/cliente/login/errorpassword");
        }else{
            header("Location: /iw/cliente/login/erroruser");
        }
    }
    public function salir(){
        unset($_SESSION['usuario']);
        header("Location: /iw/catalogo/");
    }
}