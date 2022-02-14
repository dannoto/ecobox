<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {
	function __construct() {

		parent::__construct();

	
		$this->load->model('auth_model');
		$this->load->model('perfil_model');
		$this->load->model('ajuda_model');
        $this->load->model('carrinho_model');
		$this->load->model('restaurante_model');
		$this->load->model('produtos_model');
        $this->load->model('pedido_model');

		
	}
	public function index()
	{   

		$this->perfil_model->autenticateUser();
        $pedido_user = $this->session->userdata('session_user');

        if (!null == $this->input->post('update_status')) {

            $pedido_status = $this->input->post('pedido_status');
            $pedido_id = $this->input->post('pedido_id');

            $this->pedido_model->updateStatus($pedido_user['id'], $pedido_status, $pedido_id);

        }
 
		$this->load->view('user/perfil/pedidos');
	}
}
