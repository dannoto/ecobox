<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscricao extends CI_Controller {
	function __construct() {

		parent::__construct();

		$this->load->model('cadastro_model');
		$this->load->model('auth_model');
		
	}

  

    public function informacoes() {

        $this->load->view('restaurante/inscricao/informacoes');
    }

    public function documentacao() {
        $this->load->view('restaurante/inscricao/documentacao');
    }

    public function modelo() {
        $this->load->view('restaurante/inscricao/modelo');
    }

    public function funcionamento() {
        $this->load->view('restaurante/inscricao/funcionamento');
    }
    public function status() {
        $this->load->view('restaurante/inscricao/status');
    }
}


