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
		$rest = $this->session->userdata('session_restaurante');
		
        $slug = htmlspecialchars($slug);
	
        if (strlen($slug) > 0 ) {
		
			if ($this->restaurante_model->existeRestaurante($slug)) {

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
		$this->load->view('restaurante/dashboard');
	}
	public function vendas(){
		$this->load->view('restaurante/vendas');
	}
	

	public function pedidos(){
		$this->load->view('restaurante/pedidos');
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

	public function cardapio() {

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

		//Add Produto
		if (!null == $this->input->post('add_produto')) {

			$produto_imagem = "";

			if(isset($_FILES['produto_imagem'])) { 
				

				if (strlen($_FILES["produto_imagem"]["name"]) > 0 ) {
					
					$upload_folder = "./assets/images/produtos/";
					$produto_imagem = mt_rand().$_FILES["produto_imagem"]["name"];
					$file_location = $upload_folder . $produto_imagem;

					if(move_uploaded_file($_FILES['produto_imagem']['tmp_name'], $file_location)){
						
						//
					};
		
				} 
			}


			
			$produto_nome = htmlspecialchars($this->input->post('produto_nome'));
			$produto_descricao = htmlspecialchars($this->input->post('produto_descricao'));
			$produto_restaurante = htmlspecialchars($this->input->post('produto_restaurante'));
			$produto_valor = htmlspecialchars($this->input->post('produto_valor'));
			$produto_imagem = $produto_imagem;
			$produto_categoria = htmlspecialchars($this->input->post('produto_categoria'));
			$produto_desconto = htmlspecialchars($this->input->post('produto_desconto'));
			$produto_desconto_tipo = htmlspecialchars($this->input->post('produto_desconto_tipo'));
			$produto_desconto_habilitado = htmlspecialchars($this->input->post('produto_desconto_habilitado'));
		
			$this->produtos_model->insertProduto(
				$produto_nome,
				$produto_restaurante,
				$produto_descricao,
				$produto_categoria,
				$produto_imagem,
				$produto_valor,
				$produto_desconto_habilitado,
				$produto_desconto,
				$produto_desconto_tipo);
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
				redirect(base_url('restaurante/informacoes'));
			} else {
				$this->session->set_flashdata('login','Suas credenciais estão incorretas.');
			}
			


		}

		$this->load->view('restaurante/login');
	}


	


	public function modelo() 
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

	

	public function funcionamento() 
	{
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

				if ($this->restaurante_model->updateStatus($rest['id'], 'modelo')) 
				{
					redirect(base_url('restaurante/modelo'));
				}
			}
		}

		$this->load->view('restaurante/inscricao/funcionamento');

	}

	public function documentos() 
	{ 
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
	
					if ($this->restaurante_model->updateStatus($rest['id'], 'funcionamento')) 
					{
						redirect(base_url('restaurante/funcionamento'));
					} 
	
				} 

			}  
			

			


		// }else {
		// 	echo "iii";
		// }

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

				if ($this->restaurante_model->updateStatus($rest['id'], 'documentos')) 
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
