<?php
session_start();
if (isset($_SESSION['admin'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" href="../css/index.css"/>
	<link rel="shortcut icon" type="../image/x-icon" href="" />
	  <link rel="stylesheet" href="../fonts/css/font-awesome.min.css">
	<script src="../js/jquery-slim.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/ajax.min.js"></script>
	<title>Document</title>
</head>
<body>
  <!-- navbar -->
  <?php include("includes/nav.php"); ?>

  <!-- write post contents -->
  <button data-toggle="modal" data-target="#postmodal" class="btn rounded-circle btn-lg btn-outline-dark" type="button" style="position: fixed;
    bottom: 50px;
    right: 25px;">
    <i class="fa fa-edit"></i>
  </button>
  <?php include("includes/postmodal.php"); ?>
  <!-- end write post contents -->

  <!-- display post contents -->
<div class="container">
  <div class="row m-0 py-5" id="display">



  </div>
</div>


</body>
<script type="text/javascript">

// Display post
$(document).ready(function(){
  display();
});










// Display post
function display(){
  var formdata = new FormData();
  formdata.append("display",'display');
  $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"includes/data.php",
    success:function(data,status){
      // alert(data);
      $("#display").html(data);
    }
  });
}




// logout of admin
function logout(){
  var formdata = new FormData();
  formdata.append('logout',"logout");

$.ajax({
       processData:false,
       contentType:false,
       data:formdata,
       type:"post",
       url:"includes/data.php",
       success:function(data)
       {
        window.location.href="login.html";
       }

 });
}
</script>
</html>
<?php
}
else {
  header("location:login.html");
}
?>
