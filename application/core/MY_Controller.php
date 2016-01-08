<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
	public function comprobar_admin()
	{
		if($this->session->userdata('userName')!="admin") //solo puede entrar el admin
	    {
	      redirect('/adminlogin');
	    } 
	}
	public function __construct() 
	{
	    parent::__construct();
		$this->comprobar_admin();
	}
}