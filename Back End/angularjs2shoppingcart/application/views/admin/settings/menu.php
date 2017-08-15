<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('admin_menu')?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo site_url('admin/settings/process_updatemenu')?>" method="post" enctype="multipart/form-data"> 
              <div class="box-body">
                
                <div class="checkbox">
                  <label> 
                    <input type="checkbox" name="is_latest_and_most_viewed" <?php echo $is_latest_and_most_viewed->value=='true'?'checked':'';?> value="true"> <?php echo lang('admin_is_latest_and_most_viewed')?>
                 </label>
                </div>
				<div class="checkbox">
                  <label> 
                    <input type="checkbox" name="is_display_latest_articles" <?php echo $is_display_latest_articles->value=='true'?'checked':'';?> value="true"> <?php echo lang('admin_is_display_latest_articles')?>
                 </label>
                </div>
				<div class="checkbox">
                  <label> 
                    <input type="checkbox" name="is_display_most_viewed" <?php echo $is_display_most_viewed->value=='true'?'checked':'';?> value="true"> <?php echo lang('admin_is_display_most_viewed')?>
                 </label>
                </div>
				<div class="checkbox">
                  <label> 
                    <input type="checkbox" name="is_display_help_and_support" <?php echo $is_display_help_and_support->value=='true'?'checked':'';?> value="true"> <?php echo lang('admin_is_display_help_and_support')?>
                 </label>
                </div>
				
				<div class="checkbox">
                  <label> 
                    <input type="checkbox" name="is_display_contact_us" <?php echo $is_display_contact_us->value=='true'?'checked':'';?> value="true"> <?php echo lang('admin_is_display_contact_us')?>
                 </label>
                </div>
				<div class="checkbox">
                  <label> 
                    <input type="checkbox" name="is_display_category" <?php echo $is_display_category->value=='true'?'checked':'';?> value="true"> <?php echo lang('admin_is_display_category')?>
                 </label>
                </div>
				<div class="checkbox">
                  <label> 
                    <input type="checkbox" name="is_menu_write_comment" <?php echo $is_menu_write_comment->value=='true'?'checked':'';?> value="true"> <?php echo lang('admin_is_menu_write_comment')?>
                 </label>
                </div>
				<div class="checkbox">
                  <label> 
                    <input type="checkbox" name="is_menu_comment_list" <?php echo $is_menu_comment_list->value=='true'?'checked':'';?> value="true"> <?php echo lang('admin_is_menu_comment_list')?>
                 </label>
                </div>
				<div class="checkbox">
                  <label> 
                    <input type="checkbox" name="is_contact_page_detail" <?php echo $is_contact_page_detail->value=='true'?'checked':'';?> value="true"> <?php echo lang('admin_is_contact_page_detail')?>
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