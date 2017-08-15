<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends MY_Admin_Controller {

	public function __contruct()
	{ 
		parent::__construct();  
	}
	function index($index=0) {
		$this->lang->load('admin_content_lang', 'english');
		$this->load->model ( 'commentsmodel' );
		$this->load->model ( 'articlesmodel' );
		$data['data']=$this->commentsmodel->findAll();
		$data ['page'] = 'admin/comments/index';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	function delete($id){
		$this->lang->load('admin_content_lang', 'english');
		$this->load->model ( 'commentsmodel' );
		$this->commentsmodel->delete($id);
		redirect('admin/comments');

	}
	function update($id){
		$this->load->model ( 'commentsmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$data ['data'] = $this->commentsmodel->findById($id);
		$data ['page'] = 'admin/comments/update';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	function process_update($id){
		$this->lang->load('admin_content_lang', 'english');
		$this->load->model ( 'commentsmodel' );
		$data= array(
					
					'status'=>isset($_POST['status'])?$_POST['status']:0
			);
			$this->commentsmodel->update($id,$data);
			redirect('admin/comments');
		}
	function active($id){
		$this->load->model ( 'commentsmodel' );
		$data= array('status'=>0);
		$this->commentsmodel->update($id,$data);
		redirect('admin/comments');
	}
	function deactive($id){
		$this->load->model ( 'commentsmodel' );
		$data= array('status'=>1);
		$this->commentsmodel->update($id,$data);
		redirect('admin/comments');
	}
		
}
	