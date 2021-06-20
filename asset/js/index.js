$(document).ready(function() {
    $('.prodsel').selectpicker();  
    $('#prod_details').validate();
    $('#prod_secondary_details').validate();
    $('#view_prod_sec_details').validate();
    $('#color_variant_upload').validate();

    $('#prod_stock_details').DataTable();
  });
  $('.del_row').click(function(e){
    e.preventDefault; 
    var id=$(this).siblings('.del_id').val();
    var sweet_data = {
        title : "Delete Row",
        text : "are you sure want to delete?",
        icon :"warning",
    };
    sweetalertConfirm(sweet_data,function(data){
        if(data==true)
        {
          $.ajax({
            url: base_url+"Gravitycon/delete_from_stock",
            type: 'POST',
            data: {
                id:id
            },
            dataType: 'json',
            success: function(data) {
              if(data==1)
              {
              location.reload(true);
              }
              else
              {
                alert("Deletion Failed");
              }
            }
        });
        }
     
    });
    
        
   
   

});
function sweetalertConfirm(sweet_data,handle)
{
    swal({
        title: sweet_data.title,
        text: sweet_data.text,
        icon: sweet_data.icon,
        buttons:true,
        dangerMode:true,
      
      }).then((willDelete)=>{
          if(willDelete)
          {
            handle(true);
          }
          else
          {
            handle(false)
          }
        });
    

}

