<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	private $table = 'admin';

	public function is_valid_admin($username){
        return $this->db->from($this->table)
                        ->where('username', $username)
                        ->get()->row();
    }

    public function data_user_admin($id_admin)
    {
        return $this->db->from($this->table)
                        ->where('id_admin', $id_admin)
                        ->get()->row();
    }

    public function insert_admin($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update_admin($id_admin, $data)
    {
        return $this->db->where('id_admin', $id_admin)
                        ->update($this->table, $data);
    }

    public function tambah_admin($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get_admin()
    {
        return $this->db->from($this->table)
                        ->get()->result();
    }

    public function delete_admin($id_admin)
	{
		$this->db->where('id_admin', $id_admin)->delete($this->table);
	}
	

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */