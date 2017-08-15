<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends MY_Admin_Controller {


	function index() {
		$this->load->model ( 'accountsmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$this->load->model ( 'rolesmodel' );
		$data['data']=$this->accountsmodel->findAll();
		$data ['page'] = 'admin/accounts/index';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	function listaccounts() {
		$this->load->model ( 'accountsmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$this->load->model ( 'rolesmodel' );
		$data['data']=$this->accountsmodel->findAll();
		$data ['page'] = 'admin/accounts/index';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	public function profile() {
		$this->load->model ( 'accountsmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$data ['data'] = $this->accountsmodel->findByUsername($this->session->userdata('username_admin'));
		$data ['page'] = 'admin/accounts/profile';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	public function process_profile(){
		$this->load->model('accountsmodel');
		$this->lang->load('admin_content_lang', 'english');
		if (isset($_POST['password']) && !empty($_POST['password'])) {
            $data = array(

                'password' => sha1($this->input->post('password')),
                'fullName' => $this->input->post('fullName')
            );
        } else {
            $data = array(
             'fullName' => $this->input->post('fullName')
            );
        }
        $this->accountsmodel->update_profile($this->session->userdata('username_admin'), $data);
       	redirect('admin/accounts/profile/'.$this->session->userdata('username_admin'));
	}
	public function logout(){
		$this->session->unset_userdata('username_admin');
		redirect('admin/login');
	}
	function update($id){
		$this->load->model ( 'accountsmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$this->load->model ( 'rolesmodel' );
		$data ['data'] = $this->accountsmodel->findById($id);
		$data ['page'] = 'admin/accounts/update';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	   public function process_update($id)
    {
        $this->load->model('accountsmodel');
		$this->lang->load('admin_content_lang', 'english');
        if (isset($_POST['password']) && !empty($_POST['password'])) {
            $data = array(
				 'username' => $this->input->post('username'),
                'password' => sha1($this->input->post('password')),
                'fullName' => $this->input->post('fullName')
            );
        } else {
            $data = array(
			'username' => $this->input->post('username'),
             'fullName' => $this->input->post('fullName')
            );
        }
        $this->accountsmodel->update($id, $data);

        return redirect('admin/accounts');


    }
    function insert(){
		$this->load->model ( 'accountsmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$this->load->model ( 'rolesmodel' );
		$data ['page'] = 'admin/accounts/insert';
		
		$this->load->view ( 'templates/templateAdmin', $data );
	}
	function delete($id){
		$this->lang->load('admin_content_lang', 'english');
		$this->load->model ( 'accountsmodel' );
		$this->accountsmodel->delete($id);
		redirect('admin/accounts');

	}

	
}