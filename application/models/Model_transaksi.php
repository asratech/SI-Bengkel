<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_transaksi extends CI_Model {
	//Tabel Transaksi
	public function createTransaksi($data)
	{
		$this->db->insert('tbl_transaksi',$data);
		return $this->db->affected_rows();
	}

	public function readTransaksi()
	{
		return $this->db->get('tbl_transaksi');
	}

	public function updateTransaksi($id,$data)
	{	
		$this->db->where('id_transaksi',$id);
		$this->db->update('tbl_transaksi',$data);
		return $this->db->affected_rows();
	}
	public function deleteTransaksi($id)
	{
		$this->db->where('id_transaksi',$id);
		$this->db->delete('tbl_transaksi');
		return $this->db->affected_rows();
	}

	public function whereTransaksi($id)
	{
		$this->db->where('id_transaksi',$id);
		return $this->db->get('tbl_transaksi');
	}

	public function readViewTransaksi()
	{
		return $this->db->get('view_transaksi_costumer');
	}

	public function whereViewTransaksi($id)
	{
		$this->db->where('id_transaksi',$id);
		return $this->db->get('view_transaksi_costumer');
	}
	
	//Tabel Sub Transaksi Barang
	public function createSubTransaksiBarang($data)
	{
		$this->db->insert('tbl_sub_transaksi_barang',$data);
		return $this->db->affected_rows();
	}

	public function readSubTransaksiBarang()
	{
		return $this->db->get('tbl_sub_transaksi_barang');
	}

	public function updateSubTransaksiBarang($id,$data)
	{	
		$this->db->where('id_sub_transaksi_barang',$id);
		$this->db->update('tbl_sub_transaksi_barang',$data);
		return $this->db->affected_rows();
	}
	public function deleteSubTransaksiBarang($id)
	{
		$this->db->where('id_sub_transaksi_barang',$id);
		$this->db->delete('tbl_sub_transaksi_barang');
		return $this->db->affected_rows();
	}

	public function whereSubTransaksiBarang($id)
	{
		$this->db->where('id_sub_transaksi_barang',$id);
		return $this->db->get('tbl_sub_transaksi_barang');
	}

	public function whereSubTransaksiBarangByIdTransaksi($id)
	{
		$this->db->where('id_transaksi',$id);
		return $this->db->get('tbl_sub_transaksi_barang');
	}

	public function readViewTransaksiBarang()
	{
		return $this->db->get('view_transaksi_barang');
	}

	public function whereViewTransaksiBarang($id)
	{
		$this->db->where('id_sub_transaksi_barang',$id);
		return $this->db->get('view_transaksi_barang');
	}

	public function whereViewTransaksiBarangByIdTransaksi($id)
	{
		$this->db->where('id_transaksi',$id);
		return $this->db->get('view_transaksi_barang');
	}
	
	//Tabel Sub Transaksi Jasa
	public function createSubTransaksiJasa($data)
	{
		$this->db->insert('tbl_sub_transaksi_jasa',$data);
		return $this->db->affected_rows();
	}

	public function readSubTransaksiJasa()
	{
		return $this->db->get('tbl_sub_transaksi_jasa');
	}

	public function updateSubTransaksiJasa($id,$data)
	{	
		$this->db->where('id_sub_transaksi_jasa',$id);
		$this->db->update('tbl_sub_transaksi_jasa',$data);
		return $this->db->affected_rows();
	}
	public function deleteSubTransaksiJasa($id)
	{
		$this->db->where('id_sub_transaksi_jasa',$id);
		$this->db->delete('tbl_sub_transaksi_jasa');
		return $this->db->affected_rows();
	}

	public function whereSubTransaksiJasaByIdTransaksi($id)
	{
		$this->db->where('id_transaksi',$id);
		return $this->db->get('tbl_sub_transaksi_jasa');
	}

	public function readViewTransaksiJasa()
	{
		return $this->db->get('view_transaksi_jasa');
	}

	public function whereViewTransaksiJasa($id)
	{
		$this->db->where('id_sub_transaksi_jasa',$id);
		return $this->db->get('view_transaksi_jasa');
	}

	public function whereViewTransaksiJasaByIdTransaksi($id)
	{
		$this->db->where('id_transaksi',$id);
		return $this->db->get('view_transaksi_jasa');
	}

	//Tabel Tmp Transaksi
	public function createTmpTransaksi($data)
	{
		$this->db->insert('tmp_transaksi',$data);
		return $this->db->affected_rows();
	}

	public function readTmpTransaksi()
	{
		return $this->db->get('tmp_transaksi');
	}

	public function updateTmpTransaksi($id,$data)
	{	
		$this->db->where('id_tmp_transaksi',$id);
		$this->db->update('tmp_transaksi',$data);
		return $this->db->affected_rows();
	}
	public function deleteTmpTransaksi($id)
	{
		$this->db->where('id_tmp_transaksi',$id);
		$this->db->delete('tmp_transaksi');
		return $this->db->affected_rows();
	}

	public function whereTmpTransaksi($id)
	{
		$this->db->where('id_tmp_transaksi',$id);
		return $this->db->get('tmp_transaksi');
	}

	public function readViewTmpTransaksi()
	{
		return $this->db->get('view_tmp_transaksi_costumer');
	}

	public function whereViewTmpTransaksi($id)
	{
		$this->db->where('id_tmp_transaksi',$id);
		return $this->db->get('view_tmp_transaksi_costumer');
	}

	//Tabel Tmp Sub Transaksi Barang
	public function createTmpSubTransaksiBarang($data)
	{
		$this->db->insert('tmp_sub_transaksi_barang',$data);
		return $this->db->affected_rows();
	}

	public function readTmpSubTransaksiBarang()
	{
		return $this->db->get('tmp_sub_transaksi_barang');
	}

	public function updateTmpSubTransaksiBarang($id,$data)
	{	
		$this->db->where('id_tmp_sub_transaksi_barang',$id);
		$this->db->update('tmp_sub_transaksi_barang',$data);
		return $this->db->affected_rows();
	}

	public function deleteTmpSubTransaksiBarang($id)
	{
		$this->db->where('id_tmp_sub_transaksi_barang',$id);
		$this->db->delete('tmp_sub_transaksi_barang');
		return $this->db->affected_rows();
	}

	public function whereTmpSubTransaksiBarang($id)
	{
		$this->db->where('id_tmp_sub_transaksi_barang',$id);
		return $this->db->get('tmp_sub_transaksi_barang');
	}

	public function whereTmpSubTransaksiBarangByIdTransaksi($id)
	{
		$this->db->where('id_tmp_transaksi',$id);
		return $this->db->get('tmp_sub_transaksi_barang');
	}

	public function readViewTmpTransaksiBarang()
	{
		return $this->db->get('view_tmp_transaksi_barang');
	}

	public function whereViewTmpTransaksiBarang($id)
	{
		$this->db->where('id_tmp_sub_transaksi_barang',$id);
		return $this->db->get('view_tmp_transaksi_barang');
	}

	public function whereViewTmpTransaksiBarangByIdTransaksi($id)
	{
		$this->db->where('id_tmp_transaksi',$id);
		return $this->db->get('view_tmp_transaksi_barang');
	}

	//Tabel Tmp Sub Transaksi Jasa
	public function createTmpSubTransaksiJasa($data)
	{
		$this->db->insert('tmp_sub_transaksi_jasa',$data);
		return $this->db->affected_rows();
	}

	public function readTmpSubTransaksiJasa()
	{
		return $this->db->get('tmp_sub_transaksi_jasa');
	}

	public function updateTmpSubTransaksiJasa($id,$data)
	{	
		$this->db->where('id_tmp_sub_transaksi_jasa',$id);
		$this->db->update('tmp_sub_transaksi_jasa',$data);
		return $this->db->affected_rows();
	}

	public function updateTmpSubTransaksiJasaByIdTransaksi($id,$data)
	{	
		$this->db->where('id_tmp_transaksi',$id);
		$this->db->where('id_jasa',2);
		$this->db->update('tmp_sub_transaksi_jasa',$data);
		return $this->db->affected_rows();
	}

	public function deleteTmpSubTransaksiJasa($id)
	{
		$this->db->where('id_tmp_sub_transaksi_jasa',$id);
		$this->db->delete('tmp_sub_transaksi_jasa');
		return $this->db->affected_rows();
	}

	public function whereTmpSubTransaksiJasa($id)
	{
		$this->db->where('id_tmp_sub_transaksi_jasa',$id);
		return $this->db->get('tmp_sub_transaksi_jasa');
	}

	public function whereTmpSubTransaksiJasaByIdTransaksi($id)
	{
		$this->db->where('id_tmp_transaksi',$id);
		return $this->db->get('tmp_sub_transaksi_jasa');
	}

	public function readViewTmpTransaksiJasa()
	{
		return $this->db->get('view_tmp_transaksi_jasa');
	}

	public function whereViewTmpTransaksiJasa($id)
	{
		$this->db->where('id_tmp_sub_transaksi_jasa',$id);
		return $this->db->get('view_tmp_transaksi_jasa');
	}

	public function whereViewTmpTransaksiJasaByIdTransaksi($id)
	{
		$this->db->where('id_tmp_transaksi',$id);
		return $this->db->get('view_tmp_transaksi_jasa');
	}

	public function reportTransaksi($first, $last)
	{
		$this->db->select('*');
		$this->db->from('tbl_transaksi a');
		$this->db->join('tbl_costumer b', 'a.id_costumer = b.id_costumer');
		//$this->db->where("tanggal_input BETWEEN '".$first."' AND '".$last."'");
		/*$this->db->where('tanggal_input >=',$first);
		$this->db->where('tanggal_input <=',$last);*/
		return $this->db->get();
	}
		
}
