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

       echo "admin"; //url para ir al bo del portal
    }
    else {
      //$this->Login_m->validar($login,$password);
    }

  }

}
