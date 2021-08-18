<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gedung extends CI_Controller
{

	private $redirectTo = 'admin/gedung';

	public function __construct()
	{
		parent::__construct();

		$this->login_checker->cek_login_admin();

		$this->form_validation->set_error_delimiters("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>", "</div>");

		upload_helper('gedung');
	}

	public function index()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Halaman Admin - Data Gedung',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/gedung/index', [
				'gedung' => $this->Gedung_model->get_gedung(),
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function tambah()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Halaman Admin - Tambah Data Gedung',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/gedung/tambah', NULL, TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	private function validate()
	{
		$this->form_validation->set_rules('nama_gedung', 'Nama Gedung', 'trim|required', [
			'required' => 'Nama Gedung Wajib Diisi'
		]);

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required', [
			'required' => 'Keterangan Wajib Diisi'
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
			if (!$this->upload->do_upload('foto_gedung')) {
				$this->set_error_upload_flashdata();
			} else {
				$upload = $this->upload->data();

				$data = [
					'nama_gedung' => $this->input->post('nama_gedung'),
					'foto_gedung' => $upload['file_name'],
					'keterangan' => $this->input->post('keterangan'),
				];

				if ($this->Gedung_model->insert_gedung($data)) {
					$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
					redirect($this->redirectTo);
				}
			}
		}
	}

	public function edit($id_gedung)
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Halaman Admin - Edit Data Gedung',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/gedung/edit', [
				'gedung' => $this->Gedung_model->get_gedung_where($id_gedung)
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function update($id_gedung)
	{
		//Validasi inputan
		$this->validate();

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id_gedung);
		} else {

			$data = [
				'nama_gedung' => $this->input->post('nama_gedung'),
				'keterangan' => $this->input->post('keterangan'),
			];

			if (!empty($_FILES['foto_gedung']['name'])) {
				$gedung = $this->Gedung_model->get_gedung_where($id_gedung);

				if (!$this->upload->do_upload('foto_gedung')) {
					$this->set_error_upload_flashdata();
				}

				if (file_exists('./uploads/gedung/' . $gedung->foto_gedung)) {
					@unlink('./uploads/gedung/' . $gedung->foto_gedung);
				}

				$data['foto_gedung'] = $this->upload->data('file_name');
			}

			if ($this->Gedung_model->update_gedung($id_gedung, $data)) {
				$this->session->set_flashdata('success', 'Data Berhasil Diubah');
				redirect('admin/gedung');
			}
		}
	}

	public function hapus($id_gedung)
	{
		$image_file_name = $this->Gedung_model->get_gedung_where($id_gedung);

		if (file_exists('uploads/gedung/' . $image_file_name->foto_gedung) && $image_file_name->foto_gedung) {
			@unlink('uploads/gedung/' . $image_file_name->foto_gedung);
		}

		$this->Gedung_model->delete_gedung($id_gedung);

		$response = [
			'success' => TRUE,
			'message' => 'Data Gedung Berhasil Dihapus'
		];

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
}

/* End of file Gedung_controller.php */
/* Location: ./application/controllers/admin/Gedung_controller.php */
