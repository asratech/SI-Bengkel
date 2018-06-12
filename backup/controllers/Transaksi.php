<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        date_default_timezone_get('Asia/Jakarta');
        if ($this->session->userdata('admin') == FALSE) {
            redirect('Auth/Login');
        }
        if (empty($this->session->userdata('id_user')) && empty($this->session->userdata('nama')) && empty($this->session->userdata('username')) && empty($this->session->userdata('password')) && empty($this->session->userdata('login')) && empty($this->session->userdata('logout'))) {
            redirect('Auth/Login');
        }
		$this->load->model('Model_transaksi');
		$this->load->model('Model_barang');
		$this->load->model('Model_jasa');
		$this->load->model('Model_costumer');
		$this->load->model('Model_piutang');
        $this->load->model('Model_bonus');
	}

	public function index()
	{
		$data = array(
			"title" => "Lihat Transaksi",
			"content" => "Transaksi/transaksi.php",
		);
        $this->load->view('index', $data);
	}

    public function ViewBefore()
    {
        $data = array(
            "title" => "Lihat Transaksi Sebelum Bayar",
            "content" => "Transaksi/transaksi_before.php",
        );
        $this->load->view('index', $data);
    }

	public function ViewAll()
	{
		$data = array(
			"title" => "Lihat Transaksi",
			"content" => "Transaksi/transaksi.php",
			"transaksi" => $this->Model_transaksi->readViewTransaksi()->result(),
		);
        $this->load->view('index', $data);
	}

    public function ViewAllBefore()
    {
        $data = array(
            "title" => "Lihat Transaksi",
            "content" => "Transaksi/transaksi_before.php",
            "transaksi" => $this->Model_transaksi->readTmpTransaksi()->result(),
        );
        $this->load->view('index', $data);
    }

    public function Detail($id){
        $data = array(
            "title" => "Detail Transaksi",
            "content" => "Transaksi/transaksi_detail.php",
            "transaksi_barang" => $this->Model_transaksi->whereViewTransaksiBarangByIdTransaksi($id)->result(),
            "transaksi_jasa" => $this->Model_transaksi->whereViewTransaksiJasaByIdTransaksi($id)->result(),
        );
        $this->load->view('index', $data);
    }

	public function Add()
    {
    	$data = array(
			"title" => "Tambah Transaksi",
			"content" => "Transaksi/transaksi_form.php",
			"action" => "insert",
			"button" => "Add",
            "no_bukti" => 'TRS-'.date("YmdHis"),
			"costumer" => $this->Model_costumer->readCostumer()->result(),
		);
        $this->load->view('index', $data);
    }

    public  function Add_sub($id_tmp){
    	$data2 = array(
    		"id_tmp" => $id_tmp,
			"title" => "Tambah Sub Transaksi",
			"content" => "Transaksi/transaksi_sub_form.php",
			"action_barang" => site_url('Transaksi/Insert_barang'),
			"action_jasa" => site_url('Transaksi/Insert_jasa'),
			"actionBayar" => site_url('Transaksi/Confirm'),
			"button" => "Add",
			"transaksi" => $this->Model_transaksi->whereViewTmpTransaksi($id_tmp)->row(),
			"transaksi_barang" => $this->Model_transaksi->whereViewTmpTransaksiBarangByIdTransaksi($id_tmp)->result(),
			"transaksi_jasa" => $this->Model_transaksi->whereViewTmpTransaksiJasaByIdTransaksi($id_tmp)->result(),
            "bonus" => $this->Model_bonus->readBonus()->result(),
			"barang" => $this->Model_barang->readBarang()->result(),
			"jasa" => $this->Model_jasa->readJasa()->result(),
		);
        $this->load->view('index', $data2);
    }

    public function Insert()
    {
    	$data = array(
			'nomor_polisi' => $this->input->post('nopolisi'),
			'tipe_kendaraan' => $this->input->post('tipe'),
			'id_costumer' => $this->input->post('id_costumer'),
			'nomor_bukti_transaksi' => $this->input->post('nobukti'),
			'tanggal_input' => date('Y-m-d H:i:s'),
			'id_user' => $this->session->userdata('id_user'),
		);
        if ($this->Model_transaksi->createTmpTransaksi($data)) {
            $this->session->set_flashdata('massage','Berhasil menambah transaksi.');
            $this->session->set_flashdata('type_massage','success');
            redirect('Transaksi/Add_sub/'.$this->db->insert_id());
        }else{
            $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menambah transaksi.');
            $this->session->set_flashdata('type_massage','danger');
            redirect('Transaksi');
        }
    }

    public function Insert_barang()
    {
        $id_tmp = $this->input->post('id_tmp');
        $jumlah_barang = $this->input->post('qty');
        $sub_total = $this->input->post('harga')*$this->input->post('qty');
        $diskon = $sub_total*($this->input->post('diskon')/100);
        $ppn = $sub_total*($this->input->post('ppn')/100);
        $total = $sub_total-$diskon+$ppn;

        $ppn = $this->input->post('ppn');
        $data = array(
            'id_tmp_transaksi' => $id_tmp,
            'id_barang' => $this->input->post('id_barang'),
            'jumlah_barang' => $jumlah_barang,
            'harga_jual' => $this->input->post('harga'),
            'diskon' => $this->input->post('diskon'),
            'ppn' => $this->input->post('ppn'),
            'sub_total' => $total,
            'tanggal_input' => date('Y-m-d H:i:s'),
            'id_user' => $this->session->userdata('id_user'),
        );
        $stok = $this->Model_barang->whereBarang($this->input->post('id_barang'))->row();
        if ($jumlah_barang > $stok->stock_barang) {
            $this->session->set_flashdata('massage','Pembelian barang melebihi jumlah persediaan.');
            $this->session->set_flashdata('type_massage','danger');
            redirect('Transaksi');
        }else{
            $stokBarang = array(
                'stock_barang' => $stok->stock_barang-$jumlah_barang,
            );
            if ($this->Model_transaksi->createTmpSubTransaksiBarang($data)) {
                if ($this->Model_barang->updateBarang($stok->id_barang, $stokBarang)) {
                    $this->session->set_flashdata('massage','Berhasil menambah transaksi barang.');
                    $this->session->set_flashdata('type_massage','success');
                    redirect('Transaksi/Add_sub/'.$id_tmp);
                }else{
                    $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menambah transaksi barang. #02');
                    $this->session->set_flashdata('type_massage','danger');
                    redirect('Transaksi/Add_sub/'.$id_tmp);
                }                
            }else{
                $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menambah transaksi barang. #01');
                $this->session->set_flashdata('type_massage','danger');
                redirect('Transaksi/Add_sub/'.$id_tmp);
            }
        }
    }

    public function Insert_jasa()
    {
        $id_tmp = $this->input->post('id_tmp');
        $sub_total = $this->input->post('harga');
        $diskon = $sub_total*($this->input->post('diskon')/100);
        $ppn = $sub_total*($this->input->post('ppn')/100);
        $total = $sub_total-$diskon+$ppn;
    	$data = array(
			'id_tmp_transaksi' => $id_tmp,
			'id_jasa' => $this->input->post('id_jasa'),
			'harga_jual' => $this->input->post('harga'),
            'diskon' => $this->input->post('diskon'),
            'ppn' => $this->input->post('ppn'),
			'sub_total' => $total,
			'tanggal_input' => date('Y-m-d H:i:s'),
			'id_user' => $this->session->userdata('id_user'),
		);
        if ($this->Model_transaksi->createTmpSubTransaksiJasa($data)) {
            $this->session->set_flashdata('massage','Berhasil menambah transaksi jasa.');
            $this->session->set_flashdata('type_massage','success');
            redirect('Transaksi/Add_sub/'.$id_tmp);
        }else{
            $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menambah transaksi jasa.');
            $this->session->set_flashdata('type_massage','danger');
            redirect('Transaksi/Add_sub/'.$id_tmp);
        }
    }

    public function Edit($id)
    {
        $data = array(
            "title" => "Edit Transaksi",
            "content" => "Transaksi/transaksi_edit_form.php",
            "action" => base_url('index.php/Transaksi/Update'),
            "transaksi" => $this->Model_transaksi->whereTransaksi($id)->row(),
            "costumer" => $this->Model_costumer->readCostumer()->result(),
            "button" => "Update",
        );
        $this->load->view('index', $data);
    }

    public function Update()
    {
        $data = array(
            'nomor_polisi' => $this->input->post('nopolisi'),
            'tipe_kendaraan' => $this->input->post('tipe'),
            'id_costumer' => $this->input->post('id_costumer'),
            'nomor_bukti_transaksi' => $this->input->post('nobukti'),
            'id_user' => $this->session->userdata('id_user'),
        );
        if ($this->Model_transaksi->updateTransaksi($this->input->post('id'), $data)) {
            $this->session->set_flashdata('massage','Berhasil mengubah transaksi.');
            $this->session->set_flashdata('type_massage','success');
            redirect('Transaksi');
        }else{
            $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses mengubah transaksi.');
            $this->session->set_flashdata('type_massage','danger');
            redirect('Transaksi');
        }
    }

    public function Delete($id)
    {
        if ($this->Model_transaksi->deleteTransaksi($id)) {
            $this->session->set_flashdata('massage','Berhasil menghapus transaksi.');
            $this->session->set_flashdata('type_massage','success');
            redirect('Transaksi/');
        }else{
            $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menghapus transaksi.');
            $this->session->set_flashdata('type_massage','danger');
            redirect('Transaksi/');
        }
    }    

    public function DeleteTmpBarang($id, $id2, $id_barang, $jumlah_barang)
    {
        $stok = $this->Model_barang->whereBarang($id_barang)->row();
        $stokBarang = array(
            'stock_barang' => $stok->stock_barang+$jumlah_barang,
        );
        if ($this->Model_barang->updateBarang($id_barang, $stokBarang)) {
           if ($this->Model_transaksi->deleteTmpSubTransaksiBarang($id)) {
                $this->session->set_flashdata('massage','Berhasil menghapus transaksi barang.');
                $this->session->set_flashdata('type_massage','success');
                redirect('Transaksi/Add_sub/'.$id2);
            }else{
                $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menghapus transaksi barang. #02');
                $this->session->set_flashdata('type_massage','danger');
                redirect('Transaksi/Add_sub/'.$id2);
            }
        }else{
            $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menghapus transaksi barang. #01');
            $this->session->set_flashdata('type_massage','danger');
            redirect('Transaksi/Add_sub/'.$id2);
        }
    }

    public function DeleteTmpJasa($id, $id2)
    {
        if ($this->Model_transaksi->deleteTmpSubTransaksiJasa($id)) {
            $this->session->set_flashdata('massage','Berhasil menghapus transaksi jasa.');
            $this->session->set_flashdata('type_massage','success');
            redirect('Transaksi/Add_sub/'.$id2);
        }else{
            $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menghapus transaksi jasa.');
            $this->session->set_flashdata('type_massage','danger');
            redirect('Transaksi/Add_sub/'.$id2);
        }
    }

    public function Confirm($id)
    {
        $cekBonus = $this->input->post('cekBonus');
        if(isset($cekBonus) && $cekBonus=='true'){
            $data_bonus = array(
                "diskon" => 100,
                "ppn" => 0,
                "sub_total" => 0,
            );
            $this->Model_transaksi->updateTmpSubTransaksiJasaByIdTransaksi($id, $data_bonus);
        }

        $data = array(
            "title" => "Konfirmasi Transaksi",
            "content" => "Transaksi/transaksi_confirm.php",
            "button" => "Bayar",
            "action" => site_url('Transaksi/ActionConfirm'),
            "id_tmp" => $id,
            "bayar" => $this->input->post('bayar'),
            "transaksi" => $this->Model_transaksi->whereViewTmpTransaksi($id)->row(),
            "transaksi_barang" => $this->Model_transaksi->whereViewTmpTransaksiBarangByIdTransaksi($id)->result(),
            "transaksi_jasa" => $this->Model_transaksi->whereViewTmpTransaksiJasaByIdTransaksi($id)->result(),
        );
        $this->load->view('index', $data);
    }

    public function ActionConfirm($id_tmp){
        $id_costumer = $this->input->post('id_costumer');
        $jumlah = $this->input->post('sub_total');
        $bayar = $this->input->post('bayar');
        if ($id_costumer == 1) {
            if ($bayar >= $jumlah) {
                //Proses Input ke Tabel Transaksi//
                $tblBonus = $this->Model_bonus->whereBonusByNmrPolisi($this->input->post('nopolisi'));
                if($tblBonus->num_rows() > 0){
                    $tblBonus = $tblBonus->row();
                    $bonus = array('jumlah_cuci' => $tblBonus->jumlah_cuci+1);
                    $this->Model_bonus->updateBonus($tblBonus->nomor_polisi, $bonus);
                }else{
                    $tblBonus = $tblBonus->row();
                    $bonus = array('jumlah_cuci' => 1, 'nomor_polisi' => $this->input->post('nopolisi'));
                    $this->Model_bonus->createBonus($bonus);
                }

                $tmpTransaksi = $this->Model_transaksi->whereTmpTransaksi($id_tmp)->row();
                $kembalian = $bayar-$jumlah;
                $this->session->set_userdata(array('kembalian' => $kembalian, 'bayar' => $bayar));
                $data = array(
                    'nomor_polisi' => $tmpTransaksi->nomor_polisi,
                    'tipe_kendaraan' => $tmpTransaksi->tipe_kendaraan, 
                    'nomor_bukti_transaksi' => $tmpTransaksi->nomor_bukti_transaksi,
                    'kembalian' => $kembalian,
                    'bayar' => $bayar,
                    'id_costumer' => $tmpTransaksi->id_costumer,
                    'jumlah_bayar' => $this->input->post('sub_total'),
                    'keterangan' => "LUNAS",
                    'tanggal_input' => date("Y-m-d H:i:s"),
                    'id_user' => $this->session->userdata('id_user'),
                );
                if ($this->Model_transaksi->createTransaksi($data)) {
                    $id_transaksi = $this->db->insert_id();
                    $tmpSubTransaksiBarang = $this->Model_transaksi->whereTmpSubTransaksiBarangByIdTransaksi($id_tmp);
                    $barang = $tmpSubTransaksiBarang->num_rows();
                    $barang2 = 0;
                    foreach ($tmpSubTransaksiBarang->result() as $value) {
                        $data2 = array(
                            'id_transaksi' => $id_transaksi,
                            'id_barang' => $value->id_barang, 
                            'harga_jual' => $value->harga_jual,
                            'diskon' => $value->diskon,
                            'ppn' => $value->ppn,
                            'jumlah_barang' => $value->jumlah_barang,
                            'sub_total' => $value->sub_total,
                            'tanggal_input' => date('Y-m-d H:i:s'),
                            'id_user' => $this->session->userdata('id_user'),
                        );
                        if ($this->Model_transaksi->createSubTransaksiBarang($data2)) {
                            if ($this->Model_transaksi->deleteTmpSubTransaksiBarang($value->id_tmp_sub_transaksi_barang)) {
                                $barang2 += 1;
                            }
                        }
                    }
                    $tmpSubTransaksiJasa = $this->Model_transaksi->whereTmpSubTransaksiJasaByIdTransaksi($id_tmp);
                    $jasa = $tmpSubTransaksiJasa->num_rows();
                    $jasa2 = 0;
                    foreach ($tmpSubTransaksiJasa->result() as $value) {
                        $data2 = array(
                            'id_transaksi' => $id_transaksi,
                            'id_jasa' => $value->id_jasa, 
                            'harga_jual' => $value->harga_jual,
                            'diskon' => $value->diskon,
                            'ppn' => $value->ppn,
                            'sub_total' => $value->sub_total,
                            'tanggal_input' => date('Y-m-d H:i:s'),
                            'id_user' => $this->session->userdata('id_user'),
                        );
                        if ($this->Model_transaksi->createSubTransaksiJasa($data2)) {
                            if ($this->Model_transaksi->deleteTmpSubTransaksiJasa($value->id_tmp_sub_transaksi_jasa)) {
                                $jasa2 += 1;
                            }
                        }
                    }
                    if ($barang == $barang2 && $jasa == $jasa2) {
                        if ($this->Model_transaksi->deleteTmpTransaksi($id_tmp)) {
                            $this->session->set_flashdata('massage','Pembayaran berhasil.');
                            $this->session->set_flashdata('type_massage','success');
                            redirect('Transaksi');
                        }else{
                            $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses pembayaran. #03');
                            $this->session->set_flashdata('type_massage','danger');
                            redirect('Transaksi');
                        }
                    }else{
                        $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses pembayaran. #02');
                        $this->session->set_flashdata('type_massage','danger');
                        redirect('Transaksi');
                    }
                }else{
                    $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses pembayaran. #01');
                    $this->session->set_flashdata('type_massage','danger');
                    redirect('Transaksi');
                }
            }else{
                $this->session->set_flashdata('massage','Jumlah pembayaran kurang.');
                $this->session->set_flashdata('type_massage','danger');
                redirect('Transaksi');
            }
        }else{
            //Proses Input ke Tabel Transaksi//
            $piutang = array(
                'id_costumer' => $this->input->post('id_costumer'),
                'nomor_bukti_transaksi' => $this->input->post('bukti'),
                'jumlah' => $this->input->post('sub_total'),
                'bayar' => 0,
                'sisa' => $this->input->post('sub_total'),
                'keterangan' => 'BELUM LUNAS',
                'tanggal' => date('Y-m-d'),
                'tanggal_input' => date('Y-m-d H:i:s'),
                'id_user' => $this->session->userdata('id_user'),
            );
            if($this->Model_piutang->createPiutang($piutang)){
                $tblBonus = $this->Model_bonus->whereBonusByNmrPolisi($this->input->post('nopolisi'));
                if($tblBonus->num_rows() > 0){
                    $tblBonus = $tblBonus->row();
                    $bonus = array('jumlah_cuci' => $tblBonus->jumlah_cuci+1);
                    $this->Model_bonus->updateBonus($tblBonus->nomor_polisi, $bonus);
                }else{
                    $tblBonus = $tblBonus->row();
                    $bonus = array('jumlah_cuci' => 1, 'nomor_polisi' => $this->input->post('nopolisi'));
                    $this->Model_bonus->createBonus($bonus);
                }
                $tmpTransaksi = $this->Model_transaksi->whereTmpTransaksi($id_tmp)->row();
                $data = array(
                    'nomor_polisi' => $tmpTransaksi->nomor_polisi,
                    'tipe_kendaraan' => $tmpTransaksi->tipe_kendaraan, 
                    'nomor_bukti_transaksi' => $tmpTransaksi->nomor_bukti_transaksi,
                    'id_costumer' => $tmpTransaksi->id_costumer,
                    'bayar' => 0,
                    'kembalian' => 0,
                    'jumlah_bayar' => $this->input->post('sub_total'),
                    'keterangan' => "LUNAS",
                    'tanggal_input' => date("Y-m-d H:i:s"),
                    'id_user' => $this->session->userdata('id_user'),
                );
                if ($this->Model_transaksi->createTransaksi($data)) {
                    $id_transaksi = $this->db->insert_id();
                    $tmpSubTransaksiBarang = $this->Model_transaksi->whereTmpSubTransaksiBarangByIdTransaksi($id_tmp);
                    $barang = $tmpSubTransaksiBarang->num_rows();
                    $barang2 = 0;
                    foreach ($tmpSubTransaksiBarang->result() as $value) {
                        $data2 = array(
                            'id_transaksi' => $id_transaksi,
                            'id_barang' => $value->id_barang, 
                            'harga_jual' => $value->harga_jual,
                            'diskon' => $value->diskon,
                            'ppn' => $value->ppn,
                            'jumlah_barang' => $value->jumlah_barang,
                            'sub_total' => $value->sub_total,
                            'tanggal_input' => date('Y-m-d H:i:s'),
                            'id_user' => $this->session->userdata('id_user'),
                        );
                        if ($this->Model_transaksi->createSubTransaksiBarang($data2)) {
                            if ($this->Model_transaksi->deleteTmpSubTransaksiBarang($value->id_tmp_sub_transaksi_barang)) {
                                $barang2 += 1;
                            }
                        }
                    }
                    $tmpSubTransaksiJasa = $this->Model_transaksi->whereTmpSubTransaksiJasaByIdTransaksi($id_tmp);
                    $jasa = $tmpSubTransaksiJasa->num_rows();
                    $jasa2 = 0;
                    foreach ($tmpSubTransaksiJasa->result() as $value) {
                        $data2 = array(
                            'id_transaksi' => $id_transaksi,
                            'id_jasa' => $value->id_jasa, 
                            'harga_jual' => $value->harga_jual,
                            'diskon' => $value->diskon,
                            'ppn' => $value->ppn,
                            'sub_total' => $value->sub_total,
                            'tanggal_input' => date('Y-m-d H:i:s'),
                            'id_user' => $this->session->userdata('id_user'),
                        );
                        if ($this->Model_transaksi->createSubTransaksiJasa($data2)) {
                            if ($this->Model_transaksi->deleteTmpSubTransaksiJasa($value->id_tmp_sub_transaksi_jasa)) {
                                $jasa2 += 1;
                            }
                        }
                    }
                    if ($barang == $barang2 && $jasa == $jasa2) {
                        if ($this->Model_transaksi->deleteTmpTransaksi($id_tmp)) {
                            $this->session->set_flashdata('massage','Pembayaran berhasil.');
                            $this->session->set_flashdata('type_massage','success');
                            redirect('Transaksi');
                        }else{
                            $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses pembayaran. #03');
                            $this->session->set_flashdata('type_massage','danger');
                            redirect('Transaksi');
                        }
                    }else{
                        $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses pembayaran. #02');
                        $this->session->set_flashdata('type_massage','danger');
                        redirect('Transaksi');
                    }
                }else{
                    $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses pembayaran. #01');
                    $this->session->set_flashdata('type_massage','danger');
                    redirect('Transaksi');
                }
            }else{
                $this->session->set_flashdata('massage','Terjadi kesalahan dalam proses piutang.');
                $this->session->set_flashdata('type_massage','danger');
                redirect('Transaksi');
            }
            
        }
    }

    public function Faktur($id){
        $data = array(
            "title" => "Faktur",
            "transaksi" => $this->Model_transaksi->whereTransaksi($id)->result(),
            "transaksi_barang" => $this->Model_transaksi->whereViewTransaksiBarangByIdTransaksi($id)->result(),
            "transaksi_jasa" => $this->Model_transaksi->whereViewTransaksiJasaByIdTransaksi($id)->result(),
        );
        //$html=$this->load->view('Laporan/faktur.php', $data, true);
        $this->load->view('Laporan/faktur.php', $data);
        /*$pdfFilePath = "Faktur.pdf";
        $this->load->library('m_pdf');
        $pdf = $this->m_pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "I");*/
    }
}
