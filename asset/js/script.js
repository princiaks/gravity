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
    
    /* var formData= new FormData;
    if($(this).attr("id") == 'for_thumbnail')
    {
      alert("thumbnail"); */
      var files_list = e.originalEvent.dataTransfer;
      console.log()
      filePreview(files_list);

   /*  }
    else{
    var files_list = e.originalEvent.dataTransfer.files;
    }
    for(var i=0; i<files_list.length; i++)  
   {   
    formData.append('file[]', files_list[i]);
   }   */
   
  });
  
});




/* const dropArea = document.querySelector(".drag-area"),
dragText = dropArea.querySelector("header"),
button = dropArea.querySelector("button"),
input = dropArea.querySelector("input");
let files_list; //this is a global variable and we'll use it inside multiple functions
let formData = new FormData();  
button.onclick = (e)=>{
    e.preventDefault();
  input.click(); //if user click on the button then the input also clicked
}
input.addEventListener("change", function(){
  //getting user select file and [0] this means if user select multiple files then we'll select only the first one
  files_list = this.files;
  dropArea.classList.add("active");
  showFile(); //calling function
});
//If user Drag File Over DropArea
dropArea.addEventListener("dragover", (event)=>{
  event.preventDefault(); //preventing from default behaviour
  dropArea.classList.add("active");
  dragText.textContent = "Release to Upload File";
});
//If user leave dragged File from DropArea
dropArea.addEventListener("dragleave", ()=>{
  dropArea.classList.remove("active");
  dragText.textContent = "Drag & Drop to Upload File";
});
//If user drop File on DropArea
dropArea.addEventListener("drop", (event)=>{
  event.preventDefault(); //preventing from default behaviour
  //getting user select file and [0] this means if user select multiple files then we'll select only the first one
  /* file = event.dataTransfer.files[0]; */
 
 /*  console.log(formData); 
  files_list = event.dataTransfer.files;  

  console.log(files_list);
  showFile(); //calling function 
});
function showFile(){
  let fileType = files_list[0].type; //getting selected file type
  let validExtensions = ["image/jpeg", "image/jpg", "image/png","image/JPG"];
  let filesize=files_list[0].size; 
  alert(fileType);
   //adding some valid image extensions in array
  
  if(validExtensions.includes(fileType) || filesize < 250000){
   /*  for(var i=0; i<files_list.length; i++)  
  {   
    formData.append('file[]', files_list[0]);
 /*  }  
      
  $.ajax({  
    url:"upload.php",  
    method:"POST",  
    data:formData,  
    contentType:false,  
    cache: false,  
    processData: false,  
    success:function(data){  

         $('#uploaded_image').html(data);  
    }  
});  
  }
  else
  {
    alert("This is not an Image File Or File Size is Too Large(Please upload < 250kb)");
    dropArea.classList.remove("active");
    dragText.textContent = "Drag & Drop to Upload File";
  } 
 
} */
$('#btn_thumbnail,#btn_prodimg').click(function(e){
  e.preventDefault();
  var id=$(this).attr('id');
  $('.'+id+'_click').click();
});
$('.btn_thumbnail_click,.btn_prodimg_click').change(function(e){
  e.preventDefault();
  filePreview(this);
});
var data;
function filePreview(input) {
  console.log(input);
 
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      var files=input.files[0];
      if($(input).hasClass("btn_thumbnail_click"))
      {
        global_var=".drag-area-thumb";
      }
      else if($(input).hasClass("btn_prodimg_click"))
      {
        global_var="#uploaded_image";
      }
      //console.log(files);
      reader.onload = function (e) {
        if(global_var==".drag-area-thumb")
        {
          $(global_var).html('<img src="'+e.target.result+'" width="450" height="300"/>');
        }
        else if(global_var=="#uploaded_image")
        {
          $(global_var).append('<div class="col-md-4 border p-1"><div class="card border-0"><div class="card-body"><img src="'+e.target.result+'" class="img-responsive" width="140px" height="150px" /></div></div></div>');
        }
      
    }
  
      reader.readAsDataURL(input.files[0]);
  }
}
