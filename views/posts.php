<style>
#like:hover{
	color:red;
	cursor: pointer;	
}	

</style>
<?php  

	include_once dirname(__FILE__).'/../php/db_connect.php';

	$conn1=new mysqli(server,user,password,db);


	$sql1= "SELECT * FROM posts ORDER BY id desc";	

	$result1= $conn1->query($sql1);


	while($row1 = $result1 -> fetch_assoc())
	{

	 echo '<div class="panel panel-primary" id="'.$row1["id"].' ">

		<div class="panel-heading" style="padding-top:3px;padding-bottom:0px">
		<p> <span style="margin-right:5px"><img src="./includes/images/user.png" width="5%" height="5%"></span> '.$row1["name"].' </p>
		</div> 

		<div class="panel-body">
			<p style="margin-left:5px;border-radius:5px;border:2px solid blue;font-size:18px;color:indigo;background:lightblue;padding:2px"> '.$row1["comment"] .' </p>
			<p>Comments:</p>
			<textarea style="width:100%;height:100px;resize: none" id="comment_text" onfocus="reload_status=false" onblur="test(this)"></textarea>
			<br>
			<button class="btn btn-primary" onclick="comment(this);">Comment</button>
		</div>

		<p style="background: teal;text-align:center;color:indigo;font-size:15px;border-bottom:2px solid indigo;padding:2px;margin-bottom:0px;">Comments To this Post</p>';

	$conn2=new mysqli(server,user,password,db);
	$sql2= "SELECT * FROM comments ORDER BY id desc";	
	$result2= $conn2->query($sql2);

		$totalCom=0;

	while($row2 = $result2 -> fetch_assoc())
	{
		if($row2["link_id"]==$row1["id"]){
			$totalCom++;
		}
	}


	$result2= $conn2->query($sql2);
	echo '<p style="margin-top:3px;margin-left:20px;">
	<span class="glyphicon glyphicon-thumbs-up" id="like" title="Like"> 5</span>
	<span class="glyphicon glyphicon-comment" style="margin-left:20px;cursor:pointer" title="Comments"> '.$totalCom.'
	</span>
	</p>';

	while($row2 = $result2 -> fetch_assoc())
	{
		if($row2["link_id"]==$row1["id"]){
		echo '
		<div class="comment_display"  style="background:#5CE0A4;border-radius:5px;margin:2px;border:2px solid indigo;font-size:20px;padding:1.5%;margin-bottom:0px">

			<p style="margin-bottom:-5px" id=" '.$row2["id"].' " >'.$row2["comment"].'</p> 
			<br>

			<div style="margin-bottom:-25px;margin-top:-5px"> <!-- inline wrapper -->

			<img src="./includes/images/user.png" style="width:4%;">
			<span style="color:orange;font-size:17px"><i>Anonymous</i></span>
			</img>
			<button style="float:right" onclick="comment_delete(this);" class="btn btn-danger btn-sm glyphicon glyphicon-trash">
			</button>
			<button style="margin-right:3px;float:right" onclick="comment_edit(this);" class="btn btn-success btn-sm glyphicon glyphicon-edit"></button>
			</div>	<!-- inline wrapper -->

			<br>
			
		</div>';
		}
	}

	$conn2->close();


	echo '
	<div class="panel-footer" style="background-color:lightblue">
		<p style="float:right"><b>Posted At : '.$row1["time"].'</b></p><br>
	</div>
	</div>

    <!-- panel  --> ';
	}

	$conn1->close();
    ?>