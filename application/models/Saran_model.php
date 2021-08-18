<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saran_model extends CI_Model {
	private $table = 'saran';

	/**
	 * MENGAMBIL SEMUA DATA SARAN
	 * @return [type] [description]
	 */
	public function get_sarans()
	{
		return $this->db->from($this->table)
                        ->get()->result();
	}

	/**
	 * MENYIMPAN DATA SARAN
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function insert_saran($data)
	{
		return $this->db->insert($this->table, $data);
	}

	/**
	 * MENGAMBIL DATA SARAN BERDASARKAN $id_saran
	 * @param  [type] $id_saran [description]
	 * @return [type]                    [description]
	 */
	public function get_saran_where($id_saran)
	{
		return $this->db->from($this->table)
						->where('id_saran', $id_saran)
                        ->get()->row();
	}

	/**
	 * MENYIMPAN PERUBAHAN DATA SARAN
	 * @param  [type] $id_saran [description]
	 * @param  [type] $data              [description]
	 * @return [type]                    [description]
	 */
	public function update_saran($id_saran, $data)
	{
		return $this->db->where('id_saran', $id_saran)
                        ->update($this->table, $data);

	}

	/**
	 * MENGHAPUS DATA SARAN BERDASARKAN id_saran
	 * @param  [type] $id_saran [description]
	 * @return [type]                    [description]
	 */
	public function delete_saran($id_saran)
	{
		$this->db->where('id_saran', $id_saran)->delete($this->table);
	}

	/**
	 * MENGHITUNG BANYAKNYA DATA SARAN
	 * @return [type] [description]
	 */
	public function count_saran()
	{
		return $this->db->from($this->table)
                        ->count_all_results();
	}
	

}

/* End of file Saran_model.php */
/* Location: ./application/models/Saran_model.php */