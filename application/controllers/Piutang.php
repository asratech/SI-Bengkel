<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Piutang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('admin') == FALSE) {
			redirect('Auth/Login');
		}
		if (empty($this->session->userdata('id_user')) && empty($this->session->userdata('nama')) && empty($this->session->userdata('username')) && empty($this->session->userdata('password')) && empty($this->session->userdata('login')) && empty($this->session->userdata('logout'))) {
			redirect('Auth/Login');
		}
		$this->load->model('Model_piutang');
		$this->load->model('Model_costumer');
	}

	public function index()
	{
		$data = array(
			"title" => "Lihat Piutang",
			"content" => "Piutang/piutang.php",
		);
        $this->load->view('index', $data);
	}

	public function ViewAll()
	{
		$data = array(
			"title" => "Lihat piutang",
			"content" => "Piutang/piutang.php",
			"piutang" => $this->Model_piutang->readPiutang()->result(),
		);
        $this->load->view('index', $data);
	}
    
    public function Add()
    {
    	$data = array(
			"title" => "Tambah Piutang",
			"content" => "Piutang/piutang_form.php",
			"action" => "insert",
			"button" => "Add",
		);
        $this->load->view('index', $data);
    }

    public function Insert()
    {
    	$data = array(
			'id_costumer' => $this->input->post('id_costumer'),
			'jumlah' => $this->input->post('jumlah'),
			'bayar' => $this->input->post('bayar'),
			'keterangan' => strtoupper($this->input->post('keterangan')),
			'tanggal' => date('Y-m-d H:i:s'),
			'tanggal_input' => date('Y-m-d H:i:s'),
			'id_user' => $this->session->userdata('id_user'),
		);
		if ($this->Model_piutang->createHutang($data)) {
			$this->session->set_flashdata('massage','Berhasil menambahkan.');
			$this->session->set_flashdata('type_massage','success');
			redirect('Piutang');
		}else{
			$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menambahkan.');
			$this->session->set_flashdata('type_massage','danger');
			redirect('Piutang');
		}
    }

    public function Edit($id)
    {
    	$data = array(
			"title" => "Edit Piutang",
			"content" => "Piutang/piutang_edit_form.php",
			"action" => base_url('index.php/Piutang/Update'),
			"costumer" => $this->Model_supplier->readCostumer()->result(),
			"piutang" => $this->Model_piutang->wherePiutang($id)->result(),
			"button" => "Update",
		);
        $this->load->view('index', $data);
    }

    public function Update($id)
    {
    	$data = array(
			'id_costumer' => $this->input->post('id_costumer'),
			'jumlah' => $this->input->post('jumlah'),
			'bayar' => $this->input->post('bayar'),
			'keterangan' => strtoupper($this->input->post('keterangan')),
			'tanggal_input' => date('Y-m-d H:i:s'),
			'id_user' => $this->session->userdata('id_user'),
		);
    	if ($this->Model_piutang->updatePiutang($id, $data)) {
			$this->session->set_flashdata('massage','Berhasil mengubah.');
			$this->session->set_flashdata('type_massage','success');
			redirect('Piutang');
		}else{
			$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses mengubah.');
			$this->session->set_flashdata('type_massage','danger');
			redirect('Piutang');
		}
    }

    public function Delete($id)
    {
    	if ($this->Model_piutang->deletePiutang($id)) {
			$this->session->set_flashdata('massage','Berhasil menghapus.');
			$this->session->set_flashdata('type_massage','success');
			redirect('Piutang');
		}else{
			$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menghapus.');
			$this->session->set_flashdata('type_massage','danger');
			redirect('Piutang');
		}
    }

    //Bayar
    public function Bayar($id){
    	$data = array(
			"title" => "Bayar Piutang",
			"content" => "Piutang/piutang_bayar_form.php",
			"piutang" => $this->Model_piutang->wherePiutang($id)->row(),
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
			redirect('Piutang');
    	}else{
    		$data = array(
	    		"id_piutang_costumer" => $id,
				"bayar" => $bayar,
				"keterangan" => $this->input->post('keterangan'),
				'tanggal' => date('Y-m-d H:i:s'),
				'tanggal_input' => date('Y-m-d H:i:s'),
				'id_user' => $this->session->userdata('id_user'),
			);
	    	if ($this->Model_piutang->createSubPiutang($data)) {
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
				if ($this->Model_piutang->updatePiutang($id, $data2)) {
					$this->session->set_flashdata('massage','Berhasil membayar.');
					$this->session->set_flashdata('type_massage','success');
					redirect('Piutang');
				}else{
					$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses membayar. #02');
					$this->session->set_flashdata('type_massage','danger');
					redirect('Piutang');
				}
			}else{
				$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses membayar. #01');
				$this->session->set_flashdata('type_massage','danger');
				redirect('Piutang');
			}
    	}
    }

    //Sub Piutang
    public function Detail($id)
    {
    	$data = array(
			"title" => "Lihat Detail Piutang",
			"content" => "Piutang/piutang_detail.php",
			"piutang" => $this->Model_piutang->whereViewPiutangCostumer($id)->row(),
			"sub_piutang" => $this->Model_piutang->whereSubPiutangByIdPiutang($id)->result(),
		);
		$this->load->view('index', $data);
    }

    public function DeleteSubPiutang($id_piutang,$id_sub_piutang)
    {
    	$tblPiutang = $this->Model_piutang->wherePiutang($id_piutang)->row();
    	$tblSubPiutang = $this->Model_piutang->whereSubPiutang($id_sub_piutang)->row();
    	$sisa = $tblPiutang->sisa + $tblSubPiutang->bayar;
    	if ($sisa == 0) {
			$keterangan = "LUNAS";
		}else{
			$keterangan = "BELUM LUNAS";
		}
    	$data = array(
    		'bayar' => $tblPiutang->bayar - $tblSubPiutang->bayar,
    		'sisa' => $tblPiutang->sisa + $tblSubPiutang->bayar, 
    		'keterangan' => $keterangan,
    	);
    	if ($this->Model_piutang->updatePiutang($id_piutang,$data)) {
    		if ($this->Model_piutang->deleteSubPiutang($id_sub_piutang)) {
	    		$this->session->set_flashdata('massage','Berhasil menghapus.');
				$this->session->set_flashdata('type_massage','success');
				redirect('Piutang/Detail/'.$id_piutang);
	    	}else{
	    		$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menghapus. #02');
				$this->session->set_flashdata('type_massage','danger');
				redirect('Piutang/Detail/'.$id_piutang);
	    	}	
    	}else{
    		$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menghapus. #01');
			$this->session->set_flashdata('type_massage','danger');
			redirect('Piutang/Detail/'.$id_piutang);
    	}
    }

    //laporan
    public function Laporan_perperiode()
    {
    	$awal = date_format(date_create($this->input->post('awal')), 'Y-m-d');
    	$akhir = date_format(date_create($this->input->post('akhir')), 'Y-m-d');

    	$data = array(
			"title" => "Laporan Piutang",
			//"content" => "Laporan/laporan_barang.php",
			"piutang" => $this->Model_piutang->reportPiutang($awal, $akhir)->result(),
		);
		$html=$this->load->view('Laporan/laporan_piutang.php', $data, true);
		$pdfFilePath = "namafilepdf.pdf";
		$this->load->library('m_pdf');
		$pdf = $this->m_pdf->load();
		$pdf->WriteHTML($html);
		$pdf->Output($pdfFilePath, "I");
    }
}
