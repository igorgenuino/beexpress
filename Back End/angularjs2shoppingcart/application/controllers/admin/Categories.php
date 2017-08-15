<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends MY_Admin_Controller {

	public function __contruct()
	{ 
		parent::__construct();  
	}
	function index() {
		$this->load->model ( 'categoriesmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$data['data']=$this->categoriesmodel->findAll();
		$data ['page'] = 'admin/categories/index';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	function listcategories() {
		$this->load->model ( 'categoriesmodel' );
		$data['data']=$this->categoriesmodel->findAll();
		$data ['page'] = 'admin/categories/index';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	function insert(){
		$this->load->model ( 'categoriesmodel' );
		$data ['page'] = 'admin/categories/insert';
		
		$this->load->view ( 'templates/templateAdmin', $data );
	}
	function process_insert(){
		$this->load->model ( 'categoriesmodel' );
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name','Name','required');
		if($this->form_validation->run()==FALSE){
			$data ['page'] = 'admin/categories/insert';
			$this->load->view ( 'templates/templateAdmin', $data );
		}
		else {
			   
			    $config['upload_path']          = './assets/upload/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2024;
              
				$config['encrypt_name']             = TRUE;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('photo'))
                {
					if($_POST['sltCate']!=0){
					$data= array(
							'parentId'=> $_POST['sltCate'],
							'photo'		=>'no-image.png',
							'name'=>$_POST['name'] ,
							'status'=>isset($_POST['status'])?$_POST['status']:0,
							'description'=>$_POST['description'],
							'orders'=>$_POST['orders']
					);}else{
						$data= array(
							'parentId'=> 0,
							'photo'		=>'no-image.png',
							'name'=>$_POST['name'],
							'status'=>isset($_POST['status'])?$_POST['status']:0,
							'description'=>$_POST['description'],
							'orders'=>$_POST['orders']
					);
					}
					$this->categoriesmodel->insert($data);
					redirect('admin/categories');
                }
                else
                {
					$data = array('upload_data' => $this->upload->data());
					$image_name=$data['upload_data']['file_name'];
					if($_POST['sltCate']!=0){
					$data= array(
							'parentId'=> $_POST['sltCate'],
							'photo'		=>$image_name,
							'name'=>$_POST['name'] ,
							'status'=>isset($_POST['status'])?$_POST['status']:0,
							'description'=>$_POST['description'],
							'orders'=>$_POST['orders']
					);}else{
						$data= array(
							'parentId'=> 0,
							'name'=>$_POST['name'],
							'photo'		=>$image_name,
							'status'=>isset($_POST['status'])?$_POST['status']:0,
							'description'=>$_POST['description'],
							'orders'=>$_POST['orders']
					);
					}
					$this->categoriesmodel->insert($data);
					redirect('admin/categories');
				}
		}
		
	}
	function update($id){
		$this->load->model ( 'categoriesmodel' );
		
		$data ['data'] = $this->categoriesmodel->findById($id);
		$data ['page'] = 'admin/categories/update';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	function process_update($id){
		$this->load->model ( 'categoriesmodel' );
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required');
		if($this->form_validation->run()==FALSE){
			$data ['data'] = $this->categoriesmodel->findById($id);
			$data ['page'] = 'admin/categories/update';
			$this->load->view ( 'templates/templateAdmin', $data );
		}
		else {
			$config['upload_path']          = './assets/upload/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2024;
              
			$config['encrypt_name']             = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')){
					$data = array('upload_data' => $this->upload->data());
					$image_name=$data['upload_data']['file_name'];
					$cate = $this->categoriesmodel->findById($id);
					if($cate[0]->parentId==0){
						$data= array(
							'name'=>$_POST['name'],
							'photo'		=>$image_name,
							'status'=>isset($_POST['status'])?$_POST['status']:0,
							'description'=>$_POST['description'],
							'orders'=>$_POST['orders']
							);
						
					}else{
					$data= array(
							'name'=>$_POST['name'],
							'parentId'=>$_POST['sltCate'],
							'photo'		=>$image_name,
							'status'=>isset($_POST['status'])?$_POST['status']:0,
							'description'=>$_POST['description'],
							'orders'=>$_POST['orders']
					);}
					$this->categoriesmodel->update($id,$data);
					
					redirect('admin/categories');
			}else{
					$cate = $this->categoriesmodel->findById($id);
					if($cate[0]->parentId==0){
						$data= array(
							'name'=>$_POST['name'],
							'status'=>isset($_POST['status'])?$_POST['status']:0,
							'description'=>$_POST['description'],
							'orders'=>$_POST['orders']
							);
						
					}else{
					$data= array(
							'name'=>$_POST['name'],
							'parentId'=>$_POST['sltCate'],
							'status'=>isset($_POST['status'])?$_POST['status']:0,
							'description'=>$_POST['description'],
							'orders'=>$_POST['orders']
					);
					}
					$this->categoriesmodel->update($id,$data);
					redirect('admin/categories');
			}
		}
		
	}
	function delete($id){
		$this->load->model ( 'categoriesmodel' );
		$this->load->model ( 'articlesmodel' );
		$parent=count($this->categoriesmodel->selectCate($id));
		$articles=count($this->articlesmodel->findByCategories($id));
		if($parent==0&&$articles==0 ){
			$this->categoriesmodel->delete($id);
			redirect('admin/categories');
		}else{
			$this->session->set_flashdata('message', 'Cannot delete Category!');
			redirect('admin/categories');
		}
		
		
	}
	function findByCategories($id){
		$this->load->model ( 'categoriesmodel' );
		$this->load->model ( 'articlesmodel' );
		$data ['data'] = $this->articlesmodel->findByCategories($id);
		$data ['page'] = 'admin/categories/listarticles';
		$this->load->view ( 'templates/templateAdmin', $data );
	}
	function active($id){
		$this->load->model ( 'categoriesmodel' );
		$data= array('status'=>0);
		$this->categoriesmodel->update($id,$data);
		redirect('admin/categories');
	}
	function deactive($id){
		$this->load->model ( 'categoriesmodel' );
		$data= array('status'=>1);
		$this->categoriesmodel->update($id,$data);
		redirect('admin/categories');
	}

}
	