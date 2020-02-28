<!-- Login  Modal -->
<div id="LoginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Log in to buy product!</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
    <form>
      <div class="modal-body">
  		    <div class="form-group">
            <div class="input-group">
    					<div class="input-group-prepend">
    						<span class="input-group-text"><i class="fa fa-envelope"></i></span>
    					</div>
    						<input type="email" class="form-control" placeholder="Enter your email" id="useremail">
    				</div>
            <h6 class="text-center text-danger" id="useremail_alert">alert</h6>
          </div>

  				<div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
    						<span class="input-group-text"><i class="fa fa-key"></i></span>
    					</div>
    					<input type="password" class="form-control" placeholder="Your your password" id="userpassword" autocomplete="off">
            </div>
            <h6 class="text-center text-danger" id="userpassword_alert">alert</h6>
          </div>
  		</div>
  		<div class="modal-footer">
  			<button id="login" type="button" class="btn btn-block btn-outline-dark">Log in</button>
        <a data-dismiss="modal" data-toggle="modal" href="#SignupModal">Not have an account? Signup here..</a>
  		</div>
    </form>
	</div>
  </div>
</div>
<script src="js/LoginValidation.js"></script>
<!-- <script type="text/javascript">
function Login()
 {
    var email = $("#useremail").val();
    var password = $("#userpassword").val();
    var formdata = new FormData();
   formdata.append('email',email);
   formdata.append('password',password);
    formdata.append('Login',"Login");

   $.ajax({
         processData:false,
         contentType:false,
         data:formdata,
         type:"post",
         url:"includes/data.php",
         success:function(data)
         {
           alert(data);
           window.location.href="index.php";
         }

   });
 }
</script> -->
