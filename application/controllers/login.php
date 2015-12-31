<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

  function __construc(){
    parent::__construc();
    $this->load->database();
  }

  public function index()
	{
		$this->load->view('login/index');

  }

  public function validar()
  {
   // $this->load->model("Login_m",'', TRUE);
    $login = $_POST['login'];
    $password = $_POST['password'];
    if($login=="admin" && $password=="admin") //perfil de administrador del portal
    {
      $datos = array
      (
        'userName' => $login,
      );
      $this->session->set_userdata($datos);
      echo "admin"; //url para ir al bo del portal
    }
    else {
      $this->load->model("Login_m",'', TRUE);
      //AQUI LLAMADA A MODEL PARA COMPROBAR QUE EL LOGIN (YA SEA USERNAME O EMAIL) Y PASSWORD EXISTEN EN LA BD
      //ENTONCES
      $usuarioExiste = $this->Login_m->getUsuarioLogin($login,$password);
      if($usuarioExiste!=FALSE)
      {
        $datos = array
        (
          'id' => $usuarioExiste->id,
          'userName' => $usuarioExiste->userName,
          'email' => $usuarioExiste->email,
        );
        $this->session->set_userdata($datos);
        echo "paginaprincipal"; //url para ir a la pagina principal
      }
    }
  }

}
