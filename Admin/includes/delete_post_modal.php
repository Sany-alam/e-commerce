<div id="deletePost?id=<?php echo $id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete post</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Are you sure to delete this post?</p>
      </div>
      <div class="modal-footer">
        <button onclick="Delete_post(<?php echo $id; ?>)" type="button" class="btn btn-block btn-danger" data-dismiss="modal">Delete</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
// delete data
function Delete_post(id)
{
  var formdata = new FormData;
  formdata.append("id",id);
  formdata.append("Delete_post",'Delete_post');
  $.ajax({
    processData:false,
    contentType:false,
    data:formdata,
    type:"post",
    url:"includes/data.php",
    success:function(data,status)
    {
      alert(data);
      display();
      // alert("Successfully deleted");

    }
  });
}
</script>
