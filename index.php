<!DOCTYPE html>
<html lang="en">
<head>
	<title>Document</title>
	<?php include_once("includes/template.php"); ?>
</head>
<body style="background: lightpink">
	<div class="container">
		<h1>Bootstrap Comment With Panel</h1>
		<h4>Multiple Comments and Posts </h4>

	<div class="row">


	<div class="col-xs-8">

	<?php include_once("views/posts.php") ?>

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