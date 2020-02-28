<?php
error_reporting(0);
 ?>
<div class="container-fluid">
<div class="row m-0">
  <div class="col-8">
    <div class="row m-0 p-0 text-center border">
    <div class="col p-0"><h5>Name</h5></div>
    <div class="col p-0"><h5>Quantity</h5></div>
    <div class="col p-0"><h5>Per item price</h5></div>
    <div class="col p-0"><h5>Total price</h5></div>
    <div class="col p-0"><h5>#</h5></div>
    </div>
    <?php
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    if (empty($_SESSION['cart'][1])) {
      ?>
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <h1 class="pt-5">
              No item!
            </h1>
            <a href="index.php" class="pt-2">
              <button type="button" class="btn btn-primary">Continue shopping</button>
            </a>
          </div>
        </div>
      </div>
      <?php
    }
    foreach ($_SESSION['cart'] as $key => $value)
    {
      for ($i=1; $i <= $key; $i++) {
          ?><div class="row m-0 text-center border py-3">
            <?php
            foreach ($value as $k => $v)
            {
              for ($i=1; $i <= $key;$i++)
              {
                if ($key == $i)
                {
                  // echo $key." : ".$k." = ".$v."<br />";
                  if ($k == 0) {
                    ?><div class="col-2 p-0"><?php echo $v; ?></div><?php
                  }
                  if ($k == 1) {
                    ?><div class="col-2 p-0"><?php echo $v; ?></div><?php
                  }
                  if ($k == 2) {
                    ?><div class="col-3 p-0"><?php echo $v; ?></div><?php
                  }
                  if ($k == 3) {
                    ?><div class="col-3 p-0"><?php echo $v; ?></div><?php
                  }
                  if ($k == 4) {
                    ?><div class="col-2 p-0"><button class="btn btn-danger" onclick="Ditem(<?php echo $key; ?>)"><i class="fa fa-trash"></i></button></div><?php
                  }
                }
              }
            }
             ?>
          </div><?php
      }
    }
   ?>
  </div>
  <div class="col-4 px-0 py-2 border">
    <div class="container">
      <!-- <?php echo $_SESSION['public'][0] ?> -->
      <h1 class="text-center border-bottom pb-2"><?php echo $_SESSION['public'][1] ?></h1>
      <p class="pl-2">Total item : <?php echo count($_SESSION['cart'])-1; ?></p>
      <pre class="d-none"><?php print_r($_SESSION['cart']); ?></pre>
      <p class="pl-2">Total price :
        <?php
        $total = 0;
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        for ($i=1; $i < count($_SESSION['cart']); $i++) {
          $total = $total+$_SESSION['cart'][$i][3];
        }
        echo $total." Tk";
        ?>
      </p>
      <button class="btn btn-danger" onclick="clearCart()">Clear all</button>
      <button data-toggle="modal" data-target="#buyModal" type="button" class="btn btn-success">Buy</button>
      <?php
      include("buyModal.php");
       ?>
    </div>
  </div>
</div>
</div>


<script type="text/javascript">
$(document).ready(function(){
  merge();
});
function merge()
{
  var formdata = new FormData();
  formdata.append("merge",'merge');
  $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"includes/data.php",
    success:function(data){
      // alert(data);
    }
  });
}






function clearCart(){
  var formdata = new FormData();
  formdata.append("clearCart",'clearCart');
  $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"includes/data.php",
    success:function(data){
      GoToCart();
      counter();
    }
  });
}




  function Ditem(key){
    var formdata = new FormData();
    formdata.append("key",key);
    formdata.append("Ditem",'Ditem');
    $.ajax({
      processData:false,
      contentType:false,
      data:formdata,
      type:"post",
      url:"includes/data.php",
      success:function(data){
        // alert(data);
        merge();
        GoToCart();
        counter();
      }
    });
  }
</script>
