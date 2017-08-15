<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('admin_setting_category')?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo site_url('admin/settings/process_updatecate')?>" method="post"> 
              <div class="box-body">
                
                <div class="checkbox">
                  <label> 
                    <input type="checkbox" name="is_category_description" <?php echo $is_category_description->value=='true'?'checked':'';?> value="true"> <?php echo lang('admin_is_category_description')?>
                 </label>
                </div>
				<div class="checkbox">
                  <label> 
                    <input type="checkbox" name="is_category_count_articles" <?php echo $is_category_count_articles->value=='true'?'checked':'';?> value="true"> <?php echo lang('admin_is_category_count_articles')?>
                 </label>
                </div>
				<div class="checkbox">
                  <label> 
                    <input type="checkbox" name="is_category_photo" <?php echo $is_category_photo->value=='true'?'checked':'';?> value="true"> <?php echo lang('admin_is_category_photo')?>
                 </label>
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_number_of_columns_gridview')?></label>
                  <input type="text" class="form-control" id="orders" placeholder="Number of Columns" name="number_of_columns_gridview" value="<?php echo $number_of_columns_gridview->value; ?>">
				   <h6 class="error" style="color: red;"><?php echo form_error('number_of_columns_gridview'); ?></h6>
                </div>
				 <div class="form-group">
                  <label><?php echo lang('admin_type_display_sub_category')?></label>
					<select name="type_display_sub_category" class="form-control">
						  <option value="1" <?php echo $type_display_sub_category->value=='1' ?'selected="selected"':''; ?>><strong>ListView</strong></option>
						  <option value="2" <?php echo $type_display_sub_category->value=='2' ?'selected="selected"':''; ?>><strong>GridView </strong></option>
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