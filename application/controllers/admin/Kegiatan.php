<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
	private $redirectTo = 'admin/kegiatan';

	public function __construct()
	{
		parent::__construct();

		$this->login_checker->cek_login_admin();

		$this->form_validation->set_error_delimiters("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>", "</div>");

		upload_helper('kegiatan');
	}

	public function index()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Halaman Admin - Data Kegiatan',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/kegiatan/index', [
				'kegiatan' => $this->Kegiatan_model->get_kegiatan(),
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function tambah()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Halaman Admin - Tambah Data Kegiatan',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/kegiatan/tambah', NULL, TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	private function validate()
	{
		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required', [
			'required' => 'Nama Kegiatan Wajib Diisi'
		]);

		$this->form_validation->set_rules('jam', 'Waktu Kegiatan', 'trim|required', [
			'required' => 'Waktu Kegiatan Wajib Diisi'
		]);

		$this->form_validation->set_rules('tempat', 'Tempat Kegiatan', 'trim|required', [
			'required' => 'Tempat Kegiatan Wajib Diisi'
		]);
	}

	public function simpan()
	{
		//validasi inputan
		$this->validate();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			if (!$this->upload->do_upload('foto_kegiatan')) {
				$this->set_error_upload_flashdata();
			} else {
				$upload = $this->upload->data();

				$data = [
					'nama_kegiatan' => $this->input->post('nama_kegiatan'),
					'jam' => $this->input->post('jam'),
					'tempat' => $this->input->post('tempat'),
					'foto_kegiatan' => $upload['file_name'],
					'id_admin' => $this->session->admin_id,
				];

				if ($this->Kegiatan_model->insert_kegiatan($data)) {
					$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
					redirect($this->redirectTo);
				}
			}
		}
	}

	private function set_error_upload_flashdata()
	{
		$this->session->set_flashdata('error', 'Upload error : ' . $this->upload->display_errors('', ''));

		redirect($this->redirectTo);
	}

	public function edit($id_kegiatan)
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Halaman Admin - Edit Data Informasi',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/kegiatan/edit', [
				'kegiatan' => $this->Kegiatan_model->get_kegiatan_where($id_kegiatan)
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function update($id_kegiatan)
	{
		//validasi inputan
		$this->validate();

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id_kegiatan);
		} else {
			$data = [
				'nama_kegiatan' => $this->input->post('nama_kegiatan'),
				'jam' => $this->input->post('jam'),
				'tempat' => $this->input->post('tempat'),
				'id_admin' => $this->session->admin_id,
			];

			if (!empty($_FILES['foto_kegiatan']['name'])) {
				$kegiatan = $this->Kegiatan_model->get_kegiatan_where($id_kegiatan);

				if (!$this->upload->do_upload('foto_kegiatan')) {
					$this->set_error_upload_flashdata();
				}

				if (file_exists('./uploads/kegiatan/' . $kegiatan->foto_kegiatan)) {
					@unlink('./uploads/kegiatan/' . $kegiatan->foto_kegiatan);
				}

				$data['foto_kegiatan'] = $this->upload->data('file_name');
			}

			if ($this->Kegiatan_model->update_kegiatan($id_kegiatan, $data)) {
				$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
				redirect($this->redirectTo);
			}
		}
	}

	public function hapus($id_kegiatan)
	{
		$image_file_name = $this->Kegiatan_model->get_kegiatan_where($id_kegiatan);

		if (file_exists('uploads/kegiatan/' . $image_file_name->foto_kegiatan) && $image_file_name->foto_kegiatan) {
			@unlink('uploads/kegiatan/' . $image_file_name->foto_kegiatan);
		}

		$this->Kegiatan_model->delete_kegiatan($id_kegiatan);

		$response = [
			'success' => TRUE,
			'message' => 'Data Kegiatan Berhasil Dihapus'
		];

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
}

/* End of file Kegiatan_controller.php */
/* Location: ./application/controllers/admin/Kegiatan_controller.php */
