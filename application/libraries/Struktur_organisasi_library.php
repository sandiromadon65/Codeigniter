<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur_organisasi_library {
    protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
    }
    
    public function has_struktur_organisasi()
    {
        if ($this->ci->Struktur_organisasi_model->count_struktur_organisasi() == 1) {
            // $this->ci->session->set_flashdata('message', 'Silahkan Login Terlebih Dahulu');

			redirect('admin/struktur_organisasi');
        }
    }
}