<html>
	<head>
		<title>ADMIN</title>
		<link rel = "stylesheet" type = "text/css" href = "admin_style.css">
		<script src="jquery-2.1.4.min.js"> </script>
		<script>
		$(document).ready(function(){
			/*
			$('list').on('change', function(){
				if($(this).val() === "edit_student"){
					$("#other_info").show();
				}
				else{
					$("#other_info").hide();
				}
			});
*/
			$('#button').click(function(){
				$('#other_info').hide();
			});
		});
		</script> 
	</head>

	<body>

		<h3> Choose Action </h3>

		<form action = "admin.php" method = "post" name = "list">
		<select required id = "options">
			<option value = "out_students">Get Out Students</option>
			<option value = "all_students">Get All Students</option>
			<option value = "edit_student">Edit Student</option>  	
		</select>
		<div id = "other_info">
		<input type = "text" placeholder = "Enter Student Full Name">
		<input type = "text" placeholder = "Enter Student Location">
		<input type = "text" placeholder = "Enter Student Time in">
		<input type = "text" placeholder = "Enter Student Time Out">
	</div>
		<input type = "submit" value = "Submit">
	</form>
	<button id = "button">fuck</button>

	</body>
	
	
</html>