<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('MerkModel');
        $this->load->model('MobilModel');

        // Jika user belum login, maka redirect ke halaman login
        // if (!$this->session->userdata('username')) {
        //     redirect('auth/index');
        // }
    }

    public function index()
    {
        $data = [
            'title' => 'Semobil.io'
        ];

        $this->load->view('landing/layout/head', $data);
        $this->load->view('landing/layout/navbar');
        $this->load->view('landing/pages/index');
        $this->load->view('landing/layout/foot');
    }
}
