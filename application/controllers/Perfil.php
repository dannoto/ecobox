<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

// class Perfil extends CI_Controller {

	// function __construct() {

	// 	parent::__construct();

	// 	$this->load->model('perfil_model');
    //     $this->load->model('cadastro_model');
    //     $this->load->model('pedido_model');
    //     $this->load->model('cupom_model');
	// 	$this->load->model('auth_model');
		
	// }

	// public function informacoes()
	// {

    //     $usr = $this->session->userdata('session_user');

	// 	if ($this->input->post()) {

	// 		$user_nome = htmlspecialchars($this->input->post('user_nome'));
	// 		$user_sobrenome = htmlspecialchars($this->input->post('user_sobrenome'));
    //         $user_email = htmlspecialchars($this->input->post('user_email'));
    //         $user_telefone = htmlspecialchars($this->input->post('user_telefone'));
    //         $user_identidade =  htmlspecialchars($this->input->post('user_identidade'));
    //         $user_nascimento =  htmlspecialchars($this->input->post('user_nascimento'));
    //         $user_genero =  htmlspecialchars($this->input->post('user_genero'));


    //         if ($this->cadastro_model->checkEmail($user_email)) {

    //             if ($this->perfil_model->updateInformacoes($usr['id'], $user_nome, $user_sobrenome, $user_email, $user_telefone, $user_identidade, $user_nascimento, $user_genero )) {
    //                 $this->session->set_flashdata('update_informacoes','Atualizado com sucesso.');
    //             } else {
    //                 $this->session->set_flashdata('update_informacoes','Ocorreu um erro ao atualizar.');
    //             }
                    
    //         } else {
    //             $this->session->set_flashdata('update_informacoes','Este e-mail já está sendo utilizado.');
    //         }

			
	// 	}

    //     $data = array(
    //         'usr' => $this->perfil_model->getPerfil($usr['id']),
    //     );
      

	// 	$this->load->view('user/perfil/informacoes', $data);
	// }


    // public function seguranca()
	// {

    //     $usr = $this->session->userdata('session_user');

	// 	if ($this->input->post()) {

	// 		$old_password = htmlspecialchars($this->input->post('old_password'));
	// 		$new_password = htmlspecialchars($this->input->post('new_password'));
    //         $new_password_confirm = htmlspecialchars($this->input->post('new_password_confirm'));
     


    //         if (md5($old_password) == $usr['user_password']) {

    //             if ($new_password == $new_password_confirm) {

    //                 if ($this->perfil_model->updateSeguranca($usr['id'], $old_password, $new_password)) {
    //                     $this->session->set_flashdata('update_informacoes','Atualizado com sucesso.');
    //                 } else {
    //                     $this->session->set_flashdata('update_informacoes','Ocorreu um erro ao atualizar.');
    //                 }
                        
    //             } else {
    //                 $this->session->set_flashdata('update_informacoes','Suas senhas não combinam.');
    //             }
    //         } else {
    //             $this->session->set_flashdata('update_informacoes','Sua senha atual está incorreta.');
    //         }

			
	// 	}

    //     $data = array(
    //         'usr' => $this->perfil_model->getPerfil($usr['id']),
    //     );
      

	// 	$this->load->view('user/perfil/seguranca', $data);
	// }


    // public function pedidos()
	// {

    //     $usr = $this->session->userdata('session_user');

		
    //     $data = array(
    //         'usr' => $this->perfil_model->getPerfil($usr['id']),
    //         'pedidos' => $this->pedido_model->getPedidosByUser($usr['id']),
    //     );
      

	// 	$this->load->view('user/perfil/pedidos', $data);
	// }

    
    // public function cupons()
	// {

    //     $usr = $this->session->userdata('session_user');

		
    //     $data = array(
    //         'usr' => $this->perfil_model->getPerfil($usr['id']),
    //         'cupons' => $this->cupom_model->getCuponsByUser($usr['id']),
    //     );
      

	// 	$this->load->view('user/perfil/cupons', $data);
	// }

    // public function ajuda()
	// {

    //     $usr = $this->session->userdata('session_user');

		
    //     $data = array(
    //         'usr' => $this->perfil_model->getPerfil($usr['id']),
    //         'pedidos' => $this->pedido_model->getPedidosByUser($usr['id']),
    //     );
      

	// 	$this->load->view('user/perfil/ajuda', $data);
	// }



}
