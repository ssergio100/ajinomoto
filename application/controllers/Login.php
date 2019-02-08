<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public $response = array('success'=>false);
    
    public function __construct(){
        parent::__construct();
        $this->load->model('fotos_model', 'fotos');
	}
	
    
	public function index()
	{
		$content = array();
		$this->load->view('login', $content);
	}

}
