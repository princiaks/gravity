$(document).ready(function() {
    $('select').selectpicker();  
    $('#prod_details').validate();
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
