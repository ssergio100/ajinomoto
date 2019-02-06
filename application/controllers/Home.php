<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{ 
		$content = array('page'=>'includes/pages/fotos','view_header'=>'includes/header');
		$this->load->view('home', $content);
	}

	public function painel()
	{ 
		$content = array('page'=>'includes/pages/painel','view_header'=>'includes/header');
		$this->load->view('home', $content);
	}
}
