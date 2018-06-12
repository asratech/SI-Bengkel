<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class barang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('admin') == FALSE) {
			redirect('Auth/Login');
		}
		if (empty($this->session->userdata('id_user')) && empty($this->session->userdata('nama')) && empty($this->session->userdata('username')) && empty($this->session->userdata('password')) && empty($this->session->userdata('login')) && empty($this->session->userdata('logout'))) {
			redirect('Auth/Login');
		}
		$this->load->model('Model_barang');
		$this->load->model('Model_supplier');
		$this->load->model('Model_hutang');
	}

	public function index()
	{
		$data = array(
			"title" => "Lihat Barang",
			"content" => "Barang/barang.php",
		);
        $this->load->view('index', $data);
	}

	public function ViewAll()
	{
		$data = array(
			"title" => "Lihat Barang",
			"content" => "Barang/barang.php",
			"barang" => $this->Model_barang->readBarang()->result(),
		);
        $this->load->view('index', $data);
	}
    
    public function Add()
    {
    	$data = array(
			"title" => "Tambah Barang",
			"content" => "Barang/barang_form.php",
			"action" => "insert",
			"supplier" => $this->Model_supplier->readSupplier()->result(),
			"button" => "Add",
		);
        $this->load->view('index', $data);
    }

    public function Insert()
    {
    	$data = array(
			'nama_barang' => $this->input->post('nama'),
			'satuan_barang' => $this->input->post('satuan'),
			'harga_beli_satuan' => $this->input->post('harga_beli'),
			'harga_jual_satuan' => $this->input->post('harga_jual'),
			'diskon' => $this->input->post('diskon'),
			'ppn' => $this->input->post('ppn'),
			'stock_barang' => $this->input->post('stok'),
			'id_supplier' => $this->input->post('id_supplier'),
			'tanggal_masuk' => $this->input->post('tgl'),
			'tanggal_input' => date('Y-m-d H:i:s'),
			'id_user' => $this->session->userdata('id_user'),
		);
		if ($this->Model_barang->createBarang($data)) {
			$data2 = array(
    			'id_supplier' => $this->input->post('id_supplier'),
    			'jumlah' => $this->input->post('harga_beli')*$this->input->post('stok'),
    			'sisa' => $this->input->post('harga_beli')*$this->input->post('stok'),
    			'tanggal' => date('Y-m-d H:i:s'),
				'tanggal_input' => date('Y-m-d H:i:s'),
				'id_user' => $this->session->userdata('id_user'),
    		);
    		if ($this->Model_hutang->createHutang($data2)) {
    			$this->session->set_flashdata('massage','Berhasil menambahkan.');
	            $this->session->set_flashdata('type_massage','success');
	            redirect('Barang');
    		}else{
    			$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menambahkan. #02');
	            $this->session->set_flashdata('type_massage','danger');
	            redirect('Barang');
    		}
		}else{
			$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menambahkan. #01');
            $this->session->set_flashdata('type_massage','danger');
            redirect('Barang');
		}
    }

    public function Edit($id)
    {
    	$data = array(
			"title" => "Edit Barang",
			"content" => "Barang/barang_edit_form.php",
			"action" => base_url('index.php/Barang/update'),
			"barang" => $this->Model_barang->whereBarang($id)->result(),
			"button" => "Update",
		);
        $this->load->view('index', $data);
    }

    public function Update()
    {
    	$data = array(
			'nama_barang' => $this->input->post('nama'),
			'satuan_barang' => $this->input->post('satuan'),
			'harga_beli_satuan' => $this->input->post('harga_beli'),
			'harga_jual_satuan' => $this->input->post('harga_jual'),
			'diskon' => $this->input->post('diskon'),
			'ppn' => $this->input->post('ppn'),
			'stock_barang' => $this->input->post('stok'),
			'tanggal_masuk' => $this->input->post('tgl'),
			'id_user' => $this->session->userdata('id_user'),
		);
		if ($this->Model_barang->updateBarang($this->input->post('id'), $data)) {
			$this->session->set_flashdata('massage','Berhasil mengubah.');
	        $this->session->set_flashdata('type_massage','success');
	        redirect('Barang');
		}else{
			$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses mengubah.');
            $this->session->set_flashdata('type_massage','danger');
            redirect('Barang');
		}
    }

    public function Delete($id)
    {
    	if ($this->Model_barang->deleteBarang($id)) {
    		$this->session->set_flashdata('massage','Berhasil menghapus.');
	        $this->session->set_flashdata('type_massage','success');
	        redirect('Barang');
    	}else{
    		$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menghapus.');
            $this->session->set_flashdata('type_massage','danger');
            redirect('Barang');
    	}
    }

    //laporan
    public function Laporan_perperiode()
    {
    	$awal = date_format(date_create($this->input->post('awal')), 'Y-m-d');
    	$akhir = date_format(date_create($this->input->post('akhir')), 'Y-m-d');

    	$data = array(
			"title" => "Laporan Barang",
			//"content" => "Laporan/laporan_barang.php",
			"barang" => $this->Model_barang->reportBarang($awal, $akhir)->result(),
		);
		$html=$this->load->view('Laporan/laporan_barang.php', $data, true);
		$pdfFilePath = "Laporan_barang".$awal."-".$akhir.".pdf";
		$this->load->library('m_pdf');
		$pdf = $this->m_pdf->load();
		$pdf->WriteHTML($html);
		$pdf->Output($pdfFilePath, "I");
    }
}
