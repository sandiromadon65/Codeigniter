<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Animasi extends CI_Controller
{
    private $redirectTo = 'admin/animasi';

    public function __construct()
    {
        parent::__construct();

        $this->login_checker->cek_login_admin();

        $this->form_validation->set_error_delimiters("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>", "</div>");

        upload_animasi_helper('animasi');
    }

    public function index()
    {
        $data = [
            'title' => ' Sistem Informasi Pondok | Halaman Animasi',
            'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
            'content' => $this->load->view('admin/animasi/index', [
                'animasi' => $this->Animasi_model->get_animasi(),
            ], TRUE),
            'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
        ];

        $this->load->view('admin/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'KIOSK | Admin - Tambah Data Animasi',
            'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
            'content' => $this->load->view('admin/animasi/tambah', NULL, TRUE),
            'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
        ];

        $this->load->view('admin/index', $data);
    }

    private function validate()
    {
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required', [
            'required' => 'Keterangan Wajib Diisi'
        ]);

        $this->form_validation->set_rules('tgl_posting', 'Tanggal Posting', 'trim|required', [
            'required' => 'Tanggal Posting Wajib Diisi'
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
            if (!$this->upload->do_upload('animasi')) {
                $this->set_error_upload_flashdata();
            } else {
                $upload = $this->upload->data();

                $data = [
                    'keterangan' => $this->input->post('keterangan'),
                    'animasi' => $upload['file_name'],
                    'tgl_posting' => $this->input->post('tgl_posting'),
                    'id_admin' => $this->session->admin_id,
                ];

                if ($this->Animasi_model->insert_animasi($data)) {
                    $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                    redirect($this->redirectTo);
                }
            }
        }
    }

    public function edit($id_animasi)
    {
        $data = [
            'title' => 'Informasi Pondok Al Halim | | Admin - Edit Data Animasi',
            'sidebar' => $this->load->view('admin/sidebar_view', NULL, TRUE),
            'content' => $this->load->view('admin/animasi/edit', [
                'animasi' => $this->Animasi_model->get_animasi_where($id_animasi)
            ], TRUE),
            'user_admin' => $this->Admin_model->data_user_admin($this->session->userdata('admin_id')),
        ];

        $this->load->view('admin/index', $data);
    }

    public function update($id_animasi)
    {
        //Validasi inputan
        $this->validate();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id_animasi);
        } else {
            $data = [
                'keterangan' => $this->input->post('keterangan'),
                'tgl_posting' => $this->input->post('tgl_posting'),
                'id_admin' => $this->session->admin_id,
            ];

            if (!empty($_FILES['animasi']['name'])) {
                $animasi = $this->Animasi_model->get_animasi_where($id_animasi);

                if (!$this->upload->do_upload('animasi')) {
                    $this->set_error_upload_flashdata();
                }

                if (file_exists('./uploads/animasi/' . $animasi->animasi)) {
                    @unlink('./uploads/animasi/' . $animasi->animasi);
                }

                $data['animasi'] = $this->upload->data('file_name');
            }

            if ($this->Animasi_model->update_animasi($id_animasi, $data)) {
                $this->session->set_flashdata('success', 'Data Berhasil Diubah');
                redirect($this->redirectTo);
            }
        }
    }

    public function hapus($id_animasi)
    {
        $image_file_name = $this->Animasi_model->get_animasi_where($id_animasi);

        if (file_exists('uploads/animasi/' . $image_file_name->animasi) && $image_file_name->animasi) {
            @unlink('uploads/animasi/' . $image_file_name->animasi);
        }

        $this->Animasi_model->delete_animasi($id_animasi);

        $response = [
            'success' => TRUE,
            'message' => 'Data Animasi Berhasil Dihapus'
        ];

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}
