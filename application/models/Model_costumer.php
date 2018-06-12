<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_costumer extends CI_Model {
	public function createCostumer($data)
	{
		$this->db->insert('tbl_costumer',$data);
		return $this->db->affected_rows();
	}
	public function readCostumer()
	{
		return $this->db->get('tbl_costumer');
	}
	public function updateCostumer($id,$data)
	{	
		$this->db->where('id_costumer',$id);
		$this->db->update('tbl_costumer',$data);
		return $this->db->affected_rows();
	}
	public function deleteCostumer($id)
	{
		$this->db->where('id_costumer',$id);
		$this->db->delete('tbl_costumer');
		return $this->db->affected_rows();
	}
	public function whereCostumer($id)
	{
		$this->db->where('id_costumer',$id);
		return $this->db->get('tbl_costumer');
	}	

	public function reportCostumer($first, $last)
	{
		$this->db->where('tanggal_daftar >=',$first);
		$this->db->where('tanggal_daftar <=',$last);
		return $this->db->get('tbl_costumer');
	}
}
