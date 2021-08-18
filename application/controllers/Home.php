<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// Halaman beranda
	public function index()
	{
		$this->load->view('front/splash', NULL);	
	}



}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */