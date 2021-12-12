<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurante extends CI_Controller {


	public function index($slug)
	{

        $slug = htmlspecialchars($slug);


        if (strlen($slug) > 0 ) {

            
        }



		$this->load->view('user/restaurante');
	}
}
