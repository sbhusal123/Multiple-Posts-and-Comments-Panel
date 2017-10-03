var reload_status=true;

function test(dom){
        var com=$(dom).val();
        com=$.trim(com);

        if(com==""){
                reload_status=true;
        }else{
                reload_status=false;
        }

}

 function reload() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200 && reload_status) {
                $(".col-xs-8").html(this.responseText);
        }

        };

        xhttp.open("GET", "./views/posts.php", true);
        xhttp.send();
        }

        setInterval(function(){ reload(); }, 1000);

function comment(dom){
        var link_id = $(dom).parent('div').parent('div').attr('id');
        var comment= $(dom).parent('div').find('textarea').val();

        check=2;
        $.ajax({
        url: 'php/db_operations.php',
        data: {check:check,comment:comment,link_id:link_id},
        type: 'POST',
        success: function (data) {
        alert(data);
        $(dom).parent('div').find('textarea').val("");
        reload_status=true;
        }
        });
        
}


function comment_edit(dom){
        var id= $(dom).parent('div').parent('div').find('p').attr('id');

        $.ajax({
        url: './views/modal.php',
        data: {id:id},
        type: 'POST',
        success: function (data) {
        $(".modal_view").html(data);
        $('#myModal').modal('show');
        }
        });
        

}

function submitEdited(){
        var edit=$("#edit_comment").val();
        var id=$("#edit_comment").parent('div').attr('id');
        var check=3;
        $.ajax({
        url: './php/db_operations.php',
        data: {check:check,id:id,edit:edit},
        type: 'POST',
        success: function (data) {
        alert(data);
        }
        });
        
}


function comment_delete(dom){
        check=4;
        var id= $(dom).parent('div').parent('div').find('p').attr('id');
        var r=confirm("Are you sure to delete?");
        if(r){

        $.ajax({
        url: './php/db_operations.php',
        data: {check:check,id:id},
        type: 'POST',
        success: function (data) {
        alert(data);
        }
        });

        }
}

$(document).ready(function(){

	var check;

	$("#post_btn").click(function(){

	check=1;
	var post=$("#post_text").val();
	var name=$("#post_name").val();

        $.ajax({
        url: 'php/db_operations.php',
        data: {check:check,post:post,name:name},
        type: 'POST',
        success: function (data) {
        alert(data);
        $("#post_text").val("");
        $("#post_name").val("");
        }
        });
	});


});