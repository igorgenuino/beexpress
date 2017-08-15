<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('admin_general')?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo site_url('admin/settings/process_updategeneral')?>" method="post" enctype="multipart/form-data"> 
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_app_name')?></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="App name" name="app_name" value="<?php echo $app_name->value;?>">
                  <h6 class="error" style="color: red;"><?php echo form_error('app_name'); ?></h6>
                </div>
				<img src="<?php echo $path_logo->value;?>" width="80px"/>
				<input type="hidden" name="imageCurrent" value="<?php echo $path_logo->value;?>"/>
				 <div class="form-group">
                  <label for="exampleInputFile"><?php echo lang('admin_photo')?></label>
                  <input type="file" id="exampleInputFile" name="photo">
                </div>
				
				
				<div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_rest_api_key')?></label>
                  <input type="text" class="form-control" id="orders" placeholder="Orders" name="rest_api_key" value="<?php echo $rest_api_key->value; ?>">
				   <h6 class="error" style="color: red;"><?php echo form_error('rest_api_key'); ?></h6>
                </div>				
				
				
				<div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_base_url_photo')?></label>
                  <input type="text" class="form-control" id="orders" placeholder="base_url_photo" name="base_url_photo" value="<?php echo $base_url_photo->value; ?>">
				   <h6 class="error" style="color: red;"><?php echo form_error('base_url_photo'); ?></h6>
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_paypal_business_email')?></label>
                  <input type="text" class="form-control" id="orders" placeholder="paypal_business_email" name="paypal_business_email" value="<?php echo $paypal_business_email->value; ?>">
				   <h6 class="error" style="color: red;"><?php echo form_error('paypal_business_email'); ?></h6>
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_paypal_return_url')?></label>
                  <input type="text" class="form-control" id="orders" placeholder="paypal_return" name="paypal_return" value="<?php echo $paypal_return->value; ?>">
				   <h6 class="error" style="color: red;"><?php echo form_error('paypal_return'); ?></h6>
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