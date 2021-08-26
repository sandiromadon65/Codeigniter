<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * MENAMPILKAN HALAMAN LOGIN
	 * @return [type] [description]
	 */
	public function index()
	{
		$this->login_checker->cek_login();

		$this->load->view('admin/login_view');
	}

	/**
	 * PROSES DILAKUKANNYA LOGIN
	 * @return [type] [description]
	 */
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data_user = $this->Admin_model->is_valid_admin($username);

		if($data_user){
			if (md5($password) == $data_user->password) {

				$data_admin = $this->Admin_model->data_user_admin($data_user->id_admin);

				$this->session->set_userdata([
					'login' => TRUE,
					'admin_id' => $data_admin->id_admin,
				]);

				redirect('admin/gedung');
			} else {
				$this->session->set_flashdata('message_login', 'Password Anda Tidak Cocok, Silahkan Cek Kembali');
				redirect('admin/login');
			}
		}else{
			$this->session->set_flashdata('message_login', 'Username Anda Tidak Cocok, Silahkan Cek Kembali');
			redirect('admin/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}

	public function create($username, $password)
	{
		$data['username'] = $username;
		$data['password'] = md5($password);

		$this->Admin_model->insert_admin($data);

	}

}

/* End of file User_controller.php */
/* Location: ./application/controllers/User_controller.php */