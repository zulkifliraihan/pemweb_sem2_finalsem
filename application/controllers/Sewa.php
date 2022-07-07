<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sewa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('SewaModel');
        $this->load->model('MobilModel');
        $this->load->model('MerkModel');

        // Jika user belum login, maka redirect ke halaman login
        // if (!$this->session->userdata('username')) {
        //     redirect('auth/index');
        // }
    }

    // Buat fungsi untuk menambah data
    public function add_data()
    {
        $data = [
            'tanggal_mulai' => $this->input->post('tgl_mulai'),
            'tanggal_akhir' => $this->input->post('tgl_akhir'),
            'tujuan' => $this->input->post('tujuan'),
            'noktp' => $this->input->post('noktp'),
            'users_id' => $this->input->post('user_id'),
            'mobil_id' => $this->input->post('mobil_id')
        ];

        // Buat pesan berhasil tambah data
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Booking Mobil Berhasil!</div>');

        // Jalankan fungsi add_data dari SewaModel
        $this->SewaModel->add_data($data);
        redirect('landing/index');
    }
}
