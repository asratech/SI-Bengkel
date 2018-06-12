<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_barang extends CI_Model {
	public function createBarang($data)
	{
		$this->db->insert('tbl_barang',$data);
		return $this->db->affected_rows();
	}
	public function readBarang()
	{
		return $this->db->get('tbl_barang');
	}
	public function updateBarang($id,$data)
	{	
		$this->db->where('id_barang',$id);
		$this->db->update('tbl_barang',$data);
		return $this->db->affected_rows();
	}
	public function deleteBarang($id)
	{
		$this->db->where('id_barang',$id);
		$this->db->delete('tbl_barang');
		return $this->db->affected_rows();
	}
	public function whereBarang($id)
	{
		$this->db->where('id_barang',$id);
		return $this->db->get('tbl_barang');
	}	
	public function reportBarang($first, $last)
	{
		$this->db->where('tanggal_masuk >=',$first);
		$this->db->where('tanggal_masuk <=',$last);
		return $this->db->get('tbl_barang');
	}
}
