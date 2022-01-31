<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {
	function __construct() {

		parent::__construct();

	
		$this->load->model('auth_model');
		$this->load->model('perfil_model');
		$this->load->model('ajuda_model');
		$this->load->model('carrinho_model');
		
	}

	public function index($artigo = null)
	{
		if (strlen($artigo) > 0 ) {

			if ($this->ajuda_model->existeArtigo($artigo)) {

				$data = array (
					'artigo' => $this->ajuda_model->getArtigo($artigo),
				);

				$this->load->view('all/faq_artigo', $data);

			} else {
				redirect(base_url('faq'));
			}

		} else {

			$data = array (
				'categorias' => $this->ajuda_model->getCategorias(),
			);

			$this->load->view('all/faq', $data);

		}


		
		
	}
}
