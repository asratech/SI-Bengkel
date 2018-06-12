<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_bonus extends CI_Model {
	public function createBonus($data)
	{
		$this->db->insert('tbl_bonus',$data);
		return $this->db->affected_rows();
	}
	public function readBonus()
	{
		return $this->db->get('tbl_bonus');
	}
	public function updateBonus($id,$data)
	{	
		$this->db->where('nomor_polisi',$id);
		$this->db->update('tbl_bonus',$data);
		return $this->db->affected_rows();
	}
	public function deleteBonus($id)
	{
		$this->db->where('id_bonus',$id);
		$this->db->delete('tbl_bonus');
		return $this->db->affected_rows();
	}
	public function whereBonus($id)
	{
		$this->db->where('nomor_polisi',$id);
		return $this->db->get('tbl_bonus');
	}	
	public function whereBonusByNmrPolisi($data)
	{
		$this->db->like('nomor_polisi',$data);
		return $this->db->get('tbl_bonus');
	}
}
