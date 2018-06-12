<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jasa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        if ($this->session->userdata('admin') == FALSE) {
            redirect('Auth/Login');
        }
        if (empty($this->session->userdata('id_user')) && empty($this->session->userdata('nama')) && empty($this->session->userdata('username')) && empty($this->session->userdata('password')) && empty($this->session->userdata('login')) && empty($this->session->userdata('logout'))) {
            redirect('Auth/Login');
        }
		$this->load->model('Model_jasa');
	}

	public function index()
	{
		$data = array(
			"title" => "Lihat Jasa",
			"content" => "Jasa/jasa.php",
		);
        $this->load->view('index', $data);
	}

	public function ViewAll()
	{
		$data = array(
			"title" => "Lihat Jasa",
			"content" => "Jasa/jasa.php",
			"jasa" => $this->Model_jasa->readJasa()->result(),
		);
        $this->load->view('index', $data);
	}
    
    public function Add()
    {
    	$data = array(
			"title" => "Tambah Jasa",
			"content" => "Jasa/jasa_form.php",
			"action" => "insert",
			"button" => "Add",
		);
        $this->load->view('index', $data);
    }

    public function Insert()
    {
    	$data = array(
			'nama_jasa' => strtoupper($this->input->post('nama')),
			'harga_pokok' => $this->input->post('harga_pokok'),
			'harga_jual' => $this->input->post('harga_jual'),
			'diskon' => $this->input->post('diskon'),
			'ppn' => $this->input->post('ppn'),
			'tanggal_input' => date('Y-m-d H:i:s'),
			'id_user' => $this->session->userdata('id_user'),
		);
        if ($this->Model_jasa->createJasa($data)) {
            $this->session->set_flashdata('massage','Berhasil menambahkan.');
            $this->session->set_flashdata('type_massage','success');
            redirect('Jasa');
        }else{
            $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menambahkan.');
            $this->session->set_flashdata('type_massage','danger');
            redirect('Jasa');
        }
    }

    public function Edit($id)
    {
    	$data = array(
			"title" => "Edit Jasa",
			"content" => "Jasa/jasa_edit_form.php",
			"action" => base_url('index.php/Jasa/update'),
			"jasa" => $this->Model_jasa->whereJasa($id)->result(),
			"button" => "Update",
		);
        $this->load->view('index', $data);
    }

    public function Update()
    {
    	$data = array(
			'nama_jasa' => strtoupper($this->input->post('nama')),
			'harga_pokok' => $this->input->post('harga_pokok'),
			'harga_jual' => $this->input->post('harga_jual'),
			'diskon' => $this->input->post('diskon'),
			'ppn' => $this->input->post('ppn'),
			'id_user' => $this->session->userdata('id_user'),
		);
        if ($this->Model_jasa->updateJasa($this->input->post('id'), $data)) {
            $this->session->set_flashdata('massage','Berhasil mengubah.');
            $this->session->set_flashdata('type_massage','success');
            redirect('Jasa');
        }else{
            $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses mengubah.');
            $this->session->set_flashdata('type_massage','danger');
            redirect('Jasa');
        }
    }

    public function Delete($id)
    {
    	if ($this->Model_jasa->deleteJasa($id)) {
            $this->session->set_flashdata('massage','Berhasil menghapus.');
            $this->session->set_flashdata('type_massage','success');
            redirect('Jasa');
        }else{
            $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menghapus.');
            $this->session->set_flashdata('type_massage','danger');
            redirect('Jasa');
        }
    }

    //laporan
    public function Laporan_perperiode()
    {
        $awal = date_format(date_create($this->input->post('awal')), 'Y-m-d');
        $akhir = date_format(date_create($this->input->post('akhir')), 'Y-m-d');

        $data = array(
            "title" => "Laporan Jasa",
            //"content" => "Laporan/laporan_barang.php",
            "barang" => $this->Model_jasa->reportJasa($awal, $akhir)->result(),
        );
        $html=$this->load->view('Laporan/laporan_jasa.php', $data, true);
        $pdfFilePath = "Laporan_jasa".$awal."-".$akhir.".pdf";
        $this->load->library('m_pdf');
        $pdf = $this->m_pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "I");
    }
}
