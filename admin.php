<html>
	<head>
		<title>ADMIN</title>
		<link rel = "stylesheet" type = "text/css" href = "admin_style.css">
	</head>

	<body>
		<div id = "nicee">
		<h3> Choose Action </h3>
		</div>
		<form id = "selection_form" name = "selection_form" action = "action_admin.php" method = "post">
			<select required id = "options"  name = "list">
				<option value = "out_students">Get Out Students</option>
				<option value = "all_students">Get All Students</option>
				<option value = "edit_student">Edit Student</option>  	
			</select>
			<div id = "other_info">
				<input type = "text" placeholder = "Enter Student Full Name">
				<!--<input type = "text" placeholder = "Enter Student Location">
				<input type = "text" placeholder = "Enter Student Time in">
				<input type = "text" placeholder = "Enter Student Time Out">-->
			</div>
			<!--<input type = "submit" value = "Submit"> -->
				<input type = "button" value = "Submit" onclick="post();">
		</form>

	</body>
	
	<script src="jquery-2.1.4.min.js"> </script>
	<script src="admin_post.js"> </script>
	<script>
		$(document).ready(function(){
			$("#other_info").hide();
			$('#options').on('change', function(){
				if($(this).val() === "edit_student"){
					$("#other_info").show();
				}
				else{
					$("#other_info").hide();
				}
			});

		});
	</script> 

	
</html>