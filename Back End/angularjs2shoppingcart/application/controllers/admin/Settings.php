<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Admin_Controller {


	function index() {
		$this->load->model ( 'settingsmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$data['data']=$this->settingsmodel->findAll();
		$data ['page'] = 'admin/settings/index';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	function listsettings() {
		$this->load->model ( 'settingsmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$data['data']=$this->settingsmodel->findAll();
		$data ['page'] = 'admin/settings/index';
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	function update($id){
		$this->load->model ( 'settingsmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$data ['data'] = $this->settingsmodel->findById($id);
		$data ['page'] = 'admin/settings/update';	
		$this->load->view ( 'templates/templateAdmin', $data );
	
	}
	function process_update($id)
    {
        $this->load->model ( 'settingsmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('key','Key','required');
		$this->form_validation->set_rules('value','Value','required');
		$this->form_validation->set_rules('group','Group','required');
		if($this->form_validation->run()==FALSE){
			$this->load->model ( 'settingsmodel' );
		$data ['data'] = $this->settingsmodel->findById($id);
			$data ['page'] = 'admin/settings/update';
			$this->load->view ( 'templates/templateAdmin', $data );
		}else {
			$data= array(
					
					'key'=>$_POST['key'],
					'value'=>$_POST['value'],
					'description'=>$_POST['description'],
					'group'=>$_POST['group']
			);
			
			$this->settingsmodel->update($id,$data);
			redirect('admin/settings');
		}
		
	}

    function insert(){
		$this->load->model ( 'settingsmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$data ['page'] = 'admin/settings/insert';	
		$this->load->view ( 'templates/templateAdmin', $data );
	}
	function process_insert(){
		$this->load->model ( 'settingsmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('key','Key','required');
		$this->form_validation->set_rules('value','Value','required');
		$this->form_validation->set_rules('group','Group','required');
		if($this->form_validation->run()==FALSE){
			$data ['page'] = 'admin/settings/insert';
			$this->load->view ( 'templates/templateAdmin', $data );
		}
		else {
			$data= array(
					
					'key'=>$_POST['key'],
					'value'=>$_POST['value'],
					'description'=>$_POST['description'],
					'group'=>$_POST['group']
			);
			
			$this->settingsmodel->insert($data);
			redirect('admin/settings');
		}
		
	}
	function delete($id){
		$this->load->model ( 'settingsmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$this->settingsmodel->delete($id);
		redirect('admin/settings');

	}
	function general(){
		$this->load->model ( 'settingsmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$data['app_name']=$this->settingsmodel->find('app_name');
		$data['path_logo']=$this->settingsmodel->find('path_logo');
		$data['rest_api_key']=$this->settingsmodel->find('rest_api_key');
		$data['base_url']=$this->settingsmodel->find('base_url');
		$data['base_url_photo']=$this->settingsmodel->find('base_url_photo');
		$data['paypal_business_email']=$this->settingsmodel->find('paypal_business_email');
		$data['paypal_return']=$this->settingsmodel->find('paypal_return');
		$data ['page'] = 'admin/settings/general';
		$this->load->view ( 'templates/templateAdmin', $data );

	}
	function process_updategeneral(){
		$this->load->model ( 'settingsmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('app_name', 'App Name', 'required');
		$this->form_validation->set_rules('rest_api_key', 'Rest Api Key', 'required');
		$this->form_validation->set_rules('base_url_photo', 'Base Url Photo', 'required|prep_url');
		if ($this->form_validation->run() == FALSE)
		{ 
			$this->load->model ( 'settingsmodel' );
			$this->lang->load('admin_content_lang', 'english');
			$data['app_name']=$this->settingsmodel->find('app_name');
			$data['path_logo']=$this->settingsmodel->find('path_logo');
			$data['rest_api_key']=$this->settingsmodel->find('rest_api_key');
			$data['base_url']=$this->settingsmodel->find('base_url');
			$data['paypal_business_email']=$this->settingsmodel->find('paypal_business_email');
			$data['paypal_return']=$this->settingsmodel->find('paypal_return');
			$data['base_url_photo']=$this->settingsmodel->find('base_url_photo');
			$data ['page'] = 'admin/settings/general';
			$this->load->view ( 'templates/templateAdmin', $data );
		}else {			
                
			    $config['upload_path']          = './assets/upload/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2024;
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('photo'))
                {
					$this->settingsmodel->save('app_name',$this->input->post('app_name'));
					$this->settingsmodel->save('rest_api_key',$this->input->post('rest_api_key'));					
					$this->settingsmodel->save('paypal_business_email',$this->input->post('paypal_business_email'));
					$this->settingsmodel->save('paypal_return',$this->input->post('paypal_return'));
					$this->settingsmodel->save('base_url_photo',$this->input->post('base_url_photo'));
					redirect('admin/settings/general');
                }else{
					@unlink(base_url().'assets/upload/'.$_POST['imageCurrent']);
                    $data = array('upload_data' => $this->upload->data());
					$image_name=$data['upload_data']['file_name'];
					$this->settingsmodel->save('app_name',$this->input->post('app_name'));
					$this->settingsmodel->save('rest_api_key',$this->input->post('rest_api_key'));
					$this->settingsmodel->save('path_logo',base_url().'assets/upload/'.$image_name);
					$this->settingsmodel->save('rest_api_key',$this->input->post('rest_api_key'));
					$this->settingsmodel->save('paypal_business_email',$this->input->post('paypal_business_email'));
					$this->settingsmodel->save('paypal_return',$this->input->post('paypal_return'));
					$this->settingsmodel->save('base_url_photo',$this->input->post('base_url_photo'));					
					redirect('admin/settings/general');					
                }
		}

	}
	function article(){
		$this->load->model ( 'settingsmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$data['limit_random']=$this->settingsmodel->find('limit_random');
		$data['limit_pagination']=$this->settingsmodel->find('limit_pagination');
		$data['limit_latest']=$this->settingsmodel->find('limit_latest');
		$data['limit_most_viewed']=$this->settingsmodel->find('limit_most_viewed');
		$data['article_date_format']=$this->settingsmodel->find('article_date_format');
		$data['is_article_description']=$this->settingsmodel->find('is_article_description');
		$data['is_article_category']=$this->settingsmodel->find('is_article_category');
		$data['is_article_published']=$this->settingsmodel->find('is_article_published');
		$data['is_article_hits']=$this->settingsmodel->find('is_article_hits');
		$data['is_article_photo']=$this->settingsmodel->find('is_article_photo');
		$data['photo_article']=$this->settingsmodel->find('photo_article');
		$data ['page'] = 'admin/settings/article';
		$this->load->view ( 'templates/templateAdmin', $data );

	}
	function process_updatearticle(){
			$this->load->model ( 'settingsmodel' );
			$this->lang->load('admin_content_lang', 'english');		

			$this->load->library('form_validation');
			$this->form_validation->set_rules('limit_random','limit random','required|integer|greater_than[0]');
			$this->form_validation->set_rules('limit_pagination','limit pagination','required|integer|greater_than[0]');
			$this->form_validation->set_rules('limit_latest','limit latest','required|integer|greater_than[0]');
			$this->form_validation->set_rules('limit_most_viewed','limit most viewed','required|integer|greater_than[0]');
			$this->form_validation->set_rules('article_date_format','Date Format','required');
			if ($this->form_validation->run() == FALSE){
				$this->load->model ( 'settingsmodel' );
				$this->lang->load('admin_content_lang', 'english');
				$data['limit_random']=$this->settingsmodel->find('limit_random');
				$data['limit_pagination']=$this->settingsmodel->find('limit_pagination');
				$data['limit_latest']=$this->settingsmodel->find('limit_latest');
				$data['limit_most_viewed']=$this->settingsmodel->find('limit_most_viewed');
				$data['article_date_format']=$this->settingsmodel->find('article_date_format');
				$data['is_article_description']=$this->settingsmodel->find('is_article_description');
				$data['is_article_category']=$this->settingsmodel->find('is_article_category');
				$data['is_article_published']=$this->settingsmodel->find('is_article_published');
				$data['is_article_hits']=$this->settingsmodel->find('is_article_hits');
				$data['is_article_photo']=$this->settingsmodel->find('is_article_photo');
				$data['photo_article']=$this->settingsmodel->find('photo_article');
				$data ['page'] = 'admin/settings/article';
				$this->load->view ( 'templates/templateAdmin', $data );
			}
			else{
				$this->settingsmodel->save('limit_random',$this->input->post('limit_random'));
				$this->settingsmodel->save('limit_pagination',$this->input->post('limit_pagination'));
				$this->settingsmodel->save('limit_latest',$this->input->post('limit_latest'));
				$this->settingsmodel->save('limit_most_viewed',$this->input->post('limit_most_viewed'));
				$this->settingsmodel->save('article_date_format',$this->input->post('article_date_format'));
				$this->settingsmodel->save('is_article_description',$this->input->post('is_article_description')=='true'?'true':'false');
				$this->settingsmodel->save('is_article_category',$this->input->post('is_article_category')=='true'?'true':'false');
				$this->settingsmodel->save('is_article_published',$this->input->post('is_article_published')=='true'?'true':'false');
				$this->settingsmodel->save('is_article_photo',$this->input->post('is_article_photo')=='true'?'true':'false');
				$this->settingsmodel->save('is_article_hits',$this->input->post('is_article_hits')=='true'?'true':'false');
				$this->settingsmodel->save('photo_article',$this->input->post('photo_article'));
				
				redirect('admin/settings/article');
			}
	}
	function menu(){
		$this->load->model ( 'settingsmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$data['is_latest_and_most_viewed']=$this->settingsmodel->find('is_latest_and_most_viewed');
		$data['is_display_latest_articles']=$this->settingsmodel->find('is_display_latest_articles');
		$data['is_display_most_viewed']=$this->settingsmodel->find('is_display_most_viewed');
		$data['is_display_help_and_support']=$this->settingsmodel->find('is_display_help_and_support');
		$data['is_display_help']=$this->settingsmodel->find('is_display_help');
		$data['is_display_contact_us']=$this->settingsmodel->find('is_display_contact_us');
		$data['is_display_category']=$this->settingsmodel->find('is_display_category');
		$data['is_menu_write_comment']=$this->settingsmodel->find('is_menu_write_comment');
		$data['is_menu_comment_list']=$this->settingsmodel->find('is_menu_comment_list');
		$data['is_contact_page_detail']=$this->settingsmodel->find('is_contact_page_detail');
		$data ['page'] = 'admin/settings/menu';
		$this->load->view ( 'templates/templateAdmin', $data );

	}
	function process_updatemenu(){
			$this->load->model ( 'settingsmodel' );		
			$this->settingsmodel->save('is_latest_and_most_viewed',$this->input->post('is_latest_and_most_viewed')=='true'?'true':'false');
			$this->settingsmodel->save('is_display_latest_articles',$this->input->post('is_display_latest_articles')=='true'?'true':'false');
			$this->settingsmodel->save('is_display_most_viewed',$this->input->post('is_display_most_viewed')=='true'?'true':'false');
			$this->settingsmodel->save('is_display_help_and_support',$this->input->post('is_display_help_and_support')=='true'?'true':'false');
			$this->settingsmodel->save('is_display_contact_us',$this->input->post('is_display_contact_us')=='true'?'true':'false');
			$this->settingsmodel->save('is_display_category',$this->input->post('is_display_category')=='true'?'true':'false');
			$this->settingsmodel->save('is_menu_write_comment',$this->input->post('is_menu_write_comment')=='true'?'true':'false');
			$this->settingsmodel->save('is_menu_comment_list',$this->input->post('is_menu_comment_list')=='true'?'true':'false');
			$this->settingsmodel->save('is_contact_page_detail',$this->input->post('is_contact_page_detail')=='true'?'true':'false');
			redirect('admin/settings/menu');
	}
	function category(){
		$this->load->model ( 'settingsmodel' );
		$this->lang->load('admin_content_lang', 'english');
		$data['is_category_description']=$this->settingsmodel->find('is_category_description');
		$data['is_category_count_articles']=$this->settingsmodel->find('is_category_count_articles');
		$data['is_category_photo']=$this->settingsmodel->find('is_category_photo');
		$data['number_of_columns_gridview']=$this->settingsmodel->find('number_of_columns_gridview');
		$data['type_display_sub_category']=$this->settingsmodel->find('type_display_sub_category');
		$data ['page'] = 'admin/settings/category';
		$this->load->view ( 'templates/templateAdmin', $data );
	}
	function process_updatecate(){
		$this->load->model ( 'settingsmodel' );
		$this->lang->load('admin_content_lang', 'english');
		
		
			$this->load->model ( 'settingsmodel' );
			$this->lang->load('admin_content_lang', 'english');		
			$this->load->library('form_validation');
			$this->form_validation->set_rules('number_of_columns_gridview','Number Of Columns','required|integer|greater_than[0]');
			if ($this->form_validation->run() == FALSE){
				$this->load->model ( 'settingsmodel' );
				$this->lang->load('admin_content_lang', 'english');
				$data['is_category_description']=$this->settingsmodel->find('is_category_description');
				$data['is_category_count_articles']=$this->settingsmodel->find('is_category_count_articles');
				$data['is_category_photo']=$this->settingsmodel->find('is_category_photo');
				$data['number_of_columns_gridview']=$this->settingsmodel->find('number_of_columns_gridview');
				$data['type_display_sub_category']=$this->settingsmodel->find('type_display_sub_category');
				$data ['page'] = 'admin/settings/category';
				$this->load->view ( 'templates/templateAdmin', $data );
			}else{
				$this->settingsmodel->save('is_category_description',$this->input->post('is_category_description')=='true'?'true':'false');
				$this->settingsmodel->save('is_category_count_articles',$this->input->post('is_category_count_articles')=='true'?'true':'false');
				$this->settingsmodel->save('is_category_photo',$this->input->post('is_category_photo')=='true'?'true':'false');
				$this->settingsmodel->save('number_of_columns_gridview',$this->input->post('number_of_columns_gridview'));
				$this->settingsmodel->save('type_display_sub_category',$this->input->post('type_display_sub_category'));
				redirect('admin/settings/category');
			}
	}
	
}