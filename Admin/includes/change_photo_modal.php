<div id="changephoto?id=<?php echo $id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title">Change post photo</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="card">
            <img class="img-fluid" src="../images/<?php echo $img; ?>" alt="">
          </div>
          <div class="input-group my-2">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="picture<?php echo $id; ?>" accept="image/*"  required multiple>
              <label class="custom-file-label" for="pic">Choose file</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button onclick="changeImage(<?php echo $id; ?>)" type="button" class="btn btn-outline-primary" data-dismiss="modal">Change photo</button>
        </div>
      </form>
    </div>

  </div>
</div>
<script type="text/javascript">
function changeImage(id){
  var formdata = new FormData();
  formdata.append("id",id);
  formdata.append("postpicture",$('#picture'+id)[0].files[0]);
  formdata.append("changeImage",'changeImage');
  $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"includes/data.php",
    success:function(data,status){
      display();
      alert(data);
    }
  });
}
</script>
