<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {
	function __construct() {

		parent::__construct();

	
		$this->load->model('auth_model');
		$this->load->model('perfil_model');
		$this->load->model('ajuda_model');
        $this->load->model('carrinho_model');
		$this->load->model('restaurante_model');
		$this->load->model('produtos_model');
        $this->load->model('categorias_model');
        $this->load->model('location_model');
		
	}
	public function index($slug = null)
	{
        if (strlen($slug) > 0 ) {

            if ($this->categorias_model->existeCategoria($slug)) {

                //Get Cidade
                if (isset($_COOKIE['cidade'])) {
                    $cidade = $_COOKIE['cidade'];
                } else {
                    $cidade = "";
                }


                //Get Data
                $data = array (
                    'restaurantes' => $this->restaurante_model->searchRestaurantesByCategoria($slug, $cidade),
                    'produtos' => $this->restaurante_model->searchProdutosByCategoria($slug, $cidade),
                    'categoria_nome' => $this->categorias_model->getCategoria($slug)['cat_nome'],
                    'cidade' => $cidade,
                    'estados' => $this->location_model->getEstados(),
                );


                //Get Location
                if ( !isset($_COOKIE['setLocation']) || $_COOKIE['setLocation'] == "false" ) { 

                    $this->load->view('all/categorias_off', $data);
                
                } else {
                    
                    $this->load->view('all/categorias', $data);
                }

                

            } else {
                redirect(base_url());
            }

        } else {
            redirect(base_url());
        }

		
	}
}
