<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_hutang extends CI_Model {
	//Hutang
	public function createHutang($data)
	{
		$this->db->insert('tbl_hutang_supplier',$data);
		return $this->db->affected_rows();
	}

	public function readHutang()
	{
		$this->db->select('*');
		$this->db->from('tbl_hutang_supplier a');
		$this->db->join('tbl_supplier b', 'a.id_supplier = b.id_supplier');
		return $this->db->get();
	}

	public function updateHutang($id,$data)
	{	
		$this->db->where('id_hutang_supplier',$id);
		$this->db->update('tbl_hutang_supplier',$data);
		return $this->db->affected_rows();
	}

	public function deleteHutang($id)
	{
		$this->db->where('id_hutang_supplier',$id);
		$this->db->delete('tbl_hutang_supplier');
		return $this->db->affected_rows();
	}

	public function whereHutang($id)
	{
		$this->db->where('id_hutang_supplier',$id);
		return $this->db->get('tbl_hutang_supplier');
	}

	public function reportHutang($first, $last)
	{
		$this->db->where('tanggal >=',$first);
		$this->db->where('tanggal <=',$last);
		return $this->db->get('tbl_hutang_supplier');
	}

	public function readViewHutangSupplier()
	{
		return $this->db->get('view_hutang_supplier');
	}

	public function whereViewHutangSupplier($id)
	{
		$this->db->where('id_hutang_supplier',$id);
		return $this->db->get('view_hutang_supplier');
	}

	//Sub Hutang
	public function createSubHutang($data)
	{
		$this->db->insert('tbl_sub_hutang_supplier',$data);
		return $this->db->affected_rows();
	}

	public function readSubHutang()
	{
		return $this->db->get('tbl_sub_hutang_supplier');
	}

	public function updateSubHutang($id,$data)
	{	
		$this->db->where('id_sub_hutang_supplier',$id);
		$this->db->update('tbl_sub_hutang_supplier',$data);
		return $this->db->affected_rows();
	}

	public function deleteSubHutang($id)
	{
		$this->db->where('id_sub_hutang_supplier',$id);
		$this->db->delete('tbl_sub_hutang_supplier');
		return $this->db->affected_rows();
	}

	public function whereSubHutang($id)
	{
		$this->db->where('id_sub_hutang_supplier',$id);
		return $this->db->get('tbl_sub_hutang_supplier');
	}

	public function whereSubHutangByIdHutang($id)
	{
		$this->db->where('id_hutang_supplier',$id);
		return $this->db->get('tbl_sub_hutang_supplier');
	}
	
}

