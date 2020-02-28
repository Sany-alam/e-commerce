<?php
  $id = $post['id'];
  $postedby = $post['postedby'];
  $editedby = $post['editedby'];
  $title = $post['title'];
  $category = $post['category'];
  $price = $post['price'];
  $img = $post['img'];
  $description = $post['description'];
  $flash_sale = $post['flash_sale'];
  $special_offers = $post['special_offers']; ?>

  <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
    <div class="card" style="">
      <img class="card-img-top" src="../images/<?php echo $img; ?>" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title"><?php echo $title; ?></h5>
        <p class="card-text">Price : <?php echo $price; ?>Tk</p>
        <p class="card-text"><?php echo $description; ?></p>
        <?php
        if (!empty($editedby))
        {
          ?><p class="card-text"><?php echo "Edited by ".$editedby; ?></p><?php
        }
        else
        {

        } ?>
        <p>Posted by : <?php echo $postedby; ?></p>
        <button data-toggle="modal" data-target="#changephoto?id=<?php echo $id; ?>" class="btn btn-outline-primary">Change <i class="fa fa-image"></i></button>
        <button data-toggle="modal" data-target="#editpost?id=<?php echo $id; ?>" class="btn btn-outline-warning">Edit</button>
        <button data-toggle="modal" data-target="#deletePost?id=<?php echo $id; ?>" class="btn btn-outline-danger">Delete</button>
        <?php
        if (isset($_POST['Special'])) {
        }
        else {
          if ($flash_sale==1)
          {
            ?>
            <button  onclick="RemoveToFlash(<?php echo $id; ?>)" class="btn btn-outline-danger">Remove to flash sale</button>
            <?php
          }
          else
          {
            ?>
            <button  onclick="AddToFlash(<?php echo $id; ?>)" class="btn btn-outline-success">Add to flash sale</button>
            <?php
          }
        }
        if (isset($_POST['flash'])) {
        }
        else {
          if ($special_offers==1)
          {
            ?>
            <button  onclick="RemoveToSpecial(<?php echo $id; ?>)" class="btn btn-outline-danger">Remove to spacial offer</button>
            <?php
          }
          else
          {
            ?>
            <button  onclick="AddToSpecial(<?php echo $id; ?>)" class="btn btn-outline-success">Add to spacial offer</button>
            <?php
          }
        }
        ?>
      </div>
    </div>
  </div>
  <?php include("editmodal.php"); ?>
  <?php include("delete_post_modal.php"); ?>
  <?php include("change_photo_modal.php"); ?>
<script>
// remove to flash sale
function RemoveToFlash(post_no){
  // alert(post_no);
  var formdata = new FormData();
  formdata.append("post_no",post_no);
  formdata.append("RemoveToFlash",'RemoveToFlash');
  $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"includes/data.php",
    success:function(data,status){
       flash();
       alert(data);
    }
  });
}




// remove to special offer
function RemoveToSpecial(post_no){
  // alert(post_no);
  var formdata = new FormData();
  formdata.append("post_no",post_no);
  formdata.append("RemoveToSpecial",'RemoveToSpecial');
  $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"includes/data.php",
    success:function(data,status){
      alert(data);
       Special();
    }
  });
}







// add to flash sale
function AddToFlash(post_no){
  // alert(post_no);
  var formdata = new FormData();
  formdata.append("post_no",post_no);
  formdata.append("AddToFlash",'AddToFlash');
  $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"includes/data.php",
    success:function(data,status){
      alert(data);
      // $("#display").html(data);
      display();
    }
  });
}


// add to special item
function AddToSpecial(post_no){
  // alert(post_no);
  var formdata = new FormData();
  formdata.append("post_no",post_no);
  formdata.append("AddToSpecial",'AddToSpecial');
  $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"includes/data.php",
    success:function(data,status){
      alert(data);
      // $("#display").html(data);
       display();
    }
  });
}
</script>
