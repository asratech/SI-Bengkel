<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('admin') == FALSE) {
			redirect('Auth/Login');
		}
		if (empty($this->session->userdata('id_user')) && empty($this->session->userdata('nama')) && empty($this->session->userdata('username')) && empty($this->session->userdata('password')) && empty($this->session->userdata('login')) && empty($this->session->userdata('logout'))) {
			redirect('Auth/Login');
		}
	}
	public function index()
	{
		$data = array(
			"title" => "Dashboard",
			"content" => "Dashboard/dashboard.php",
		);
		$this->load->view('index',$data);
	}
}
