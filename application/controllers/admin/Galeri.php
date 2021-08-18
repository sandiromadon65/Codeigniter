<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{

	private $redirectTo = 'admin/galeri';

	public function __construct()
	{
		parent::__construct();

		$this->login_checker->cek_login_admin();

		$this->form_validation->set_error_delimiters("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>", "</div>");

		upload_helper('galeri');
	}

	public function index()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Halaman Galeri',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/galeri/index', [
				'galeris' => $this->Galeri_model->get_galeris(),
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function tambah()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Admin - Tambah Data Galeri',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/galeri/tambah', NULL, TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	private function validate()
	{
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required', [
			'required' => 'Keterangan Wajib Diisi'
		]);

		$this->form_validation->set_rules('tgl_posting', 'Tanggal Posting', 'trim|required', [
			'required' => 'Tanggal Posting Wajib Diisi'
		]);
	}

	private function set_error_upload_flashdata()
	{
		$this->session->set_flashdata('error', 'Upload error : ' . $this->upload->display_errors('', ''));
		redirect($this->redirectTo);
	}

	public function simpan()
	{
		//validasi inputan
		$this->validate();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			if (!$this->upload->do_upload('foto_galeri')) {
				$this->set_error_upload_flashdata();
			} else {
				$upload = $this->upload->data();

				$data = [
					'keterangan' => $this->input->post('keterangan'),
					'foto_galeri' => $upload['file_name'],
					'id_admin' => $this->session->admin_id,
					'tgl_posting' => $this->input->post('tgl_posting'),
				];

				if ($this->Galeri_model->insert_galeri($data)) {
					$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
					redirect($this->redirectTo);
				}
			}
		}
	}

	public function edit($id_galeri)
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Admin - Edit Data Galeri',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/galeri/edit', [
				'galeri' => $this->Galeri_model->get_galeri_where($id_galeri)
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function update($id_galeri)
	{
		//Validasi inputan
		$this->validate();

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id_galeri);
		} else {
			$data = [
				'keterangan' => $this->input->post('keterangan'),
				'id_admin' => $this->session->admin_id,
				'tgl_posting' => $this->input->post('tgl_posting'),
			];

			if (!empty($_FILES['foto_galeri']['name'])) {
				$galeri = $this->Galeri_model->get_galeri_where($id_galeri);

				if (!$this->upload->do_upload('foto_galeri')) {
					$this->set_error_upload_flashdata();
				}

				if (file_exists('./uploads/galeri/' . $galeri->foto_galeri)) {
					@unlink('./uploads/galeri/' . $galeri->foto_galeri);
				}

				$data['foto_galeri'] = $this->upload->data('file_name');
			}

			if ($this->Galeri_model->update_galeri($id_galeri, $data)) {
				$this->session->set_flashdata('success', 'Data Berhasil Diubah');
				redirect($this->redirectTo);
			}
		}
	}

	public function hapus($id_galeri)
	{
		$image_file_name = $this->Galeri_model->get_galeri_where($id_galeri);

		if (file_exists('uploads/galeri/' . $image_file_name->foto_galeri) && $image_file_name->foto_galeri) {
			@unlink('uploads/galeri/' . $image_file_name->foto_galeri);
		}

		$this->Galeri_model->delete_galeri($id_galeri);

		$response = [
			'success' => TRUE,
			'message' => 'Data Galeri Berhasil Dihapus'
		];

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
}

/* End of file Galeri_controller.php */
/* Location: ./application/controllers/admin/Galeri_controller.php */
