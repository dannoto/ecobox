<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrinho extends CI_Controller {

	function __construct() {

		parent::__construct();

	
		$this->load->model('auth_model');
		$this->load->model('perfil_model');
		$this->load->model('ajuda_model');
		
	}
	public function index()
	{
		$this->load->view('user/perfil/carrinho');
	}
}
