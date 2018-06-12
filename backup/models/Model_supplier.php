<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_supplier extends CI_Model {
	public function createSupplier($data)
	{
		$this->db->insert('tbl_supplier',$data);
		return $this->db->affected_rows();
	}
	public function readSupplier()
	{
		return $this->db->get('tbl_supplier');
	}
	public function updateSupplier($id,$data)
	{	
		$this->db->where('id_supplier',$id);
		$this->db->update('tbl_supplier',$data);
		return $this->db->affected_rows();
	}
	public function deleteSupplier($id)
	{
		$this->db->where('id_supplier',$id);
		$this->db->delete('tbl_supplier');
		return $this->db->affected_rows();
	}
	public function whereSupplier($id)
	{
		$this->db->where('id_supplier',$id);
		return $this->db->get('tbl_supplier');
	}
	public function reportBarang($first, $last)
	{
		$this->db->where('tanggal_input >=',$first);
		$this->db->where('tanggal_input <=',$last);
		return $this->db->get('tbl_supplier');
	}
}
