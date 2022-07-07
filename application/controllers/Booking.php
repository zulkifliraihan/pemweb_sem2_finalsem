`<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('MerkModel');
        $this->load->model('MobilModel');
        $this->load->model('SewaModel');

        // Jika user belum login, maka redirect ke halaman login
        if (!$this->session->userdata('username')) {
            redirect('auth/index');
        }
    }

    public function index()
    {
        // Ambil semua data
        $data['merk'] = $this->MerkModel->get_all_data();
        $data['mobil'] = $this->MobilModel->get_all_data();

        // Ambil data berdasarkan merk_id dari tabel mobil
        $data['mobil_merk'] = $this->MobilModel->get_by_merk_id($this->input->post('merk_id'));

        $data['title'] = 'Semobil.io | Booking Page';

        $this->load->view('landing/layout/head', $data);
        $this->load->view('landing/booking/index', $data);
        $this->load->view('landing/layout/foot');
    }

    public function riwayat()
    {
        // Ambil data berdasarkan users_id dari tabel sewa
        // error_reporting(0);
        $sewa = $this->SewaModel->get_by_users_id($this->session->userdata('id'));

        $data = [
            'title' => 'Semobil.io | Riwayat Booking',
            'sewa' => $sewa,
        ];

        $this->load->view('landing/layout/head', $data);
        $this->load->view('landing/booking/riwayat_booking', $data);
        $this->load->view('landing/layout/foot');
    }

    public function form()
    {
        $data = [
            'title' => 'Semobil.io | Form Booking',
            'mobil' => $this->MobilModel->get_by_id($this->input->post('id')),
            'merk' => $this->MerkModel->get_by_id($this->input->post('merk_id'))
        ];

        $this->load->view('landing/layout/head', $data);
        $this->load->view('landing/booking/form_booking', $data);
        $this->load->view('landing/layout/foot');
    }
}
