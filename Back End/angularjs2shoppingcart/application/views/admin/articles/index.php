<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo lang('admin_articles')?></h3>
        </div>
        <!-- /.box-header -->
		  <?php if($this->session->flashdata()){?>
                <h6 class="error"  style="color: red;"><?php echo $this->session->flashdata('message');?></h6>
			<?php }?>
        <div class="box-body">
          <div id="example1_wrapper"
            class="dataTables_wrapper form-inline dt-bootstrap">
            
            <div class="row">
              <div class="col-sm-12">
                <table id="example1"
                  class="table table-bordered table-striped dataTable"
                  role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example1"
                        rowspan="1" colspan="1" aria-sort="ascending"
                        aria-label="Rendering engine: activate to sort column descending"
                        style="width: 181px;"><?php echo lang('admin_id')?></th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1"
                        rowspan="1" colspan="1" aria-sort="ascending"
                        aria-label="Rendering engine: activate to sort column descending"
                        style="width: 181px;"><?php echo lang('admin_title')?></th>
                    
                      <th class="sorting" tabindex="0" aria-controls="example1"
                        rowspan="1" colspan="1"
                        aria-label="Browser: activate to sort column ascending"
                        style="width: 224px;"><?php echo lang('admin_photo')?></th>
                      <th class="sorting" tabindex="0" aria-controls="example1"
                        rowspan="1" colspan="1"
                        aria-label="Browser: activate to sort column ascending"
                        style="width: 224px;"><?php echo lang('admin_puslishDate')?></th>
                       <th class="sorting" tabindex="0" aria-controls="example1"
                        rowspan="1" colspan="1"
                        aria-label="Browser: activate to sort column ascending"
                        style="width: 224px;"><?php echo lang('admin_category')?></th>
						
						<th class="sorting" tabindex="0" aria-controls="example1"
                        rowspan="1" colspan="1"
                        aria-label="Browser: activate to sort column ascending"
                        style="width: 224px;"><?php echo lang('admin_brand')?></th>	
						
                      <th class="sorting" tabindex="0" aria-controls="example1"
                        rowspan="1" colspan="1"
                        aria-label="Platform(s): activate to sort column ascending"
                        style="width: 197px;"><?php echo lang('admin_status')?></th>
                      
                     
                      <th class="sorting" tabindex="0" aria-controls="example1"
                        rowspan="1" colspan="1"
                        aria-label="Browser: activate to sort column ascending"
                        style="width: 350px;"><?php echo lang('admin_action')?></th>
                    
                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data as $item){?>
                    <tr role="row" class="even">
                      <td class="sorting_1">
                        <?php echo $item->id?>
                      </td>
                      <td>
                        <?php echo $item->title?>
                      </td>
					  
					  <td> <img src="<?php echo base_url()?>assets/upload/<?php echo $item->photo?>" width="50px"/></td>
                    
                      <td> <?php echo $item->publishDate?></td>
					  
                      <?php $category=$this->categoriesmodel->findById($item->categoryId)?>
                      <td> <?php echo $category[0]->name?></td>
						
						 <?php $brand=$this->BrandModel->findById($item->brandId)?>
					  <td> <?php echo $brand->name?></td>
			  
					   <td>
                         <?php if($item->status==1){?>
						<a href="<?php echo site_url('admin/articles/active/'.$item->id)?>">Active</a>
						<?php }else{?>
						<a href="<?php echo site_url('admin/articles/deactive/'.$item->id)?>">Deactive</a>
						<?php }?>
                      </td>
				
                      
                      
                      <td> 
                          <a href="<?php echo site_url('admin/articles/update/'.$item->id)?>"><?php echo lang('admin_edit')?></a> | 
						  <a href="<?php echo site_url('admin/articles/delete/'.$item->id)?>" onclick="return confirm('Are you sure?')"><?php echo lang('admin_delete')?></a> 
                      </td>
                    </tr>
                    <?php }?>
                  </tbody>
                
                </table>
              </div>
            </div>
           
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>