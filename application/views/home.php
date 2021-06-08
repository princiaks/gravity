
            
            <div class="container pt-4 mt-4 p-3 border border-dark" name="section_product_details"id="section_product_details">
            <form role="form" class="dropzone" method="post" enctype="multipart/form-data" id="prod_details" name="product_details">
            <h5>Product Details</h5>
            <div class="row pt-3">
            <div class="col-sm-9">
            
            <div class="form-group">
            <div class="row">
            <div class="col-sm-6">
            <label class="control-label">Product Name</label>
            <input type="text" class="form-control" name="product_name" id="product_name"> 
            </div>
            <div class="col-sm-6">
            <label class="control-label">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug">
            </div>
            </div>
            </div>
            <div class="form-group">
            <div class="row">
            <div class="col-sm-6">
            <label class="control-label">SKU</label>
            <input type="text" class="form-control" name="sku" id="sku">
            </div>
            <div class="col-sm-6">
            <label class="control-label">Choose Product Category</label>
            <select id="product_category" multiple class="selectpicker" name="product_category">
            <option>Formals</option>
            <option>Casuals</option>
            </select>
            </div>
            </div>
            </div>
            <div class="form-group">
            <div class="row">
            <div class="col-sm-6">
            <label class="control-label">MRP</label>
            <input type="text" class="form-control" name="mrp" id="mrp">
            </div>
            <div class="col-sm-6">
            <label class="control-label">Selling Price</label>
            <input type="text" class="form-control" name="selling_price" id="selling_price">
            </div>
            </div>
            </div>
            <div class="form-group">
            <div class="row">
            <div class="col-sm-6">
            <label class="control-label">Choose Product Type</label>
            <select  id="product_type" multiple class="selectpicker"  name="product_type">
            <option>Latest Products</option>
            <option>Bundle Offer</option>
            </select>
            </div>
            <div class="col-sm-6">
            <label class="control-label">Choose Colour Variants</label>
            <select id="color_variants" multiple class="selectpicker" name="color_variants">
            <option>Black</option>
            <option>Red</option>
            </select>
            </div>
            </div>
            </div>
            <div class="form-group">
            <div class="row">
            <div class="col-sm-6">
            <label class="control-label">Choose Size Variants</label>
            <select id="size_variants" multiple class="selectpicker"  name="size_variants">
            <option>40</option>
            <option>41</option>
            <option>42</option>
            </select>
            </div>
            </div>
            </div>
            <div class="form-group">
            <div class="row">
            <div class="col-md-12">
            <div class="row">
            <div class="col-md-4">
            <label class="control-label">Default Thumbnail</label>

           <div class="drag-area-thumb" id="for_thumbnail">
            <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
            <header>Drag & Drop To Upload File</header>
            <span>OR</span>
            <button type="button" id="btn_thumbnail">Browse File</button>
            <input type="file" name="thumb[]" class="file btn_thumbnail_click" data-show-upload="false" data-show-caption="true" multiple hidden >

           
            </div>
            </div>
             <div class="col-md-8">
            <label class="control-label">Product Images</label>
            <div class="drag-area">
            <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
            <header>Drag & Drop To Upload File</header>
            <span>OR</span>
            <button type="button" id="btn_prodimg">Browse File</button>
            <input type="file" name="prod[]" class="file btn_prodimg_click" data-show-upload="false" data-show-caption="true" multiple hidden>

            </div>
       

            </div>
            </div>
            <div class="form-group">
            <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
            <div class="container-fluid mt-3">
            <div class="row"  id="uploaded_image">
            
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
            <div style="display: none;" class="container pt-4 mt-4 p-3 border border-dark" name="section_image_upload" id="section_image_upload">
            <div class="row pt-3">
            <div class="col-sm-9">
            <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                <label class="control-label">Default Thumbnail</label>
                    <input type="file">
                </div>
                <div class="col-md-6">
                <label class="control-label">ProductImages</label>
                    <input type="file">
                </div>

            </div>
            </div>
            <div class="form-group">
            <div class="row">
            <div class="col-md-12 text-right">
            <button class="btn btn-primary " id="save_next2">Save And Next</button>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            <div style="display: none;" class="container pt-4 mt-4 p-3 border border-dark" name="section_product_list" id="section_product_list">
            <div class="row pt-3">
            <div class="col-sm-9">
            <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                <label class="control-label">Default Thumbnail</label>
                    <input type="file">
                </div>
                <div class="col-md-6">
                <label class="control-label">ProductImages</label>
                    <input type="file">
                </div>

            </div>
            </div>
            <div class="form-group">
            <div class="row">
            <div class="col-md-12 text-right">
            <button class="btn btn-primary " id="save_next3">Submit</button>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            
           

