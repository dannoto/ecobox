<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq_Artigo extends CI_Controller {


	public function index()
	{
		$this->load->view('all/faq_artigo');
		$this->load->model('carrinho_model');
	}
}
