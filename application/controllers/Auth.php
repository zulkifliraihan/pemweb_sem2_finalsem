<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


    function __construct()
    {
		parent::__construct();
		$this->load->library(['form_validation']);
		$this->load->model('AuthModel');
	}

	public function index()
	{
		show_404();
	}

	public function login()
	{
		$this->load->view('authentication/login');
	}

	public function check()
	{

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run()  == false) {
			$response = [
				'status' => 400,
				'response' => 'fail',
				'success' => false,
				'error' => true,
				'data' => null,
				'success_message' => null,
				'error_message' => validation_errors()
			];
			
			return $this->output
			->set_content_type('application/json')
			->set_status_header(400)
			->set_output(json_encode($response));
		} 

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->AuthModel->login($username, $password)){
			$response = [
				'status' => 200,
				'response' => 'success',
				'success' => true,
				'error' => false,
				'data' => null,
				'success_message' => "Login Berhasil! Anda akan dialihkan ke halaman dashboard!",
				'error_message' => null,
				'redirect_url' => site_url('dashboard/mobil')
			];
			
			return $this->output
			->set_content_type('application/json')
			->set_status_header(200)
			->set_output(json_encode($response));
			
		} else {
			$response = [
				'status' => 400,
				'response' => 'fail',
				'success' => false,
				'error' => true,
				'data' => null,
				'success_message' => null,
				'error_message' => 'Login Gagal, pastikan username dan passwrod benar!'
			];
			
			return $this->output
			->set_content_type('application/json')
			->set_status_header(400)
			->set_output(json_encode($response));

		}

	}

	public function logout()
	{
		$this->load->model('AuthModel');
		$this->AuthModel->logout();
		redirect(site_url());
	}


}

/* End of file MainController.php */

