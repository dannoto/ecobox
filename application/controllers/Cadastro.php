<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {

	function __construct() {

		parent::__construct();

		$this->load->model('cadastro_model');
		$this->load->model('auth_model');
		
	}

	public function index()
	{
		// $imagem = "avatar.png";
				
		// if ($_FILES) {
		
		// 	$img_name = mt_rand().$_FILES['imagem']['name'];
					
		// 	if (move_uploaded_file($_FILES['imagem']['tmp_name'], "./assets/images/avatars/".$img_name)) { 
					
		// 		$imagem = $img_name;

		// 	}
		// }

		if ($this->input->post()) {


			if ($this->cadastro_model->checkEmail($this->input->post('email'))) {
				$nome = htmlspecialchars($this->input->post('nome'));
				$sobrenome = htmlspecialchars($this->input->post('sobrenome'));
				$email = htmlspecialchars($this->input->post('email'));
				$telefone = htmlspecialchars($this->input->post('telefone'));
				$password = htmlspecialchars($this->input->post('password'));
				$token = mt_rand();
				$registro = date('Y-m-d H:i:s');
				$identidade = '';
				$nascimento = '';
				$sexo = '';
				$imagem = 'avatar.png';

				if ($this->cadastro_model->Registrar($nome, $sobrenome, $email, $telefone, $password, $token, $registro, $identidade, $nascimento, $sexo, $imagem)) {
					redirect(base_url());
				} else {
					$this->session->set_flashdata('registrar', 'Ocorreu um erro ao registrar.');
				}
			} else {
				$this->session->set_flashdata('registrar', 'Este e-mail já está sendo usado.');
			}
		} 

		$this->load->view('all/cadastro');
	}
}
