<?php
$id = $cardP['id'];
$title = $cardP['title'];
$category = $cardP['category'];
$price = $cardP['price'];
$img = $cardP['img'];
$description = $cardP['description'];
$flash = $cardP['flash_sale'];?>

<div class="card mb-3" style="max-width: 100%;">
  <div class="row no-gutters">
    <div class="col-md-6">
      <img src="images/<?php echo $img; ?>" class="card-img border" alt="src">
    </div>
    <div class="col-md-6">
      <div class="card-body">
        <h5 class="card-title"><?php echo $title; ?></h5>
        <?php if ($flash == 1)
        {
          ?>
          <p>Price : <?php echo (50/100)*$price."Tk 50% Discount "; ?><i class="fa fa-gift"></i></p>
          <?php
        }
        else
        {
          ?><p>Price : <?php echo $price; ?></p><?php
        } ?>
        <p class="card-text"><?php echo $description; ?></p>
        <?php
        if (isset($_SESSION['public']))
        {
          if ($flash == 1) {
            $p = (50/100)*$price;
            ?>
            <a href="#" data-toggle="modal" data-target="#cart?id=<?php echo $id; ?>&name=<?php echo $title; ?>&price=<?php echo $p; ?>" class="btn btn-dark bounce"><i class="fa fa-cart-plus"></i></a>
            <button data-toggle="modal" data-target="#buyModal" type="button" class="btn btn-dark">Buy</button>
            <?php
            include("buyModal.php");
            include("quantitymodal.php");
          }
          else
          { $p = $price;
            ?>
            <a href="#" data-toggle="modal" data-target="#cart?id=<?php echo $id; ?>&name=<?php echo $title; ?>&price=<?php echo $p; ?>" class="btn btn-dark bounce"><i class="fa fa-cart-plus"></i></a>
            <button data-toggle="modal" data-target="#buyModal" type="button" class="btn btn-dark">Buy</button>
            <?php
            include("buyModal.php");
            include("quantitymodal.php");
          }
        }
        else
        {
          ?>
          <a href="#" data-toggle="modal" data-target="#LoginModal" class="btn btn-dark bounce"><i class="fa fa-cart-plus"></i></a>
          <!-- login modal -->
          <?php include("loginmodal.php"); ?>
          <?php
        }?>
      </div>
    </div>
  </div>
</div>
