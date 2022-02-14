<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurante extends CI_Controller {
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


		// if ($this->session->userdata('session_restaurante')) {
		// 	$current =  $this->restaurante_model->getRestauranteStatus($this->session->userdata('session_restaurante')['id']);
			
		// 	if ($current == "aprovado") {
		// 		redirect(base_url());
		// 	} else {
		// 		redirect(base_url('restaurante/'.$current));
		// 	}
		// }
		
	}

	public function index($slug = null)
	{
		$rest = $this->session->userdata('session_restaurante');
		
       
			$this->load->view('restaurante/home');
		
	}

	public function perfil($slug = null)
	{


		$this->restaurante_model->routeAuth();

		$rest = $this->session->userdata('session_restaurante');
		$usr = $this->session->userdata('session_user');
		
        $slug = htmlspecialchars($slug);
	
        if (strlen($slug) > 0 ) {
		
			//Verifica se o restaurante existe.
			if ($this->restaurante_model->existeRestaurante($slug)) {



				//add Produto Carrinho
				if ($this->input->post('add_produto_carrinho')) {

					$carrinho_user = $usr['id'];
					$carrinho_produto = $this->input->post('produto_id');
					$carrinho_restaurante = $this->input->post('produto_restaurante');
					$carrinho_valor = $this->input->post('produto_valor');
					$carrinho_quantidade = $this->input->post('produto_quantidade');
					$carrinho_acompanhamento = $this->input->post('produto_acompanhamento');

					$ac = explode('&', $carrinho_acompanhamento);



				

					//Verifica se ja existe produto
					if ($this->carrinho_model->existeProdutoCarrinho($carrinho_user, $carrinho_produto) ) {
					
						//Somando quantidade
						$nova_quantidade = $this->carrinho_model->getQuantidadeProdutoCarrinho($carrinho_user, $carrinho_produto);
						$this->carrinho_model->somaProdutoCarrinhoQuantidade($carrinho_user, $carrinho_produto, $carrinho_quantidade, $nova_quantidade);

						//Acompnhamento Carrinho
						foreach ($ac as $e) {
							
							$this->cardapio_model->addAcompanhamentoCarrinho($carrinho_user, $carrinho_produto, str_replace('acompanhamentos=', '', $e), $carrinho_restaurante);
						}

					} else {
				
					//Acompnhamento Carrinho
						$this->carrinho_model->insertProdutoCarrinho($carrinho_user, $carrinho_restaurante, $carrinho_produto, $carrinho_valor, $carrinho_quantidade);
						foreach ($ac as $e) {
							
							$this->cardapio_model->addAcompanhamentoCarrinho($carrinho_user, $carrinho_produto, str_replace('acompanhamentos=', '', $e), $carrinho_restaurante);
						}
					}


				}

				$data = array (
					'cardapios' => $this->cardapio_model->getCardapios($slug),
					'rest' => $this->restaurante_model->getRestaurante($slug),
				);
	
				$this->load->view('user/perfilRestaurante', $data);

			} else {
				redirect(base_url());
			}


        } else {
			$this->load->view('restaurante/home');
		}	
	}


	public function dashboard() {
		$this->restaurante_model->routeAuth();

		$this->load->view('restaurante/dashboard');
	}
	public function vendas(){

		$this->restaurante_model->routeAuth();

		$rest = $this->session->userdata('session_restaurante');

		if ($this->input->get('pedido')) {

			$pedido = htmlentities($this->input->get('pedido'));

			$data  = array(
				'vendas' => $this->pedido_model->searchPedidosByRestaurante( $pedido,$rest['id'] ),
			);

		} else {

			$data  = array(
				'vendas' => $this->restaurante_model->getVendas($rest['id']),
			);
	
		}

		
		$this->load->view('restaurante/vendas', $data);
	}
	
	public function detalhes() {
		$this->restaurante_model->routeAuth();

		if ($this->input->post()) {

			$pedido  = $this->input->post('pedido');
	
			
			$data = array (

				'pedido' => $this->pedido_model->getPedido($pedido),
				'produtos' => $this->pedido_model->getPedidoProdutos($pedido),
			);
			$this->load->view('restaurante/detalhes', $data);

		} else {

			redirect(base_url('restaurante/pedidos'));
		}

	}
	public function pedidos(){
		$this->restaurante_model->routeAuth();

		if (!null == $this->input->post('update_pedido')) {

		

			$pedido_restaurante = $this->input->post('pedido_restaurante');
			$pedido_status = $this->input->post('pedido_status');
			$pedido_id = $this->input->post('pedido_id');

			$this->pedido_model->updateStatusRestaurante($pedido_restaurante, $pedido_status, $pedido_id);

		}

		if ($this->input->get()) {
			$filtro = $this->input->get('filtro');
			$codigo = $this->input->get('codigo');

				//Andamento e Saiu para entrega 1 e 2.
			if ($filtro == "1") {
			
				$data  = array (
					'pedidos' =>  $this->restaurante_model->getPedidosAndamentoArray($this->session->userdata('session_restaurante')['id']),
				);

				//Canceladp
			} else if ($filtro == "3" ) {
		
				$data  = array (
					'pedidos' =>  $this->restaurante_model->getPedidosCanceladosArray($this->session->userdata('session_restaurante')['id']),
				);

				//concluido
			} else if ($filtro == "4" ) {
			
				$data  = array (
					'pedidos' => $this->restaurante_model->getPedidosConcluidosArray($this->session->userdata('session_restaurante')['id']),
				);

			} 
			
			
		

	
			
			if  ($codigo) {
			
				$data  = array (
					'pedidos' => $this->pedido_model->getPedidosByCodigo($this->session->userdata('session_restaurante')['id'], $codigo ),
				);
			}

		} else {

			$data  = array (
				'pedidos' => $this->pedido_model->getPedidosByRestaurante($this->session->userdata('session_restaurante')['id']),
			);
		}


		$this->load->view('restaurante/pedidos', $data);
	}


	public function registro () {


		if ($this->input->post()) {

	
			$restaurante_representante_nome = htmlspecialchars($this->input->post('restaurante_representante_nome'));
			$restaurante_representante_sobrenome = htmlspecialchars($this->input->post('restaurante_representante_sobrenome'));
			$restaurante_email = htmlspecialchars($this->input->post('restaurante_email'));
			$restaurante_representante_telefone = htmlspecialchars($this->input->post('restaurante_representante_telefone'));
			$restaurante_password = htmlspecialchars($this->input->post('restaurante_password'));
			$restaurante_password_confirm = htmlspecialchars($this->input->post('restaurante_password_confirm'));


			if ($this->restaurante_model->checkEmailRestaurante($restaurante_email)) {

				if ($restaurante_password == $restaurante_password_confirm) {

					if ($this->restaurante_model->insertRestaurante($restaurante_representante_nome, $restaurante_representante_sobrenome, $restaurante_representante_telefone, $restaurante_email, $restaurante_password)) {
							redirect('restaurante/informacoes');
					} 
	
				} else {

					$this->session->set_flashdata('response', 'Suas senhas não combinam.');
				}

			} else {

				$this->session->set_flashdata('response', 'Este e-mail já está sendo usado.');
			}

		}

		$this->load->view('restaurante/cadastro');
	}

	public function configuracoes() {

		$this->restaurante_model->routeAuth();
		$rest = $this->session->userdata('session_restaurante');

		if ($this->input->post()) {

			$new_name = "";

			if(isset($_FILES['restaurante_imagem'])) { 
				

				if (strlen($_FILES["restaurante_imagem"]["name"]) > 0 ) {
					
					$upload_folder = "./assets/images/avatars/";
					$new_name = mt_rand().$_FILES["restaurante_imagem"]["name"];
					$file_location = $upload_folder . $new_name;

					if(move_uploaded_file($_FILES['restaurante_imagem']['tmp_name'], $file_location)){
						
						//
					};
		
				}
			} 


			$restaurante_nome = htmlspecialchars($this->input->post('restaurante_nome'));
			$restaurante_imagem = $new_name;
			$restaurante_telefone = htmlspecialchars($this->input->post('restaurante_telefone'));
			$restaurante_endereco = htmlspecialchars($this->input->post('restaurante_endereco'));
			$restaurante_categoria = htmlspecialchars($this->input->post('restaurante_categoria'));
			$restaurante_preparo_medio = htmlspecialchars($this->input->post('restaurante_preparo_medio'));
			

			$restaurante_cidade = htmlspecialchars($this->input->post('restaurante_cidade'));
			$restaurante_estado = htmlspecialchars($this->input->post('restaurante_estado'));

		
		
			

			if ($this->restaurante_model->updateRestauranteConfiguracoes(
				$rest['id'],
				$restaurante_nome,
				$restaurante_imagem,
				$restaurante_telefone,
				$restaurante_endereco,
				$restaurante_categoria,
				$restaurante_preparo_medio,
				$restaurante_cidade,
				$restaurante_estado)
			) {

				
			}
		
		}


		// 
	

		$data = array (
			'estados' => $this->location_model->getEstados(),
			'categorias' => $this->restaurante_model->getCategorias(),
			'restaurante' => $this->restaurante_model->getRestaurante($rest['id']),

		);
		$this->load->view('restaurante/configuracoes', $data);
	}


	public function logout() {
		$this->session->unset_userdata('session_restaurante');
		redirect(base_url('restaurante/login'));
	}


	public function seguranca() {

		$this->restaurante_model->routeAuth();

		$rest = $this->session->userdata('session_restaurante');

		if ($this->input->post()) {
			$user_current_password = htmlentities($this->input->post('user_current_password'));
			$user_new_password = htmlentities($this->input->post('user_new_password'));
			$user_confirm_password = htmlentities($this->input->post('user_confirm_password'));

			if ($user_new_password == $user_confirm_password ) {
				if ($this->restaurante_model->checkPassword($rest['id'], $user_current_password)) {

					if ($this->restaurante_model->updatePassword($rest['id'], $user_new_password)) {
	
						$this->session->set_flashdata('response', 'Sua senha foi atualizada com sucesso.');
					} else {
						$this->session->set_flashdata('response', 'Erro ao atualizar sua senha.');
					}
	
				} else {
					$this->session->set_flashdata('response', 'Sua senha atual está incorreta.');
				}
			} else {
				$this->session->set_flashdata('response', 'Suas senhas não combinam.');
			}

		}


		$this->load->view('restaurante/seguranca');
	}

	public function getAcompanhamentos() {

	

		if ($this->input->post()) {

			
			$produto_id = $this->input->post('produto_id');

 			 echo '<form id="acompanhamentos"> ';
			if (count($this->cardapio_model->getAcompanhamentos($produto_id) ) > 0 ) {

				echo ' <p class="text-green font-semibold text-sm pt-3 mb-3">ACOMPANHAMENTOS</p>';

				foreach( $this->cardapio_model->getAcompanhamentos($produto_id) as $a) { 
				
					echo '<div class="bg-green flex  items-center w-full p-2 h-8">
							<h1 class="text-white text-left font-semibold ">'.$a->acompanhamento_nome.'</h1>
						</div>
						
						<div class="w-full  mb-3">
					';
		
				
					
					
							echo '<select name="acompanhamentos" class="flex border border-green justify-between bg-white w-full h-12 items-center">';
								foreach( $this->cardapio_model->getElementos($a->id) as $e) { 
										echo '<option value="'.$e->id.'">'.$e->elemento_nome.'</option>';
								}
							echo '</select>';		
					
						


					echo '</div>';
		
				}



			} else {
				
			}
			
		}


	}


	public function acompanhamentos() {

		$this->restaurante_model->routeAuth();

		if ($this->input->post()) {
			$produto = htmlentities($this->input->post('produto'));


			if ($this->input->post('add_acompanhamento')) {

				$acompanhamento_nome = $this->input->post('acompanhamento_nome');
				$acompanhamento_restaurante= $this->input->post('acompanhamento_restaurante');
				$acompanhamento_produto  = $this->input->post('acompanhamento_produto');

				$this->cardapio_model->addAcompanhamento($acompanhamento_nome,$acompanhamento_restaurante, $acompanhamento_produto); 
			}

			if ($this->input->post('add_elemento')) {

				$elemento_nome = $this->input->post('elemento_nome');
				$elemento_restaurante= $this->input->post('elemento_restaurante');
				$elemento_acompanhamento  = $this->input->post('elemento_acompanhamento');
				$elemento_produto  = $this->input->post('elemento_produto');

				$this->cardapio_model->addElemento($elemento_nome,$elemento_restaurante, $elemento_acompanhamento, $elemento_produto); 
			}

			if ($this->input->post('delete_acompanhamento')) {

				$acompanhamento_id = $this->input->post('acompanhamento_id');
				$this->cardapio_model->deleteAcompanhamento($acompanhamento_id); 
				$this->cardapio_model->deleteElementoByAcompanhamento($acompanhamento_id);
			}

			
			if ($this->input->post('delete_elemento')) {

				$elemento_id = $this->input->post('elemento_id');
				$this->cardapio_model->deleteElemento($elemento_id); 
			}



			$data = array (
				'produto' => $this->produtos_model->getProduto($produto),
				
			);
	
 
			$this->load->view('restaurante/acompanhamentos', $data);

		} else {
			redirect(base_url('restaurante/cardapio'));
		}
	}



	public function cardapio() {

		$this->restaurante_model->routeAuth();

		$rest = $this->session->userdata('session_restaurante');
		
		//Add Categoria
		if (!null == $this->input->post('cardapio_nome')) {
			
			$cardapio_nome = htmlspecialchars($this->input->post('cardapio_nome'));
			$this->cardapio_model->insertCardapio($cardapio_nome, $rest['id']);
		}

		//Delete Categoria
		if (!null == $this->input->post('delete_produto')) {
			
			$produto_id = htmlspecialchars($this->input->post('produto_id'));
			$restaurante_id = htmlspecialchars($this->input->post('restaurante_id'));
			$this->produtos_model->deleteProduto($produto_id, $restaurante_id);
		}

		if (!null == $this->input->post('add_imagem')) {

			$produto_imagem = "";

			if(isset($_FILES['produto_imagem'])) { 
				

				if (strlen($_FILES["produto_imagem"]["name"]) > 0 ) {
					
					$upload_folder = "./assets/images/produtos/";
					$produto_imagem = $rest['id'].$_FILES["produto_imagem"]["name"];
					$file_location = $upload_folder . $produto_imagem;

					if(move_uploaded_file($_FILES['produto_imagem']['tmp_name'], $file_location)){
						
						//
					};
		
				} 
			}
		}
		//Add Produto
		if (!null == $this->input->post('add_produto')) {

		


			
			$produto_nome = htmlspecialchars($this->input->post('produto_nome'));
			$produto_descricao = htmlspecialchars($this->input->post('produto_descricao'));
			$produto_restaurante = htmlspecialchars($this->input->post('produto_restaurante'));
			$produto_valor = htmlspecialchars($this->input->post('produto_valor'));
			$produto_imagem = htmlspecialchars($this->input->post('produto_imagem'));
			$produto_categoria = htmlspecialchars($this->input->post('produto_categoria'));
			$produto_desconto = htmlspecialchars($this->input->post('produto_desconto'));
			$produto_desconto_tipo = htmlspecialchars($this->input->post('produto_desconto_tipo'));
			$produto_desconto_habilitado = htmlspecialchars($this->input->post('produto_desconto_habilitado'));
			$produto_cidade = $this->session->userdata('session_restaurante')['restaurante_cidade'];
		
		
			$this->produtos_model->insertProduto(
				$produto_nome,
				$produto_restaurante,
				$produto_descricao,
				$produto_categoria,
				$produto_imagem,
				$produto_valor,
				$produto_desconto_habilitado,
				$produto_desconto,
				$produto_desconto_tipo,
				$produto_cidade
				);
		}


		//Delete Catgoria
		if (!null == $this->input->post('delete_categoria')) {
			
			$cardapio_nome = htmlspecialchars($this->input->post('delete_categoria'));
			$this->cardapio_model->deleteCardapio($cardapio_nome, $rest['id']);
		}

		$this->load->view('restaurante/cardapio');
	}

	public function login () {

		if ($this->input->post()) {

			$user_email = htmlspecialchars($this->input->post('restaurante_email'));
			$user_password = htmlspecialchars($this->input->post('restaurante_password'));

			$auth = $this->restaurante_model->Login($user_email, $user_password); 

			if ($auth) {
				$this->session->set_userdata('session_restaurante', $auth);
				
				if ($this->restaurante_model->getStatus($this->session->userdata('session_restaurante')['id']) == 1 ) {
					redirect('restaurante/informacoes');
				} else  if ($this->restaurante_model->getStatus($this->session->userdata('session_restaurante')['id']) == 2 ) {
					redirect('restaurante/documentos');
				} else  if ($this->restaurante_model->getStatus($this->session->userdata('session_restaurante')['id']) == 3 ) {
					redirect('restaurante/funcionamento');
				}else  if ($this->restaurante_model->getStatus($this->session->userdata('session_restaurante')['id']) == 4) {
					redirect('restaurante/modelo');
				}else  if ($this->restaurante_model->getStatus($this->session->userdata('session_restaurante')['id']) == 5) {
					redirect('restaurante/status');
				} else  if ($this->restaurante_model->getStatus($this->session->userdata('session_restaurante')['id']) == 6) {
					redirect('restaurante/dashboard');
				}
			} else {
				$this->session->set_flashdata('login','Suas credenciais estão incorretas.');
			}
			


		}

		$this->load->view('restaurante/login');
	}


	


	public function modelo() 
	{
		$rest = $this->session->userdata('session_restaurante');

		$this->restaurante_model->routeAuth();

		if ($this->input->post()) {

			$restaurnate_modelo = htmlspecialchars($this->input->post('restaurante_modelo'));
			
			$this->restaurante_model->updateModelo($rest['id'], $restaurnate_modelo);


			if ($this->restaurante_model->updateStatus($rest['id'], '5')) 
			{
				redirect(base_url('restaurante/status'));
			} 
		}

		$this->load->view('restaurante/inscricao/modelo');

	}

	public function status() 
	{

		if ($this->input->post()) {

			$restaurante_nome = htmlspecialchars($this->input->post('restaurante_nome'));
			$restaurante_imagem = htmlspecialchars($this->input->post('restaurante_imagem'));
			$restaurante_telefone = htmlspecialchars($this->input->post('restaurante_telefone'));
			$restaurante_endereco = htmlspecialchars($this->input->post('restaurante_endereco'));
			$restaurante_categoria = htmlspecialchars($this->input->post('restaurante_categoria'));
			$restaurante_preparo_medio = htmlspecialchars($this->input->post('restaurante_preparo_medio'));
			$restaurante_cnpj = htmlspecialchars($this->input->post('restaurante_cnpj'));
			$restaurante_razao_social = htmlspecialchars($this->input->post('restaurante_razao_social'));

			$restaurante_representante_nome = htmlspecialchars($this->input->post('restaurante_representante_nome'));
			$restaurante_representante_sobrenome = htmlspecialchars($this->input->post('restaurante_representante_sobrenome'));
			$restaurante_representante_cpf = htmlspecialchars($this->input->post('restaurante_representante_cpf'));
		}

		$this->load->view('restaurante/inscricao/status');

	}

	public function horarios() 
	{

		$this->restaurante_model->routeAuth();
        $rest = $this->session->userdata('session_restaurante');
		if ($this->input->post()) {

			$funcionamento_seg_sex_abertura	 = htmlspecialchars($this->input->post('funcionamento_seg_sex_abertura'));
			$funcionamento_seg_sex_fechamento = htmlspecialchars($this->input->post('funcionamento_seg_sex_fechamento'));
			$funcionamento_sab_abertura = htmlspecialchars($this->input->post('funcionamento_sab_abertura'));
			$funcionamento_sab_fechamento = htmlspecialchars($this->input->post('funcionamento_sab_fechamento'));
			$funcionamento_dom_abertura = htmlspecialchars($this->input->post('funcionamento_dom_abertura'));
			$funcionamento_dom_fechamento = htmlspecialchars($this->input->post('funcionamento_dom_fechamento'));
			$funcionamento_feriado_abertura = htmlspecialchars($this->input->post('funcionamento_feriado_abertura'));
			$funcionamento_feriado_fechamento = htmlspecialchars($this->input->post('funcionamento_feriado_fechamento'));

			if ($this->restaurante_model->updateRestauranteFuncionamento(
				$rest['id'],
				$funcionamento_seg_sex_abertura,
				$funcionamento_seg_sex_fechamento,
				$funcionamento_sab_abertura,
				$funcionamento_sab_fechamento,
				$funcionamento_dom_abertura,
				$funcionamento_dom_fechamento,
				$funcionamento_feriado_abertura,
				$funcionamento_feriado_fechamento
			)) {

			
			}
		}

		
		$data = array (
			'f' => $this->restaurante_model->getHorarios($rest['id']),

		);

		$this->load->view('restaurante/horarios', $data);

	}

	public function funcionamento() 
	{

		$this->restaurante_model->routeAuth();
        $rest = $this->session->userdata('session_restaurante');
		if ($this->input->post()) {

			$funcionamento_seg_sex_abertura	 = htmlspecialchars($this->input->post('funcionamento_seg_sex_abertura'));
			$funcionamento_seg_sex_fechamento = htmlspecialchars($this->input->post('funcionamento_seg_sex_fechamento'));
			$funcionamento_sab_abertura = htmlspecialchars($this->input->post('funcionamento_sab_abertura'));
			$funcionamento_sab_fechamento = htmlspecialchars($this->input->post('funcionamento_sab_fechamento'));
			$funcionamento_dom_abertura = htmlspecialchars($this->input->post('funcionamento_dom_abertura'));
			$funcionamento_dom_fechamento = htmlspecialchars($this->input->post('funcionamento_dom_fechamento'));
			$funcionamento_feriado_abertura = htmlspecialchars($this->input->post('funcionamento_feriado_abertura'));
			$funcionamento_feriado_fechamento = htmlspecialchars($this->input->post('funcionamento_feriado_fechamento'));

			if ($this->restaurante_model->insertRestauranteFuncionamento(
				$rest['id'],
				$funcionamento_seg_sex_abertura,
				$funcionamento_seg_sex_fechamento,
				$funcionamento_sab_abertura,
				$funcionamento_sab_fechamento,
				$funcionamento_dom_abertura,
				$funcionamento_dom_fechamento,
				$funcionamento_feriado_abertura,
				$funcionamento_feriado_fechamento
			)) {

				if ($this->restaurante_model->updateStatus($rest['id'], '4')) 
				{
					redirect(base_url('restaurante/modelo'));
				}
			}
		}

		$this->load->view('restaurante/inscricao/funcionamento');

	}

	public function documentos() 
	{ 

		$this->restaurante_model->routeAuth();
		$rest = $this->session->userdata('session_restaurante');

  		// if ($this->input->post()) {

		
			$restaurante_contrato_social = "";
			$restaurante_alvara_bombeiros = "";
			$restaurante_alvara_sanitaria = "";

			if(isset($_FILES['restaurante_contrato_social'])) { 
				

				if (strlen($_FILES["restaurante_contrato_social"]["name"]) > 0 ) {
					
					$upload_folder = "./assets/images/documentos/";
					$restaurante_contrato_social = mt_rand().$_FILES["restaurante_contrato_social"]["name"];
					$file_location = $upload_folder . $restaurante_contrato_social;

					if(move_uploaded_file($_FILES['restaurante_contrato_social']['tmp_name'], $file_location)){
						
						//
					};
		
				} 

				if (strlen($_FILES["restaurante_alvara_bombeiros"]["name"]) > 0 ) {
					
					$upload_folder = "./assets/images/documentos/";
					$restaurante_alvara_bombeiros = mt_rand().$_FILES["restaurante_alvara_bombeiros"]["name"];
					$file_location = $upload_folder . $restaurante_alvara_bombeiros;

					if(move_uploaded_file($_FILES['restaurante_alvara_bombeiros']['tmp_name'], $file_location)){
						
						//
					};
				}

				if (strlen($_FILES["restaurante_alvara_sanitaria"]["name"]) > 0 ) {
					
					$upload_folder = "./assets/images/documentos/";
					$restaurante_alvara_sanitaria = mt_rand().$_FILES["restaurante_alvara_sanitaria"]["name"];
					$file_location = $upload_folder . $restaurante_alvara_sanitaria;

					if(move_uploaded_file($_FILES['restaurante_alvara_sanitaria']['tmp_name'], $file_location)){
						
						//
					};
				}

				if ($this->restaurante_model->updateRestauranteDocumentos(
					$rest['id'], 
					$restaurante_contrato_social, 
					$restaurante_alvara_bombeiros, 
					$restaurante_alvara_sanitaria)
					)
					{
	
					if ($this->restaurante_model->updateStatus($rest['id'], '3')) 
					{
						redirect(base_url('restaurante/funcionamento'));
					} 
	
				} 

			}  

		$this->load->view('restaurante/inscricao/documentos');

	}


	public function getCidades() {

		if ($this->input->post()) {

			$estado = $this->input->post('estado');
			$cidades = $this->location_model->getCidades($estado);

			foreach ($cidades as $c) {
				echo '<option value="'.$c->Nome.'" >'.$c->Nome.'</option>';
			}
		}
	}

	public function informacoes() 
	{


		$this->restaurante_model->routeAuth();
		$rest = $this->session->userdata('session_restaurante');

		if ($this->input->post()) {

			$new_name = "";

			if(isset($_FILES['restaurante_imagem'])) { 
				

				if (strlen($_FILES["restaurante_imagem"]["name"]) > 0 ) {
					
					$upload_folder = "./assets/images/avatars/";
					$new_name = mt_rand().$_FILES["restaurante_imagem"]["name"];
					$file_location = $upload_folder . $new_name;

					if(move_uploaded_file($_FILES['restaurante_imagem']['tmp_name'], $file_location)){
						
						//
					};
		
				}
			} 


			$restaurante_nome = htmlspecialchars($this->input->post('restaurante_nome'));
			$restaurante_imagem = $new_name;
			$restaurante_telefone = htmlspecialchars($this->input->post('restaurante_telefone'));
			$restaurante_endereco = htmlspecialchars($this->input->post('restaurante_endereco'));
			$restaurante_categoria = htmlspecialchars($this->input->post('restaurante_categoria'));
			$restaurante_preparo_medio = htmlspecialchars($this->input->post('restaurante_preparo_medio'));
			$restaurante_cnpj = htmlspecialchars($this->input->post('restaurante_cnpj'));
			$restaurante_razao_social = htmlspecialchars($this->input->post('restaurante_razao_social'));

			$restaurante_cidade = htmlspecialchars($this->input->post('restaurante_cidade'));
			$restaurante_estado = htmlspecialchars($this->input->post('restaurante_estado'));

			$restaurante_representante_nome = htmlspecialchars($this->input->post('restaurante_representante_nome'));
			$restaurante_representante_sobrenome = htmlspecialchars($this->input->post('restaurante_representante_sobrenome'));
			$restaurante_representante_cpf = htmlspecialchars($this->input->post('restaurante_representante_cpf'));
		
			

			if ($this->restaurante_model->updateRestauranteInformacoes(
				$rest['id'],
				$restaurante_nome,
				$restaurante_imagem,
				$restaurante_telefone,
				$restaurante_endereco,
				$restaurante_categoria,
				$restaurante_preparo_medio,
				$restaurante_cnpj,
				$restaurante_razao_social,
				$restaurante_representante_nome,
				$restaurante_representante_sobrenome,
				$restaurante_representante_cpf,
				$restaurante_cidade,
				$restaurante_estado)
			) {

				if ($this->restaurante_model->updateStatus($rest['id'], '2')) 
				{
					redirect(base_url('restaurante/documentos'));
				}
			}
		
		}

		$data = array (
			'estados' => $this->location_model->getEstados(),
			'categorias' => $this->restaurante_model->getCategorias(),
		);

		$this->load->view('restaurante/inscricao/informacoes', $data);

	}
}
