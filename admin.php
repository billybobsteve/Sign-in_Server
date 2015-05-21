<html>
	<head>
		<title>ADMIN</title>
	</head>

	<body>

		<h3> Choose Action </h3>

		<form action = "admin.php" method = "post">
		<select required>
			<option value = "out_students">Get Out Students</option>
			<option value = "all_students">Get All Students</option>
			<option value = "edit_student">Edit Student</option>  
		</select>
		<input type = "submit" value = "Submit">
	</form>

	</body>
	<link rel = "stylesheet" type = "text/css" href = "admin_style.css">
	
</html>