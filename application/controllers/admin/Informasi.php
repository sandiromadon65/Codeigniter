<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->login_checker->cek_login_admin();

		$this->form_validation->set_error_delimiters("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>", "</div>");
	}

	public function index()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Halaman Informasi',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/informasi/index', [
				'informasis' => $this->Informasi_model->get_informasis(),
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function tambah()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Admin - Tambah Data Informasi',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/Informasi/tambah', NULL, TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function simpan()
	{
		//validasi inputan
		$this->form_validation->set_rules('judul', 'Judul Informasi', 'trim|required', [
			'required' => 'Judul Informasi Wajib Diisi'
		]);

		$this->form_validation->set_rules('info', 'Informasi Lengkap', 'trim|required', [
			'required' => 'Informasi Lengkap Wajib Diisi'
		]);

		$this->form_validation->set_rules('waktu', 'Waktu Informasi', 'trim|required', [
			'required' => 'Waktu Informasi Wajib Diisi'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		}else {
			$data = $this->input->post();

			if ($this->Informasi_model->insert_informasi($data)) {
				$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
				redirect('admin/informasi');
			}
		}
	}

	public function edit($id_informasi)
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Admin - Edit Data Informasi',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/informasi/edit', [
				'informasi' => $this->Informasi_model->get_informasi_where($id_informasi)
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function update($id_informasi)
	{
		//Validasi inputan
		$this->form_validation->set_rules('judul', 'Judul Informasi', 'trim|required', [
			'required' => 'Judul Informasi Wajib Diisi'
		]);

		$this->form_validation->set_rules('info', 'Informasi Lengkap', 'trim|required', [
			'required' => 'Informasi Lengkap Wajib Diisi'
		]);

		$this->form_validation->set_rules('waktu', 'Waktu Informasi', 'trim|required', [
			'required' => 'Waktu Informasi Wajib Diisi'
		]);


		if ($this->form_validation->run() == FALSE) {
			$this->edit($id_informasi);
		} else {
			
			$data = $this->input->post();

			if ($this->Informasi_model->update_informasi($id_informasi, $data)) {
				$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
				redirect('admin/informasi');
			}
		}
	}

	public function hapus($id_informasi)
	{
		$this->Informasi_model->delete_informasi($id_informasi);

		$response = [
			'success' => TRUE, 
			'message' => 'Data Informasi Berhasil Dihapus'
		];

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

}

/* End of file Informasi_controller.php */
/* Location: ./application/controllers/admin/Informasi_controller.php */