var global_var;
$(document).ready(function(e)
{
  $('.drag-area-thumb,.drag-area').on('dragover',function(e){
    e.preventDefault();
    $(this).addClass('active');
    $(this).children("header").text("Release to Upload File");
   
  });
  $('.drag-area-thumb,.drag-area').on('dragleave',function(e){
    e.preventDefault();
    $(this).removeClass('active');
    $(this).children("header").text("Drag & Drop to Upload File");
   
  });

  $('.drag-area-thumb,.drag-area').on('drop', function(e){ 
    e.stopPropagation();
    e.preventDefault();  
    $(this).removeClass('active');
    id=$(this).attr("id");
    var num = id.substring(id.lastIndexOf('-')+1);
    num=num.charAt(0);
    
      var files_list = e.originalEvent.dataTransfer;
      filePreview(files_list,num,id);

  
   
  });
  
});
$('.btnbrowse_def,.btnbrowse_prod').click(function(e){
  e.preventDefault();
  var id=$(this).attr('id');
  $('#'+id+'_click').click();
});
$('.btn_thumbnail_click,.btn_prodimg_click').change(function(e){
  e.preventDefault();
  id=$(this).attr("id");
  var num = id.substring(id.lastIndexOf('-')+1);
  num=num.charAt(0);
  filePreview(this,num);
});
var data;
function filePreview(input,num,dropitem="null") {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      var formData = new FormData();
      var files=input.files;
      var i,n=0;
      var length=0;


       if($(input).hasClass("btn_thumbnail_click") || $("#"+dropitem).hasClass("dropthumb") )
      {
        getPreview(reader,'.drag-area-th',num);
        reader.readAsDataURL(input.files[0]);
        
      }
      else if($(input).hasClass("btn_prodimg_click") ||  $("#"+dropitem).hasClass("dropprod"))
      {
          
          for( i=0 ; i < files.length; i++)
        {
          (function(file)
          {
        var reader = new FileReader();  
       
        getPreview(reader,'#uploaded_image',num);
        reader.readAsDataURL(file);
       
      })(files[i]);
      formData.append('prod[]',files[i]);
        }
         
      }
     
  }
}

function getPreview(reader,target_elem,num)
{
  reader.onload = function (e) {
    if(target_elem==".drag-area-th")
    {
      $(target_elem+num).html('<img src="'+e.target.result+'" width="450" height="300"/>');
    }
    else if(target_elem=="#uploaded_image")
    {
      $(target_elem+num).append('<div class="col-md-4 border p-1"><div class="card border-0"><div class="card-body"><img src="'+e.target.result+'" class="img-responsive" width="140px" height="150px" /></div></div></div>');
    }
  }
}
