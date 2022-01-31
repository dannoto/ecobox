<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cupons extends CI_Controller {
	function __construct() {

		parent::__construct();

	
		$this->load->model('auth_model');
		$this->load->model('perfil_model');
		$this->load->model('ajuda_model');
        $this->load->model('carrinho_model');
		$this->load->model('restaurante_model');
		$this->load->model('produtos_model');
		$this->load->model('cupom_model');
	}
	public function index()
	{


		$this->load->view('user/perfil/cupons');
	}
}
