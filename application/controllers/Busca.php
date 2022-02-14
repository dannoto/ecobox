<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busca extends CI_Controller {
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

		$query = "";

		if ($this->input->get('q')) {
			if(strlen($this->input->get('q')) > 0 ) {
				$query = htmlentities($this->input->get('q'));
			} else {
				redirect(base_url());
			}
		} else {
			redirect(base_url());
		}

		if (isset($_COOKIE['cidade'])) {

			$cidade = $_COOKIE['cidade'];
		} else {
			$cidade = "";
		}
		

		$data = array(
			'query' => $query,
			'restaurantes' => $this->restaurante_model->getRestaurantesBySearch($query, $cidade),
			'produtos' => $this->restaurante_model->getProdutosBySearch($query, $cidade),
			'estados' => $this->location_model->getEstados(),
			'cidade' => $cidade,
		);

		 if ( !isset($_COOKIE['setLocation']) || $_COOKIE['setLocation'] == "false" ) { 
			$this->load->view('all/busca_off', $data);
		
		 } else {
			
			$this->load->view('all/busca', $data);
		 }
	}
}
