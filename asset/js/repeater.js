var category_html = "";
$(document ).ready(function() {
    category_html = $("#shop_category_id").html();

});
$("#add").click(function (e) {
    var html="";
    e.preventDefault;
    /* var CookieValue=document.cookie; */
    html += `<tr>
    <td >

     <!-- <select class="form-control category_all_class" name="category_percentage['category'][]">
        
     </select> -->
     <select class="form-control" id="color_1" name="product_details[color_variant][]">
     <option selected>Select Color</option>
     <option >Blue</option>
     <option >Green</option>
     <option >Yellow</option>
        </select>
    </td>
    <td>
        <select class="form-control" name="product_details[size_variant][]">
        <option selected>Select Size</option>
        <option >40</option>
        <option >41</option>
        <option >42</option>
        </select>
    </td>
    <td>
      <input
        type="text"
        name="product_details[sku][]"
        class="form-control"
        value="fg-"
      />
    </td>
    <td>
      <input
        type="text"
        name="product_details[stock][]"
        class="form-control"
      />
    </td>
    <td>
    <input
    type="button"
    id="remove"
    name="add"
    value="-"
    class="btn btn-danger"
    />
    </td>
  </tr>    `;
  $("#table-weight").append(html);
 
});

$("#table-weight").on('click', '#remove', function (e) {
e.preventDefault;
  $(this).closest('tr').remove();
}); 