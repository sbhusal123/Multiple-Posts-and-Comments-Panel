
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Comments</title>
	<?php include_once("../includes/template.php"); ?>

	<script>
		
		function reload() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200 && reload_status) {
                $(".col-xs-8").html(this.responseText);
        }

        };

        xhttp.open("GET", "posts.php", true);
        xhttp.send();
        }

        setInterval(function(){ reload(); }, 1000);
	</script>
</head>
<body style="background: lightpink">
	<div class="container">
		<h1>Bootstrap Comment With Panel</h1>
		<h4>Multiple Comments and Posts </h4>

	<div class="row">


	<div class="col-xs-8">

	<?php include_once("posts.php") ?>

	</div>


	<div class="col-xs-4">

	<div class="panel panel-primary">
		<div class="panel-heading">
			New Post:
		</div>

		<div class="panel-body">
			<p>Name: <input type="text" id="post_name"></p>
			<p>Post</p>
			<textarea style="width:100%;height:100px;resize: none" id="post_text"></textarea>
		</div>

		<div class="panel-footer">
			<button class="btn btn-primary" id="post_btn">Post</button>
		</div>

	</div>
	
	</div>


	</div> <!--Row -->
	</div>  <!--Container  -->

	<div class="modal_view">
		
		
	</div>
</body>
</html>