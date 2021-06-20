var category_html = "";
$(document ).ready(function() {
    category_html = $("#shop_category_id").html();

});
$("#add").click(function (e) {

    e.preventDefault;
    var html="";
    var colorhtml=$('#select_color').html();
    var sizehtml=$('#select_size').html();
    html += `<tr>
    <td >

     <!-- <select class="form-control category_all_class" name="category_percentage['category'][]">
        
     </select> -->
     <select class="form-control" id="color_1" name="product_details[color_variant][]">
     `+colorhtml+`
        </select>
    </td>
    <td>
        <select class="form-control" name="product_details[size_variant][]">
        `+sizehtml+`
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
  $("#table-stockdet").append(html);
 
});

$("#table-stockdet").on('click', '#remove', function (e) {
e.preventDefault;
  $(this).closest('tr').remove();
}); 