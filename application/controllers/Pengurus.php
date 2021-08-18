<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus extends CI_Controller {

	public function index()
	{
		
		$pengurus = $this->Pengurus_model->get_pengurus();
		
		$data['title'] = 'Data Pengurus';
		$data['content'] = $this->load->view('front/pengurus', compact('pengurus'), TRUE);
		$this->load->view('front/template', $data);	
	}

}

/* End of file Pengurus.php */
/* Location: ./application/controllers/Pengurus.php */