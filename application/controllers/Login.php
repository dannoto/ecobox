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

			$user_email = htmlspecialchars($this->input->post('user_email'));
			$user_password = htmlspecialchars($this->input->post('user_password'));

			$auth = $this->auth_model->Login($user_email, $user_password); 

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
