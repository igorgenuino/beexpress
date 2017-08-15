<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('admin_add_article')?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo site_url('admin/articles/process_insert')?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                
				<div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_title')?></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" name="title">
                  <h6 class="error" style="color: red;"><?php echo form_error('title'); ?></h6>
                </div>
                
				<input type="hidden" name="description">
				
				
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_detail')?></label>
				   <textarea id="editor2" name="detail" rows="10" cols="80"></textarea>
                 
                 <h6 class="error" style="color: red;"><?php echo form_error('detail'); ?></h6>
                </div>
				
				<div class="form-group">
                  <label for="price"><?php echo lang('admin_product_price')?></label>
                  <input type="text" class="form-control" id="price" placeholder="Price" name="price">
                  <h6 class="error" style="color: red;"><?php echo form_error('price'); ?></h6>
                </div>
				
				<div class="form-group">
                  <label for="quantity"><?php echo lang('admin_product_quantity')?></label>
                  <input type="text" class="form-control" id="quantity" placeholder="quantity" name="quantity">
                  <h6 class="error" style="color: red;"><?php echo form_error('quantity'); ?></h6>
                </div>
				
                 <div class="form-group">
                  <label><?php echo lang('admin_category')?></label>
                  <select name="categoryId" class="form-control">
                    <?php $cate1=$this->categoriesmodel->selectCate(0); ?>
                    <?php foreach ($cate1 as $cat){?>
                      <option value="<?php echo $cat->id;?>" ><strong><?php echo $cat->name;?></strong></option>
                      <?php $cate=$this->categoriesmodel->selectCate($cat->id);?>
                      <?php foreach($cate as $c){?>
                      --<option value="<?php echo $c->id;?>">---<?php echo $c->name;?></option>
                        <?php }?>
                 
               <?php }?>
               </select>
                </div>
				
				 <div class="form-group">
                  <label><?php echo lang('admin_brand')?></label>
                  <select name="brandId" class="form-control">
                    <?php foreach ($brands as $brand){?>
                      <option value="<?php echo $brand->id;?>" ><strong><?php echo $brand->name;?></strong></option>
					<?php }?>
               </select>
                </div>
				
				
                <div class="form-group">
                  <label for="exampleInputFile"><?php echo lang('admin_photo')?></label>
                  <input type="file" id="exampleInputFile" name="photo">

                  
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="status" checked value="1"> <?php echo lang('admin_status')?>
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
