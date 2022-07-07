<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {


    function __construct()
    {
		parent::__construct();
		$this->load->library(['form_validation']);
		$this->load->model('MobilModel');
	}

	public function index()
	{
		$this->data['mobil'] = $this->MobilModel->getData();
		
		$this->load->view('dashboard/admin/mobil/index', $this->data);
	}

	public function store()
	{
		$this->form_validation->set_rules('nopol', 'Nopol', 'required');
		$this->form_validation->set_rules('warna', 'Warna', 'required');
		$this->form_validation->set_rules('biaya_sewa', 'Biaya_sewa', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('cc', 'Cc', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');
		$this->form_validation->set_rules('merk_id', 'Merk_id', 'required');
		$this->form_validation->set_rules('foto', 'Foto', 'required');

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
			'nopol' => $this->input->post('nopol'),
			'warna' => $this->input->post('warna'),
			'biaya_sewa' => $this->input->post('biaya_sewa'),
			'deskripsi' => $this->input->post('deskripsi'),
			'cc' => $this->input->post('cc'),
			'tahun' => $this->input->post('tahun'),
			'merk_id' => $this->input->post('merk_id'),
			'foto' => $this->input->post('foto'),
		];

		$this->MobilModel->store($data);

		$response = [
			'status' => 200,
			'response' => 'success',
			'success' => true,
			'error' => false,
			'data' => null,
			'success_message' => "Berhasil Membuat Mobil Baru",
			'error_message' => null
		];
		
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode($response));

	}

	public function edit($id = null)
	{
		$mobil = $this->MobilModel->getDataById($id);

		if (!$mobil) {
			$response = [
				'status' => 400,
				'response' => 'fail',
				'success' => false,
				'error' => true,
				'data' => null,
				'success_message' => null,
				'error_message' => "Mobil Not Found! Please Fix This Bug!"
			];
		}
		else {
			$response = [
				'status' => 200,
				'response' => 'success',
				'success' => true,
				'error' => false,
				'data' => $mobil,
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
		$this->form_validation->set_rules('nopol', 'Nopol', 'required');
		$this->form_validation->set_rules('warna', 'Warna', 'required');
		$this->form_validation->set_rules('biaya_sewa', 'Biaya_sewa', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
		$this->form_validation->set_rules('cc', 'Cc', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');
		$this->form_validation->set_rules('merk_id', 'Merk_id', 'required');

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
			'nopol' => $this->input->post('nopol'),
			'warna' => $this->input->post('warna'),
			'biaya_sewa' => $this->input->post('biaya_sewa'),
			'deskripsi' => $this->input->post('deskripsi'),
			'cc' => $this->input->post('cc'),
			'tahun' => $this->input->post('tahun'),
			'merk_id' => $this->input->post('merk_id'),
			'foto' => $this->input->post('foto'),
		];

		$this->MobilModel->update($data, $id);

		$response = [
			'status' => 200,
			'response' => 'success',
			'success' => true,
			'error' => false,
			'data' => null,
			'success_message' => "Berhasil Update Mobil!",
			'error_message' => null
		];
		
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode($response));

	}

	public function delete($id)
	{
		$mobil = $this->MobilModel->delete($id);

		if (!$mobil) {
			$response = [
				'status' => 400,
				'response' => 'fail',
				'success' => false,
				'error' => true,
				'data' => null,
				'success_message' => null,
				'error_message' => "Mobil Not Found! Please Fix This Bug!"
			];
		}
		else {
			$response = [
				'status' => 200,
				'response' => 'success',
				'success' => true,
				'error' => false,
				'data' => $mobil,
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

