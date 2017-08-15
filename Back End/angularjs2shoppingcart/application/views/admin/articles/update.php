<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo lang('admin_update_article')?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo site_url('admin/articles/process_update/'.$data[0]->id)?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_title')?></label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" name="title" value="<?php echo $data[0]->title?>">
                  <h6 class="error" style="color: red;"><?php echo form_error('title'); ?></h6>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_description')?></label>
				   <textarea id="editor2" name="description" rows="10" cols="80"><?php echo $data[0]->description?>
                 </textarea>
                 
                  <h6 class="error" style="color: red;"><?php echo form_error('description'); ?></h6>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1"><?php echo lang('admin_detail')?></label>
                  <textarea id="editor1" name="detail" rows="10" cols="80"><?php echo $data[0]->detail?>
                 </textarea>
                 <h6 class="error" style="color: red;"><?php echo form_error('detail'); ?></h6>
                </div>
                 <div class="form-group">
                  <label><?php echo lang('admin_category')?></label>
                  <select name="categoryId" class="form-control">
                    <?php $cate1=$this->categoriesmodel->selectCate(0); ?>
                    <?php foreach ($cate1 as $cat){?>
                       <option value="<?php echo $cat->id;?>"  <?php echo  $cat->id==$data[0]->categoryId ?'selected="selected"':''; ?>><strong><?php echo $cat->name;?></strong></option>
                      <?php $cate=$this->categoriesmodel->selectCate($cat->id);?>
                      <?php foreach($cate as $c){?>
                      <option value="<?php echo $c->id;?>" <?php echo  $c->id==$data[0]->categoryId ?'selected="selected"':''; ?> >---<?php echo $c->name;?></option>
                        <?php }?>
                  
               <?php }?>
               </select>
                </div>
				
				 <div class="form-group">
                  <label><?php echo lang('admin_brand')?></label>
                  <select name="brandId" class="form-control">
                    <?php foreach ($brands as $brand){?>
                      <option value="<?php echo $brand->id;?>" <?php echo $brand->id == $data[0]->brandId ? 'selected="selected"' : '' ?> ><strong><?php echo $brand->name;?></strong></option>
					<?php }?>
               </select>
                </div>
				
                <img src="<?php echo base_url()?>assets/upload/<?php echo $data[0]->photo?>" width="80px"/>
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
