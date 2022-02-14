<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin_model');    
		$this->load->model('restaurante_model');   
		$this->load->model('location_model');    
	}

	public function index() {


		

		$data = array(

		);

		if ($this->input->post()) {
			
			$admin_email = $this->input->post('admin_email');
			$admin_password = $this->input->post('admin_password');

			$data = $this->admin_model->auth($admin_email, $admin_password);
			if ($data) {

				$this->session->set_userdata('session_admin', $data);

				redirect(base_url('admin/dashboard'));

			} else {
				$this->session->set_flashdata('login', 'Suas credentiais estão incorretas.');
			}
		}

		$this->load->view('admin/login');
	}

	public function logout() {
		$this->admin_model->routeAuth();
		$this->session->unset_userdata('session_admin');
		redirect(base_url('admin/'));
	}

	public function dashboard() {
		$this->admin_model->routeAuth();

		$data = array(

		);

		$this->load->view('admin/dashboard', $data);
	}

	public function termos() {
		$this->admin_model->routeAuth();

		if ($this->input->post()) {
			$titulo = $this->input->post('termos_titulo');
			$conteudo = $this->input->post('termos_conteudo');


			$this->admin_model->updateTermos($titulo,$conteudo);
		}

		$data = array(
			'termos' => $this->admin_model->getTermos(),
		);

		$this->load->view('admin/termos', $data);
	}

	public function privacidade() {
		$this->admin_model->routeAuth();

		if ($this->input->post()) {
			$titulo = $this->input->post('privacidade_titulo');
			$conteudo = $this->input->post('privacidade_conteudo');


			$this->admin_model->updatePrivacidade($titulo,$conteudo);
		}

		$data = array(
			'privacidade' => $this->admin_model->getPrivacidade(),
		);

		$this->load->view('admin/privacidade', $data);
	}

	public function categorias() {
		$this->admin_model->routeAuth();

		//Delete Categoria
		if ($this->input->post()) {

			if (null !== $this->input->post('delete_categoria')  ) {
				$id = htmlentities($this->input->post('categoria_id'));

				$this->admin_model->deleteCategoria($id);
			}

			if (null !== $this->input->post('add_imagem') )  {
				

				if(isset($_FILES['categoria_imagem'])) { 
				
				

					if (strlen($_FILES["categoria_imagem"]["name"]) > 0 ) {
						
						
						
						$upload_folder = "./assets/images/categorias/";
						$categoria_imagem = $_FILES["categoria_imagem"]["name"];
						$file_location = $upload_folder . $categoria_imagem;
	
						if(move_uploaded_file($_FILES['categoria_imagem']['tmp_name'], $file_location)){
							
						
						};
			
					} 
				}
			}

			if (null !== $this->input->post('add_categoria')  ) {
			
		

				$categoria_nome = $this->input->post('categoria_nome');
				$categoria_imagem = $this->input->post('categoria_imagem');

				$this->admin_model->insertCategoria($categoria_nome, $categoria_imagem);
			}
		}
		//Delete Categoria

		$data = array(
			'categorias' => $this->admin_model->getCategorias(),
		);

		$this->load->view('admin/categorias', $data);
	}


	public function cupons() {
		$this->admin_model->routeAuth();

		//Delete Categoria
		if ($this->input->post()) {

			if (null !== $this->input->post('delete_cupom')  ) {
				$id = htmlentities($this->input->post('cupom_id'));

				$this->admin_model->deleteCupom($id);
			}


			if (null !== $this->input->post('add_cupom')  ) {

				$cupom_codigo = htmlentities( $this->input->post('cupom_codigo'));
				$cupom_desconto = htmlentities($this->input->post('cupom_desconto'));
				$cupom_minimo = htmlentities($this->input->post('cupom_minimo'));

				$this->admin_model->insertCupom($cupom_codigo, $cupom_desconto, $cupom_minimo );
			}
		}
		//Delete Categoria

		$data = array(
			'cupons' => $this->admin_model->getCupons(),
		);

		$this->load->view('admin/cupons', $data);
	}

	public function ajuda() {

		$this->admin_model->routeAuth();
		$data = array(
			'faq' => $this->admin_model->getCategoriasFAQ(),
		);

		if ($this->input->post()) {

			if (null !== $this->input->post('add_artigo')) {
				$artigo_titulo = $this->input->post('artigo_titulo');
				$artigo_conteudo = $this->input->post('artigo_conteudo');
				$artigo_categoria = $this->input->post('artigo_categoria');

				$this->admin_model->addArtigo($artigo_categoria, $artigo_titulo, $artigo_conteudo);
			}

			if (null !== $this->input->post('add_categoria')) {
				$categoria_nome = $this->input->post('categoria_nome');
				
				
				$this->admin_model->addCategoria($categoria_nome);
			}

			if (null !== $this->input->post('delete_artigo')) {
				$artigo_id = $this->input->post('artigo_id');
				
				
				$this->admin_model->deleteArtigo($artigo_id);
			}

			if (null !== $this->input->post('delete_categoria')) {
				$categoria_id = $this->input->post('categoria_id');
				
				
				$this->admin_model->deleteCategoriaFAQ($categoria_id);
			}
		}

		$this->load->view('admin/faq', $data);
	}

	public function gerentes() {
		$this->admin_model->routeAuth();

		if ($this->input->post()) {

			if (null !== $this->input->post('delete_gerente')) {
				$id = $this->input->post('gerente_id');
				$this->admin_model->deleteGerente($id);
			}

			if (null !== $this->input->post('add_gerente')) {
			
				$nome = $this->input->post('nome');
				$sobrenome = $this->input->post('sobrenome');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
	
				$this->admin_model->insertGerentes($nome, $sobrenome, $email, $password);
			}


		}

		

		$data = array(
			'gerentes' => $this->admin_model->getGerentes(),
		);

		$this->load->view('admin/gerentes', $data);
	}

	public function restaurantes() {

		$this->admin_model->routeAuth();
		if (null !== $this->input->post('aprovar_restaurante')  ) {
			$id = htmlentities($this->input->post('restaurante_id'));

			$this->restaurante_model->updateStatus($id, '6');
		}

		if ($this->input->get()) {
			$cidade = $this->input->get('cidades');
			$estado = $this->input->get('estado');
			$nome = $this->input->get('nome');


			
			
			
			$data = array(
				'restaurantes' => $this->admin_model->searchRestaurante($cidade, $estado, $nome),
				'estados' => $this->location_model->getEstados(),
			);
		} else {
			
			$data = array(
				'restaurantes' => $this->admin_model->getRestaurantes(),
				'estados' => $this->location_model->getEstados(),
			);
		}


		$this->load->view('admin/restaurantes', $data);
	}

	public function usuarios() {

		$this->admin_model->routeAuth();

		$data = array(
			'usuarios' => $this->admin_model->getUsuarios(),
		);

		$this->load->view('admin/usuarios', $data);
	}

	public function pedidos() {

		$this->admin_model->routeAuth();

		$data = array(

		);
		$this->load->view('admin/pedidos');
	}

	public function vendas() {

		$this->admin_model->routeAuth();

		if ($this->input->get('pedido')) {
			$pedido = htmlentities($this->input->get('pedido'));

			$data = array(
				'vendas' => $this->admin_model->getVendasById($pedido),
			);

		} else {

			$data = array(
				'vendas' => $this->admin_model->getVendas(),
			);

		}

	

		$this->load->view('admin/vendas', $data);
	}

}
