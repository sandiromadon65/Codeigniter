<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Santri extends CI_Controller
{

	private $redirectTo = 'admin/santri';


	public function __construct()
	{
		parent::__construct();

		$this->login_checker->cek_login_admin();

		$this->form_validation->set_error_delimiters("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>", "</div>");

		upload_helper('santri');
	}

	public function index()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Halaman Admin - Santri',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/santri/index', [
				'santris' => $this->Santri_model->get_santris(),
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function tambah()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Admin - Tambah Data Santri',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/santri/tambah', [
				'pengurus' => $this->Pengurus_model->get_pengurus(),
				'kamar' => $this->Kamar_model->get_kamar5(),
				'gedung' => $this->Gedung_model->get_gedung()
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	private function validate()
	{
		$this->form_validation->set_rules('nama_santri', 'Nama Santri', 'trim|required', [
			'required' => 'Nama Santri Wajib Diisi'
		]);

		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required', [
			'required' => 'Tanggal Lahir Wajib Diisi'
		]);

		$this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'trim|required', [
			'required' => 'Alamat Lengkap Wajib Diisi'
		]);

		$this->form_validation->set_rules('nama_bapak', 'Nama Bapak', 'trim|required', [
			'required' => 'Nama Bapak Wajib Diisi'
		]);

		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required', [
			'required' => 'Nama Ibu Wajib Diisi'
		]);

		$this->form_validation->set_rules('status', 'Status', 'trim|required', [
			'required' => 'Status Wajib Diisi'
		]);

		$this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'trim|required', [
			'required' => 'Tanggal Masuk Wajib Diisi'
		]);

		$this->form_validation->set_rules('id_pengurus_pengajar', 'Pengurus', 'trim|required', [
			'required' => 'Pengurus Wajib Diisi'
		]);

		$this->form_validation->set_rules('kamar', 'Pengurus', 'trim|required', [
			'required' => 'Kamar Wajib Diisi'
		]);

		$this->form_validation->set_rules('nama_gedung', 'Gedung', 'trim|required', [
			'required' => 'Gedung Wajib Diisi'
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
			if (!$this->upload->do_upload('foto')) {
				$this->set_error_upload_flashdata();
			} else {
				$data = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = './uploads/' . $data['file_name'];
				$config['new_image'] = './uploads/' . $data['file_name'];
				$config['quality'] = '100%';
				$config['width'] = 1024;
				$config['height'] = 768;
				$config['remove_spaces'] = true;
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$image_path = "$data[file_name]";
				$data_order['images'] = $image_path;
			}	
				
				$id_kamar = $this->input->post('kamar');
				$data = [					
					'nama_santri' => $this->input->post('nama_santri'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'alamat' => $this->input->post('alamat'),
					'nama_bapak' => $this->input->post('nama_bapak'),
					'nama_ibu' => $this->input->post('nama_ibu'),
					'status' => $this->input->post('status'),
					'tgl_masuk' => $this->input->post('tgl_masuk'),
					'foto' => $image_path,
					'id_admin' => $this->session->admin_id,
					'id_pengurus_pengajar' => $this->input->post('id_pengurus_pengajar'),
					'id_kamar' => $this->input->post('kamar'),
					'nama_gedung' => $this->input->post('nama_gedung'),
					
					];
					$succes = $this->Santri_model->insert_santri($data);
					$id_kamar = $this->input->post('kamar');;
					$santri = $this->Kamar_model->get_kuota("kamar", [

						"id_kamar" => floatval($id_kamar)
						
					])->first_row()->kuota;
					
					$kuota = $santri - 1;						
					$this->Kamar_model->update(floatval($id_kamar), [
						"kuota" => $kuota,
					]);
					if (succes) {
					$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
					redirect($this->redirectTo);
					}
					}
	}

	public function edit($id_santri)
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Admin - Edit Data Informasi',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/santri/edit', [
				'santri' => $this->Santri_model->get_santri_where($id_santri),
				'pengurus' => $this->Pengurus_model->get_pengurus(),
				'gedung' => $this->Gedung_model->get_gedung()
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function update($id_santri)
	{
		//validasi inputan
		$this->validate();

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id_santri);
		} else {

			$data = [
				'nama_santri' => $this->input->post('nama_santri'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'alamat' => $this->input->post('alamat'),
				'nama_bapak' => $this->input->post('nama_bapak'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'status' => $this->input->post('status'),
				'tgl_masuk' => $this->input->post('tgl_masuk'),
				'id_admin' => $this->session->admin_id,
				'id_pengurus_pengajar' => $this->input->post('id_pengurus_pengajar'),
				'nama_gedung' => $this->input->post('nama_gedung'),
			];

			if (!empty($_FILES['foto']['name'])) {
				$santri = $this->Santri_model->get_santri_where($id_santri);

				if (!$this->upload->do_upload('foto')) {
					$this->set_error_upload_flashdata();
				} else { }

				if (file_exists('./uploads/santri/' . $santri->foto)) {
					@unlink('./uploads/santri/' . $santri->foto);
				} else { }

				$data['foto'] = $this->upload->data('file_name');
			}

			if ($this->Santri_model->update_santri($id_santri, $data)) {
				$this->session->set_flashdata('success', 'Data Berhasil Diubah');
				redirect('admin/santri');
			} else { }
		}
	}


	public function hapus($id_santri)
	{
		$image_file_name = $this->Santri_model->get_santri_where($id_santri);

		if (file_exists('uploads/santri/' . $image_file_name->foto) && $image_file_name->foto) {
			@unlink('uploads/santri/' . $image_file_name->foto);
		}

		$this->Santri_model->delete_santri($id_santri);

		$response = [
			'success' => TRUE,
			'message' => 'Data Santri Berhasil Dihapus'
		];

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	public function detail($id_santri)
	{
		$response = [
			'success' => TRUE,
			'data' => $this->Santri_model->get_santri_where($id_santri)
		];

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
}

/* End of file Santri_controller.php */
/* Location: ./application/controllers/admin/Santri_controller.php */
