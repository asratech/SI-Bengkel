<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_piutang extends CI_Model {
	//Piutang
	public function createPiutang($data)
	{
		$this->db->insert('tbl_piutang_costumer',$data);
		return $this->db->affected_rows();
	}

	public function readPiutang()
	{
		$this->db->select('*');
		$this->db->from('tbl_piutang_costumer a');
		$this->db->join('tbl_costumer b', 'a.id_costumer = b.id_costumer');
		return $this->db->get();
	}

	public function updatePiutang($id,$data)
	{	
		$this->db->where('id_piutang_costumer',$id);
		$this->db->update('tbl_piutang_costumer',$data);
		return $this->db->affected_rows();
	}

	public function deletePiutang($id)
	{
		$this->db->where('id_piutang_costumer',$id);
		$this->db->delete('tbl_piutang_costumer');
		return $this->db->affected_rows();
	}

	public function wherePiutang($id)
	{
		$this->db->where('id_piutang_costumer',$id);
		return $this->db->get('tbl_piutang_costumer');
	}

	public function reportPiutang($first, $last)
	{
		$this->db->where('tanggal >=',$first);
		$this->db->where('tanggal <=',$last);
		return $this->db->get('tbl_piutang_costumer');
	}

	public function readViewPiutangCostumer()
	{
		return $this->db->get('view_piutang_costumer');
	}

	public function whereViewPiutangCostumer($id)
	{
		$this->db->where('id_piutang_costumer',$id);
		return $this->db->get('view_piutang_costumer');
	}

	//Sub Piutang
	public function createSubPiutang($data)
	{
		$this->db->insert('tbl_sub_piutang_costumer',$data);
		return $this->db->affected_rows();
	}

	public function readSubPiutang()
	{
		return $this->db->get('tbl_sub_piutang_costumer');
	}

	public function updateSubPiutang($id,$data)
	{	
		$this->db->where('id_sub_piutang_costumer',$id);
		$this->db->update('tbl_sub_piutang_costumer',$data);
		return $this->db->affected_rows();
	}

	public function deleteSubPiutang($id)
	{
		$this->db->where('id_sub_piutang_costumer',$id);
		$this->db->delete('tbl_sub_piutang_costumer');
		return $this->db->affected_rows();
	}

	public function whereSubPiutang($id)
	{
		$this->db->where('id_sub_piutang_costumer',$id);
		return $this->db->get('tbl_sub_piutang_costumer');
	}

	public function whereSubPiutangByIdPiutang($id)
	{
		$this->db->where('id_piutang_costumer',$id);
		return $this->db->get('tbl_sub_piutang_costumer');
	}
	
}


	/*public function createPiutang($data)
	{
		$this->db->insert('tbl_piutang_costumer',$data);
		return $this->db->affected_rows();
	}
	public function createBayar($data)
	{
		$this->db->insert('tbl_sub_piutang_costumer',$data);
		return $this->db->affected_rows();
	}
	public function readPiutang()
	{
		$this->db->select('*');
		$this->db->from('tbl_piutang_costumer a');
		$this->db->join('tbl_costumer b', 'a.id_costumer = b.id_costumer');
		return $this->db->get();
	}
	public function updatePiutang($id,$data)
	{	
		$this->db->where('id_piutang_costumer',$id);
		$this->db->update('tbl_piutang_costumer',$data);
		return $this->db->affected_rows();
	}
	public function deletePiutang($id)
	{
		$this->db->where('id_piutang_costumer',$id);
		$this->db->delete('tbl_piutang_costumer');
		return $this->db->affected_rows();
	}
	public function wherePiutang($id)
	{
		$this->db->select('*, a.bayar as bayar2');
		$this->db->from('tbl_piutang_costumer a');
		$this->db->join('tbl_sub_piutang_costumer b', 'a.id_piutang_costumer = b.id_piutang_costumer');
		$this->db->where('id_sub_piutang_costumer',$id);
		return $this->db->get();
	}
	public function reportPiutang_lunas($first, $last)
	{
		$this->db->where('tanggal >=',$first);
		$this->db->where('tanggal <=',$last);
		$this->db->where('keterangan', 'Lunas');
		return $this->db->get('tbl_piutang_supplier');
	}
	public function reportPiutang_belumlunas($first, $last)
	{
		$this->db->where('tanggal >=',$first);
		$this->db->where('tanggal <=',$last);
		$this->db->where('keterangan', 'Belum Lunas');
		return $this->db->get('tbl_piutang_supplier');
	}*/

