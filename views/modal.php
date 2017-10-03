<!-- Modal -->
<?php 

include_once "../php/db_connect.php";
$id=$_POST["id"];
$conn=new mysqli(server,user,password,db);
$sql="SELECT * FROM comments  WHERE id='$id' ";
$result=$conn->query($sql);
$row = mysqli_fetch_assoc($result);
$conn->close();
?> 

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Comment</h4>
      </div>

      <div class="modal-body" id="<?php echo $row["id"]; ?>">
        <p>Update Comment:</p>
        <textarea id="edit_comment" style="width:100%;height:100px;resize:none;border-radius: 5px"  placeholder="Type a comment."> <?php echo $row["comment"]; ?> </textarea>
      </div>

      <div class="modal-footer">
        <button style="float:left" onclick="submitEdited()" class="btn btn-success" >Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>