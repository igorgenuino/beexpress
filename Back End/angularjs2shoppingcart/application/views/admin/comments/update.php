<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary"> 
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('admin_update_comment')?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo site_url('admin/comments/process_update/'.$data->id)?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_id')?></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Id" name="id" value="<?php echo $data->id?>" readonly>
                  <h6 class="error" style="color: red;"><?php echo form_error('username'); ?></h6>
                </div>
             
                 <div class="checkbox">
                  <label>
                    <input type="checkbox" name="status" <?php echo $data->status==1?'checked':'';?> value="1"> <?php echo lang('admin_active')?>
                  </label>
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