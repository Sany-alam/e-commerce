$(function(){
  $("#useremail_alert").hide();
  $("#userpassword_alert").hide();


//Email
  $("#useremail").keyup(function(){
    email();
  });

  function email()
  {
    if ($("#useremail").val().length == 0) {
      $("#useremail_alert").html("Email is requierd");
      $("#useremail_alert").show();
      return true;
    }
    else {
      var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
      if(!pattern.test($("#useremail").val()))
      {
        $("#useremail_alert").html("invalid email type");
        $("#useremail_alert").show();
        return true;
      }
      else
      {
        var valid = false;
          var email = $("#useremail").val();
          var formdata = new FormData;
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
                valid = true;
                // alert(data);
                $("#useremail_alert").html("Email doesm't exist try with another email, or Signup");
                $("#useremail_alert").show();
              }
              else if(msg == "found email")
              {
                valid = false;
                // alert(data);
                $("#useremail_alert").hide();
              }
            }
          });
          return valid;
      }
    }
  }



  //password
  $("#userpassword").keyup(function(){
    pass();
  });
  function pass()
  {
    if ($("#userpassword").val().length == 0)
    {
      $("#userpassword_alert").html("Password requierd");
      $("#userpassword_alert").show();
      return true;
    }
    else
    {
      var valid2 = false;
        var useremail = $("#useremail").val();
        var userpassword = $("#userpassword").val();
        var formdata = new FormData;
        formdata.append("email",useremail);
        formdata.append("password",userpassword);
        formdata.append("AccountCheck",'AccountCheck');
        $.ajax({
          processData:false,
          contentType:false,
          data:formdata,
          type:"post",
          url:"includes/data.php",
          success:function(data)
          {
            msg = $.trim(data);
            if (msg == "not ok")
            {
              valid2 = true;
              // alert(data);
              $("#userpassword_alert").html("Credential not matched");
              $("#userpassword_alert").show();
            }
            else if(msg == "ok")
            {
                $("#userpassword_alert").hide();
                valid2 = false;
            }
          }
        });
        return valid2;
    }
  }



  // //click the button
    $("#login").click(function(){
      if(email() == false && pass() == false)
      {
        var formdata = new FormData();
        formdata.append('email',$("#useremail").val());
        formdata.append('password',$("#userpassword").val());
        formdata.append("login",'login');
        $.ajax({
          processData:false,
          contentType:false,
          data:formdata,
          type:"post",
          url:"includes/data.php",
          success:function(data)
          {
            msgg = $.trim(data);
            if (msgg == "ok")
            {
              window.location.href="index.php";
            }
          }

           });
      }
      else
      {
        if (email() == true)
        {
          $("#useremail_alert").show();
        }

        if (pass() == true)
        {
          $("#userpassword_alert").show();
        }
      }
    });


});
