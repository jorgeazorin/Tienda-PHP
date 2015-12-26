<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalogo extends CI_Controller {

  function __construc(){
    parent::__construc();
    $this->load->database();
  }

  public function index(){

        $this->load->model("catalogo_m",'', TRUE);
        $data['TodoElCatalogo']=$this->catalogo_m->get_all();
        $this->load->view('catalogo/todo_catalogo.php', $data);
  }
}