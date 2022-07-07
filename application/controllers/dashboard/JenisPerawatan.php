<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class JenisPerawatan extends CI_Controller {


    function __construct()
    {
		parent::__construct();
		$this->load->library(['form_validation']);
		$this->load->model('JenisPerawatanModel');
	}

	public function index()
	{
		$this->data['jenisperawatan'] = $this->JenisPerawatanModel->getData();
		
		$this->load->view('dashboard/admin/jenisperawatan/index', $this->data);
	}

	public function store()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');

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
		];

		$this->JenisPerawatanModel->store($data);

		$response = [
			'status' => 200,
			'response' => 'success',
			'success' => true,
			'error' => false,
			'data' => null,
			'success_message' => "Berhasil Membuat JenisPerawatan Baru",
			'error_message' => null
		];
		
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode($response));

	}

	public function edit($id = null)
	{
		$jenisperawatan = $this->JenisPerawatanModel->getDataById($id);

		if (!$jenisperawatan) {
			$response = [
				'status' => 400,
				'response' => 'fail',
				'success' => false,
				'error' => true,
				'data' => null,
				'success_message' => null,
				'error_message' => "JenisPerawatan Not Found! Please Fix This Bug!"
			];
		}
		else {
			$response = [
				'status' => 200,
				'response' => 'success',
				'success' => true,
				'error' => false,
				'data' => $jenisperawatan,
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
		];

		$this->JenisPerawatanModel->update($data, $id);

		$response = [
			'status' => 200,
			'response' => 'success',
			'success' => true,
			'error' => false,
			'data' => null,
			'success_message' => "Berhasil Update JenisPerawatan!",
			'error_message' => null
		];
		
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode($response));

	}

	public function delete($id)
	{
		$jenisperawatan = $this->JenisPerawatanModel->delete($id);

		if (!$jenisperawatan) {
			$response = [
				'status' => 400,
				'response' => 'fail',
				'success' => false,
				'error' => true,
				'data' => null,
				'success_message' => null,
				'error_message' => "JenisPerawatan Not Found! Please Fix This Bug!"
			];
		}
		else {
			$response = [
				'status' => 200,
				'response' => 'success',
				'success' => true,
				'error' => false,
				'data' => $jenisperawatan,
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

