<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recuperacao extends CI_Controller {

	function __construct() {

		parent::__construct();
		$this->load->model('recuperacao_model');
		$this->load->model('email_model');
		$this->load->model('cadastro_model');
		$this->load->model('auth_model');
		
	}
  
	public function index()
	{

		// $usr = $this->session->userdata('session_start');

		if ($this->input->post()) {

			// print_r($this->input->post());
	
			

			// echo $this->input->post('email');
			$user_email = htmlspecialchars($this->input->post('user_email'));

			if ($this->cadastro_model->checkEmail($user_email)) {
			
				$this->session->set_flashdata('recuperacao', 'Não existe conta com este e-mail.');
			} else {

				
				$user_token = $this->recuperacao_model->getToken($user_email);
				
				if ($this->email_model->EmailRecuperacao($user_email, $user_token)) {
				
					$this->session->set_flashdata('recuperacao', 'Um e-mail foi enviado para você.');
								
				} else {
				
					$this->session->set_flashdata('recuperacao', 'Erro ao enviar email. Tente mais tarde.');
				}	
			}
		}



		$this->load->view('all/recuperacao');
	}
}
