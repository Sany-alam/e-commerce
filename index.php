<?php session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/index.css"/>
	<link rel="shortcut icon" type="image/x-icon" href="" />
	<link rel="stylesheet" href="fonts/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<script src="js/jquery-slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/ajax.min.js"></script>
	<title>Document</title>
</head>
<body>
	<?php
			include("includes/nav.php");
	 ?>
	<!-- end carousel here -->
		<div class="" id="fullDisplay">
			<?php
	 	 include("includes/carousel.php");
	 	  ?>
			<div class="container">
			<!-- 1st gallery  -->
			<h5 class="display-3">Flash sale</h5>
			<div id="firstGallery" class="mb-5">
			</div>
			<!-- 2nd gallery -->
			<h5 class="display-3">Special items</h5>
			<div id="secondGallery" class=" mb-5">
			</div>
			<!-- 3rd gallery -->
			<h5 class="display-3">Latest items</h5>
			<style media="screen">
		    .latest::-webkit-scrollbar{
		      height: 10px;
		    }
		    .latest::-webkit-scrollbar-thumb{
		      border-radius: 10px;
		      background:#ddd;
		    }
		   </style>
		   <div id="thirdGallery" class="latest" style="height:300px;overflow-x:scroll;overflow-y:hidden;white-space:nowrap;">
				</div>
			<a href="#" onclick="AllPost()" class="btn btn-dark mr-auto">See all product</a>
		</div>
	</div>
	<?php include("includes/thirdgallery_category.php"); ?>
	<?php include("includes/footer.php"); ?>
</body>
<script type="text/javascript">
$(document).ready(function(){
	flashSale();
	SpecialItems();
	LatestItems();
	$.ajaxSetup({ cache: false });
});



function AllPost(){
	var formdata = new FormData();
	formdata.append("AllPost",'AllPost');
	$.ajax({
		processData:false,
		contentType:false,
		data:formdata,
		type:"post",
		url:"includes/data.php",
		success:function(data){
			$("#fullDisplay").html(data);
		}
	});
}




function LatestItems(){
	var formdata = new FormData();
	formdata.append("LatestItems",'LatestItems');
	$.ajax({
		processData:false,
		contentType:false,
		data:formdata,
		type:"post",
		url:"includes/data.php",
		success:function(data){
			$("#thirdGallery").html(data);
		}
	});
}




function SpecialItems(){
	var formdata = new FormData();
	formdata.append("SpecialItems",'SpecialItems');
	$.ajax({
		processData:false,
		contentType:false,
		data:formdata,
		type:"post",
		url:"includes/data.php",
		success:function(data){
			$("#secondGallery").html(data);
		}
	});
}





function flashSale(){
	var formdata = new FormData();
	formdata.append("flashSale",'flashSale');
	$.ajax({
		processData:false,
		contentType:false,
		data:formdata,
		type:"post",
		url:"includes/data.php",
		success:function(data){
			$("#firstGallery").html(data);
		}
	});
}





function categoryitem(C_no){
	// alert(C_no);
	var formdata = new FormData();
	formdata.append("C_no",C_no);
	formdata.append("categoryitem",'categoryitem');
	$.ajax({
		processData:false,
		contentType:false,
		data:formdata,
		type:"post",
		url:"includes/data.php",
		success:function(data){
			$("#fullDisplay").html(data);
		}
	});
}


</script>
</html>
