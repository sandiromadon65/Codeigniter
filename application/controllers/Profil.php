<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	//Halaman Profil
	public function index()
	{
		$profil = $this->Profil_model->get_profil();
		$data['title'] = 'Profil Pesantren';
		$data['content'] = $this->load->view('front/profil', compact('profil'), TRUE);
		$this->load->view('front/template', $data);	
	}

}

/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */