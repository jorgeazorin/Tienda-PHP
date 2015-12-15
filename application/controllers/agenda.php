<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller {

  function __construc(){
    parent::__construc();
    $this->load->database();
  }

  public function index()
	{

    $this->load->model("Agenda_m",'', TRUE);
    $data['titulo']="Listado de la agenda";
    //$data['cuantos']=$this->Agenda_m->count_all();
    $data['lista']=$this->Agenda_m->get_all();

		$this->load->view('agenda/index', $data);

	}

}
