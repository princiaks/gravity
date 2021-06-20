<?php 
    $colors=json_decode($color_variants);
    $size=json_decode($size_variants);
    $color_hidd=trim(str_replace('"', " ", $color_variants),'[]');
    $size_hidd=trim(str_replace('"', " ", $size_variants),'[]');
    ?>
<div class="container border">
<h3><?php echo $product_name; ?></h3>
<h6><?php echo "SKU:-".$sku;?></h6>

<div class="row">
<form role="form" class="dropzone" method="post" enctype="multipart/form-data" id="prod_secondary_details" name="prod_secondary_details" action="<?php echo site_url('gravitycon/gravityproduct_stock');?>">
<table class="table table-borderd" id="table-stockdet">
                      <tr>
                        <th>colour variant</th>
                        <th>size variant</th>
                        <th>SKU</th>
                        <th>Stock(in Nos.)</th>
                      </tr>
                      <tr>
                        <td >
                            <select class="form-control" name="product_details[color_variant][]" id="select_color">
                            <option selected>Select Color</option>
                            <?php foreach($colors as $color) 
                            {
                            ?>
                            <option><?php echo $color; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                            <input type="hidden" name="color_variant" id="color_variant" value="<?php echo $color_hidd;?>">
                            <input type="hidden" name="size_variant" id="size_variant" value="<?php echo $size_hidd;?>">
                        </td>
                        <td>
                            <select class="form-control" name="product_details[size_variant][]" id="select_size">
                            <option selected>Select Size</option>
                            <?php foreach($size as $sizz)
                            {
                            ?>
                            <option><?php echo $sizz; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </td>
                        <td>
                          <input
                            type="text"
                            name="product_details[sku][]"
                            class="form-control"
                            value="<?php echo $sku."-"?>"
                          />
                        </td>
                        <td>
                          <input
                            type="text"
                            name="product_details[stock][]"
                            class="form-control"
                          />
                        </td>
                       
                        <td>
                          <input
                            type="button"
                            id="add"
                            name="add"
                            value="add"
                            class="btn btn-success"
                          />
                        </td>
                      </tr>
                      

                    </table>
                    <div class="row">
                    <div class="col-md-6">
                    <input
                            type="hidden"
                            id="product_id"
                            name="product_id"
                            value="<?php echo $product_id;?>"
                          />
                      </div>
                      <div class="col-md-6 float-center">
                      <input
                            type="submit"
                            id="submit"
                            name="submit"
                            value="Save And Next"
                            class="btn btn-primary"
                          />
                      </div>
                      
                      </div>
</form>
</div>
</div>
