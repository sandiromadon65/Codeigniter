<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		// $this->login_checker->cek_login_admin();
	}

	// public function index()
	// {
	// 	$data = [
	// 		'title' => 'Informasi Pondok Al Halim | Halaman Admin',
	// 		'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
	// 		'content' => $this->load->view('admin/content_view', [
	// 			'count_gedung' => $this->Gedung_model->count_gedung(),
	// 			'count_kegiatan' => $this->Kegiatan_model->count_kegiatan(),
	// 			'count_santri' => $this->Santri_model->count_santri(),
	// 			'count_galeri' => $this->Galeri_model->count_galeri(),
	// 			'count_pengurus' => $this->Pengurus_model->count_pengurus(),
	// 		], TRUE),
	// 		'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
	// 	];

	// 	$this->load->view('admin/index', $data);
	// }

	

}

/* End of file Home_controller.php */
/* Location: ./application/controllers/admin/Home_controller.php */