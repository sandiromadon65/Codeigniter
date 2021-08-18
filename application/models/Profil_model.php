<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {
	private $table = 'profil';

	
	public function get_profils()
	{
		return $this->db->from($this->table)
						->join('admin', 'admin.id_admin = profil.id_admin')
                        ->get()->result();
	}

	/**
	 * MENGAMBIL SEMUA DATA PROFIL
	 * @return [type] [description]
	 */
	public function get_profil()
	{
		return $this->db->from($this->table)
                        ->get()->row();
	}

	/**
	 * MENYIMPAN DATA PROFIL
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function insert_profil($data)
	{
		return $this->db->insert($this->table, $data);
	}

	/**
	 * MENGAMBIL DATA PROFIL BERDASARKAN $id_profil
	 * @param  [type] $id_profil [description]
	 * @return [type]                    [description]
	 */
	public function get_profil_where($id_profil)
	{
		return $this->db->from($this->table)
						->where('id_profil', $id_profil)
                        ->get()->row();
	}

	/**
	 * MENYIMPAN PERUBAHAN DATA PROFIL
	 * @param  [type] $id_profil [description]
	 * @param  [type] $data              [description]
	 * @return [type]                    [description]
	 */
	public function update_profil($id_profil, $data)
	{
		return $this->db->where('id_profil', $id_profil)
                        ->update($this->table, $data);

	}

	/**
	 * MENGHAPUS DATA PROFIL BERDASARKAN id_profil
	 * @param  [type] $id_profil [description]
	 * @return [type]                    [description]
	 */
	public function delete_profil($id_profil)
	{
		$this->db->where('id_profil', $id_profil)->delete($this->table);
	}

	/**
	 * MENGHITUNG BANYAKNYA DATA PROFIL
	 * @return [type] [description]
	 */
	public function count_profil()
	{
		return $this->db->from($this->table)
                        ->count_all_results();
	}
	

}

/* End of file Profil_model.php */
/* Location: ./application/models/Profil_model.php */