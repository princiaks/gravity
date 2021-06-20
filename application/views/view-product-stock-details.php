<?php 
  extract($stock_details);
    ?>
<div class="container border">
<h3><?php echo "Product Details"; ?></h3>


<form role="form" class="dropzone" method="post" enctype="multipart/form-data" id="view_prod_sec_details" name="prod_secondary_details" action="<?php echo site_url('gravitycon/gravityproduct_stock');?>">
<table class="border"  id="prod_stock_details">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Colour</th>
                        <th>Size</th>
                        <th>MRP</th>
                        <th>Selling Price</th>
                        <th>Stock</th>
                        <th>Delete</th> 
                      </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $i=1;
                      foreach($stock_det as $detail)
                      {?>
                        <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $detail->color_variant;?></td>
                        <td><?php echo $detail->size_variant;?></td>
                        <td><?php echo $p_master->mrp;?></td>
                        <td><?php echo $p_master->selling_price;?></td>
                        <td><?php echo $detail->stock;?></td>
                        <td><input type="button" class="btn btn-danger del_row" value="Delete" id="">
                        <input type="hidden" id="id"  class="del_id" value="<?php echo $detail->id;?>">
                        </td>
                        </tr>
                      <?php
                      $i++;
                      } ?>
                     
                      </tbody>
</table>
<a href="<?php echo site_url().'/Gravitycon/get_product_display'?>" class="btn btn-primary text-light">View Output</a>
</form>

</div>

