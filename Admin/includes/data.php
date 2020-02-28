<?php
$conn = mysqli_connect('localhost','root','','e-commerce');


// display special item
if (isset($_POST['Special']))
{
  $sql = "SELECT * FROM `product` WHERE special_offers = 1";
  $res = mysqli_query($conn,$sql);
  if (mysqli_num_rows($res)>0)
  {
    while ($post=mysqli_fetch_array($res))
    {
      include("card_data.php");
    }
  }
  else
  {
    ?><h1>There is no post!</h1><?php
  }
}



// display flash data
if (isset($_POST['flash']))
{
  $sql = "SELECT * FROM `product` WHERE flash_sale = 1";
  $res = mysqli_query($conn,$sql);
  if (mysqli_num_rows($res)>0)
  {
    while ($post=mysqli_fetch_array($res))
    {
      include("card_data.php");
    }
  }
  else
  {
    ?><h1>There is no post!</h1><?php
  }
}



// remove special offers
if (isset($_POST['RemoveToSpecial']))
{
 $post_id = $_POST['post_no'];
  $sql = "SELECT * FROM product WHERE id = '$post_id' and special_offers = 1";
  $res = mysqli_query($conn,$sql);
  if (mysqli_num_rows($res)==1)
  {
      $sql2 = "UPDATE `product` SET `special_offers`= 0 WHERE id = '$post_id'";
      $res2 = mysqli_query($conn,$sql2);
      if ($res2)
      {
        echo "Successfully removed special offer item!";
      }
      else
      {
        echo "Something went wrong to remove special offers item!";
      }
    }
    else
    {
      echo "There is no item to remove from special offer item!";
    }
  }





// remove to flash sale
if (isset($_POST['RemoveToFlash']))
{
  $post_id = $_POST['post_no'];
  $sql = "SELECT * FROM product WHERE id = '$post_id' and flash_sale = 1";
  $res = mysqli_query($conn,$sql);
  if (mysqli_num_rows($res)==1)
  {
    $sql2 = "UPDATE `product` SET `flash_sale`= 0 WHERE id = '$post_id'";
    $res2 = mysqli_query($conn,$sql2);
    if ($res2)
    {
      echo "Successfully removed to flash sale!";
    }
    else
    {
      echo "Something went wrong to remove flash sale item!";
    }
  }
  else
  {
    echo "There is problem by finding post id!";
  }
}





// add to special item
if (isset($_POST['AddToSpecial'])) {
  $post_no =  $_POST['post_no'];
  $sql = "SELECT * FROM `product` WHERE id = '$post_no'";
  $res = mysqli_query($conn,$sql);
  if (mysqli_num_rows($res)==1) {
    $upd = "UPDATE `product` SET `special_offers`= 1 WHERE id = '$post_no'";
    $result = mysqli_query($conn,$upd);
    if ($result) {
      echo "Successfully added in to special offers!";
    }
    else {
      echo "Somrthing went wrong to add into special offers!";
    }
  }
  else {
    echo "There is no data to add in to special offers!";
  }
}





// add to flash sale
if (isset($_POST['AddToFlash'])) {
  $post_no =  $_POST['post_no'];
  $sql = "SELECT * FROM `product` WHERE id = '$post_no'";
  $res = mysqli_query($conn,$sql);
  if (mysqli_num_rows($res)==1) {
    $upd = "UPDATE `product` SET `flash_sale`= 1 WHERE id = '$post_no'";
    $result = mysqli_query($conn,$upd);
    if ($result) {
      echo "Successfully added in to flash sale!";
    }
    else {
      echo "Somrthing went wrong to add in to flash sale!";
    }
  }
  else {
    echo "There is no data to add in to flash sell!";
  }
}



// change photo
if (isset($_POST['changeImage']))
{
  if (($_FILES['postpicture']!==' '))
  {
    $pic_name =  $_FILES['postpicture']['name'];
    $pic_tmp =  $_FILES['postpicture']['tmp_name'];
    $pic_type =  $_FILES['postpicture']['type'];
    $post_id =  $_POST['id'];
    if ($pic_type == "postpicture/jpg"||"postpicture/png"||"postpicture/jpeg")
    {
      $select = "SELECT * FROM product where id = '$post_id'";
      $responce = mysqli_query($conn,$select);
      if (mysqli_num_rows($responce)>0)
      {
        while ($z = mysqli_fetch_array($responce))
        {
          if (unlink("../../images/".$z['img']))
          {
            if (move_uploaded_file($pic_tmp,"../../images/".$pic_name))
            {
              $sql = "UPDATE `product` SET `img`= '$pic_name' WHERE id = $post_id";
              $res = mysqli_query($conn,$sql);
              if ($res)
              {
                echo "Picture Successfully changed";
                // echo $pic_name."  ".$pic_tmp."  ".$post_id;
              }
            }
            else
            {
              echo "Picture can't be uploaded!";
            }
          }
          else
          {
            echo "older file existed";
          }
        }
      }
    }
    else
    {
      echo "Invalid image type!";
    }
  }
  else
  {
    echo "Input field is empty";
  }
}




// edit post
if (isset($_POST['update']))
{
  $title = $_POST['title'];
  $category = $_POST['ct'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $id = $_POST['id'];
  if (!empty($title && $category && $price && $description && $id))
  {
    $sql = "UPDATE `product` SET `title`='$title',`description`='$description',`category`='$category',`price`='$price' where id = $id";
    $res = mysqli_query($conn,$sql);
      echo "Post no : ".$id."  ".$title."  ".$category."  ".$price."  ".$description;
  }
  else {
    echo "fill the inputs";
  }
}



// Delete post
if (isset($_POST['Delete_post'])) {
  $post_id = $_POST['id'];
  $sql1 = "SELECT * FROM product where id = '$post_id'";
  $res = mysqli_query($conn,$sql1);
  if (mysqli_num_rows($res)>0) {
    while ($z = mysqli_fetch_array($res)) {
      if (unlink("../../images/".$z['img'])) {
        echo "deleted";
        $sql = "DELETE FROM `product` WHERE id = '$post_id'";
        mysqli_query($conn,$sql);
      }
      else {
        echo "went wrong";
      }
    }
  }
}





// search item
if (isset($_POST['search']))
{
  $item = $_POST['S_item'];
  if (!empty($item))
  {
    $sql = "SELECT * FROM `product` where title = '$item' or price = '$item' or description = '$item'";
    $res = mysqli_query($conn,$sql);
    if (mysqli_num_rows($res)>0)
    {
      while ($post = mysqli_fetch_array($res))
      {
        include("card_data.php");
      }
    }
    else {
      ?>
      <h1 class="display-5">invalid search!</h1>
      <?php
    }
  }
  else
  {
    echo "not";
  }
}






// display posts by category
if (isset($_POST['categoryitem']))
{
  $category = $_POST['item'];
  $sql = "SELECT * FROM `product` where category = $category";
  $res = mysqli_query($conn,$sql);
  if (mysqli_num_rows($res)>0)
  {
    while ($post=mysqli_fetch_array($res))
    {
      include("card_data.php");
    }
  }
  else
  {
    ?><h1>There is no post!</h1><?php
  }
}




// display posts
if (isset($_POST['display']))
{
  $sql = "SELECT * FROM `product` ORDER BY id desc";
  $res = mysqli_query($conn,$sql);
  if (mysqli_num_rows($res)>0)
  {
    while ($post=mysqli_fetch_array($res))
    {
      include("card_data.php");
    }
  }
  else
  {
    ?><h1>There is no post!</h1><?php
  }
}




// write post
if (isset($_POST['post']))
{
  $title = $_POST['title'];
  $postedby = $_POST['postedby'];
  $category = $_POST['category'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  if (!empty($title && $postedby && $category && $price && $description && $_FILES['img']['name']))
  {
    move_uploaded_file($_FILES['img']['tmp_name'],"../../images/".$_FILES['img']['name']);
    $img = $_FILES['img']['name'];
    $sql = "INSERT INTO `product`(`postedby`, `title`, `description`, `category`, `price`, `img`) VALUES ('$postedby','$title','$description','$category','$price','$img')";
    $res = mysqli_query($conn,$sql);
    if ($res)
    {
      echo "Successfully posted";
    }
    else
    {
      echo "something went wrong!";
    }
  }
  else
  {
    echo "Fill the inputs!";
  }
}


// logout
if (isset($_POST['logout'])) {
  session_start();
  if (isset($_SESSION['admin'])) {
session_unset();
  }
}



// login
if (isset($_POST['Login'])) {

    $email=$_POST['email'];
    $email=mysqli_real_escape_string($conn,$email);
    $email=htmlentities($email);
    $password=$_POST['password'];
    $password=mysqli_real_escape_string($conn,$password);
    $password=htmlentities($password);
    $remember=$_POST['remember'];
    $remember=mysqli_real_escape_string($conn,$remember);
    $remember=htmlentities($remember);
    $sql = "SELECT * FROM `admin` WHERE email = '$email' and password = '$password'";
    $res = mysqli_query($conn,$sql);
    if (mysqli_num_rows($res)==1) {
      $userdetail = mysqli_fetch_array($res);
      $umail = $userdetail['email'];
      $upass = $userdetail['password'];
      $uid = $userdetail['id'];
      $uname = $userdetail['name'];
      session_start();
      $_SESSION['admin'] = $userdetail;
      // echo $_SESSION['admin']['email'];
      // echo $_SESSION['admin']['password'];
      // echo $_SESSION['admin']['id'];
      // $uname = $userdetail['name'];

    }else {
      echo "Credentials not matched";
    }
}






// Registration of admin
if (isset($_POST['Signup'])) {

    $email=$_POST['email'];
    $email=mysqli_real_escape_string($conn,$email);
    $email=htmlentities($email);
    $password=$_POST['password'];
    $password=mysqli_real_escape_string($conn,$password);
    $password=htmlentities($password);
    $username=$_POST['username'];
    $username=mysqli_real_escape_string($conn,$username);
    $username=htmlentities($username);

    $sql = "SELECT email FROM `admin` WHERE email = '$email'";
    $res = mysqli_query($conn,$sql);
    $sql1 = "SELECT name FROM `admin` WHERE name = '$username'";
    $res1 = mysqli_query($conn,$sql1);
    if (mysqli_num_rows($res)>0)
    {
      echo "The email exiest an Account, go to login";
    }
    elseif (mysqli_num_rows($res1)>0)
    {
      echo "The username exiest an Account, go to login";
    }
    else
    {
      $sql2 = "INSERT INTO `admin`(`name`, `email`, `password`) VALUES ('$username','$email','$password')";
      if (mysqli_query($conn,$sql2))
      {
        $sn = "SELECT * FROM `admin` WHERE email = '$email' and password = '$password'";
        $sr = mysqli_query($conn,$sn);
        if (mysqli_num_rows($sr)==1)
        {
          $userdetail = mysqli_fetch_array($sr);
          session_start();
          $_SESSION['admin'] = $userdetail;
          // echo $_SESSION['admin']['email'];
          // echo $_SESSION['admin']['password'];
          // echo $_SESSION['admin']['id'];
          // echo $_SESSION['admin']['name'];
          echo "go_to_index";
        }
        else {
          echo "Something went wrong in create session!";
        }
      }
      else {
        echo "Something went wrong in insert data";
      }
    }
    // elseif(mysqli_num_rows($res)==0) {
    // if () {
    //   $sql = "SELECT * FROM `admin` WHERE email = '$email' and password = '$password'";
    //   $res = mysqli_query($conn,$sql);
    //   if (mysqli_num_rows($res)==1) {
    //     $userdetail = mysqli_fetch_array($res);
    //     $umail = $userdetail['email'];
    //     $upass = $userdetail['password'];
    //     $uid = $userdetail['id'];
    //     $uname = $userdetail['name'];
    //     session_start();
    //     $_SESSION['admin'] = $userdetail;
    //     // echo $_SESSION['admin']['email'];
    //     // echo $_SESSION['admin']['password'];
    //     // echo $_SESSION['admin']['id'];
    //     // echo $_SESSION['admin']['name'];
    //   }else {
    //     echo "Credentials not matched";
    //   }
    // }
    // }
}
 ?>
