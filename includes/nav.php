<nav class="navbar sticky-top navbar-dark bg-dark navbar-expand-lg" style="transition:0.5s;">
	<div class="container-fluid">
		<a class="navbar-brand" href="">E-commerce</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav ml-auto">
			<li class="nav-item px-4 py-2">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" style="text-decoration:none;color:#fff;">Category</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" onclick="categoryitem(1)" href="#">Vehicle</a>
            <a class="dropdown-item" onclick="categoryitem(2)" href="#">Outfits</a>
            <a class="dropdown-item" onclick="categoryitem(3)" href="#">Electronics</a>
            <a class="dropdown-item" onclick="categoryitem(4)" href="#">Others & accossories</a>
            <a class="dropdown-item" onclick="categoryitem(5)" href="#">Cosmetics</a>
            <a class="dropdown-item" onclick="categoryitem(6)" href="#">Sports</a>
					</div>
				</div>
			</li>
				<?php
				if (isset($_SESSION['public']))
				{
					?>
					<li class="nav-item px-4 py-2">
						<a onclick="GoToCart()" class="btn btn-outline-light" title="Go to cart"   style="color:#fff;text-decoration:none;">
							<i class="fa fa-shopping-cart"></i>
							<?php if (isset($_SESSION['cart'])) {
								?><span id="counter"></span><?php
							}
							else {
								echo " ";
							} ?>
						</a>
					</li>
					<li class="nav-item px-4 py-2">
						<input onclick="logout()" type="submit" class="btn btn-outline-light" value="Logout">
					</li>
					<?php
				}
				else
				{
					?>
					<li class="nav-item px-4 py-2">
						<input type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#SignupModal" value="Registration">
					</li>
					<li class="nav-item px-4 py-2">
						<input type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#LoginModal" value="Log in">
					</li>
					<?php
				}?>
				<li class="nav-item px-4 py-2">

						<div class="input-group" style="width:20vw;">
				  		<input id="srch" type="text" class="form-control" placeholder="Search">
				  		<div class="input-group-append">
				    		<button class="input-group-text" onclick="search()"><i class="fa fa-search"></i></button>
				  		</div>
						</div>

				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- login modal -->
<?php include("loginmodal.php"); ?>
<!-- sign up modal -->
<div id="SignupModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Registration</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">
			<form>

				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Enter your Name" id="name">
					</div>
					<h6 class="text-danger" id="name_alert">alert</h6>
				</div>

				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-envelope"></i></span>
						</div>
						<input type="email" class="form-control" placeholder="Enter your email" id="email">
					</div>
					<h6 class="text-danger" id="email_alert">alert</h6>
				</div>

				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-phone"></i></span>
						</div>
						<input type="number" class="form-control" placeholder="Enter your phone number" id="phone">
					</div>
					<h6 class="text-danger" id="phone_alert">alert</h6>
				</div>

				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Enter your password" id="password" autocomplete="off">
					</div>
					<h6 class="text-danger" id="password_alert">alert</h6>
				</div>

				<div class="form-group">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Retype password" id="rpassword" autocomplete="off">
					</div>
					<h6 class="text-danger" id="rpassword_alert">alert</h6>
				</div>

				<div class="modal-footer">
					<button id="submit" type="button" class="btn btn-block btn-outline-dark">Sign up</button>
					<a data-dismiss="modal" data-toggle="modal" href="#LoginModal">already have an account? Login here..</a>
				</div>
		</div>
	</div>
	</form>
  </div>
</div>
<script src="js/SignupValidation.js"></script>
<script type="text/javascript">
$(function(){
	counter();
});


function GoToCart()
{
	var formdata = new FormData();
	formdata.append("GoToCart",'GoToCart');
	$.ajax({
				processData:false,
				contentType:false,
				data:formdata,
				type:"post",
				url:"includes/data.php",
				success:function(data)
				{
					$("#fullDisplay").html(data);
				}
	});
}





function counter()
{
	var formdata = new FormData();
	formdata.append("counter",'counter');
	$.ajax({
				processData:false,
				contentType:false,
				data:formdata,
				type:"post",
				url:"includes/data.php",
				success:function(data)
				{
					$("#counter").html(data);
				}
	});
}


function search(){
// $("#srch").keyup(function(){
	var srch = $("#srch").val();
		// alert(srch);
var formdata = new FormData();
formdata.append("srch",srch);
formdata.append("search",'search');

$.ajax({
			processData:false,
			contentType:false,
			data:formdata,
			type:"post",
			url:"includes/data.php",
			success:function(data)
			{
				// alert(data);
				$("#fullDisplay").html(data);
			}
});
// });
}





 // function signup()
 //  {
	// 	 var name = $("#name").val();
 //     var email = $("#email").val();
 //     var password = $("#password").val();
 //     var formdata = new FormData();
	// 	 formdata.append('name',name);
 // 	 	 formdata.append('email',email);
 // 	 	 formdata.append('password',password);
 //     formdata.append('signup',"signup");
 // 	 $.ajax({
 //          processData:false,
 //          contentType:false,
 //          data:formdata,
 //          type:"post",
 //          url:"includes/data.php",
 //          success:function(data)
 //          {
	// 				alert(data);
	// 				 window.location.href="index.php";
 //          }
 //
 //    });
 //  }

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
					window.location.href="index.php";
				 }

	 });
	}
</script>
