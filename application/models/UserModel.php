<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	public $table = 'users';

    function __construct()
    {
        parent::__construct();
    }

	public function getData(): ? array 
	{
		$getUser = $this->db->get($this->table)->result();
		return $getUser;
	}

	public function getDataToJson()
	{
		$getUser = $this->db->get($this->table)->result();
		return $getUser;
	}

	public function store($data)
	{
		$store = $this->db->insert($this->table, $data);;
		return $store;
	}

	public function getDataById($id)
	{
		$getUser = $this->db->get_where($this->table, ["id" => $id])->row();
		
		return $getUser;

	}

	public function update($data, $id)
	{
		$update = $this->db->update($this->table, $data, ['id' => $id]);

		return $update;
	}

	public function delete($id)
	{
		$delete = $this->db->delete($this->table, ["id" => $id]);
		return $delete;
	}

}

/* End of file UserModel.php */


?>
