<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

	private $redirectTo = 'admin/profil';

	public function __construct()
	{
		parent::__construct();

		$this->login_checker->cek_login_admin();

		$this->form_validation->set_error_delimiters("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>", "</div>");

	}

	public function index()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Halaman Admin - Profil Pesantren',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/profil/index', [
				'profil' => $this->Profil_model->get_profils(),
				'has_profil' => $this->Profil_model->count_profil()
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function validate()
	{
		$this->form_validation->set_rules('nama', 'Nama Pesantren', 'trim|required', [
			'required' => 'Nama Pesantren Wajib Diisi'
		]);

		$this->form_validation->set_rules('visi', 'Visi', 'trim|required', [
			'required' => 'Visi Wajib Diisi'
		]);

		$this->form_validation->set_rules('misi', 'Misi', 'trim|required', [
			'required' => 'Misi Wajib Diisi'
		]);

		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', [
			'required' => 'Alamat Wajib Diisi'
		]);

		$this->form_validation->set_rules('email', 'Email', 'trim|required', [
			'required' => 'Email Wajib Diisi'
		]);

		$this->form_validation->set_rules('no_telepon', 'No Telepon', 'trim|required', [
			'required' => 'No Telepon Wajib Diisi'
		]);

		$this->form_validation->set_rules('kode_pos', 'Kode POS', 'trim|required', [
			'required' => 'Kode POS Wajib Diisi'
		]);
	}

	private function set_error_upload_flashdata()
	{
		$this->session->set_flashdata('error', 'Upload error : ' . $this->upload->display_errors('', ''));
		redirect($this->redirectTo);
	}

	public function tambah()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Halaman Admin - Tambah Data Profil Pesantren',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/profil/tambah', NULL, TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function simpan()
	{
		//validasi inputan
		$this->validate();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$upload_logo = $this->do_upload_logo();
			$upload_struktur = $this->do_upload_struktur();

			if ($upload_logo['file_name'] == '' || $upload_struktur['file_name'] == '') {
				$this->set_error_upload_flashdata();
			} else {
				$data = [
					'nama' => $this->input->post('nama'),
					'logo' => $upload_logo['file_name'],
					'visi' => $this->input->post('visi'),
					'misi' => $this->input->post('misi'),
					'alamat' => $this->input->post('alamat'),
					'email' => $this->input->post('email'),
					'no_telepon' => $this->input->post('no_telepon'),
					'kode_pos' => $this->input->post('kode_pos'),
					'id_admin' => $this->session->admin_id,
					'foto_struktur_organisasi' => $upload_struktur['file_name'],
				];

				if ($this->Profil_model->insert_profil($data)) {
					$this->session->set_flashdata('success', 'Data Berhasil Disimpan');

					redirect('admin/profil');
				}
			}
		}
	}

	public function edit($id_profil)
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Halaman Admin - Edit Data Profil Pesantren',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/profil/edit', [
				'profil' => $this->Profil_model->get_profil_where($id_profil),
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function update($id_profil)
	{
		//validasi inputan
		$this->validate();

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id_profil);
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'visi' => $this->input->post('visi'),
				'misi' => $this->input->post('misi'),
				'alamat' => $this->input->post('alamat'),
				'email' => $this->input->post('email'),
				'no_telepon' => $this->input->post('no_telepon'),
				'kode_pos' => $this->input->post('kode_pos'),
				'id_admin' => $this->session->admin_id,
			];


			$profil = $this->Profil_model->get_profil_where($id_profil);

			if (!empty($_FILES['logo']['name'])) {
				if (file_exists('./uploads/profil/' . $profil->logo)) {
					@unlink('./uploads/profil/' . $profil->logo);
				}

				$upload_logo = $this->do_upload_logo();

				$data['logo'] = $upload_logo['file_name'];
			}

			if (!empty($_FILES['foto_struktur_organisasi']['name'])) {
				if (file_exists('./uploads/struktur_organisasi/' . $profil->foto_struktur_organisasi)) {
					@unlink('./uploads/struktur_organisasi/' . $profil->foto_struktur_organisasi);
				}

				$upload_struktur = $this->do_upload_struktur();

				$data['foto_struktur_organisasi'] = $upload_struktur['file_name'];
			}

			if ($this->Profil_model->update_profil($id_profil, $data)) {
				$this->session->set_flashdata('success', 'Data Berhasil Diubah');
				redirect('admin/profil');
			}
		}
	}

	public function hapus($id_profil)
	{
		$image_file_name = $this->Profil_model->get_profil_where($id_profil);

		if (file_exists('uploads/profil/' . $image_file_name->logo) && $image_file_name->logo) {
			@unlink('uploads/profil/' . $image_file_name->logo);
		}

		if (file_exists('uploads/struktur_organisasi/' . $image_file_name->foto_struktur_organisasi) && $image_file_name->foto_struktur_organisasi) {
			@unlink('uploads/struktur_organisasi/' . $image_file_name->foto_struktur_organisasi);
		}

		$this->Profil_model->delete_profil($id_profil);

		$response = [
			'success' => TRUE,
			'message' => 'Data Profil Pesantren Berhasil Dihapus'
		];

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function detail($id_profil)
	{
		$response = [
			'success' => TRUE,
			'data' => $this->Profil_model->get_profil_where($id_profil)
		];

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function do_upload_logo()
	{
		$config['upload_path']          = './uploads/profil';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']  = '5096';
		$config['remove_space'] = TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('logo')) {
			return $this->set_error_upload_flashdata();
		}

		return $this->upload->data();
	}

	public function do_upload_struktur()
	{
		$config['upload_path']          = './uploads/struktur_organisasi';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']  = '5096';
		$config['remove_space'] = TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('foto_struktur_organisasi')) {
			return $this->set_error_upload_flashdata();
		}

		return $this->upload->data();
	}
}

/* End of file Profil_controller.php */
/* Location: ./application/controllers/admin/Profil_controller.php */
