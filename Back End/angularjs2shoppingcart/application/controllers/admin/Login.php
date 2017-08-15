<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Login extends CI_Controller {
	public function index() {
		$this->lang->load('admin_content_lang', 'english');
		$this->load->view ( 'admin/accounts/login' );
	}
	public function process() {
		$this->lang->load('admin_content_lang', 'english');
		$this->load->library('session');
		$this->load->library ( 'form_validation' );
		$this->form_validation->set_rules ( 'username', 'Username', 'required' );
		$this->form_validation->set_rules ( 'password', 'Password', 'required' );
		if ($this->form_validation->run () == FALSE) {
			$this->load->view ( 'admin/accounts/login');
		} else {
			if ($this->AccountsModel->login ( $_POST ) == 1) {
				$this->session->set_userdata ( array (
						'username_admin' => $_POST ['username'] 
				) );
				redirect ( 'admin/categories' );
			} else {
				$data ['error'] = "Invalid account" ;
				$this->load->view ( 'admin/accounts/login', $data );
			}
		}
	}
}
