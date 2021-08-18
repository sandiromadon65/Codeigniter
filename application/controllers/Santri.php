<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller {

	public function index()
	{
		
		$santri = $this->Santri_model->get_santris();
		
		$data['title'] = 'Data Santri';
		$data['content'] = $this->load->view('front/santri', compact('santri'), TRUE);
		$this->load->view('front/template', $data);	
	}

	public function detail($id)
	{
		$santri = $this->Santri_model->get_santri_where($id);
		$this->output->set_content_type('application/json')->set_output(json_encode($santri));
	}
}

/* End of file Santri.php */
/* Location: ./application/controllers/Santri.php */