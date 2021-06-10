$(document).ready(function() {
    $('select').selectpicker();
   
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
      /*   e.preventDefault();
        var arg1=$('#prod_details').serialize();
        var def_image = $('#thumb');
        var prod_image = $('#prod');
        var formdata = new FormData(); 
        
        formdata.append('def_image', def_image.files);
        formdata.append('prod_image', prod_image.files);
        formdata.append('formdata', arg1);
        console.log(formdata);
        $.ajax({  
          type:"product_details",
          url:"dd_process.php",  
          method:"POST",  
          data:formdata,  
          dataType: 'json',
          contentType:false,  
          cache: false,  
          processData: false,  
          success:function(data){  
      
      $('#uploaded_image').html(data);   
          }  
      }); 
     do_formvalidate('#prod_details');
     
       $('#section_product_details').fadeOut(100);
       $('#section_image_upload').fadeIn(100);
       
     */
        });

        $('#save_next2').click(function(e){
          e.preventDefault();
         $('#section_image_upload').fadeOut(100);
         $('#section_product_list').fadeIn(100);
         
      
          });
        
