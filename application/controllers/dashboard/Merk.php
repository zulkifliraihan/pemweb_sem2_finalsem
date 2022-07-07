<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Merk extends CI_Controller {


    function __construct()
    {
		parent::__construct();
		$this->load->library(['form_validation']);
		$this->load->model('MerkModel');
	}

	public function index()
	{
		$this->data['merk'] = $this->MerkModel->getData();
		
		$this->load->view('dashboard/admin/merk/index', $this->data);
	}

	public function store()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('produk', 'Produk', 'required');

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
			
		$data = [
			'nama' => $this->input->post('nama'),
			'produk' => $this->input->post('produk'),
		];

		$this->MerkModel->store($data);

		$response = [
			'status' => 200,
			'response' => 'success',
			'success' => true,
			'error' => false,
			'data' => null,
			'success_message' => "Berhasil Membuat Merk Baru",
			'error_message' => null
		];
		
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode($response));

	}

	public function edit($id = null)
	{
		$merk = $this->MerkModel->getDataById($id);

		if (!$merk) {
			$response = [
				'status' => 400,
				'response' => 'fail',
				'success' => false,
				'error' => true,
				'data' => null,
				'success_message' => null,
				'error_message' => "Merk Not Found! Please Fix This Bug!"
			];
		}
		else {
			$response = [
				'status' => 200,
				'response' => 'success',
				'success' => true,
				'error' => false,
				'data' => $merk,
				'success_message' => "Berhasil Mendapatkan Data!",
				'error_message' => null
			];
		}

		return $this->output
		->set_content_type('application/json')
		->set_status_header($response['status'])
		->set_output(json_encode($response));

	}

	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('produk', 'Produk', 'required');

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

		$data = [
			'nama' => $this->input->post('nama'),
			'produk' => $this->input->post('produk'),
		];

		$this->MerkModel->update($data, $id);

		$response = [
			'status' => 200,
			'response' => 'success',
			'success' => true,
			'error' => false,
			'data' => null,
			'success_message' => "Berhasil Update Merk!",
			'error_message' => null
		];
		
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode($response));

	}

	public function delete($id)
	{
		$merk = $this->MerkModel->delete($id);

		if (!$merk) {
			$response = [
				'status' => 400,
				'response' => 'fail',
				'success' => false,
				'error' => true,
				'data' => null,
				'success_message' => null,
				'error_message' => "Merk Not Found! Please Fix This Bug!"
			];
		}
		else {
			$response = [
				'status' => 200,
				'response' => 'success',
				'success' => true,
				'error' => false,
				'data' => $merk,
				'success_message' => "Berhasil Menghapus Data!",
				'error_message' => null
			];
		}

		return $this->output
		->set_content_type('application/json')
		->set_status_header($response['status'])
		->set_output(json_encode($response));
	}

}

/* End of file MainController.php */

