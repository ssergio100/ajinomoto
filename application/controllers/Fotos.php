<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fotos extends CI_Controller {

	public $response = array('success'=>false);
    
    public function __construct(){
        parent::__construct();
        $this->load->model('fotos_model', 'fotos');
	}
	

	public function getAll()
	{ 
		$result = $this->fotos->getAllImages();

		$this->response['data'] = $result;
		$this->response['success'] = true;
		$this->response['uri'] = site_url().config_item('imagens_path');

		echo json_encode($this->response);
	}
}
