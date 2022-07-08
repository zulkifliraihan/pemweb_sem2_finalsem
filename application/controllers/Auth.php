<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


    function __construct()
    {
		parent::__construct();
		$this->load->library(['form_validation']);
		$this->load->model('AuthModel');
		$this->load->model('UserModel');
	}

	public function index()
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
			$user = $this->AuthModel->current_user();

			if ($user->role == "administrator") {
				$redirect_url = site_url('dashboard/mobil');
			} else {
				$redirect_url = site_url('/');
			}
			
			$data = [
				'username' => $user->username,
				'email' => $user->email,
				'id' => $user->id,
				'role' => $user->role
			];
			$this->session->set_userdata($data);

			$response = [
				'status' => 200,
				'response' => 'success',
				'success' => true,
				'error' => false,
				'data' => null,
				'success_message' => "Login Berhasil! Anda akan dialihkan ke halaman dashboard!",
				'error_message' => null,
				'redirect_url' => $redirect_url
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
		$this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
		redirect(site_url());
	}

	public function register()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('password2', 'Password2', 'required|min_length[8]');

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
		

		if ($this->input->post('password') != $this->input->post('password2')) {
            // Jika password dan konfirmasi password tidak sama
			$response = [
				'status' => 400,
				'response' => 'fail',
				'success' => false,
				'error' => true,
				'data' => null,
				'success_message' => null,
				'error_message' => "Password dengan Konfirmasi Password Berbeda!"
			];
			
			return $this->output
			->set_content_type('application/json')
			->set_status_header(400)
			->set_output(json_encode($response));
        }

		$data = [
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'email' => $this->input->post('email'),
            'role' => 'public',
			'status' => 1,
			'created_at' => date('Y-m-d H:i:s'),
			'last_login' => date('Y-m-d H:i:s')
        ];

		$this->UserModel->store($data);

		$response = [
			'status' => 200,
			'response' => 'success',
			'success' => true,
			'error' => false,
			'data' => null,
			'success_message' => "Berhasil Melakukan Registrasi!",
			'error_message' => null
		];
		
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode($response));
	}
}

/* End of file MainController.php */

