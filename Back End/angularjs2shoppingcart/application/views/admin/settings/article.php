<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('admin_setting_article')?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo site_url('admin/settings/process_updatearticle')?>" method="post" enctype="multipart/form-data"> 
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_limit_random')?></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="limit random" name="limit_random" value="<?php echo $limit_random->value;?>">
                  <h6 class="error" style="color: red;"><?php echo form_error('limit_random'); ?></h6>
                </div>
			
				<div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_limit_pagination')?></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Limit_pagination" name="limit_pagination" value="<?php echo $limit_pagination->value;?>">
                  <h6 class="error" style="color: red;"><?php echo form_error('limit_pagination'); ?></h6>
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_limit_latest')?></label>
                  <input type="text" class="form-control" id="orders" placeholder="Limit_latest" name="limit_latest" value="<?php echo $limit_latest->value; ?>">
				   <h6 class="error" style="color: red;"><?php echo form_error('limit_latest'); ?></h6>
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_limit_most_viewed')?></label>
                  <input type="text" class="form-control" id="orders" placeholder="limit most viewed" name="limit_most_viewed" value="<?php echo $limit_most_viewed->value; ?>">
				   <h6 class="error" style="color: red;"><?php echo form_error('limit_most_viewed'); ?></h6>
                </div>
				
				<div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('article_date_format')?></label>
                  <input type="text" class="form-control" id="orders" placeholder="Date Format" name="article_date_format" value="<?php echo $article_date_format->value; ?>">
				   <h6 class="error" style="color: red;"><?php echo form_error('article_date_format'); ?></h6>
                </div>
				<div class="checkbox">
                  <label> 
                    <input type="checkbox" name="is_article_description" <?php echo $is_article_description->value=='true'?'checked':'';?> value="true"> <?php echo lang('admin_is_article_description')?>
                 </label>
                </div>
				<div class="checkbox">
                  <label> 
                    <input type="checkbox" name="is_article_category" <?php echo $is_article_category->value=='true'?'checked':'';?> value="true"> <?php echo lang('admin_is_article_category')?>
                 </label>
                </div>
				<div class="checkbox">
                  <label> 
                    <input type="checkbox" name="is_article_published" <?php echo $is_article_published->value=='true'?'checked':'';?> value="true"> <?php echo lang('admin_is_article_published')?>
                 </label>
                </div>
				<div class="checkbox">
                  <label> 
                    <input type="checkbox" name="is_article_hits" <?php echo $is_article_hits->value=='true'?'checked':'';?> value="true"> <?php echo lang('admin_is_article_hits')?>
                 </label>
                </div>
				<div class="checkbox">
                  <label> 
                    <input type="checkbox" name="is_article_photo" <?php echo $is_article_photo->value=='true'?'checked':'';?> value="true"> <?php echo lang('admin_is_article_photo')?>
                 </label>
                </div>
				
				 <div class="form-group">
                  <label><?php echo lang('admin_photo_article')?></label>
					<select name="photo_article" class="form-control">
						  <option value="1" <?php echo $photo_article->value=='1' ?'selected="selected"':''; ?>><strong>Article</strong></option>
						  <option value="2" <?php echo $photo_article->value=='2' ?'selected="selected"':''; ?>><strong>Category</strong></option>
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