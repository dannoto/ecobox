<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redefinicao extends CI_Controller {
	function __construct() {

		parent::__construct();

		$this->load->model('auth_model');
		$this->load->model('perfil_model');
		$this->load->model('restaurante_model');
		$this->load->model('location_model');
		$this->load->model('cardapio_model');
		$this->load->model('produtos_model');
		$this->load->model('carrinho_model');
		$this->load->model('pedido_model');
		$this->load->model('recuperacao_model');
		$this->load->model('cadastro_model');
		$this->load->model('email_model');
		
	}

	

    public function index() {

        if  ($this->input->get()) {

            $token = htmlentities($this->input->get('token'));
            $email = htmlentities($this->input->get('email'));

            $user_token = $this->recuperacao_model->getToken($email); 

            if ($token == $user_token ) {

                if ($this->input->post()) {

                
                    $nova_senha =  $this->input->post('new_password');
                    $confirmacao_senha = $this->input->post('confirm_password');



                        if ($nova_senha == $confirmacao_senha) {

                            if ($this->recuperacao_model->updatePasswordUsuario($email, $nova_senha))  {
                                redirect(base_url('restaurante/login'));	
                            }

                        } else {

                            $this->session->set_flashdata('recuperacao','Suas senhas não combinam.');

                        }




                }

                $this->load->view('all/redefinicao');

            } else {
                redirect(base_url('login'));	
            }
        } else {
            redirect(base_url('login'));	
        }


    }


}