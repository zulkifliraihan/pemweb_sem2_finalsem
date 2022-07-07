<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {


    function __construct()
    {
		parent::__construct();
		$this->load->library(['form_validation']);
		$this->load->model('MobilModel');
		$this->load->model('MerkModel');

		$this->load->model('AuthModel');
		if(!$this->AuthModel->current_user()){
			redirect('auth');
		}
	}

	public function index()
	{
		$mobil = $this->MobilModel->getData();
		$merks = $this->MerkModel->getData();
		$data = [];
		foreach ($mobil as $value) {
			$merk = $this->MobilModel->relationMerk($value->merk_id);

			$item = [];
			$item['id'] = $value->id;
			$item['merk_id'] = $value->merk_id;
			$item['merk'] = $merk->nama;
			$item['produk'] = $merk->produk;
			$item['nopol'] = $value->nopol;
			$item['warna'] = $value->warna;
			$item['kapasitas'] = $value->kapasitas;
			$item['bagasi'] = $value->bagasi;
			$item['biaya_sewa'] = number_format($value->biaya_sewa,0, ',', '.');
			$item['cc'] = $value->cc;
			$item['tahun'] = $value->tahun;

			array_push($data, $item);

		}

	
		$this->data['data'] = $data;
		$this->data['merks'] = $merks;

		
		$this->load->view('dashboard/admin/mobil/index', $this->data);
	}

	public function store()
	{
		$this->form_validation->set_rules('nopol', 'Nopol', 'required');
		$this->form_validation->set_rules('warna', 'Warna', 'required');
		$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required');
		$this->form_validation->set_rules('bagasi', 'Bagasi', 'required');
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
		
		$filename= $_FILES["foto"];
		$file_ext = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
		
		if ($filename['name'] != null) {

			// $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
			$config['upload_path']          = './assets/public/dashboard/mobil/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('foto')) {
				// saat gagal, tampilkan pesan erro
				$response = [
					'status' => 400,
					'response' => 'fail',
					'success' => false,
					'error' => true,
					'data' => null,
					'success_message' => null,
					'error_message' => $this->upload->display_errors()
				];
				
				return $this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output(json_encode($response));
			} 
			else {
				// saat berhasil ambil datanya 
				$uploaded_data = $this->upload->data('file_name');
				$data = [
					'nopol' => $this->input->post('nopol'),
					'warna' => $this->input->post('warna'),
					'kapasitas' => $this->input->post('kapasitas'),
					'bagasi' => $this->input->post('bagasi'),
					'biaya_sewa' => $this->input->post('biaya_sewa'),
					'deskripsi' => $this->input->post('deskripsi'),
					'cc' => $this->input->post('cc'),
					'tahun' => $this->input->post('tahun'),
					'merk_id' => $this->input->post('merk_id'),
					'foto' =>  $uploaded_data,
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
		}
		else {
			$response = [
				'status' => 400,
				'response' => 'fail',
				'success' => false,
				'error' => true,
				'data' => null,
				'success_message' => null,
				'error_message' => "The Foto field is required."
			];
			
			return $this->output
			->set_content_type('application/json')
			->set_status_header(400)
			->set_output(json_encode($response));
		}

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
		$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required');
		$this->form_validation->set_rules('bagasi', 'Bagasi', 'required');
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
			'kapasitas' => $this->input->post('kapasitas'),
			'bagasi' => $this->input->post('bagasi'),
			'biaya_sewa' => $this->input->post('biaya_sewa'),
			'deskripsi' => $this->input->post('deskripsi'),
			'cc' => $this->input->post('cc'),
			'tahun' => $this->input->post('tahun'),
			'merk_id' => $this->input->post('merk_id'),
		];

		$filename= $_FILES["foto"];
		$file_ext = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
		
		if ($filename['name'] != null) {

			// $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
			$config['upload_path']          = './assets/public/dashboard/mobil/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('foto')) {
				// saat gagal, tampilkan pesan erro
				$response = [
					'status' => 400,
					'response' => 'fail',
					'success' => false,
					'error' => true,
					'data' => null,
					'success_message' => null,
					'error_message' => $this->upload->display_errors()
				];
				
				return $this->output
				->set_content_type('application/json')
				->set_status_header(400)
				->set_output(json_encode($response));
			} 
			else {
				// saat berhasil ambil datanya 
				$uploaded_data = $this->upload->data('file_name');
				$data['foto'] = $uploaded_data;
			}
		}

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

