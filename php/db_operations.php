<?php 

class db_operations{

		private $conn,$stml;

		function __construct(){
			include_once 'db_connect.php';
			$this->conn = new mysqli(server,user,password,db); 
		}


		function write_post($post,$name)
		{	
			$stmt = $this->conn->prepare("INSERT INTO  posts(comment,name) VALUES (?, ?);");
			$stmt->bind_param("ss",$post,$name);
			$stmt->execute();
			echo "New post posted succesfully.";
			$stmt->close();
		}

		function write_comment($comment,$link_id){
			$stmt = $this->conn->prepare("INSERT INTO comments(comment,link_id) VALUES ( ?, ?);");
			$stmt->bind_param("ss",$comment,$link_id);
			$stmt->execute();
			echo "Commented succesfully.";
			$stmt->close();
						
		}

		function update_comment($comment,$id){
			$stmt = $this->conn->prepare("UPDATE comments SET comment=? WHERE id=?");
			$stmt->bind_param("ss",$comment,$id);
			$stmt->execute();
			echo "Updated succesfully.";
			$stmt->close();
		}

		function delete_comment($id){
			$sql="DELETE FROM comments WHERE id='$id' ";
			if ($this->conn->query($sql) === TRUE) {
    			echo "Record deleted successfully";
			}
		}



		function __destruct()
		{
			$this->conn->close();
		}




}

function secure($data)
{
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}

function main(){

	$db_op=new db_operations();
	$check=$_POST["check"]; ///for checking the requested operation. controller

	if($check==1){
		$name=secure($_POST["name"]);	
		$post=secure($_POST["post"]);
		if($name=="" || $post=="")
		{
			echo "Reqired Fields are missing.";
		}else{
			$db_op -> write_post($post,$name);
		}
	}

	elseif($check==2){

		$comment=secure($_POST["comment"]);
		$link_id=$_POST["link_id"];
		if($comment=="")
		{
			echo "Fields are empty.";
		}else{
			$db_op -> write_comment($comment,$link_id);
		}
	}

	elseif($check==3){
		$comment=secure($_POST["edit"]);
		$id=$_POST["id"];
		if($comment=="")
		{
			echo "Comment Field is Empty.";
		}else{
			$db_op->update_comment($comment,$id);
		}
	}elseif($check==4){
		$id=$_POST["id"];
		$db_op->delete_comment($id);
	}

}

main();
 ?>
