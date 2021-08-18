<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cara_pendaftaran extends CI_Controller {

	public function index()
	{
		$animasi = $this->Animasi_model->get_animasi()[0];
		
		$data['title'] = 'Cara Pendaftaran';
		$data['content'] = $this->load->view('front/cara_pendaftaran', compact('animasi'), TRUE);
		$this->load->view('front/template', $data);	
	}

}

/* End of file Cara_pendaftaran.php */
/* Location: ./application/controllers/Cara_pendaftaran.php */