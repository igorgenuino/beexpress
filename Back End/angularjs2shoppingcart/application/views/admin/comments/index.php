<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo lang('admin_list_comments')?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
          
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
                        style="width: 181px;"><?php echo lang('admin_content')?></th>
                        <th class="sorting_asc" tabindex="0" aria-controls="example1"
                        rowspan="1" colspan="1" aria-sort="ascending"
                        aria-label="Rendering engine: activate to sort column descending"
                        style="width: 181px;"><?php echo lang('admin_senddate')?></th>
					 <th class="sorting" tabindex="0" aria-controls="example1"
                        rowspan="1" colspan="1"
                        aria-label="Browser: activate to sort column ascending"
                        style="width: 224px;"><?php echo lang('admin_status')?></th>
                      <th class="sorting" tabindex="0" aria-controls="example1"
                        rowspan="1" colspan="1"
                        aria-label="Browser: activate to sort column ascending"
                        style="width: 224px;"><?php echo lang('admin_article_name')?></th>
                        <th class="sorting" tabindex="0" aria-controls="example1"
                        rowspan="1" colspan="1"
                        aria-label="Browser: activate to sort column ascending"
                        style="width: 224px;"><?php echo lang('admin_action')?></th>

                      
                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data as $item){?>
                    <tr role="row" class="even">
                      <td class="sorting_1">
                        <?php echo $item->id?>
                      </td>
                      <td>
                        <?php echo $item->content?>
                      </td>
                      <td>
                        <?php echo $item->sendDate?>
                      </td>
					
					   <td>
                        <?php if($item->status==1){?>
						<a href="<?php echo site_url('admin/comments/active/'.$item->id)?>">Active</a>
						<?php }else{?>
						<a href="<?php echo site_url('admin/comments/deactive/'.$item->id)?>">Deactive</a>
						<?php }?>
                      </td>
				
                      <?php $articleName=$this->ArticlesModel->findById($item->articleId)?>
                      <td> <?php echo $articleName[0]->title?></td>
                      <td>
					  <a href="<?php echo site_url('admin/comments/update/'.$item->id)?>"><?php echo lang('admin_edit')?></a> |
					  <a href="<?php echo site_url('admin/comments/delete/'.$item->id)?>" onclick="return confirm('Are you sure?')"><?php echo lang('admin_delete')?></a> </td>
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