
  <?php
  $id = $cards['id'];
  $title = $cards['title'];
  $category = $cards['category'];
  $price = $cards['price'];
  $img = $cards['img'];
  $description = $cards['description'];
  ?>
  <style media="screen">
  .card{
    overflow: hidden;
  }
  .card img{
    transition:all 0.5s ease;
  }
  .card:hover img{
    transform:scale(1.3);
  }
  </style>
    <div class="card m-2 shadow" style="height:280px;display:inline-block;width:250px">
        <img src="images/<?php echo $img; ?>" class="card-img-top border" alt="src" style="height:40%;width:100%;">
      <div class="card-body" style="height:60%;width:100%;overflow:hidden;">
        <div class="card-title" style="height:65%;width:100%;overflow:hidden">
          <h5 class=""><?php echo $title; ?></h5>
          <?php if (isset($_POST['flashSale']))
          { $p = (50/100)*$price;
            ?><p>Price : <?php echo $p."Tk 50% Discount"; ?></p><?php
          }
          else { $p = $price;
            ?><p>Price : <?php echo $p; ?> Tk</p><?php
          } ?>

        </div>
        <div class="h-5 w-10" style="height:35%;width:100%;overflow:hidden;">
          <a href="#" onclick="preview(<?php echo $id; ?>)" class="btn btn-dark">Preview</a>
          <?php
          if (isset($_SESSION['public']))
          {
            ?>
            <a href="#" data-toggle="modal" data-target="#cart?id=<?php echo $id; ?>&name=<?php echo $title; ?>&price=<?php echo $p; ?>" class="btn btn-dark bounce"><i class="fa fa-cart-plus"></i></a>
            <button data-toggle="modal" data-target="#buyModal" type="button" class="btn btn-dark">Buy</button>
            <?php
            include("buyModal.php");
            include("quantitymodal.php");
          }
          else
          {
            ?>
            <a href="#" data-toggle="modal" data-target="#LoginModal" class="btn btn-dark bounce"><i class="fa fa-cart-plus"></i></a>
            <button data-toggle="modal" data-target="#LoginModal" type="button" class="btn btn-dark">Buy</button>
            <!-- login modal -->
            <?php include("loginmodal.php"); ?>
            <?php
          }?>
        </div>
      </div>
    </div>
<script type="text/javascript">


function preview(postid){
  var formdata = new FormData();
  formdata.append("postid",postid);
  formdata.append("preview",'preview');
  $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"includes/data.php",
    success:function(data){
      // alert(data);
      $("#fullDisplay").html(data);
    }
  });
}
</script>
