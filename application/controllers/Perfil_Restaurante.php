<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_Restaurante extends CI_Controller {

	function __construct() {

		parent::__construct();

	
		$this->load->model('auth_model');
		$this->load->model('perfil_model');
		
	}


	public function index()
	{

		$usr = $this->session->userdata('session_user');

		$data = array(
			"user" => $this->perfil_model->getUser($usr['id'])
		);

		$this->load->view('user/perfilRestaurante', $data);
	}
}
