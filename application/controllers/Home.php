<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct() {

		parent::__construct();

	
		$this->load->model('auth_model');
		$this->load->model('perfil_model');
		$this->load->model('restaurante_model');
		$this->load->model('categorias_model');
		$this->load->model('carrinho_model');
		
	}

	public function index()
	{
		$this->load->view('all/home');
	}
}
