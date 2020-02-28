<!-- Modal -->
<div id="cart?id=<?php echo $id; ?>&name=<?php echo $title; ?>&price=<?php echo $p; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modal Header</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <label for="quantity">Item quantity</label>
        <input class="form-control" type="number" id="quantity<?php echo $id; ?>" value="1">
      </div>
      <div class="modal-footer">
        <button onclick="addToCart('<?php echo $id; ?>','<?php echo $title; ?>','<?php echo $p; ?>')" type="button" class="btn btn-dark" data-dismiss="modal">Add to cart</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
function addToCart(id,name,price){
  // alert(postid+name+price);

  var quantity = $("#quantity"+id).val();
  var formdata = new FormData();
  formdata.append("quantity",quantity);
  formdata.append("postid",id);
  formdata.append("name",name);
  formdata.append("price",price);
  formdata.append("addToCart",'addToCart');
  $.ajax({
    cache: false,
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"includes/data.php",
    success:function(data){
      // alert(data);
      // $("#counter").html(data);
      // location.reload();
      counter();
    }
  });
  }
</script>
