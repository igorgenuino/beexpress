<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary"> 
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('admin_update_profile')?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo site_url('admin/accounts/process_profile/'.$data[0]->username)?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_login_username')?></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username" name="username" value="<?php echo $data[0]->username?>" readonly>
                  <h6 class="error" style="color: red;"><?php echo form_error('username'); ?></h6>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_login_password')?></label>
                  <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password" name="password" >
                  <h6 class="error" style="color: red;"><?php echo form_error('password'); ?></h6>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_login_fullName')?></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="FullName" name="fullName" value="<?php echo $data[0]->fullName?>">
                  <h6 class="error" style="color: red;"><?php echo form_error('fullName'); ?></h6>
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