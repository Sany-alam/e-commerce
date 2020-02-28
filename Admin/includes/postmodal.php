<?php
// echo $_SESSION['admin']['email'];
// echo $_SESSION['admin']['password'];
// echo $_SESSION['admin']['id'];
// echo $_SESSION['admin']['name'];
 ?>
<div id="postmodal" class="modal fade" role="dialog" >
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Write post</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- modal body -->
      <form class="" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" id="PostedBy" value="<?php echo $_SESSION['admin']['name']; ?>">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-product-hunt"></i></span>
            </div>
            <input id="title" type="text" class="form-control" placeholder="Enter product name" aria-label="Username" aria-describedby="basic-addon1" required>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Category</label>
            </div>
            <select class="custom-select" id="category" required>
              <option value="">Choose product category</option>
              <option value="1">vehicle</option>
              <option value="2">Outfits</option>
              <option value="3">Electronics</option>
              <option value="4">Others & Accessories</option>
              <option value="5">Cosmetics</option>
              <option value="6">Sports</option>
            </select>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">$</span>
            </div>
            <input id="price" type="number" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Enter product price" required>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-edit"></i></span>
            </div>
            <textarea id="describe" class="form-control" aria-label="With textarea" placeholder="Describe the product" required></textarea>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="img" accept="image/*"  required multiple>
              <label class="custom-file-label" for="inputGroupFile01">Choose product image</label>
            </div>
          </div>

          <button data-dismiss="modal" onclick="post()" type="button" class="btn btn-primary btn-block">Post</button>

        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
function post(){
  var postedby = $("#PostedBy").val();
  var title = $("#title").val();
  var category = $("#category").val();
  var price = $("#price").val();
  var description = $("#describe").val();
  // var img = $('#img')[0].files[0];
  // alert(postedby+title+category+price+description+img);
  var formdata = new FormData();
  formdata.append("postedby",postedby);
  formdata.append("title",title);
  formdata.append("category",category);
  formdata.append("price",price);
  formdata.append("description",description);
  formdata.append('img',$('#img')[0].files[0]);
  formdata.append('post',"post");
$.ajax({
       processData:false,
       contentType:false,
       data:formdata,
       type:"post",
       url:"includes/data.php",
       success:function(data,status)
       {
        display();
        alert(data);

       }
 });
}
</script>
