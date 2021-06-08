$(document).ready(function() {
    /* $('select').selectpicker(); */
   
  });
  function do_formvalidate(formid)
  {
   
   /*  $('#prod_details').validate({
      rules: {
        // simple rule, converted to {required:true}
        product_name  : "required",
        slug          : "required"
        /* product_category: "required",
        mrp: "required",
        selling_price: "required",
        color_variants: "required",
        size_variants: "required",
        fist_thumbnail: "required",
        fist_image: "required",  
        // compound rule
        
      },
      messages: {},
      highlight: function (element) {
          $(element).parent().addClass('error')
      },
      unhighlight: function (element) {
          $(element).parent().removeClass('error')
      } 
    }); */
   
}
    $('#prod_details').submit(function(e){
        e.preventDefault();
        alert("zdfsdf");
        var formData = new FormData(); 
        var formdata=$('#prod_details').serialize();
        formData.append("thumb", fileInputElement.files);
     
        /* console.log(formData);
        $.ajax({  
          type:"product_details",
          url:"dd_process.php",  
          method:"POST",  
          data:formData,  
          contentType:false,  
          cache: false,  
          processData: false,  
          success:function(data){  
      
               /* $('#uploaded_image').html(data);   
          }  
      });   */
      /*   do_formvalidate('#prod_details'); */
        
       $('#section_product_details').fadeOut(100);
       $('#section_image_upload').fadeIn(100);
       
    
        });

        $('#save_next2').click(function(e){
          e.preventDefault();
         $('#section_image_upload').fadeOut(100);
         $('#section_product_list').fadeIn(100);
         
      
          });
        
