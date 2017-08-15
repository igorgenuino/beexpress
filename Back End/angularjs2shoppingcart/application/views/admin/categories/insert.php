<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('admin_create_new_category')?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo site_url('admin/categories/process_insert')?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_name')?></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name" name="name">
                  <h6 class="error" style="color: red;"><?php echo form_error('name'); ?></h6>
                </div>
                
				<div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_order_category')?></label>
                  <input type="text" class="form-control" id="orders" placeholder="Orders" name="orders" value="0">
				  <input type="hidden" name="description">
                </div>
                <div class="form-group">
                  <label><?php echo lang('admin_select')?></label>
                  <select class="form-control" name="sltCate">
                    <option value="0">Root</option>
                    <?php $cate=$this->categoriesmodel->selectCate(0)?>
                    <?php foreach($cate as $c){?>
                      <option value="<?php echo $c->id;?>"><?php echo $c->name;?></option>
                    <?php }?>
                  </select>
                </div>
				 
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="status" checked value="1"> <?php echo lang('admin_active')?>
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