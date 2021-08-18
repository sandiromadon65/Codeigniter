<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan_model extends CI_Model {
	private $table = 'kegiatan';

	/**
	 * MENGAMBIL SEMUA DATA KEGIATAN
	 * @return [type] [description]
	 */
	public function get_kegiatan()
	{
		return $this->db->from($this->table)
						->join('admin', 'admin.id_admin = kegiatan.id_admin')
                        ->get()->result();
	}

	/**
	 * MENYIMPAN DATA KEGIATAN
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function insert_kegiatan($data)
	{
		return $this->db->insert($this->table, $data);
	}

	/**
	 * MENGAMBIL DATA KEGIATAN BERDASARKAN $id_kegiatan
	 * @param  [type] $id_kegiatan [description]
	 * @return [type]                    [description]
	 */
	public function get_kegiatan_where($id_kegiatan)
	{
		return $this->db->from($this->table)
						->where('id_kegiatan', $id_kegiatan)
                        ->get()->row();
	}

	/**
	 * MENYIMPAN PERUBAHAN DATA KEGIATAN
	 * @param  [type] $id_kegiatan [description]
	 * @param  [type] $data              [description]
	 * @return [type]                    [description]
	 */
	public function update_kegiatan($id_kegiatan, $data)
	{
		return $this->db->where('id_kegiatan', $id_kegiatan)
                        ->update($this->table, $data);

	}

	/**
	 * MENGHAPUS DATA KEGIATAN BERDASARKAN id_kegiatan
	 * @param  [type] $id_kegiatan [description]
	 * @return [type]                    [description]
	 */
	public function delete_kegiatan($id_kegiatan)
	{
		$this->db->where('id_kegiatan', $id_kegiatan)->delete($this->table);
	}

	/**
	 * MENGHITUNG BANYAKNYA DATA KEGIATAN
	 * @return [type] [description]
	 */
	public function count_kegiatan()
	{
		return $this->db->from($this->table)
                        ->count_all_results();
	}
	

}

/* End of file Kegiatan_model.php */
/* Location: ./application/models/Kegiatan_model.php */