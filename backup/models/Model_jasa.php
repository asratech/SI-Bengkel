<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_jasa extends CI_Model {
	public function createJasa($data)
	{
		$this->db->insert('tbl_jasa',$data);
		return $this->db->affected_rows();
	}
	public function readJasa()
	{
		return $this->db->get('tbl_jasa');
	}
	public function updateJasa($id,$data)
	{	
		$this->db->where('id_jasa',$id);
		$this->db->update('tbl_jasa',$data);
		return $this->db->affected_rows();
	}
	public function deleteJasa($id)
	{
		$this->db->where('id_jasa',$id);
		$this->db->delete('tbl_jasa');
		return $this->db->affected_rows();
	}
	public function whereJasa($id)
	{
		$this->db->where('id_jasa',$id);
		return $this->db->get('tbl_jasa');
	}	
	public function reportJasa($first, $last)
	{
		$this->db->where('tanggal_daftar >=',$first);
		$this->db->where('tanggal_daftar <=',$last);
		return $this->db->get('tbl_costumer');
	}
}
