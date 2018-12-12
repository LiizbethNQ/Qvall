<?php
header('Access-Control-Allow-Origin: *');
/**
* 
*/
class Preguntas extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_Cuestionarios");
		$this->load->model("Model_Perfiles");
		$this->load->model("Model_Calificaciones");
		$this->load->model("Model_Clientes");
		$this->load->model("Model_Usuarios");
	}

  public function index()
  {
        $IDEmpresa=$this->session->userdata('IDEmpresa');
        $IDUsuario=$this->session->userdata('IDUsuario');

        $data["perfiles"]=$this->Model_Perfiles->GetPerfiles($IDEmpresa,'1');
        $data["cuestionarios"]=$this->Model_Cuestionarios->getCuestionariosHome($IDEmpresa,'1');
        $data["preguntasqval"]=$this->Model_Cuestionarios->GetPreguntasqval();
        $data["preguntas"]=$this->Model_Cuestionarios->getPreguntas($IDEmpresa,'1');
        $data["preguntast"]=$this->Model_Cuestionarios->getPreguntas($IDEmpresa,'1');
        $this->load->view('assets'); 
        $this->load->view('base');
        $this->load->view("preguntas", $data);

  }

 
}