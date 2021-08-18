<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_pengurus extends CI_Controller {

	private $redirectTo = 'admin/jabatan_pengurus';

	public function __construct()
	{
		parent::__construct();
		
		$this->login_checker->cek_login_admin();

		$this->form_validation->set_error_delimiters("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>", "</div>");
	}

	public function index()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Halaman Jabatan Pengurus',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/jabatan_pengurus/index', [
				'jabatan_pengurus' => $this->Jabatan_pengurus_model->get_jabatan_pengurus(),
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function tambah()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Admin - Tambah Data Jabatan Pengurus',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/jabatan_pengurus/tambah', NULL, TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	private function validate()
	{
		$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'trim|required', [
			'required' => 'Nama Jabatan Wajib Diisi'
		]);
	}

	public function simpan()
	{
		//validasi inputan
		$this->validate();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		}else {
			$data = $this->input->post();

			if ($this->Jabatan_pengurus_model->insert_jabatan_pengurus($data)) {
				$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
				redirect($this->redirectTo);
			}
		}
	}

	public function edit($id_jabatan_pengurus)
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Admin - Edit Data Data Jabatan Pengurus',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/jabatan_pengurus/edit', [
				'jabatan_pengurus' => $this->Jabatan_pengurus_model->get_jabatan_pengurus_where($id_jabatan_pengurus)
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function update($id_jabatan_pengurus)
	{
		//Validasi inputan
		$this->validate();

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id_jabatan_pengurus);
		} else {
			
			$data = $this->input->post();

			if ($this->Jabatan_pengurus_model->update_jabatan_pengurus($id_jabatan_pengurus, $data)) {
				$this->session->set_flashdata('success', 'Data Berhasil Diubah');
				redirect($this->redirectTo);
			}
		}
	}

	public function hapus($id_jabatan_pengurus)
	{
		$this->Jabatan_pengurus_model->delete_jabatan_pengurus($id_jabatan_pengurus);

		$response = [
			'success' => TRUE, 
			'message' => 'Data Jabatan Pengurus Berhasil Dihapus'
		];

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

}

/* End of file Jabatan_pengurus.php */
/* Location: ./application/controllers/admin/Jabatan_pengurus.php */