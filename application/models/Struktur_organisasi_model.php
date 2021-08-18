<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur_organisasi_model extends CI_Model {
	private $table = 'struktur_organisasi';

	/**
	 * MENGAMBIL SEMUA DATA struktur_organisasi
	 * @return [type] [description]
	 */
	public function get_struktur_organisasi()
	{
		return $this->db->from($this->table)
                        ->get()->result();
	}

	/**
	 * MENYIMPAN DATA struktur_organisasi
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function insert_struktur_organisasi($data)
	{
		return $this->db->insert($this->table, $data);
	}

	/**
	 * MENGAMBIL DATA struktur_organisasi BERDASARKAN $id_struktur_organisasi
	 * @param  [type] $id_struktur_organisasi [description]
	 * @return [type]                    [description]
	 */
	public function get_struktur_organisasi_where($id_struktur_organisasi)
	{
		return $this->db->from($this->table)
						->where('id_struktur_organisasi', $id_struktur_organisasi)
                        ->get()->row();
	}

	/**
	 * MENYIMPAN PERUBAHAN DATA struktur_organisasi
	 * @param  [type] $id_struktur_organisasi [description]
	 * @param  [type] $data              [description]
	 * @return [type]                    [description]
	 */
	public function update_struktur_organisasi($id_struktur_organisasi, $data)
	{
		return $this->db->where('id_struktur_organisasi', $id_struktur_organisasi)
                        ->update($this->table, $data);

	}

	/**
	 * MENGHAPUS DATA struktur_organisasi BERDASARKAN id_struktur_organisasi
	 * @param  [type] $id_struktur_organisasi [description]
	 * @return [type]                    [description]
	 */
	public function delete_struktur_organisasi($id_struktur_organisasi)
	{
		$this->db->where('id_struktur_organisasi', $id_struktur_organisasi)->delete($this->table);
	}

	/**
	 * MENGHITUNG BANYAKNYA DATA struktur_organisasi
	 * @return [type] [description]
	 */
	public function count_struktur_organisasi()
	{
		return $this->db->from($this->table)
                        ->count_all_results();
	}
	

}

/* End of file Struktur_organisasi_model.php */
/* Location: ./application/models/Struktur_organisasi_model.php */