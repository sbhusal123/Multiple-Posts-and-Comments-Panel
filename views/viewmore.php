 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Comments</title>
 	<?php include_once("../includes/template.php") ?>

 	<style>
		#like:hover{
			color:red;
			cursor: pointer;	
		}	
	</style>

	<script>
		
		function reload() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200 && reload_status) {
                $(".col-xs-8").html(this.responseText);
        }

        };

        xhttp.open("GET", "contentRefreshing/viewmore.php", true)
        xhttp.send();
        }

        setInterval(function(){ reload(); }, 1000);
	</script>

 </head>
 <body style="background:pink">

 	<div class="row">

 	<div class="col-xs-2"></div>

 	<div class="col-xs-8" style="margin-top:20px;">
		<h3 style="color:indigo;"><i>Fetching_Content..Just a sec.</i></h3>
	</div>

	<div class="col-xs-2"></div>

	</div> <!-- row -->


    <div class="modal_view">

    </div>
 </body>
 </html>