<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_con extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->library('form_validation');
		$this->load->view('login_view');

		
	}
	public function cekLogin()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_cekDb');
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('login_view');

		}else
		{
			redirect('pegawai','refresh');
		}
		
		


	}
	public function cekDb($password)
	{
		$this->load->model('user');
		$username=$this->input->post('username');
		$result=$this->user->login($username,$password);

		if($result){
			$sess_array=array();
			foreach ($result as $row) {
				$sess_array = array(
					'id'=>$row->id,
					'username'=>$row->username,
					);
				$this->session->set_userdata('logged_in',$sess_array);
				
			}
 return true;
}
		
		else
		{
			$this->form_validation->set_message('cekDb',"Login Gagal dan Password tidak valid");
			return false;
		}

	}
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('pegawai','refresh');
		}
}

/* End of file login_con.php */
/* Location: ./application/controllers/login_con.php */