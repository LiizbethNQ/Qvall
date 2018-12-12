<?php 
/**
* 
*/
class Politicac extends CI_Controller
{
	public function__construct()
	{
		parent::__construct();
		$this->load->model("Model_Perfiles");
		$this->load->model("Model_Usuarios");
		$this->load->model("Model_Empresa");
		$this->load->helper("ayuda");
		$this->load->helper(array('form', 'url','ayuda','security'));
		$this->load->library('form_validation');
	}
    // Qval-------------------------------------------------------------------------
	public function index (){
           $this->load->view('assets'); 
            $this->load->view('base');
           $this->load->view('Politicasc'); 
    }
  
    // Qval-------------------------------------------------------------------------

    		}
    	