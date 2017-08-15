<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends MY_Admin_Controller {

	public function __contruct()
	{ 
		parent::__construct();  
	}
	function index() {
		$this->load->model ( 'rolesmodel' );
		$data['data']=$this->rolesmodel->findAll();
		$data ['page'] = 'admin/roles/index';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	function listroles() {
		$this->load->model ( 'rolesmodel' );
		$data['data']=$this->rolesmodel->findAll();
		$data ['page'] = 'admin/roles/index';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	function insert(){
		$this->load->model ( 'rolesmodel' );
		$data ['page'] = 'admin/roles/insert';
		$this->load->view ( 'templates/templateAdmin', $data );
	}
	function process_insert(){
		$this->load->model ( 'rolesmodel' );
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name','Name','required');
		if($this->form_validation->run()==FALSE){
			$data ['page'] = 'admin/roles/insert';
			$this->load->view ( 'templates/templateAdmin', $data );
		}
		else {
			
				$data= array(
					'name'=>$_POST['name'],
					'status'=>isset($_POST['status'])?$_POST['status']:0
			);
			}
			$this->rolesmodel->insert($data);
			redirect('admin/roles');
		
		
	}
	function update($id){
		$this->load->model ( 'rolesmodel' );
		
		$data ['data'] = $this->rolesmodel->findById($id);
		$data ['page'] = 'admin/roles/update';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	function process_update($id){
		$this->load->model ( 'rolesmodel' );
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required');
		if($this->form_validation->run()==FALSE){
			$data ['data'] = $this->rolesmodel->findById($id);
			$data ['page'] = 'admin/roles/update';
			$this->load->view ( 'templates/templateAdmin', $data );
		}
		else {
			
			$data= array(
					'name'=>$_POST['name'],
					'status'=>isset($_POST['status'])?$_POST['status']:0
			);}
			$this->rolesmodel->update($id,$data);
			redirect('admin/roles');
		}
	function active($id){
		$this->load->model ( 'rolesmodel' );
		$data= array('status'=>0);
		$this->rolesmodel->update($id,$data);
		redirect('admin/roles');
	}
	function deactive($id){
		$this->load->model ( 'rolesmodel' );
		$data= array('status'=>1);
		$this->rolesmodel->update($id,$data);
		redirect('admin/roles');
	}	
	function delete($id){
		$this->lang->load('admin_content_lang', 'english');
		$this->load->model ( 'rolesmodel' );
		$this->load->model ( 'accountsmodel' );
		
		$accountByRoles=count($this->accountsmodel->findByRole($id));
		if($accountByRoles==0){
			$this->rolesmodel->delete($id);
			redirect('admin/roles');
		}else{
			$this->session->set_flashdata('message', 'Cannot delete Role!');
			redirect('admin/roles');
		}

	}

}
	