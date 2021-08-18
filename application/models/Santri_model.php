<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri_model extends CI_Model {
	private $table = 'santri';

	/**
	 * MENGAMBIL SEMUA DATA SANTRI
	 * @return [type] [description]
	 */
	public function get_santris()
	{
		return $this->db->from($this->table)
						->join('admin', 'admin.id_admin = santri.id_admin')
						->join('pengurus', 'pengurus.id_pengurus = santri.id_pengurus_pengajar')
                        ->get()->result();
	}

	/**
	 * MENYIMPAN DATA SANTRI
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function insert_santri($data)
	{
		return $this->db->insert($this->table, $data);
	}

	/**
	 * MENGAMBIL DATA SANTRI BERDASARKAN $id_santri
	 * @param  [type] $id_santri [description]
	 * @return [type]                    [description]
	 */
	public function get_santri_where($id_santri)
	{
		return $this->db->from($this->table)
						->join('admin', 'admin.id_admin = santri.id_admin')
						->join('pengurus', 'pengurus.id_pengurus = santri.id_pengurus_pengajar')
						->where('id_santri', $id_santri)
                        ->get()->row();
	}

	/**
	 * MENYIMPAN PERUBAHAN DATA SANTRI
	 * @param  [type] $id_santri [description]
	 * @param  [type] $data              [description]
	 * @return [type]                    [description]
	 */
	public function update_santri($id_santri, $data)
	{
		return $this->db->where('id_santri', $id_santri)
                        ->update($this->table, $data);

	}

	/**
	 * MENGHAPUS DATA SANTRI BERDASARKAN id_santri
	 * @param  [type] $id_santri [description]
	 * @return [type]                    [description]
	 */
	public function delete_santri($id_santri)
	{
		$this->db->where('id_santri', $id_santri)->delete($this->table);
	}

	/**
	 * MENGHITUNG BANYAKNYA DATA SANTRI
	 * @return [type] [description]
	 */
	public function count_santri()
	{
		return $this->db->from($this->table)
                        ->count_all_results();
	}
	

}

/* End of file Santri_model.php */
/* Location: ./application/models/Santri_model.php */