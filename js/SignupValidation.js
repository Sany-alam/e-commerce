$(function(){
  // alert("hello world");
  $("#name_alert").hide();
  $("#email_alert").hide();
  $("#password_alert").hide();
  $("#rpassword_alert").hide();
  $("#phone_alert").hide();
  var email_valid = false;

//Name
  $("#name").keyup(function(){
    name();
  });

  function name()
  {
    if ($("#name").val().length == 0) {
      $("#name_alert").html("Name is required!");
      $("#name_alert").show();
      return true;
    }
    else {
      $("#name_alert").hide();
      return false;
    }
  }


//Email
  $("#email").keyup(function(){
    email();
  });

  function email()
  {
    if ($("#email").val().length == 0) {
      $("#email_alert").html("Email is requierd");
      $("#email_alert").show();
      return true;
    }
    else {
      var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
      if(!pattern.test($("#email").val()))
      {
        $("#email_alert").html("invalid email type");
        $("#email_alert").show();
        return true;
      }
      else
      {
          var email = $("#email").val();
          var formdata = new FormData();
          formdata.append("email",email);
          formdata.append("emailCheck",'emailCheck');
          $.ajax({
            processData:false,
            contentType:false,
            data:formdata,
            type:"post",
            url:"includes/data.php",
            success:function(data)
            {
              msg = $.trim(data);
              if (msg == "ok")
              {
                email_valid = false;
                // alert(data);
                $("#email_alert").hide();
              }
              else
              {
                email_valid = true;
                // alert(data);
                $("#email_alert").html("Email already exist try with new email, or login");
                $("#email_alert").show();
              }
            }
          });
        return email_valid;
      }
    }
  }


//phone number
$("#phone").keyup(function(){
  phone();
});
function phone()
{
  if ($("#phone").val().length == 0)
  {
    $("#phone_alert").html("Phone number is requierd");
    $("#phone_alert").show();
    return true;
  }
  else
  {
    var pattern = new RegExp(/^(?:\+88|01)?(?:\d{11}|\d{13})$/);
    if (!pattern.test($("#phone").val()))
    {
      $("#phone_alert").html("Invalid phone number");
      $("#phone_alert").show();
      return true;
    }
    else
    {
      // var phone = $("#phone").val();
      // var formdata = new Formdata();
      // formdata.append("phone",phone);
      // formdata.append("phoneCheck",'phoneCheck');
      // $.ajax({
      //   processData:false,
      //   contentType:false,
      //   data:formdata,
      //   type:"post",
      //   utl:"....",
      //   success:function(data)
      //   {
      //     msg = $.trim(data);
      //     if (msg == "ok") {
      //       $("#phone_alert").hide();
      //       return false;
      //     }
      //     else {
      //       $("#phone_alert").html("Phone number already exist");
      //       $("#phone_alert").show();
      //       return true;
      //     }
      //   }
      // });
      $("#phone_alert").hide();
      return false;
    }
  }
}


//password
$("#password").keyup(function(){
  pass();
});
function pass()
{
  if ($("#password").val().length == 0) {
    $("#password_alert").html("Password requierd");
    $("#password_alert").show();
    return true;
  }
  else
  {
	  if($("#password").val().length >= 9)
	  {
	    $("#password_alert").html("Password mustbe 1 - 8 characters!");
	    $("#password_alert").show();
	    return true;
	  }
	  else
	  {
	    $("#password_alert").hide();
	    return false;
	  }
  }
}



// Retype password
$("#rpassword").keyup(function(){
  rpass();
});
function rpass()
{
  if ($("#rpassword").val().length !== 0)
  {
    if ($("#rpassword").val() == $("#password").val())
    {
      $("#rpassword_alert").hide();
      return false;
    }
    else
    {
      $("#rpassword_alert").html("Password not matched");
      $("#rpassword_alert").show();
      return true;
    }
  }
  else
  {
    $("#rpassword_alert").html("Password requierd");
    $("#rpassword_alert").show();
    return true;
  }
}



//click the button
  $("#submit").click(function(){
    if(name() == false   && phone() == false && pass() == false && rpass() == false && email() == false)
    {
      var formdata = new FormData();
     	formdata.append('name',$("#name").val());
      formdata.append('email',$("#email").val());
      formdata.append('phone',$("#phone").val());
      formdata.append('password',$("#password").val());
      formdata.append('signup',"signup");
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
    else
    {

      if (name() == true)
      {
        $("#name_alert").show();
      }


      if (email() == true)
      {
        $("#email_alert").show();
      }

      if (phone() == true)
      {
        $("#phone_alert").show();
      }

      if (pass() == true)
      {
        $("#password_alert").show();
      }
      if (rpass() == true)
      {
        $("#rpassword_alert").show();
      }

    }

  });
});
