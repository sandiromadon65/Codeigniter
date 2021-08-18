<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_model extends CI_Model {
	private $table = 'informasi';

	/**
	 * MENGAMBIL SEMUA DATA INFORMASI
	 * @return [type] [description]
	 */
	public function get_informasis()
	{
		return $this->db->from($this->table)
                        ->get()->result();
	}

	/**
	 * MENYIMPAN DATA INFORMASI
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function insert_informasi($data)
	{
		return $this->db->insert($this->table, $data);
	}

	/**
	 * MENGAMBIL DATA INFORMASI BERDASARKAN $id_informasi
	 * @param  [type] $id_informasi [description]
	 * @return [type]                    [description]
	 */
	public function get_informasi_where($id_informasi)
	{
		return $this->db->from($this->table)
						->where('id_informasi', $id_informasi)
                        ->get()->row();
	}

	/**
	 * MENYIMPAN PERUBAHAN DATA INFORMASI
	 * @param  [type] $id_informasi [description]
	 * @param  [type] $data              [description]
	 * @return [type]                    [description]
	 */
	public function update_informasi($id_informasi, $data)
	{
		return $this->db->where('id_informasi', $id_informasi)
                        ->update($this->table, $data);

	}

	/**
	 * MENGHAPUS DATA INFORMASI BERDASARKAN id_informasi
	 * @param  [type] $id_informasi [description]
	 * @return [type]                    [description]
	 */
	public function delete_informasi($id_informasi)
	{
		$this->db->where('id_informasi', $id_informasi)->delete($this->table);
	}

	/**
	 * MENGHITUNG BANYAKNYA DATA INFORMASI
	 * @return [type] [description]
	 */
	public function count_informasi()
	{
		return $this->db->from($this->table)
                        ->count_all_results();
	}
	

}

/* End of file Informasi_model.php */
/* Location: ./application/models/Informasi_model.php */