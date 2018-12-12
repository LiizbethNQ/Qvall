<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Correos extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('email');
		$this->load->helper('selec_Titulo');
		$this->constant="vkq4suQesgv6FVvfcWgc2TRQCmAc80iE";
	}
	public function correoprueba(){
		$config['useragent']        = 'Codeigniter';
		$config['protocol']         = 'smtp';
		$config['smtp_host']        = 'smtp.1and1.es';
		$config['smtp_user']        = 'lizbeth.nigo.quezada@gmail.com';
		$config['smtp_pass']        = 'rapidoycoqeto13';
		$config['smtp_port']        = 587;
		$config['smtp_crypto']      = 'tls';
		$config['wordwrap']         = TRUE;
		$config['wrapchars']        = 76;
		$config['mailtype']         = 'html';
		$config['charset']          = 'utf-8';
		$config['validate']         = TRUE;
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['bcc_batch_mode']   = false;
		$config['bcc_batch_size']   = 200;
		$htmlContent = '<h1>HTML email testing by CodeIgniter Email Library</h1>';
		$htmlContent .= '<p>You can use any HTML tags and content in this email.</p>';
		$config['mailtype'] = 'html';
        $this->email->initialize($config);
     	$this->email->to('mosha-shel@hotmail.com');
		$this->email->from('lizbeth.nigo.quezada@gmail.com');
		$this->email->subject('Test Email (HTML)');
		$this->email->message($htmlContent);
		$this->email->send();
	}
}