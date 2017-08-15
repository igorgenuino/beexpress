<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary"> 
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('admin_insert_account')?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo site_url('admin/accounts/process_insert/')?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_login_username')?></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username" name="username" >
                  <h6 class="error" style="color: red;"><?php echo form_error('username'); ?></h6>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_login_password')?></label>
                  <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password" name="password" >
                  <h6 class="error" style="color: red;"><?php echo form_error('password'); ?></h6>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_login_fullName')?></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="FullName" name="fullName" >
                  <h6 class="error" style="color: red;"><?php echo form_error('fullName'); ?></h6>
                </div>
                 <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="sltCate">
                   
                    <?php $roles=$this->rolesmodel->findAll()?>
                    <?php foreach($roles as $role){?>
                      <option value="<?php echo $role->id;?>"><?php echo $role->name;?></option>
                    <?php }?>
                  </select>
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