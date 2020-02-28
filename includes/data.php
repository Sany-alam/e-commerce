<?php
include("connection.php");
session_start();

// Remopve all item from cart
if (isset($_POST['clearCart']))
{
  foreach ($_SESSION['cart'] as $key => $value)
  {
    if ($key>0) {
      unset($_SESSION['cart'][$key]);
    }
  }
}


if (isset($_POST['merge'])) {
  foreach ($_SESSION['cart'] as $key => $value) {
    $_SESSION['cart']=array_values($_SESSION['cart']);
  }
}


// remove single item from cart
if (isset($_POST['Ditem'])) {
  $key = $_POST['key'];
  // echo $key;
  if (isset($_SESSION['cart']))
  {
    foreach ($_SESSION['cart'] as $ke => $value)
    {
      foreach ($value as $k => $v)
      {
        for ($i=1; $i <= $ke;$i++)
        {
          unset($_SESSION['cart'][$key]);
        }
      }
    }
  }
}




// show cart items
if (isset($_POST['GoToCart']))
{
  if (count($_SESSION['cart'])>=1)
  {
    include("cartTable.php");
  }
  else
  {
    echo "<h1 class='display-5 text-center'>There no tem in your cart</h1>";
  }
}





// adding to card using multidimentional array
if (isset($_POST['addToCart']))
{
  // error_reporting(0);
  $q = $_POST['quantity'];
  $post_id  = $_POST['postid'];
  $n = $_POST['name'];
  $pr = $_POST['price'];
  $p = $pr*$q;
  // echo "item : ".$q." item id : ".$post_id." Item name : ".$n." Price:  ".$p;
    // creating multy dimentional array
    if (isset($_SESSION['cart'])) {
      $cart = array($n,$q,$pr,$p,$post_id);
      array_push($_SESSION['cart'],$cart);
      // print_r($_SESSION['cart']);
    }
    else {
      $cart = array($n,$q,$pr,$p,$post_id);
      $_SESSION['cart'] = $cart;
      // print_r($_SESSION['cart']);
    }
  }


if (isset($_POST['counter']))
{
  echo count($_SESSION['cart'])-1;
}



if (isset($_POST['search'])) {
  $src = $_POST['srch'];
  $sql = "SELECT * FROM product where title = '$src' or description = '$src'";
  $res = mysqli_query($conn,$sql);
  if (mysqli_num_rows($res)>0) {
    ?>
    <div class="container">
      <div class="row">
      <?php
    while ($cards = mysqli_fetch_array($res))
    {
      ?><div class="col-lg-3 col-md-4 col-sm-6 my-5"><?php
       include("cards.php");
       ?></div><?php
    }
    ?>
      </div>
    </div>
    <?php  }
  else {
    ?><h1 class="display-3">
      Invalid search item!
    </h1><?php
  }
}







// cards post preview
if (isset($_POST['preview']))
{
  $id =  $_POST['postid'];
  $sql = "SELECT * FROM product where id = $id";
  $res = mysqli_query($conn,$sql);
  if (mysqli_num_rows($res)==1)
  {$cardP = mysqli_fetch_array($res);
    include("cardspreviw.php");
  }
  else {
    echo "There is no items to show";
  }
}






// Show all items
if (isset($_POST['AllPost']))
{
  $sql = "SELECT * FROM product order by id desc";
  $res = mysqli_query($conn,$sql);
  if (mysqli_num_rows($res)>0)
  {
    ?>
    <div class="container">
            <div class="row">
      <?php
    while ($cards = mysqli_fetch_array($res))
    {
      ?><div class="col-lg-3 col-md-4 col-sm-6 my-5"><?php
       include("cards.php");
       ?></div><?php
    }
    ?>
            </div>
    </div>
    <?php
  }
  else {
    echo "There is no items to show";
  }
}







// latest item show in gallery
if (isset($_POST['LatestItems']))
{
  $sql = "SELECT * FROM product order by id desc";
  $res = mysqli_query($conn,$sql);
  if (mysqli_num_rows($res)>0)
  {
    while ($cards = mysqli_fetch_array($res))
    {
       include("cards.php");
    }
  }
  else {
    echo "There is no items to show";
  }
}






// show special item
if (isset($_POST['SpecialItems']))
{
  $sql = "SELECT * FROM `product` WHERE special_offers = 1";
  $res = mysqli_query($conn,$sql);
  if (mysqli_num_rows($res)>0)
  {
    ?>
    <style media="screen">
    .special::-webkit-scrollbar{
      height: 5px;
    }
    .special::-webkit-scrollbar-thumb{
      border-radius: 10px;
      background:#ddd;
    }
    </style>
    <div class="special" style="height:300px;overflow-x:scroll;overflow-y:hidden;white-space:nowrap;"><?php
    while ($cards = mysqli_fetch_array($res))
    {
      include("cards.php");
    }
    ?></div><?php
  }
  else
  {
    echo "Special items empty!";
  }
}






// show flash salte item
if (isset($_POST['flashSale']))
{
  $sql = "SELECT * FROM `product` WHERE flash_sale = 1";
  $res = mysqli_query($conn,$sql);
  if (mysqli_num_rows($res)>0)
  { ?>
    <style media="screen">
    .flash::-webkit-scrollbar{
      height: 5px;
    }
    .flash::-webkit-scrollbar-thumb{
      border-radius: 10px;
      background:#ddd;
    }
    </style>
    <div class="flash" style="height:300px;overflow-x:scroll;overflow-y:hidden;white-space:nowrap;"><?php
    while ($cards = mysqli_fetch_array($res))
    {
      include("cards.php");
    }
    ?></div><?php
  }
  else
  {
    echo "Flash sale empty!";
  }
}





// show post by category
if (isset($_POST['categoryitem']))
{
   $categoryno = $_POST['C_no'];
   $sql = "SELECT * FROM product WHERE category = '$categoryno' ORDER BY ID DESC";
   $res = mysqli_query($conn,$sql);
   if (mysqli_num_rows($res)>0) {
     ?>
     <div class="container"><div class="row my-5 mx-0"><?php
     while ($cards = mysqli_fetch_array($res))
     {
         // echo $id."   ".$title.' '.$category.' '.$price.' '.$img.' '.$description;
         ?>
         <div class="col-lg-3 col-md-4 col-sm-6 my-5">
           <?php include("cards.php"); ?>
         </div>
         <?php
     }
     ?></div></div><?php
   }
}





// login of public
if (isset($_POST['login'])) {

    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql = "SELECT * FROM `public` WHERE email = '$email' and password = '$password'";
    $res = mysqli_query($conn,$sql);
    if (mysqli_num_rows($res) == 1)
    {
      $userdetail = mysqli_fetch_array($res);
      $_SESSION['public'] = $userdetail;
      $ddd = " ";
      $cart = array($ddd);
      $_SESSION['cart'] = array($cart);
      echo "ok";
    }
    else
    {
      echo "not ok";
    }
}



// account check
if (isset($_POST['AccountCheck']))
{
  $ema = $_POST['email'];
  $pass = $_POST['password'];
  $sql = "SELECT * FROM `public` WHERE email = '$ema' and password = '$pass'";
  $re = mysqli_query($conn,$sql);
  if (mysqli_num_rows($re)>0)
  {
    echo "ok";
  }
  else {
    echo "not ok";
  }
}




// reg and login form email check
if (isset($_POST['emailCheck'])) {
  $email = $_POST['email'];
  $sql = "SELECT * FROM `public` WHERE email = '$email'";
  $resu = mysqli_query($conn,$sql);
  if (mysqli_num_rows($resu)>0) {
    echo "found email";
  }
  else {
    echo "ok";
  }
}



// reg of public with validation
if (isset($_POST['signup']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone =  $_POST['phone'];
  $pas = $_POST['password'];
  $sql = "INSERT INTO `public`(`name`, `phone`, `email`, `password`) VALUES ('$name','$phone','$email','$pas')";
  $result = mysqli_query($conn,$sql);
  if ($result)
  {
    $sqls = "SELECT * FROM `public` WHERE email = '$email' and password = '$pas'";
    $ress = mysqli_query($conn,$sqls);
    if (mysqli_num_rows($ress)==1)
    {
      echo "Welcome";
      $userdetail = mysqli_fetch_array($ress);
      $_SESSION['public'] = $userdetail;
      $ddd = " ";
      $cart = array($ddd);
      $_SESSION['cart'] = array($cart);
    }
  }
}



// logout
if (isset($_POST['logout'])) {
  if (isset($_SESSION['public'])) {
session_unset();
  }
}
 ?>
