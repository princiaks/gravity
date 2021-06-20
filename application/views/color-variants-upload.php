<?php if(isset($product_id))
{
    /* $color_variants=array('black','red','blue','green','orange','yellow');
    $max_count=count($color_variants);
    $count=round($max_count/2); */
    $colors=json_decode($colors->color_variants);
   
    ?>
    <div class="container pt-3 border" style="margin-top: 50px; margin-bottom: 50px;">
    <h5>Colour Variant Images</h5>
      

<form role="form" class="dropzone" method="post" enctype="multipart/form-data" id="color_variant_upload" name="color_variant_upload" action="<?php echo site_url('gravitycon/gravity_colorvariants');?>">
<?php
        $i=0;
    foreach($colors as $color)
    {

?>
<div class="container border">
    <div class="row">
        <div class="col-md-12">
       
<h5><?php echo $color; ?></h5>

            <div class="form-group">
            <div class="row">
            <div class="col-md-12">
            <div class="row">
            <div class="col-md-4">
            <input type="hidden" name="color_name[]" value="<?php echo $color; ?>">
            <label class="control-label">Default Thumbnail</label>
            <input type="file" name="thumbnail[<?php echo $i;?>]" id="btn_thumbnail-<?php echo $i;?>_click" class="file btn_thumbnail_click" data-show-upload="false" data-show-caption="true" hidden >
           <div class="drag-area-thumb dropthumb drag-area-th<?php echo $i;?>" id="for_thumbnail-<?php echo $i;?>">
            <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
            <header>Drag & Drop To Upload File</header>
            
            <span>OR</span>
            <button type="button" class="btnbrowse_def" id="btn_thumbnail-<?php echo $i;?>">Browse File</button>
           

           
            </div>
            <?php /*  echo form_error('thumb'); */ ?>
            </div>
             <div class="col-md-8">
            <label class="control-label">Product Images</label>
            <input type="file" name="prodimg[<?php echo $i;?>][]" id="btn_prodimg-<?php echo $i;?>_click" class="file btn_prodimg_click" data-show-upload="false" data-show-caption="true" multiple hidden>
            <div class="drag-area dropprod" id="for_prod-<?php echo $i;?>">
            <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
            <header>Drag & Drop To Upload File</header>
           
            <span>OR</span>
            <button type="button" class="btnbrowse_prod" id="btn_prodimg-<?php echo $i;?>">Browse File</button>
            

            </div>
       
            <?php /* echo form_error('prod'); */ ?>
            </div>
            </div>
            <div class="form-group">
            <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
            <div class="container-fluid mt-3">
            <div class="row" id="uploaded_image<?php echo $i;?>">
            
            </div>
            </div>
            
            </div>
            </div>
            </div>
           

            </div>
           
            </div>
            </div>
           
    
 
 </div>
</div></div>
<?php
$i++;
    }?>
    <div class="container">
    <div class="row">
    <div class="col-md-12 p-2 text-right">
    <input
        type="submit"
        value="Save and Next"
        name="submit"
        id="submit"
        class="btn btn-primary"
    />
    </div>
    <input type="hidden" name="product_id" id="product_id" value="<?php echo $product_id?>">
    </div>
    </div>

</form>
</div>
   
    <?php
}?>
