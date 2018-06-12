<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        if ($this->session->userdata('admin') == FALSE) {
            redirect('Auth/Login');
        }
        if (empty($this->session->userdata('id_user')) && empty($this->session->userdata('nama')) && empty($this->session->userdata('username')) && empty($this->session->userdata('password')) && empty($this->session->userdata('login')) && empty($this->session->userdata('logout'))) {
            redirect('Auth/Login');
        }
		$this->load->model('Model_supplier');
	}

	public function index()
	{
		$data = array(
			"title" => "Lihat Supplier",
			"content" => "Supplier/supplier.php",
		);
        $this->load->view('index', $data);
	}

    public function ViewAll()
    {
        $data = array(
            "title" => "Lihat Supplier",
            "content" => "Supplier/supplier.php",
            "supplier" => $this->Model_supplier->readSupplier()->result(),
        );
        $this->load->view('index', $data);
    }
    
    public function Add()
    {
    	$data = array(
			"title" => "Tambah Supplier",
			"content" => "Supplier/supplier_form.php",
			"action" => "Insert",
			"button" => "Add",
		);
        $this->load->view('index', $data);
    }

    public function Insert()
    {
    	$data = array(
			'nama_supplier' => strtoupper($this->input->post('nama')),
			'alamat' => strtoupper($this->input->post('alamat')),
			'provinsi' => strtoupper($this->input->post('provinsi')),
			'kota' => strtoupper($this->input->post('kota')),
			'kode_pos' => $this->input->post('kode_pos'),
			'telepon' => $this->input->post('telp'),
			'tanggal_input' => date('Y-m-d H:i:s'),
			'id_user' => $this->session->userdata('id_user'),
		);
        if ($this->Model_supplier->createSupplier($data)) {
            $this->session->set_flashdata('massage','Berhasil menambahkan.');
            $this->session->set_flashdata('type_massage','success');
            redirect('Supplier');
        }else{
            $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menambahkan.');
            $this->session->set_flashdata('type_massage','danger');
            redirect('Supplier');
        }
    }

    public function Edit($id)
    {
    	$data = array(
			"title" => "Edit Supplier",
			"content" => "Supplier/supplier_edit_form.php",
			"action" => base_url('index.php/Supplier/Update'),
			"supplier" => $this->Model_supplier->whereSupplier($id)->result(),
			"button" => "Update",
		);
        $this->load->view('index', $data);
    }

    public function Update()
    {
    	$data = array(
			'nama_supplier' => strtoupper($this->input->post('nama')),
			'alamat' => strtoupper($this->input->post('alamat')),
			'provinsi' => strtoupper($this->input->post('provinsi')),
			'kota' => strtoupper($this->input->post('kota')),
			'kode_pos' => $this->input->post('kode_pos'),
			'telepon' => $this->input->post('telp'),
			'id_user' => $this->session->userdata('id_user'),
		);
        if ($this->Model_supplier->updateSupplier($this->input->post('id'), $data)) {
            $this->session->set_flashdata('massage','Berhasil mengubah.');
            $this->session->set_flashdata('type_massage','success');
            redirect('Supplier');
        }else{
            $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses mengubah.');
            $this->session->set_flashdata('type_massage','danger');
            redirect('Supplier');
        }
    }

    public function Delete($id)
    {
        if ($this->Model_supplier->deleteSupplier($id)) {
            $this->session->set_flashdata('massage','Berhasil menghapus.');
            $this->session->set_flashdata('type_massage','success');
            redirect('Supplier');
        }else{
            $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menghapus.');
            $this->session->set_flashdata('type_massage','danger');
            redirect('Supplier');
        }
        $this->session->set_flashdata("msg", "Berhasil Dihapus.");
    	redirect('Supplier');
    }

    //laporan
    public function Laporan_perperiode()
    {
        $awal = date_format(date_create($this->input->post('awal')), 'Y-m-d');
        $akhir = date_format(date_create($this->input->post('akhir')), 'Y-m-d');
        $data = array(
            "title" => "Laporan Supplier",
            "barang" => $this->Model_supplier->reportBarang($awal, $akhir)->result(),
        );
        $html=$this->load->view('Laporan/laporan_supplier.php', $data, true);
        $pdfFilePath = "Laporan_supplier".$awal."-".$akhir.".pdf";
        $this->load->library('m_pdf');
        $pdf = $this->m_pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "I");
    }
}
