<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar_model extends CI_Model {
	private $table = 'kamar';

	/**
	 * MENGAMBIL SEMUA DATA INFORMASI
	 * @return [type] [description]
	 */
	public function get_kamar()
	{
		return $this->db->from($this->table)
                        ->get()->result();
	}
	public function get_kamar5()
	{
		$this->db->select('*');
        $this->db->from('kamar');
        $this->db->where('kuota < 5');
        $query = $this->db->get();
        return $query->result();
	}
    public function insert_kamar($data)
	{
		return $this->db->insert($this->table, $data);
	}
    public function update_pengurus($id_kamar, $data)
	{
		return $this->db->where('id_kamar', $id_kamar)
                        ->update($this->table, $data);

	}

	public function update($id, $data) {

		$query = $this->db->where("id_kamar", $id)->update($this->table, $data);
		return $query;
	}
	public function get_kuota($table, $where){

		return $this->db->get_where($table, $where);
  
	  }

	/**
	 * MENGHAPUS DATA PENGURUS BERDASARKAN id_kamar
	 * @param  [type] $id_kamar [description]
	 * @return [type]                    [description]
	 */
	public function delete_kamar($id_kamar)
	{
		$this->db->where('id_kamar', $id_kamar)->delete($this->table);
	}

}