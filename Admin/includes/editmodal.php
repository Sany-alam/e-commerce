<!-- Modal -->
<style>
a{text-decoration: none;color:#000;}
</style>
<div id="editpost?id=<?php echo $id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit post</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-product-hunt"></i></span>
          </div>

          <input id="title<?php echo $id; ?>" value="<?php echo $title; ?>" type="text" class="form-control" placeholder="Enter product name" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>


        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Write the category number <i class="fa fa-arrow-right"></i>
            </a>
            <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">vehicle > 1</a>
              <a class="dropdown-item" href="#">Outfits > 2</a>
              <a class="dropdown-item" href="#">Electronics > 3</a>
              <a class="dropdown-item" href="#">Others & Accessories> 4</a>
              <a class="dropdown-item" href="#">Cosmetics > 5</a>
              <a class="dropdown-item" href="#">Sports > 6</a>
            </div>
          </div>
          <input id="category<?php echo $id; ?>" type="number" class="form-control" placeholder="Category" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $category; ?>">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input id="price<?php echo $id; ?>" value="<?php echo $price; ?>" type="number" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Enter product price" required>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-edit"></i></span>
          </div>
          <textarea id="describe<?php echo $id; ?>" class="form-control" aria-label="With textarea" placeholder="Describe the product" required>
            <?php echo $description; ?>
          </textarea>
        </div>

        <div class="input-group mb-3">
          <div class="card">
            <img class="img-fluid" src="../images/<?php echo $img; ?>" alt="">
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button data-dismiss="modal" onclick="update(<?php echo $id; ?>)" type="button" class="btn btn-primary btn-block">Update</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
function update(id){
  var title = $("#title"+id).val();
  var ct = $("#category"+id).val();
  var price = $("#price"+id).val();
  var description = $("#describe"+id).val();
  // var img = $('#img')[0].files[0];
  // alert(title+category+price+description);
  var formdata = new FormData();
  formdata.append('id',id);
  formdata.append('title',title);
  formdata.append('ct',ct);
  formdata.append('price',price);
  formdata.append('description',description);
  formdata.append('update',"update");
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
