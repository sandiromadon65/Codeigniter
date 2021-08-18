<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	public function index()
	{
		$kegiatan = $this->Kegiatan_model->get_kegiatan();
		
		$data['title'] = 'Data Kegiatan';
		$data['content'] = $this->load->view('front/kegiatan', compact('kegiatan'), TRUE);
		$this->load->view('front/template', $data);	
	}

}

/* End of file Kegiatan.php */
/* Location: ./application/controllers/Kegiatan.php */