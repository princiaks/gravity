<?php 
   print_r($stock_details);
    ?>
<div class="container border">
<h3><?php echo "caption1"; ?></h3>
<h6><?php echo "caption2";?></h6>

<div class="row">
<form role="form" class="dropzone" method="post" enctype="multipart/form-data" id="prod_secondary_details" name="prod_secondary_details" action="<?php echo site_url('gravitycon/gravityproduct_stock');?>">
<table class="table table-borderd" id="table-weight">
                      <tr>
                        <th>colour variant</th>
                        <th>size variant</th>
                        <th>SKU</th>
                        <th>Stock(in Nos.)</th>
                      </tr>
</table>
</form>
</div>
</div>
