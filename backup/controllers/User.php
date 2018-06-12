<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('admin') == FALSE) {
			redirect('Auth/Login');
		}
		if (empty($this->session->userdata('id_user')) && empty($this->session->userdata('nama')) && empty($this->session->userdata('username')) && empty($this->session->userdata('password')) && empty($this->session->userdata('login')) && empty($this->session->userdata('logout'))) {
			redirect('Auth/Login');
		}
		$this->load->model('Model_user');
	}

	public function index()
	{
        $data = array(
			"title" => "Lihat User",
			"content" => "User/user.php",
		);
        $this->load->view('index', $data);
	}

	public function ViewAll()
	{
        $data = array(
			"title" => "Lihat User",
			"content" => "User/user.php",
			"user" => $this->Model_user->readUser()->result(),
		);
        $this->load->view('index', $data);
	}

	public function Add()
    {
    	$data = array(
			"title" => "Tambah User",
			"content" => "User/user_form.php",
			"action" => "Insert",
			"button" => "Add",
		);
        $this->load->view('index', $data);
    }

    public function Insert()
    {
    	$data = array(
			'nama' => strtoupper($this->input->post('nama')),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
		);
		if ($this->Model_user->createUser($data)) {
			$this->session->set_flashdata('massage','Berhasil menambahkan.');
			$this->session->set_flashdata('type_massage','success');
			redirect('User');
		}else{
			$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menambahkan.');
			$this->session->set_flashdata('type_massage','danger');
			redirect('User');
		}
    }

    public function Edit($id)
    {
    	$data = array(
			"title" => "Edit User",
			"content" => "User/user_edit_form.php",
			"action" => base_url('index.php/User/Update'),
			"user" => $this->Model_user->whereUser($id)->result(),
			"button" => "Update",
		);
        $this->load->view('index', $data);
    }

    public function Update()
    {
    	if (empty($this->input->post('password'))) {
    		$data = array(
				'nama' => strtoupper($this->input->post('nama')),
				'username' => $this->input->post('username'),
			);
			if ($this->Model_user->updateUser($this->input->post('id'), $data)) {
				$this->session->set_flashdata('massage','Berhasil mengubah.');
				$this->session->set_flashdata('type_massage','success');
				redirect('User');
			}else{
				$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses mengubah.');
				$this->session->set_flashdata('type_massage','danger');
				redirect('User');
			}
    	}else{
    		$data = array(
				'nama' => strtoupper($this->input->post('nama')),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
			);
			if ($this->Model_user->updateUser($this->input->post('id'), $data)) {
				$this->session->set_flashdata('massage','Berhasil mengubah.');
				$this->session->set_flashdata('type_massage','success');
				redirect('User');
			}else{
				$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses mengubah.');
				$this->session->set_flashdata('type_massage','danger');
				redirect('User');
			}
    	}
    }

    public function Delete($id)
    {	
    	if ($this->Model_user->deleteUser($id)) {
			$this->session->set_flashdata('massage','Berhasil menghapus.');
			$this->session->set_flashdata('type_massage','success');
			redirect('User');
		}else{
			$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses menghapus.');
			$this->session->set_flashdata('type_massage','danger');
			redirect('User');
		}
    }
}
