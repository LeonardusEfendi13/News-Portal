<html>
<head>
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/komen.css" rel="stylesheet" type="text/css">
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portal Berita Mahasiswa</title>

<title>Comment Box</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
	function commentSubmit(){
		if(form1.name.value == '' && form1.comments.value == ''){ 
			alert('Enter your message !');
			return;
		}
		var name = form1.name.value;
		var comments = form1.comments.value;
		var xmlhttp = new XMLHttpRequest();
		
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readyState==4&&xmlhttp.status==200){
				document.getElementById('comment_logs').innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open('GET', 'insert.php?name='+name+'&comments='+comments, true);
		xmlhttp.send();
	}
	
		$(document).ready(function(e) {
			$.ajaxSetup({cache:false});
			setInterval(function() {$('#comment_logs').load('logs.php');}, 2000);
		});
		
</script>
</head>
<body>
<div id="container">
	<div class="page_content">
    	Masukan Komentar Akan Berita Yang diBaca
    </div>
    <div class="comment_input">
        <form name="form1">
        	<input type="text" name="name" placeholder="Name..."/></br></br>
            <textarea name="comments" placeholder="Leave Comments Here..." style="width:635px; height:100px;"></textarea></br></br>
            <a href="#" onClick="commentSubmit()" class="button">Post</a></br>
			<br> <input type="button" value="Go Back" onclick="history.back(-1)"/>
        </form>
    </div>
    <div id="comment_logs">
    	Loading comments...
    <div>
</div>

<?php include "footer.php"; ?>
</body>
</html>