<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_pengurus_model extends CI_Model {

	private $table = 'jabatan_pengurus';

	/**
	 * MENGAMBIL SEMUA DATA jabatan_pengurus
	 * @return [type] [description]
	 */
	public function get_jabatan_pengurus()
	{
		return $this->db->from($this->table)
                        ->get()->result();
	}

	/**
	 * MENYIMPAN DATA jabatan_pengurus
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function insert_jabatan_pengurus($data)
	{
		return $this->db->insert($this->table, $data);
	}

	/**
	 * MENGAMBIL DATA jabatan_pengurus BERDASARKAN $id_jabatan_pengurus
	 * @param  [type] $id_jabatan_pengurus [description]
	 * @return [type]                    [description]
	 */
	public function get_jabatan_pengurus_where($id_jabatan_pengurus)
	{
		return $this->db->from($this->table)
						->where('id_jabatan_pengurus', $id_jabatan_pengurus)
                        ->get()->row();
	}

	/**
	 * MENYIMPAN PERUBAHAN DATA jabatan_pengurus
	 * @param  [type] $id_jabatan_pengurus [description]
	 * @param  [type] $data              [description]
	 * @return [type]                    [description]
	 */
	public function update_jabatan_pengurus($id_jabatan_pengurus, $data)
	{
		return $this->db->where('id_jabatan_pengurus', $id_jabatan_pengurus)
                        ->update($this->table, $data);

	}

	/**
	 * MENGHAPUS DATA jabatan_pengurus BERDASARKAN id_jabatan_pengurus
	 * @param  [type] $id_jabatan_pengurus [description]
	 * @return [type]                    [description]
	 */
	public function delete_jabatan_pengurus($id_jabatan_pengurus)
	{
		$this->db->where('id_jabatan_pengurus', $id_jabatan_pengurus)->delete($this->table);
	}

	/**
	 * MENGHITUNG BANYAKNYA DATA jabatan_pengurus
	 * @return [type] [description]
	 */
	public function count_jabatan_pengurus()
	{
		return $this->db->from($this->table)
                        ->count_all_results();
	}
	

}

/* End of file Jabatan_pengurus_model.php */
/* Location: ./application/models/Jabatan_pengurus_model.php */