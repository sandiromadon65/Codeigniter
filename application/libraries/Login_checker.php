<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_checker {
	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
	}

	public function cek_login_admin(){
		if (!$this->ci->session->userdata('login')) {
			$this->ci->session->set_flashdata('message_login', 'Silahkan Login Terlebih Dahulu');

			redirect('admin/login');
		}
	}

	public function cek_login()
	{
		if ($this->ci->session->has_userdata('login')) {
			redirect('admin/animasi');
		}
	}

	
}

/* End of file Login_checker.php */
/* Location: ./application/libraries/Login_checker.php */
