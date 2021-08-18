<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur_organisasi extends CI_Controller {

	private $redirectTo = 'admin/struktur_organisasi';

	public function __construct()
	{
		parent::__construct();
		
		$this->login_checker->cek_login_admin();

		upload_helper('struktur_organisasi');
	}

	public function index()
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Halaman Admin - Struktur Organisasi',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/struktur_organisasi/index', [
				'struktur_organisasi' => $this->Struktur_organisasi_model->get_struktur_organisasi(),
				'has_struktur_organisasi' => $this->Struktur_organisasi_model->count_struktur_organisasi()
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function tambah()
	{
		$this->struktur_organisasi_library->has_struktur_organisasi();

		$data = [
			'title' => 'Informasi Pondok Al Halim | Halaman Admin - Tambah Data Struktur Organisasi',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/struktur_organisasi/tambah', NULL, TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	private function set_error_upload_flashdata(){
		$this->session->set_flashdata('error', 'Upload error : ' .$this->upload->display_errors('',''));
		redirect($this->redirectTo);
	}

	public function simpan()
	{
		if ( !$this->upload->do_upload('foto_struktur')){
			$this->set_error_upload_flashdata();
		}else{
			$upload = $this->upload->data();

			$data['foto_struktur'] = $upload['file_name'];

			if ($this->Struktur_organisasi_model->insert_struktur_organisasi($data)) {
				$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
				redirect($this->redirectTo);
			}
		}
	}

	public function edit($id_struktur_organisasi)
	{
		$data = [
			'title' => 'Informasi Pondok Al Halim | Admin - Edit Data Struktur Organisasi',
			'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
			'content' => $this->load->view('admin/struktur_organisasi/edit', [
				'struktur_organisasi' => $this->Struktur_organisasi_model->get_struktur_organisasi_where($id_struktur_organisasi)
			], TRUE),
			'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
		];

		$this->load->view('admin/index', $data);
	}

	public function update($id_struktur_organisasi)
	{
		if ( !$this->upload->do_upload('foto_struktur')) {
			$this->set_error_upload_flashdata();
		}

		$data = [
			'foto_struktur' => $this->input->post('foto_struktur'),
		];

		if( !empty($_FILES['foto_struktur']['name'])){
			$struktur_organisasi = $this->Struktur_organisasi_model->get_struktur_organisasi_where($id_struktur_organisasi);

			if (file_exists('./uploads/struktur_organisasi/'.$struktur_organisasi->foto_struktur)) {
				@unlink('./uploads/struktur_organisasi/'.$struktur_organisasi->foto_struktur);
			}

			$data['foto_struktur'] = $this->upload->data('file_name');
		}

		if($this->Struktur_organisasi_model->update_struktur_organisasi($id_struktur_organisasi, $data)) {
			$this->session->set_flashdata('success', 'Data Berhasil Diubah');
			redirect($this->redirectTo);
		}
	}

	public function hapus($id_struktur_organisasi)
	{
		$image_file_name = $this->Struktur_organisasi_model->get_struktur_organisasi_where($id_struktur_organisasi);

		if(file_exists('uploads/struktur_organisasi/'.$image_file_name->foto_struktur) && $image_file_name->foto_struktur){
			@unlink('uploads/struktur_organisasi/'.$image_file_name->foto_struktur);
		}
		
		$this->Struktur_organisasi_model->delete_struktur_organisasi($id_struktur_organisasi);

		$response = [
			'success' => TRUE, 
			'message' => 'Data Struktur Organisasi Berhasil Dihapus'
		];

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

}

/* End of file Struktur_organisasi.php */
/* Location: ./application/controllers/admin/Struktur_organisasi.php */