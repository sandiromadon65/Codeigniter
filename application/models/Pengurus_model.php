<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus_model extends CI_Model {
	private $table = 'pengurus';

	/**
	 * MENGAMBIL SEMUA DATA PENGURUS
	 * @return [type] [description]
	 */
	public function get_pengurus()
	{
		return $this->db->from($this->table)
						->join('jabatan_pengurus',
								'jabatan_pengurus.id_jabatan_pengurus = pengurus.id_jabatan_pengurus')
                        ->get()->result();
	}

	/**
	 * MENYIMPAN DATA PENGURUS
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function insert_pengurus($data)
	{
		return $this->db->insert($this->table, $data);
	}

	/**
	 * MENGAMBIL DATA PENGURUS BERDASARKAN $id_pengurus
	 * @param  [type] $id_pengurus [description]
	 * @return [type]                    [description]
	 */
	public function get_pengurus_where($id_pengurus)
	{
		return $this->db->from($this->table)
						->where('id_pengurus', $id_pengurus)
                        ->get()->row();
	}

	/**
	 * MENYIMPAN PERUBAHAN DATA PENGURUS
	 * @param  [type] $id_pengurus [description]
	 * @param  [type] $data              [description]
	 * @return [type]                    [description]
	 */
	public function update_pengurus($id_pengurus, $data)
	{
		return $this->db->where('id_pengurus', $id_pengurus)
                        ->update($this->table, $data);

	}

	/**
	 * MENGHAPUS DATA PENGURUS BERDASARKAN id_pengurus
	 * @param  [type] $id_pengurus [description]
	 * @return [type]                    [description]
	 */
	public function delete_pengurus($id_pengurus)
	{
		$this->db->where('id_pengurus', $id_pengurus)->delete($this->table);
	}

	/**
	 * MENGHITUNG BANYAKNYA DATA PENGURUS
	 * @return [type] [description]
	 */
	public function count_pengurus()
	{
		return $this->db->from($this->table)
                        ->count_all_results();
	}
	

}

/* End of file Pengurus_model.php */
/* Location: ./application/models/Pengurus_model.php */