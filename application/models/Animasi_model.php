<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Animasi_model extends CI_Model {
    private $table = 'animasi';
    
    /**
	 * MENGAMBIL SEMUA DATA ANIMASI
	 * @return [type] [description]
	 */
	public function get_animasi()
	{
		return $this->db->from($this->table)
						->join('admin', 'admin.id_admin = animasi.id_admin')
                        ->get()->result();
    }
    
    /**
	 * MENYIMPAN DATA ANIMASI
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function insert_animasi($data)
	{
		return $this->db->insert($this->table, $data);
    }
    
    /**
	 * MENGAMBIL DATA ANIMASI BERDASARKAN $id_animasi
	 * @param  [type] $id_animasi [description]
	 * @return [type]                    [description]
	 */
	public function get_animasi_where($id_animasi)
	{
		return $this->db->from($this->table)
						->where('id_animasi', $id_animasi)
                        ->get()->row();
    }
    
    /**
	 * MENYIMPAN PERUBAHAN DATA ANIMASI
	 * @param  [type] $id_animasi [description]
	 * @param  [type] $data              [description]
	 * @return [type]                    [description]
	 */
	public function update_animasi($id_animasi, $data)
	{
		return $this->db->where('id_animasi', $id_animasi)
                        ->update($this->table, $data);
    }
    
    /**
	 * MENGHAPUS DATA ANIMASI BERDASARKAN id_animasi
	 * @param  [type] $id_animasi [description]
	 * @return [type]                    [description]
	 */
	public function delete_animasi($id_animasi)
	{
		$this->db->where('id_animasi', $id_animasi)->delete($this->table);
	}
}