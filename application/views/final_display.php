<?php
//print_r($product_names);
?>
<div class="container">
<div class="row">
<div class="col-md-3">
<select class="form-control" id="prod_name_select">
<option value="" selected>Select Product</option>
<?php
foreach($product_names as $product)
{
    ?>
<option value="<?php echo $product['product_id'] ?>"><?php echo $product['product_name'] ?></option>
<?php
}
?>
</select>
</div>
<div class="col-md-3">
<input type="submit" name="submit" value="submit" id="submit" class="btn btn-primary">
</div>

</div>
<div class="container border" id="dispCont">

</div>
</div>