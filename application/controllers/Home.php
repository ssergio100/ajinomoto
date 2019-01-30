<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{ 
		$content = array('view'=>'includes/pages/fotos');
		$this->load->view('home', $content);
	}

	public function painel()
	{ 
		$content = array('view'=>'includes/pages/painel');
		$this->load->view('home', $content);
	}
}
