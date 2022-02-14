<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrinho extends CI_Controller {
	function __construct() {

		parent::__construct();

	
		$this->load->model('auth_model');
		$this->load->model('perfil_model');
		$this->load->model('ajuda_model');
        $this->load->model('carrinho_model');
		$this->load->model('restaurante_model');
		$this->load->model('produtos_model');
		
	}
	public function index()
	{

		$this->perfil_model->autenticateUser();

		if (!null == $this->input->post("delete_carrinho_produto")) {

			$carrinho_produto = $this->input->post("carrinho_produto");
			$this->carrinho_model->deleteProduto($carrinho_produto);

		}

		$this->load->view('user/perfil/carrinho');
	}
}
