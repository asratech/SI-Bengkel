<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_get('Asia/Jakarta');
		$this->load->model('Model_user');
	}
	public function index()
	{
		$this->load->view('Login');
	}
	public function Login()
	{
		$this->load->view('Login');
	}
	public function Logout()
	{
		$logout = array('logout' => date('Y-m-d H:i:s'));
		if ($this->Model_user->updateUser($this->session->userdata('id_user'),$logout)) {
			$this->session->sess_destroy();
			redirect('Auth/Login');
		}else{
			$this->session->set_flashdata('massage','Terjadi kesalahan dalam proses logout.');
			$this->session->set_flashdata('type_massage','danger');
			redirect('Dashboard');
		}
	}
	public function actionLogin()
	{
		$rules =[
			['field' => 'username', 'label' => 'Username', 'rules' => 'required'],
			['field' => 'username', 'label' => 'Username', 'rules' => 'required'],
		];
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('massage', valitadion_error());
			$this->session->set_flashdata('type_massage','danger');
		}else{
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$login = $this->Model_user->whereLogin($username,$password);
			if ($login->num_rows() > 0) {
				$login = $login->row();
				$update = array(
					'login' 	=> date('Y-m-d H:i:s'), 
					'last_ip' 	=> $this->get_client_ip(),
				);
				if ($this->Model_user->updateUser($login->id_user,$update)) {
					$data = array(
						'admin' 	=> TRUE,
						'id_user'	=> $login->id_user,
						'username' 	=> $login->username, 
						'password' 	=> $login->password,
						'nama' 		=> $login->nama,
						'login' 	=> $login->login,
						'logout' 	=> $login->logout,
						'last_ip' 	=> $login->last_ip,
					);
					$this->session->set_userdata($data);
					redirect('Dashboard');
				}else{
					$this->session->set_flashdata('massage', 'Terjadi kesalahan dalam proses update session masuk login.');
					$this->session->set_flashdata('type_massage','danger');
					redirect('Auth/Login');
				}
			}else{
				$this->session->set_flashdata('massage', 'Username atau Password salah.');
				$this->session->set_flashdata('type_massage','danger');
				redirect('Auth/Login');
			}
		}
	}

	public function get_client_ip(){
		$ipaddress = '';
	    if (isset($_SERVER['HTTP_CLIENT_IP']))
	        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED'];
	    else if(isset($_SERVER['REMOTE_ADDR']))
	        $ipaddress = $_SERVER['REMOTE_ADDR'];
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}
}
