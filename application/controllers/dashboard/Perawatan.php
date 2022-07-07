<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perawatan extends CI_Controller {


    function __construct()
    {
		parent::__construct();
		$this->load->library(['form_validation']);
		$this->load->model('PerawatanModel');
		$this->load->model('MobilModel');
		$this->load->model('JenisPerawatanModel');


		$this->load->model('AuthModel');
		if(!$this->AuthModel->current_user()){
			redirect('auth');
		}
	}

	public function index()
	{
		$perawatan = $this->PerawatanModel->getData();
		$this->data['perawatan'] = $perawatan;
		$this->data['jenisPerawatan'] = $this->JenisPerawatanModel->getData();
		$this->data['mobil'] = $this->MobilModel->getData();
		
		$data = [];
		foreach ($perawatan as $value) {
			$jenisPerawatan = $this->PerawatanModel->relationJenisPerawatan($value->jenis_perawatan_id);
			$mobil = $this->PerawatanModel->relationMobil($value->mobil_id);
			// dd($mobil->nopol);
			$item = [];
			$item['id'] = $value->id;

			$item['jenis_perawatan_id'] = $value->jenis_perawatan_id;
			$item['mobil_id'] = $value->mobil_id;

			$item['tanggal'] = $value->tanggal;
			$item['biaya'] = number_format($value->biaya,0, ',', '.');
			$item['km_mobil'] = $value->km_mobil;
			$item['deskripsi'] = $value->deskripsi;

			$item['jenis_perawatan'] = $jenisPerawatan->nama;

			$item['nopol'] = $mobil->nopol;
			$item['warna'] = $mobil->warna;
			$item['kapasitas'] = $mobil->kapasitas;
			$item['bagasi'] = $mobil->bagasi;
			$item['biaya_sewa'] = number_format($mobil->biaya_sewa,0, ',', '.');
			$item['cc'] = $mobil->cc;
			$item['tahun'] = $mobil->tahun;

			array_push($data, $item);

		}

		// dd($this->data['jenisPerawatan'], $this->data['mobil']);
		$this->data['data'] = $data;

		$this->load->view('dashboard/admin/perawatan/index', $this->data);
	}

	public function store()
	{
		$this->form_validation->set_rules('mobil_id', 'Mobil_id', 'required');
		$this->form_validation->set_rules('jenis_perawatan_id', 'Jenis_perawatan_id', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('biaya', 'Biaya', 'required');
		$this->form_validation->set_rules('km_mobil', 'Km_mobil', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

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
			'mobil_id' => $this->input->post('mobil_id'),
			'jenis_perawatan_id' => $this->input->post('jenis_perawatan_id'),
			'tanggal' => $this->input->post('tanggal'),
			'biaya' => $this->input->post('biaya'),
			'km_mobil' => $this->input->post('km_mobil'),
			'deskripsi' => $this->input->post('deskripsi')
		];

		$this->PerawatanModel->store($data);

		$response = [
			'status' => 200,
			'response' => 'success',
			'success' => true,
			'error' => false,
			'data' => null,
			'success_message' => "Berhasil Membuat Perawatan Baru",
			'error_message' => null
		];
		
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode($response));

	}

	public function edit($id = null)
	{
		$perawatan = $this->PerawatanModel->getDataById($id);

		if (!$perawatan) {
			$response = [
				'status' => 400,
				'response' => 'fail',
				'success' => false,
				'error' => true,
				'data' => null,
				'success_message' => null,
				'error_message' => "Perawatan Not Found! Please Fix This Bug!"
			];
		}
		else {
			$response = [
				'status' => 200,
				'response' => 'success',
				'success' => true,
				'error' => false,
				'data' => $perawatan,
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
		$this->form_validation->set_rules('mobil_id', 'Mobil_id', 'required');
		$this->form_validation->set_rules('jenis_perawatan_id', 'Jenis_perawatan_id', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('biaya', 'Biaya', 'required');
		$this->form_validation->set_rules('km_mobil', 'Km_mobil', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

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
			'mobil_id' => $this->input->post('mobil_id'),
			'jenis_perawatan_id' => $this->input->post('jenis_perawatan_id'),
			'tanggal' => $this->input->post('tanggal'),
			'biaya' => $this->input->post('biaya'),
			'km_mobil' => $this->input->post('km_mobil'),
			'deskripsi' => $this->input->post('deskripsi')
		];

		$this->PerawatanModel->update($data, $id);

		$response = [
			'status' => 200,
			'response' => 'success',
			'success' => true,
			'error' => false,
			'data' => null,
			'success_message' => "Berhasil Update Perawatan!",
			'error_message' => null
		];
		
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode($response));

	}

	public function delete($id)
	{
		$perawatan = $this->PerawatanModel->delete($id);

		if (!$perawatan) {
			$response = [
				'status' => 400,
				'response' => 'fail',
				'success' => false,
				'error' => true,
				'data' => null,
				'success_message' => null,
				'error_message' => "Perawatan Not Found! Please Fix This Bug!"
			];
		}
		else {
			$response = [
				'status' => 200,
				'response' => 'success',
				'success' => true,
				'error' => false,
				'data' => $perawatan,
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

