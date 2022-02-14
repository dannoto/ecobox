<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informacoes extends CI_Controller {
	
	function __construct() {

		parent::__construct();

	
		$this->load->model('auth_model');
		$this->load->model('perfil_model');
		$this->load->model('carrinho_model');
		
	}



	public function index()
	{


		$this->perfil_model->autenticateUser();

		$usr = $this->session->userdata('session_user');


		if ($this->input->post()) {


			$new_name = "";

			if(isset($_FILES['user_imagem'])) { 
				

				if (strlen($_FILES["user_imagem"]["name"]) > 0 ) {
					
					$upload_folder = "./assets/images/avatars/";
					$new_name = mt_rand().$_FILES["user_imagem"]["name"];
					$file_location = $upload_folder . $new_name;

					if(move_uploaded_file($_FILES['user_imagem']['tmp_name'], $file_location)){
						
						//
					};
		
				}
			} 

			$user_imagem =  $new_name;

			$user_nome =  htmlspecialchars($this->input->post('user_nome'));
			$user_sobrenome = htmlspecialchars($this->input->post('user_sobrenome'));
			$user_telefone = htmlspecialchars($this->input->post('user_telefone'));
			$user_identidade = htmlspecialchars($this->input->post('user_identidade'));
			$user_nascimento = htmlspecialchars($this->input->post('user_nascimento'));

			if ( null !== $this->input->post('user_sexo_masculino')  ) {
				$user_sexo = 1;
			} else if (  !null == $this->input->post('user_sexo_feminino')  ) {
				$user_sexo = 2;
			} else {
				$user_sexo = 0;
			}
 

			if ($this->perfil_model->updateInformacoes($usr['id'], $user_nome, $user_sobrenome,  $user_telefone, $user_identidade, $user_nascimento, $user_sexo, $user_imagem )) {
					//
			} 

		
		}



		$data = array(
			"user" => $this->perfil_model->getPerfil($usr['id'])
		);

		$this->load->view('user/perfil/informacoes', $data);
	}
}
