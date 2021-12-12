<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {

		parent::__construct();

		$this->load->model('cadastro_model');
		$this->load->model('auth_model');
		
	}

	public function index()
	{

		if ($this->input->post()) {

			$email = htmlspecialchars($this->input->post('email'));
			$password = htmlspecialchars($this->input->post('password'));

			$auth = $this->auth_model->Login($email, $password); 

			if ($auth) {
				$this->session->set_userdata('session_user', $auth);
				redirect(base_url());
			} else {
				$this->session->set_flashdata('login','Suas credenciais estão incorretas.');
			}
			


		}
		$this->load->view('all/login');
	}
}
