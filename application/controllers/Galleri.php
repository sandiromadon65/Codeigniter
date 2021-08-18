<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galleri extends CI_Controller {

	public function index()
	{
		$galleri = $this->Galeri_model->get_galeris();
		
		$data['title'] = 'Galeri Pondok Pesantren Al-Halim Garut';
		$data['content'] = $this->load->view('front/galleri', compact('galleri'), TRUE);
		$this->load->view('front/template', $data);	
	}

}

/* End of file Galleri.php */
/* Location: ./application/controllers/Galleri.php */