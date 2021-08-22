<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {

	public function index()
	{
		
		$kamar = $this->Kamar_model->get_kamar();
		
		$data['title'] = 'Data Santri';
		$data['content'] = $this->load->view('front/kamar', compact('kamar'), TRUE);
		$this->load->view('front/template', $data);	
	}

	public function detail($id)
	{
		$santri = $this->Santri_model->get_santri_where($id);
		$this->output->set_content_type('application/json')->set_output(json_encode($santri));
	}
}
