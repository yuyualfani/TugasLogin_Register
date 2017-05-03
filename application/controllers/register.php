<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->load->model('user');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[confpassword]');
		$this->form_validation->set_rules('confpassword', 'KonfirmasiPassword', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('register');
		} else {
			$this->user->insert();
		$this->load->view('login_view');
		}
		
	}

}

/* End of file register.php */
/* Location: ./application/controllers/register.php */