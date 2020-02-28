<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" onclick="display()">Admin panel of e-commerce</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="display()">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="flash()">Flash sale <span class="fa fa-clock-o"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="Special()">Special items <span class="fa fa-gift"></span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Category
          </a>
          <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" onclick="categoryitem(1)" href="#">Vehicle</a>
            <a class="dropdown-item" onclick="categoryitem(2)" href="#">Outfits</a>
            <a class="dropdown-item" onclick="categoryitem(3)" href="#">Electronics</a>
            <a class="dropdown-item" onclick="categoryitem(4)" href="#">Others & accossories</a>
            <a class="dropdown-item" onclick="categoryitem(5)" href="#">Cosmetics</a>
            <a class="dropdown-item" onclick="categoryitem(6)" href="#">Sports</a>
          </div>
        </li>
        <li class="nav-item px-4 py-2">
          <div class="input-group" style="width:20vw;">
            <input id="SearchItem" type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button onclick="search()" class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </li>
        <li class="nav-item px-4 py-2">
          <input onclick="logout()" type="submit" class="btn btn-outline-light" value="Logout">
        </li>
      </ul>
    </div>

  </div>
</nav>
<script type="text/javascript">


// display special item
function Special(){
  var formdata = new FormData();
  formdata.append('Special',"Special");
  $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"includes/data.php",
    success:function(data,status){
      $("#display").html(data);
    }
  });
}




// display flash sell
function flash(){
  var formdata = new FormData();
  formdata.append('flash',"flash");
  $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"includes/data.php",
    success:function(data,status){
      $("#display").html(data);
    }
  });
}





// display data by search
function search(){
  var S_item = $("#SearchItem").val();
  var formdata = new FormData();
  formdata.append('S_item',S_item);
  formdata.append('search',"search");
  $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"includes/data.php",
    success:function(data,status){

      if (data=="not") {
        display();
        alert("Write something to search");
      }
      else {
        $("#display").html(data);
      }
    }
  });
}



  // display data by category
  function categoryitem(no){
    // alert(no);
    var formdata = new FormData();
    formdata.append('item',no);
    formdata.append('categoryitem',"categoryitem");
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
</script>
