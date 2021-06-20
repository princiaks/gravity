
          
            <div class="container pt-4 mt-4 p-3 border border-dark" name="section_product_details"id="section_product_details">
            <form role="form" class="dropzone" method="post" enctype="multipart/form-data" id="prod_details" name="product_details" action="<?php echo site_url('gravitycon/gravity_upload');?>">
            <h5>Product Details</h5>
            <?php //echo validation_errors(); ?>
 
            <div class="row pt-3">
            <div class="col-sm-9">
            
            <div class="form-group">
            <div class="row">
            <div class="col-sm-6">
            <label class="control-label">Product Name</label>
            <input type="text" class="form-control" name="product_name" id="product_name" required> 
            <?php echo form_error('product_name'); ?>
            </div>
            <div class="col-sm-6">
            <label class="control-label">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" required>
            <?php echo form_error('slug'); ?>
            </div>
            </div>
            </div>
            <div class="form-group">
            <div class="row">
            <div class="col-sm-6">
            <label class="control-label">SKU</label>
            <input type="text" class="form-control" name="sku" id="sku" required>
            <?php echo form_error('sku'); ?>
            </div>
            <div class="col-sm-6">
            <label class="control-label">Choose Product Category</label>
            <select id="product_category" multiple class="prodsel selectpicker " name="product_category[]" required>
            <option>Formals</option>
            <option>Casuals</option>
            </select>
            <?php echo form_error('product_category'); ?>
            </div>
            </div>
            </div>
            <div class="form-group">
            <div class="row">
            <div class="col-sm-6">
            <label class="control-label">MRP</label>
            <input type="text" class="form-control" name="mrp" id="mrp" required>
            <?php echo form_error('mrp'); ?>
            </div>
            <div class="col-sm-6">
            <label class="control-label">Selling Price</label>
            <input type="text" class="form-control" name="selling_price" id="selling_price" required>
            <?php echo form_error('selling_price'); ?>
            </div>
            </div>
            </div>
            <div class="form-group">
            <div class="row">
            <div class="col-sm-6">
            <label class="control-label">Choose Product Type</label>
            <select  id="product_type" multiple class="prodsel selectpicker"  name="product_type[]" required>
            <option value="latest_products">Latest Products</option>
            <option value="bundle_offer">Bundle Offer</option>
            </select>
            <?php echo form_error('product_type'); ?>
            </div>
            <div class="col-sm-6">
            <label class="control-label">Choose Colour Variants</label>
            <select id="color_variants" multiple class="prodsel selectpicker" name="color_variants[]" required>
            <option value="black">Black</option>
            <option value="red">Red</option>
            <option value="blue">Blue</option>
            <option value="green">Green</option>
            <option value="yellow">Yellow</option>
            <option value="white">White</option>
            </select>
            <?php echo form_error('color_variants'); ?>
            </div>
            </div>
            </div>
            <div class="form-group">
            <div class="row">
            <div class="col-sm-6">
            <label class="control-label">Choose Size Variants</label>
            <select id="size_variants" multiple class="prodsel selectpicker"  name="size_variants[]" required>
            <option value="40">40</option>
            <option value="41">41</option>
            <option value="42">42</option>
            </select>
            <?php echo form_error('size_variants'); ?>
            </div>
            </div>
            </div>
            <div class="form-group">
            <div class="row">
            <div class="col-md-12">
            <div class="row">
            <div class="col-md-4">
            <label class="control-label">Default Thumbnail</label>
            <input type="file" name="thumbnail[0]" id="btn_thumbnail-0_click" class="file btn_thumbnail_click" data-show-upload="false" data-show-caption="true" hidden required >
           <div class="drag-area-thumb dropthumb drag-area-th0" id="for_thumbnail-0">
            <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
            <header>Drag & Drop To Upload File</header>
            
            <span>OR</span>
            <button type="button" class="btnbrowse_def" id="btn_thumbnail-0">Browse File</button>
           

           
            </div>
            <?php echo form_error('thumb'); ?>
            </div>
             <div class="col-md-8">
            <label class="control-label">Product Images</label>
            <input type="file" name="prodimg[0][]" id="btn_prodimg-0_click" class="file btn_prodimg_click" data-show-upload="false" data-show-caption="true" multiple hidden required>
            <div class="drag-area dropprod"  id="for_prod-0">
            <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
            <header>Drag & Drop To Upload File</header>
           
            <span>OR</span>
            <button type="button" class="btnbrowse_prod" id="btn_prodimg-0">Browse File</button>
            

            </div>
       
            <?php echo form_error('prod'); ?>
            </div>
            </div>
            <div class="form-group">
            <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
            <div class="container-fluid mt-3">
            <div class="row"  id="uploaded_image0">
            
            </div>
            </div>
            
            </div>
            </div>
            </div>
           

            </div>
           
            </div>
            </div>
           
            <div class="form-group">
            <div class="row">
            <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary " id="save_next1">Save And Next</button>
            </div>
            </div>
            </div>
            </div>


            </div>
            </form>
            </div>			
            </div>
           