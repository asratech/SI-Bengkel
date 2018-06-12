<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Costumer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if ($this->session->userdata('admin') == FALSE) {
            redirect('Auth/Login');
        }
        if (empty($this->session->userdata('id_user')) && empty($this->session->userdata('nama')) && empty($this->session->userdata('username')) && empty($this->session->userdata('password')) && empty($this->session->userdata('login')) && empty($this->session->userdata('logout'))) {
            redirect('Auth/Login');
        }
		$this->load->model('Model_costumer');
	}

	public function index()
	{
		$data = array(
			"title" => "Lihat Costumer",
			"content" => "Costumer/costumer.php",
		);
        $this->load->view('index', $data);
	}

    public function ViewAll()
    {
        $data = array(
            "title" => "Lihat Costumer",
            "content" => "Costumer/costumer.php",
            "costumer" => $this->Model_costumer->readCostumer()->result(),
        );
        $this->load->view('index', $data);
    }
    
    public function Add()
    {
    	$data = array(
			"title" => "Tambah Costumer",
			"content" => "Costumer/costumer_form.php",
			"action" => "Insert",
			"button" => "Add",
		);
        $this->load->view('index', $data);
    }

    public function Insert()
    {
    	$data = array(
			'nama_costumer' => strtoupper($this->input->post('nama')),
			'alamat' => strtoupper($this->input->post('alamat')),
			'provinsi' => strtoupper($this->input->post('provinsi')),
			'kota' => strtoupper($this->input->post('kota')),
			'kode_pos' => $this->input->post('kode_pos'),
			'telepon' => $this->input->post('telp'),
			'tanggal_daftar' => date('Y-m-d H:i:s'),
			'id_user' => $this->session->userdata('id_user'),
		);
        if ($this->Model_costumer->createCostumer($data)) {
            $this->session->set_flashdata('massage','Berhasil menambah.');
            $this->session->set_flashdata('type_massage','success');
            redirect('Costumer');
        }else{
            $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menambah.');
            $this->session->set_flashdata('type_massage','danger');
            redirect('Costumer');
        }
    }

    public function Edit($id)
    {
    	$data = array(
			"title" => "Edit Costumer",
			"content" => "Costumer/costumer_edit_form.php",
			"action" => base_url('index.php/Costumer/Update'),
			"costumer" => $this->Model_costumer->whereCostumer($id)->result(),
			"button" => "Update",
		);
        $this->load->view('index', $data);
    }

    public function Update()
    {
    	$data = array(
			'nama_costumer' => strtoupper($this->input->post('nama')),
			'alamat' => strtoupper($this->input->post('alamat')),
			'provinsi' => strtoupper($this->input->post('provinsi')),
			'kota' => strtoupper($this->input->post('kota')),
			'kode_pos' => $this->input->post('kode_pos'),
			'telepon' => $this->input->post('telp'),
			'id_user' => $this->session->userdata('id_user'),
		);
        if ($this->Model_costumer->updateCostumer($this->input->post('id'),$data)) {
            $this->session->set_flashdata('massage','Berhasil mengubah.');
            $this->session->set_flashdata('type_massage','success');
            redirect('Costumer');
        }else{
            $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses mengubah.');
            $this->session->set_flashdata('type_massage','danger');
            redirect('Costumer');
        }
    }

    public function Delete($id)
    {
        if ($this->Model_costumer->deleteCostumer($id)) {
            $this->session->set_flashdata('massage','Berhasil menghapus.');
            $this->session->set_flashdata('type_massage','success');
            redirect('Costumer');
        }else{
            $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menghapus.');
            $this->session->set_flashdata('type_massage','danger');
            redirect('Costumer');
        }
    }

    //laporan
    public function Laporan_perperiode()
    {
        $awal = date_format(date_create($this->input->post('awal')), 'Y-m-d');
        $akhir = date_format(date_create($this->input->post('akhir')), 'Y-m-d');

        $data = array(
            "title" => "Laporan Costumer",
            "barang" => $this->Model_costumer->reportCostumer($awal, $akhir)->result(),
        );
        $html=$this->load->view('Laporan/laporan_costumer.php', $data, true);
        $pdfFilePath = "Laporan_costumer".$awal."-".$akhir.".pdf";
        $this->load->library('m_pdf');
        $pdf = $this->m_pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "I");
    }
}
