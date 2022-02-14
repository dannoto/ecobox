<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	function __construct() {

		parent::__construct();

	
		$this->load->model('auth_model');
		$this->load->model('perfil_model');
		$this->load->model('ajuda_model');
        $this->load->model('carrinho_model');
		$this->load->model('restaurante_model');
		$this->load->model('produtos_model');
		$this->load->model('location_model');
		$this->load->model('pedido_model');
		$this->load->model('cupom_model');
		$this->load->model('cardapio_model');
		
	}
	public function index()
	{

		$this->perfil_model->autenticateUser();
		
		$cupom = "";

		if (!null == $this->input->post("delete_carrinho_produto")) {

			$carrinho_produto = $this->input->post("carrinho_produto");
			$this->carrinho_model->deleteProduto($carrinho_produto);
		}

		if (!null == $this->input->get("cupom")) {

			$cupom = $this->input->get("cupom");
			
		}

		if (!null == $this->input->post('add_pedidos')) {

			$pedido_restaurante = $this->input->post('pedido_restaurante');
			$pedido_pagamento = $this->input->post('pedido_pagamento');
			$pedido_user = $this->input->post('pedido_user');
			$pedido_total = $this->input->post('pedido_total');
			$pedido_desconto = $this->input->post('pedido_desconto');
			$pedido_cupom = $this->input->post('pedido_cupom');
			$pedido_endereco = $this->input->post('pedido_endereco');
			$pedido_observacoes = $this->input->post('pedido_observacoes');
			$pedido_frete = $this->input->post('pedido_frete');
			$pedido_troco = $this->input->post('pedido_troco');
			$pedido_cep = $this->input->post('pedido_cep');
			$pedido_estado = $this->input->post('pedido_estado');
			$pedido_cidade = $this->input->post('pedido_cidade');


			$id_pedido = $this->pedido_model->addPedido(
				$pedido_restaurante,
				$pedido_pagamento,
				$pedido_user,
				$pedido_total,
				$pedido_desconto,
				$pedido_cupom,
				$pedido_endereco,
				$pedido_observacoes,
				$pedido_frete,
				$pedido_troco,
				$pedido_cep,
				$pedido_cidade,
				$pedido_estado);
		
				//Carrinho Produtos to Pedidos Produtos
			foreach ($this->carrinho_model->getCarrinhoUser( $pedido_user) as $p) {

				$this->pedido_model->addPedidoProdutos($id_pedido, $pedido_user,$p->carrinho_produto, $p->carrinho_quantidade);

			}

			// Carrinho acompnhamento to Pedidos Acompanhamentos
			foreach ($this->carrinho_model->getCarrinhoAcompanhamento($pedido_user) as $a) {

				$this->pedido_model->addPedidoAcompanhamento($id_pedido,$a->acompanhamento_user, $a->acompanhamento_restaurante, $a->acompanhamento_produto, $a->acompanhamento_nome);

			}
					$this->carrinho_model->deleteCarrinho($pedido_user, $pedido_restaurante);
					$this->cardapio_model->deleteAcompanhamentoCarrinho($pedido_user);
		

		}


		if (!null == $this->input->post("restaurante_pedido")) {

			// $carrinho_produto = $this->input->post("carrinho_produto");
			// $this->carrinho_model->deleteProduto($carrinho_produto);
  
		
		} else {

			redirect(base_url('carrinho'));
		}

		$data = array (
			'estados' => $this->location_model->getEstados(),
		);
		
		$this->load->view('user/checkout',$data);
	}
}
