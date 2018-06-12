<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hutang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('admin') == FALSE) {
			redirect('Auth/Login');
		}
		if (empty($this->session->userdata('id_user')) && empty($this->session->userdata('nama')) && empty($this->session->userdata('username')) && empty($this->session->userdata('password')) && empty($this->session->userdata('login')) && empty($this->session->userdata('logout'))) {
			redirect('Auth/Login');
		}
		$this->load->model('Model_hutang');
		$this->load->model('Model_supplier');
	}

	public function index()
	{
		$data = array(
			"title" => "Lihat Hutang",
			"content" => "Hutang/hutang.php",
		);
        $this->load->view('index', $data);
	}

	public function ViewAll()
	{
		$data = array(
			"title" => "Lihat Hutang",
			"content" => "Hutang/hutang.php",
			"hutang" => $this->Model_hutang->readHutang()->result(),
		);
        $this->load->view('index', $data);
	}
    
    public function Add()
    {
    	$data = array(
			"title" => "Tambah Hutang",
			"content" => "Hutang/hutang_form.php",
			"action" => "insert",
			"supplier" => $this->Model_supplier->readSupplier()->result(),
			"button" => "Add",
		);
        $this->load->view('index', $data);
    }

    public function Insert()
    {
    	$data = array(
			'id_supplier' => $this->input->post('id_supplier'),
			'jumlah' => $this->input->post('jumlah'),
			'bayar' => 0,
			'sisa' => $this->input->post('jumlah'),
			'keterangan' => $this->input->post('keterangan'),
			'tanggal' =>  $this->input->post('tanggal'),
			'tanggal_input' => date('Y-m-d H:i:s'),
			'id_user' => $this->session->userdata('id_user'),
		);
		if ($this->Model_hutang->createHutang($data)) {
			$this->session->set_flashdata('massage','Berhasil menambahkan.');
			$this->session->set_flashdata('type_massage','success');
			redirect('Hutang');
		}else{
			$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menambahkan.');
			$this->session->set_flashdata('type_massage','danger');
			redirect('Hutang');
		}
    }

    public function Edit($id)
    {
    	$data = array(
			"title" => "Edit Hutang",
			"content" => "Hutang/hutang_edit_form.php",
			"action" => base_url('index.php/Hutang/Update'),
			"supplier" => $this->Model_supplier->readSupplier()->result(),
			"hutang" => $this->Model_hutang->whereHutang($id)->row(),
			"button" => "Update",
		);
        $this->load->view('index', $data);
    }

    public function Update($id)
    {
    	$data = array(
			'id_supplier' => $this->input->post('id_supplier'),
			'jumlah' => $this->input->post('jumlah'),
			'sisa' => $this->input->post('jumlah')-$this->input->post('bayar'),
			'keterangan' => $this->input->post('keterangan'),
			'tanggal' => $this->input->post('tanggal'),
			'id_user' => $this->session->userdata('id_user'),
		);
		if ($this->Model_hutang->updateHutang($id, $data)) {
			$this->session->set_flashdata('massage','Berhasil mengubah.');
			$this->session->set_flashdata('type_massage','success');
			redirect('Hutang');
		}else{
			$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses mengubah.');
			$this->session->set_flashdata('type_massage','danger');
			redirect('Hutang');
		}
    }

    public function Delete($id)
    {
    	if ($this->Model_hutang->deleteHutang($id)) {
    		$this->session->set_flashdata('massage','Berhasil menghapus.');
			$this->session->set_flashdata('type_massage','success');
			redirect('Hutang');
    	}else{
    		$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menghapus.');
			$this->session->set_flashdata('type_massage','danger');
			redirect('Hutang');
    	}
    }

    //Bayar
    public function Bayar($id){
    	$data = array(
			"title" => "Bayar Hutang",
			"content" => "Hutang/hutang_bayar_form.php",
			"hutang" => $this->Model_hutang->whereHutang($id)->row(),
			"button" => "Bayar",
		);
        $this->load->view('index', $data);
    }

    public function BayarAction($id){
    	$bayar = $this->input->post('bayar');
    	$sisa = $this->input->post('sisa');
    	if ($bayar > $sisa) {
    		$this->session->set_flashdata('massage','Jumlah pembayaran terlalu banyak dari sisa pembayaran.');
			$this->session->set_flashdata('type_massage','danger');
			redirect('Hutang');
    	}else{
    		$data = array(
	    		"id_hutang_supplier" => $id,
				"bayar" => $bayar,
				"keterangan" => $this->input->post('keterangan'),
				'tanggal' => $this->input->post('tanggal'),
				'tanggal_input' => date('Y-m-d H:i:s'),
				'id_user' => $this->session->userdata('id_user'),
			);
			if ($this->Model_hutang->createSubHutang($data)) {
				$bayar += $this->input->post('bayar2');
				$sisa = $this->input->post('jumlah')-$bayar;
				if ($sisa == 0) {
					$keterangan = "LUNAS";
				}else{
					$keterangan = "BELUM LUNAS";
				}
				$data2 = array(
					'bayar' => $bayar,
					'sisa' => $sisa,
					'keterangan' => $keterangan,
				);
				if ($this->Model_hutang->updateHutang($id, $data2)) {
					$this->session->set_flashdata('massage','Berhasil membayar.');
					$this->session->set_flashdata('type_massage','success');
					redirect('Hutang');
				}else{
					$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses membayar. #02');
					$this->session->set_flashdata('type_massage','danger');
					redirect('Hutang');
				}
			}else{
				$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses membayar. #01');
				$this->session->set_flashdata('type_massage','danger');
				redirect('Hutang');
			}
    	}
    }

    //Sub Hutang
    public function Detail($id)
    {
    	$data = array(
			"title" => "Lihat Detail Hutang",
			"content" => "Hutang/hutang_detail.php",
			"hutang" => $this->Model_hutang->whereViewHutangSupplier($id)->row(),
			"sub_hutang" => $this->Model_hutang->whereSubHutangByIdHutang($id)->result(),
		);
		$this->load->view('index', $data);
    }

    public function DeleteSubHutang($id_hutang,$id_sub_hutang)
    {
    	$tblHutang = $this->Model_hutang->whereHutang($id_hutang)->row();
    	$tblSubHutang = $this->Model_hutang->whereSubHutang($id_sub_hutang)->row();
    	$sisa = $tblHutang->sisa + $tblSubHutang->bayar;
    	if ($sisa == 0) {
			$keterangan = "LUNAS";
		}else{
			$keterangan = "BELUM LUNAS";
		}
    	$data = array(
    		'bayar' => $tblHutang->bayar - $tblSubHutang->bayar,
    		'sisa' => $tblHutang->sisa + $tblSubHutang->bayar, 
    		'keterangan' => $keterangan,
    	);
    	if ($this->Model_hutang->updateHutang($id_hutang,$data)) {
    		if ($this->Model_hutang->deleteSubHutang($id_sub_hutang)) {
	    		$this->session->set_flashdata('massage','Berhasil menghapus.');
				$this->session->set_flashdata('type_massage','success');
				redirect('Hutang/Detail/'.$id_hutang);
	    	}else{
	    		$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menghapus. #02');
				$this->session->set_flashdata('type_massage','danger');
				redirect('Hutang/Detail/'.$id_hutang);
	    	}	
    	}else{
    		$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menghapus. #01');
			$this->session->set_flashdata('type_massage','danger');
			redirect('Hutang/Detail/'.$id_hutang);
    	}
    }

    //laporan
    public function Laporan_perperiode()
    {
    	$awal = date_format(date_create($this->input->post('awal')), 'Y-m-d');
    	$akhir = date_format(date_create($this->input->post('akhir')), 'Y-m-d');

    	$data = array(
			"title" => "Laporan Hutang",
			//"content" => "Laporan/laporan_barang.php",
			"hutang" => $this->Model_hutang->reportHutang($awal, $akhir)->result(),
		);
		$html=$this->load->view('Laporan/laporan_hutang.php', $data, true);
		$pdfFilePath = "namafilepdf.pdf";
		$this->load->library('m_pdf');
		$pdf = $this->m_pdf->load();
		$pdf->WriteHTML($html);
		$pdf->Output($pdfFilePath, "I");
    }
}
