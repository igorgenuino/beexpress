<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo lang('admin_customer_title')?></h3>
        </div>
        <!-- /.box-header -->
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
                        style="width: 181px;"><?php echo lang('admin_username')?></th>
                      <th class="sorting" tabindex="0" aria-controls="example1"
                        rowspan="1" colspan="1"
                        aria-label="Browser: activate to sort column ascending"
                        style="width: 224px;"><?php echo lang('admin_fullName')?></th>
                      <th class="sorting" tabindex="0" aria-controls="example1"
                        rowspan="1" colspan="1"
                        aria-label="Browser: activate to sort column ascending"
                        style="width: 224px;"><?php echo lang('admin_roleName')?></th>
                      <th class="sorting" tabindex="0" aria-controls="example1"
                        rowspan="1" colspan="1"
                        aria-label="Engine version: activate to sort column ascending"
                        style="width: 154px;"><?php echo lang('admin_action')?></th>
                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data as $item){?>
                    <tr role="row" class="even">
                      <td class="sorting_1">
                        <?php echo $item->id?>
                      </td>
                      <td>
                        <?php echo $item->username?>
                      </td>
                      <td>
                        <?php echo $item->fullName?>
                      </td>
                      <?php $roleName=$this->RolesModel->findById($item->roleId)?>
                      <td> <?php echo $roleName[0]->name?></td>
                       <td>
						
                       <a href="<?php echo site_url('admin/accounts/update/'.$item->id)?>"><?php echo lang('admin_edit')?></a>
					   <?php if($item->username!=$this->session->userdata('username_admin')){?>
					    | <a href="<?php echo site_url('admin/accounts/delete/'.$item->id)?>" onclick="return confirm('Are you sure?')"><?php echo lang('admin_delete')?></a>  
						<?php }?></td>
                    </tr>
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