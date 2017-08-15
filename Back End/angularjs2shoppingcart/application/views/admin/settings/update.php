<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('admin_update_settings')?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo site_url('admin/settings/process_update/'.$data[0]->id)?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_key_settings')?></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Key" name="key" value="<?php echo $data[0]->key?>">
                  <h6 class="error" style="color: red;"><?php echo form_error('key'); ?></h6>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_value_settings')?></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Value" name="value" value="<?php echo $data[0]->value?>">
                  <h6 class="error" style="color: red;"><?php echo form_error('value'); ?></h6>
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_value_description')?></label>
                  <textarea class="form-control" name="description"><?php echo $data[0]->description; ?></textarea>
                </div>
             
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_group_settings')?></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Group" name="group" value="<?php echo $data[0]->group?>">
                  <h6 class="error" style="color: red;"><?php echo form_error('group'); ?></h6>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><?php echo lang('admin_submit')?></button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        
      </div>
      <!-- /.row -->
    </section>