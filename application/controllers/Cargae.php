<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class Cargae extends CI_Controller
{
	
	function __construct()
	{
			parent::__construct();
			$this->load->model("Model_Perfiles");
		    $this->load->model("Model_Empresa");
			$this->load->helper("ayuda");
	}
	public function index(){
		$IDEmpresa=$this->session->userdata('IDEmpresa');
		$data["grupos"]=$this->Model_Perfiles->GetPerfilSET($IDEmpresa,"E",1);
		$this->load->view('assets'); 
        $this->load->view('base');
		$this->load->view('Cargae',$data);
	}
}