<!-- Buat model untuk mengambil data dari database dbrentalmobil -->
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class SewaModel extends CI_Model
{
    // Buat fungsi untuk menambah data ke database
    public function add_data($data)
    {
        $this->db->insert('sewa', $data);
    }
    

    // Buat fungsi untuk mengambil data dari tabel sewa
    public function get_all_data()
    {
        $query = $this->db->get('sewa');

        return $query->result();
    }

    // Buat fungsi untuk mengambil data berdasarkan id dari tabel sewa
    public function get_by_id($id)
    {
        $query = $this->db->get_where('sewa', ['id' => $id]);
        return $query->row();
    }

    // Buat fungsi untuk mengambil data berdasarkan users_id dari tabel sewa
    public function get_by_users_id($users_id)
    {
        $query = $this->db->get_where('sewa', ['users_id' => $users_id]);
        return $query->row();
    }
}
?>
