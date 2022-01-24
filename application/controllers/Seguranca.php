<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seguranca extends CI_Controller {
	function __construct() {

		parent::__construct();

	
		$this->load->model('auth_model');
		$this->load->model('perfil_model');
		
	}

	public function index()
	{
 

		$usr = $this->session->userdata('session_user');

		if ($this->input->post()) {
			
			$user_current_password = htmlspecialchars($this->input->post('user_current_password'));
			$user_new_password = htmlspecialchars($this->input->post('user_new_password'));
			$user_confirm_password = htmlspecialchars($this->input->post('user_confirm_password'));

			if ($user_new_password == $user_confirm_password) {

				if ($usr['user_password'] == md5($user_current_password)) {

					if ($this->perfil_model->updateSeguranca($usr['id'], $user_current_password, $user_new_password)) {
						$this->session->set_flashdata('response', 'Atualizado com sucesso!');
						// echo "foi";
					} else {
						$this->session->set_flashdata('response', 'Ocorreu um erro ao atualizar.');
						// echo "erro;";
					}

				} else {
					$this->session->set_flashdata('response', 'Suas senha atual está incorreta.');
				}

			} else {
				$this->session->set_flashdata('response', 'Suas senhas não combinam.');
				// echo "nao combina";
			}

		}




		$this->load->view('user/perfil/seguranca');
	}
}
