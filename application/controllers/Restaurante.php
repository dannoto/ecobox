<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurante extends CI_Controller {


	public function index($slug = null)
	{

        $slug = htmlspecialchars($slug);


        if (strlen($slug) > 0 ) {

			$this->load->view('user/restaurante');
        } else {
			$this->load->view('restaurante/home');
		}	
	}


	public function registro () {
		$this->load->view('restaurante/cadastro');
	}

	public function login () {
		$this->load->view('restaurante/login');
	}
}
