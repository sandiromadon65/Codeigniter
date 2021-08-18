<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus extends CI_Controller {

	private $redirectTo = 'admin/pengurus';

	public function __construct()
	{
		parent::__construct();
		
		$this->login_checker->cek_login_admin();

		$this->form_validation->set_error_delimiters("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>", "</div>");

		upload_helper('pengurus');
	}

	public function index()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Halaman Admin - Pengurus',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/pengurus/index', [
				'pengurus' => $this->Pengurus_model->get_pengurus(),
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function tambah()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Admin - Tambah Data Pengurus',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/pengurus/tambah', [
				'jabatan_pengurus' => $this->Jabatan_pengurus_model->get_jabatan_pengurus(),
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	private function validate()
	{
		$this->form_validation->set_rules('nama_pengurus', 'Nama Pengurus', 'trim|required', [
			'required' => 'Nama Pengurus Wajib Diisi'
		]);

		$this->form_validation->set_rules('no_telepon', 'No Telepon', 'trim|required', [
			'required' => 'No Telepon Wajib Diisi'
		]);

		$this->form_validation->set_rules('id_jabatan_pengurus', 'Jabatan', 'trim|required', [
			'required' => 'Jabatan Wajib Diisi'
		]);
	}

	private function set_error_upload_flashdata(){
		$this->session->set_flashdata('error', 'Upload error : ' .$this->upload->display_errors('',''));
		redirect($this->redirectTo);
	}

	public function simpan()
	{
		//validasi inputan
		$this->validate();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		}else {
			if ( !$this->upload->do_upload('foto_pengurus')){
				$this->set_error_upload_flashdata();
			}else{
				$upload = $this->upload->data();

				$data = [
					'nama_pengurus' => $this->input->post('nama_pengurus'),
					'no_telepon' => $this->input->post('no_telepon'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'id_jabatan_pengurus' => $this->input->post('id_jabatan_pengurus'),
					'foto_pengurus' => $upload['file_name'],
				];

				if ($this->Pengurus_model->insert_pengurus($data)) {
					$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
					redirect($this->redirectTo);
				}
			}

		}
	}

	public function edit($id_pengurus)
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Admin - Edit Data Pengurus',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/pengurus/edit', [
				'pengurus' => $this->Pengurus_model->get_pengurus_where($id_pengurus),
				'jabatan_pengurus' => $this->Jabatan_pengurus_model->get_jabatan_pengurus(),
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function update($id_pengurus)
	{
		//validasi inputan
		$this->validate();

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id_pengurus);
		}else {
			$data = [
				'nama_pengurus' => $this->input->post('nama_pengurus'),
				'no_telepon' => $this->input->post('no_telepon'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'id_jabatan_pengurus' => $this->input->post('id_jabatan_pengurus'),
			];

			if ( !empty($_FILES['foto_pengurus']['name'])){
				$pengurus = $this->Pengurus_model->get_pengurus_where($id_pengurus);

				if ( !$this->upload->do_upload('foto_pengurus')) {
					$this->set_error_upload_flashdata();
				}

				if (file_exists('./uploads/pengurus/'.$pengurus->foto_pengurus)) {
					@unlink('./uploads/pengurus/'.$pengurus->foto_pengurus);
				}

				$data['foto_pengurus'] = $this->upload->data('file_name');

			}

			if ($this->Pengurus_model->update_pengurus($id_pengurus, $data)) {
				$this->session->set_flashdata('success', 'Data Berhasil Diubah');
				redirect($this->redirectTo);
			}
		}

	}

	public function hapus($id_pengurus)
	{
		$image_file_name = $this->Pengurus_model->get_pengurus_where($id_pengurus);

		if(file_exists('uploads/pengurus/'.$image_file_name->foto_pengurus) && $image_file_name->foto_pengurus){
			@unlink('uploads/pengurus/'.$image_file_name->foto_pengurus);
		}

		$this->Pengurus_model->delete_pengurus($id_pengurus);

		$response = [
			'success' => TRUE, 
			'message' => 'Data Pengurus Berhasil Dihapus'
		];

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

}

/* End of file Pengurus_controller.php */
/* Location: ./application/controllers/admin/Pengurus_controller.php */