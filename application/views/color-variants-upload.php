<?php if(isset($product_id))
{
    /* $color_variants=array('black','red','blue','green','orange','yellow');
    $max_count=count($color_variants);
    $count=round($max_count/2); */
    $colors=json_decode($colors->color_variants);
   
    ?>
    <div class="container pt-3 border mt-3">
    <h5>Colour Variant Images</h5>
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
            <label class="control-label">Default Thumbnail</label>
            <input type="file" name="thumb[<?php echo $color?>][]" id="thumb" class="file <?php /* echo "btn_thumbnail_click-$i"; */?> data-show-upload="false" data-show-caption="true" hidden multiple >
           <div class="drag-area-thumb" id="for_thumbnail">
            <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
            <header>Drag & Drop To Upload File</header>
            
            <span>OR</span>
            <button type="button" class="btnbrowse_def" id=<?php /* echo "btn_thumbnail-$i"; */?>>Browse File</button>
           

           
            </div>
            <?php /*  echo form_error('thumb'); */ ?>
            </div>
             <div class="col-md-8">
            <label class="control-label">Product Images</label>
            <input type="file" name="prod[<?php echo $color;?>][]" id="prod" class="file btn_prodimg_click" data-show-upload="false" data-show-caption="true" multiple hidden>
            <div class="drag-area">
            <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
            <header>Drag & Drop To Upload File</header>
           
            <span>OR</span>
            <button type="button" id="btn_prodimg">Browse File</button>
            

            </div>
       
            <?php /* echo form_error('prod'); */ ?>
            </div>
            </div>
            <div class="form-group">
            <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
            <div class="container-fluid mt-3">
            <div class="row" id="uploaded_image">
            
            </div>
            </div>
            
            </div>
            </div>
            </div>
           

            </div>
           
            </div>
            </div>
           
    
 
 </div>
</div>
</div>
   

<?php
echo"<br>";
$i++;
    }?>
     </div>
    <?php
}?>