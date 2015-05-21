<html>
	<head>
		<title>ADMIN</title>
	</head>

	<script type = "text/javascript">
		function down_change(){
			var selected = document.getElementById("options");
			var sv = selected.options[sel.selectedIndex].value;
			var text = document.getElementById("student");
			if(sv === "edit_student")
				text.disabled = false;
			else
				text.disabled = true;
		}

	</script>

	<body>

		<h3> Choose Action </h3>

		<form action = "admin.php" method = "post">
		<select required id = "options" onChange = "down_change()">
			<option value = "out_students">Get Out Students</option>
			<option value = "all_students">Get All Students</option>
			<option value = "edit_student">Edit Student</option>  	
		</select>
		<input type = "text" id = "student" value = "Enter Student Full Name">
		<input type = "submit" value = "Submit">


	</form>

	</body>
	<link rel = "stylesheet" type = "text/css" href = "admin_style.css"
</html>