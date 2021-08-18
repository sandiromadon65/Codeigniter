<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->login_checker->cek_login_admin();

		$this->form_validation->set_error_delimiters("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>", "</div>");
	}

	public function index()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Halaman Admin - Edit Data Admin',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/pengaturan/index', [
				'admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id'))
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	private function validate()
	{
		$this->form_validation->set_rules('nama_admin', 'Nama Admin', 'trim|required', [
			'required' => 'Nama Admin Wajib Diisi'
		]);

		$this->form_validation->set_rules('username', 'Username', 'trim|required', [
			'required' => 'Username Wajib Diisi'
		]);

		$this->form_validation->set_rules('password', 'Password', 'trim');
		$this->form_validation->set_rules('passwordconf', 'Konfirmasi Password', 'trim|matches[password]', [
			'matches' => 'Konfirmasi Password tidak cocok dengan Password'
		]);
	}

	public function update($id_admin)
	{
		$this->validate();

		if ($this->form_validation->run() == TRUE) {
			$data = [
				'nama_admin' => $this->input->post('nama_admin'),
				'username' => $this->input->post('username'),
			];

			if (!empty($this->input->post('password'))) {
				$data['password'] = md5($this->input->post('password'));
			}

			if ($this->Admin_model->update_admin($id_admin, $data)) {
				$this->session->set_flashdata('success', 'Data Berhasil Diubah');
				redirect('admin/users');
			}
		} else {
			$this->tambah_admin();
		}
	}

	public function index_users()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Halaman Admin - Edit Data Admin',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/users/index', [
				'admin' => $this->Admin_model->get_admin()
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function tambah_admin()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Halaman Admin - Edit Data Admin',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/users/tambah', NULL, TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function simpan_admin()
	{
		$this->validate();

		if ($this->form_validation->run() == TRUE) {
			$data = [
				'nama_admin' => $this->input->post('nama_admin'),
				'username' => $this->input->post('username'),
			];

			if (!empty($this->input->post('password'))) {
				$data['password'] = md5($this->input->post('password'));
			}

			if ($this->Admin_model->tambah_admin($data)) {
				$this->session->set_flashdata('success', 'Data Berhasil Diubah');
				redirect('admin/users');
			}
		} else {
			$this->tambah_admin();
		}
	}

	public function edit($id_admin)
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Admin - Edit Data Informasi',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/users/edit', [
				'admin' => $this->Admin_model->data_user_admin($id_admin),
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function hapus($id_admin)
	{
		$this->Admin_model->delete_admin($id_admin);

		$response = [
			'success' => TRUE,
			'message' => 'Data Admin Berhasil Dihapus'
		];

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
}

/* End of file User_controller.php */
/* Location: ./application/controllers/admin/User_controller.php */
