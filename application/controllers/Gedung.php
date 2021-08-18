<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gedung extends CI_Controller {

	public function index()
	{
		$gedung = $this->Gedung_model->get_gedung();
		
		$data['title'] = 'Data Gedung';
		$data['content'] = $this->load->view('front/gedung', compact('gedung'), TRUE);
		$this->load->view('front/template', $data);	
	}

}

/* End of file Gedung.php */
/* Location: ./application/controllers/Gedung.php */