<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {
	private $table = 'galeri';

	/**
	 * MENGAMBIL SEMUA DATA GALERI
	 * @return [type] [description]
	 */
	public function get_galeris()
	{
		return $this->db->from($this->table)
						->join('admin', 'admin.id_admin = galeri.id_admin')
                        ->get()->result();
	}

	/**
	 * MENYIMPAN DATA GALERI
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function insert_galeri($data)
	{
		return $this->db->insert($this->table, $data);
	}

	/**
	 * MENGAMBIL DATA GALERI BERDASARKAN $id_galeri
	 * @param  [type] $id_galeri [description]
	 * @return [type]                    [description]
	 */
	public function get_galeri_where($id_galeri)
	{
		return $this->db->from($this->table)
						->where('id_galeri', $id_galeri)
                        ->get()->row();
	}

	/**
	 * MENYIMPAN PERUBAHAN DATA GALERI
	 * @param  [type] $id_galeri [description]
	 * @param  [type] $data              [description]
	 * @return [type]                    [description]
	 */
	public function update_galeri($id_galeri, $data)
	{
		return $this->db->where('id_galeri', $id_galeri)
                        ->update($this->table, $data);
	}

	/**
	 * MENGHAPUS DATA GALERI BERDASARKAN id_galeri
	 * @param  [type] $id_galeri [description]
	 * @return [type]                    [description]
	 */
	public function delete_galeri($id_galeri)
	{
		$this->db->where('id_galeri', $id_galeri)->delete($this->table);
	}

	/**
	 * MENGHITUNG BANYAKNYA DATA GALERI
	 * @return [type] [description]
	 */
	public function count_galeri()
	{
		return $this->db->from($this->table)
                        ->count_all_results();
	}
	

}

/* End of file Galeri_model.php */
/* Location: ./application/models/Galeri_model.php */