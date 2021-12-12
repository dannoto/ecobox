<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recuperacao extends CI_Controller {

	function __construct() {

		parent::__construct();

		$this->load->model('recuperacao_model');
		$this->load->model('auth_model');
		
	}

	public function index()
	{
		$this->load->view('user/recuperacao');
	}
}
