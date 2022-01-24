<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
	function __construct() {

		parent::__construct();

		$this->load->model('cadastro_model');
		$this->load->model('auth_model');
		
	}

	public function index()
	{

		$this->session->unset_userdata('session_user');
        redirect(base_url('login'));
	}
}
