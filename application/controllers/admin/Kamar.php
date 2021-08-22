<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamar extends CI_Controller
{
    private $redirectTo = 'admin/kamar';

	public function __construct()
	{
		parent::__construct();

		$this->login_checker->cek_login_admin();

		$this->form_validation->set_error_delimiters("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>", "</div>");

	}

	public function index()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Halaman Admin - Data Kamar',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/kamar/index', [
				'kamar' => $this->Kamar_model->get_kamar(),
		
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

    public function tambah()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Admin - Tambah Data Kamar',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/kamar/tambah', [
			], TRUE),
            'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),

		];

		$this->load->view('admin/index', $data);
	}

    private function validate()
	{
		$this->form_validation->set_rules('nama_kamar', 'Nama Santri', 'trim|required', [
			'required' => 'Nama Kamar Wajib Diisi'
		]);

		$this->form_validation->set_rules('kuota', 'Tanggal Lahir', 'trim|required', [
			'required' => 'Kuota Wajib Diisi'
		]);

		$this->form_validation->set_rules('keterangan', 'Alamat Lengkap', 'trim|required', [
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
            $data = [
                'nama_kamar' => $this->input->post('nama_kamar'),
                'kuota' => $this->input->post('kuota'),
                'keterangan' => $this->input->post('keterangan'),
               
            ];

            if ($this->Kamar_model->insert_kamar($data)) {
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                redirect($this->redirectTo);
			}
		}
	}

    public function edit($id_kamar)
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Admin - Edit Data Pengurus',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/pengurus/edit', [
				'pengurus' => $this->Pengurus_model->get_pengurus_where($id_kamar),
				'jabatan_pengurus' => $this->Jabatan_pengurus_model->get_jabatan_pengurus(),
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function update($id_kamar)
	{
		//validasi inputan
		$this->validate();

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id_kamar);
		}else {
			$data = [
				'nama_pengurus' => $this->input->post('nama_pengurus'),
				'no_telepon' => $this->input->post('no_telepon'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'id_jabatan_pengurus' => $this->input->post('id_jabatan_pengurus'),
			];

			if ( !empty($_FILES['foto_pengurus']['name'])){
				$pengurus = $this->Pengurus_model->get_pengurus_where($id_kamar);

				if ( !$this->upload->do_upload('foto_pengurus')) {
					$this->set_error_upload_flashdata();
				}

				if (file_exists('./uploads/pengurus/'.$pengurus->foto_pengurus)) {
					@unlink('./uploads/pengurus/'.$pengurus->foto_pengurus);
				}

				$data['foto_pengurus'] = $this->upload->data('file_name');

			}

			if ($this->Pengurus_model->update_pengurus($id_kamar, $data)) {
				$this->session->set_flashdata('success', 'Data Berhasil Diubah');
				redirect($this->redirectTo);
			}
		}

	}

	public function hapus($id_kamar)
	{

		$this->Kamar_model->delete_kamar($id_kamar);

		$response = [
			'success' => TRUE, 
			'message' => 'Data Pengurus Berhasil Dihapus'
		];

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


}