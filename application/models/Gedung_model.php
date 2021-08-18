<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gedung_model extends CI_Model {
	private $table = 'gedung';

	/**
	 * MENGAMBIL SEMUA DATA GEDUNG
	 * @return [type] [description]
	 */
	public function get_gedung()
	{
		return $this->db->from($this->table)
                        ->get()->result();
	}

	/**
	 * MENYIMPAN DATA GEDUNG
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function insert_gedung($data)
	{
		return $this->db->insert($this->table, $data);
	}

	/**
	 * MENGAMBIL DATA GEDUNG BERDASARKAN $id_gedung
	 * @param  [type] $id_gedung [description]
	 * @return [type]                    [description]
	 */
	public function get_gedung_where($id_gedung)
	{
		return $this->db->from($this->table)
						->where('id_gedung', $id_gedung)
                        ->get()->row();
	}

	/**
	 * MENYIMPAN PERUBAHAN DATA GEDUNG
	 * @param  [type] $id_gedung [description]
	 * @param  [type] $data              [description]
	 * @return [type]                    [description]
	 */
	public function update_gedung($id_gedung, $data)
	{
		return $this->db->where('id_gedung', $id_gedung)
                        ->update($this->table, $data);

	}

	/**
	 * MENGHAPUS DATA GEDUNG BERDASARKAN id_gedung
	 * @param  [type] $id_gedung [description]
	 * @return [type]                    [description]
	 */
	public function delete_gedung($id_gedung)
	{
		$this->db->where('id_gedung', $id_gedung)->delete($this->table);
	}

	/**
	 * MENGHITUNG BANYAKNYA DATA GEDUNG
	 * @return [type] [description]
	 */
	public function count_gedung()
	{
		return $this->db->from($this->table)
                        ->count_all_results();
	}
	

}

/* End of file Gedung_model.php */
/* Location: ./application/models/Gedung_model.php */