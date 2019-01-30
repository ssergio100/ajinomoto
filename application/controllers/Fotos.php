<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fotos extends CI_Controller {

	public function index()
	{ 
	
	}

	public function getAll()
	{ 
		echo json_encode(array('nome'=>'sergio'));
	}
}
