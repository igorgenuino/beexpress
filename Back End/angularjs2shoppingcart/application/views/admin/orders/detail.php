<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo lang('admin_order_detail_info')?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div id="example1_wrapper"
            class="dataTables_wrapper form-inline dt-bootstrap">
            
            <div class="row">
              <div class="col-sm-12">
                <table id="example1"
                  class="table table-bordered table-striped dataTable"
                  role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
						
						<th class="sorting_asc" tabindex="0" aria-controls="example1"
                        rowspan="1" colspan="1" aria-sort="ascending"
                        aria-label="Rendering engine: activate to sort column descending"
                        style="width: 181px;"><?php echo lang('admin_id')?></th>
                        
						<th class="sorting_asc" tabindex="0" aria-controls="example1"
                        rowspan="1" colspan="1" aria-sort="ascending"
                        aria-label="Rendering engine: activate to sort column descending"
                        style="width: 181px;"><?php echo lang('admin_title')?></th>
                      
                     <th class="sorting_asc" tabindex="0" aria-controls="example1"
                        rowspan="1" colspan="1" aria-sort="ascending"
                        aria-label="Rendering engine: activate to sort column descending"
                        style="width: 181px;"><?php echo lang('admin_price')?></th>
						
						<th class="sorting_asc" tabindex="0" aria-controls="example1"
                        rowspan="1" colspan="1" aria-sort="ascending"
                        aria-label="Rendering engine: activate to sort column descending"
                        style="width: 181px;"><?php echo lang('admin_product_quantity')?></th>
						
					<th class="sorting_asc" tabindex="0" aria-controls="example1"
                        rowspan="1" colspan="1" aria-sort="ascending"
                        aria-label="Rendering engine: activate to sort column descending"
                        style="width: 181px;"><?php echo lang('admin_order_sub_total')?></th>
                    
                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data as $item){?>
                    <tr role="row" class="even">
                      <td class="sorting_1">
                        <?php echo $item->articleId?>
                      </td>
					  <?php $product=$this->ArticlesModel->findById($item->articleId)?>
                      <td>
                        <?php echo $product[0]->title?>
                      </td>
                     <td>
                        <?php echo $item->price?>
                      </td>
					  <td>
                        <?php echo $item->quantity?>
                      </td>
					  
					  <td>
                        <?php echo $item->price * $item->quantity?>
                      </td>
                      
                    </tr>
                    <?php }?>
                  </tbody>
                
                </table>
              </div>
            </div>
           
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>