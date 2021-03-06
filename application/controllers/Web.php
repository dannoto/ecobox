<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {
	function __construct() {

		parent::__construct();

	
		$this->load->model('auth_model');
		$this->load->model('perfil_model');
		$this->load->model('restaurante_model');
		$this->load->model('categorias_model');
		$this->load->model('carrinho_model');
		$this->load->model('cupom_model');
		$this->load->model('location_model');
		      
	}

	public function index()
	{

		if (isset($_COOKIE['cidade'])) {
			$cidade = $_COOKIE['cidade'];
		} else {
			$cidade = "";
		}


		$data = array(
			'estados' => $this->location_model->getEstados(),
			'cidade' => $cidade,
		);

		$this->load->view('all/home', $data);
	}
}
